<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DailyReport;
use App\Models\AdminWallet;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $data = User::where('client_id', 'LIKE', $request->reference_id.'%')
                ->get();
            // dd($data);  
        
            // declare an empty array for output
            $output = '';
           
            if (count($data)>0) {
                // concatenate output to the array
                // loop through the result array
                foreach ($data as $row){
                    // dd($request->user_referral_info == $row->referral_code);
                    if($request->reference_id == $row->client_id){
                    // concatenate output to the array
                    // $parentName = User::where('id', $row->parent_id)->first();

                    
                       $output .= '<h3 class="text-success">'.$row->name.'</h3>';
                        
                        
                    }
                }
                // end of output
            }
            
            else {
                // if there's no matching results according to the input
                $output .= '<h3 class="text-danger">No results</h3>';
            }
            // return output result array
            // dd($output);
            return $output;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_no' => 'required|digits:10',
            'client_id' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|confirmed',
        ]);
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->contact_no = $request->contact_no;
        $users->client_id = $request->client_id;
        $users->password = Hash::make($request->password);
        $users->password_1 = $request->password;
        $users->address = $request->address;
        if($request->reference_id){
            $referenceID = User::where('client_id', $request->reference_id)->first();
            if($referenceID != null){
                $users->reference_id = $request->reference_id;
            }
            else{
                return Redirect::back()->with("danger", "This Reference ID doesn't exist" );
            }
        }
        else{
            $users->reference_id = 0;
        }
        $users->save();
        return redirect('/admin/users')->with('success', 'Registered Successfully!');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact_no = $request->contact_no;
        $user->address = $request->address;
       
        $user->update($request->all());
        return redirect('/admin/users')->with('success', 'User Updated  Successfully!');
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        $userWallet = UserWallet::where('parent_id', $user->client_id)->get();
        $total = UserWallet::where('parent_id', $user->client_id)->get()->sum('amount');
        // dd($userWallet);
        return view('admin.users.show', compact('user', 'userWallet', 'total'));
    }

    public function Treeview()
    {
        $users = User::where('reference_id', '=', '0')->get();
        // dd($users);
        $allMenus = User::pluck('name', 'reference_id', 'client_id')->all();
        // dd($allMenus);
        return view('admin.companyTree.index',compact('users','allMenus'));
    }

    public function dailyReport()
    {
        $dailyReports = DailyReport::all();
        return view('admin.dailyReport.index', compact('dailyReports'));
    }

    public function uploadFile(Request $request)
    {
        // if ($request->input('submit') != null )
        // {
            $request->validate([
               'file' => 'required',
            ]);
            $file = $request->file('file');
        
            // File Details 
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
         
            // Valid File Extensions
            $valid_extension = array("csv");
         
            // 2MB in Bytes
            $maxFileSize = 2097152; 
         
            // Check file extension
            if(in_array(strtolower($extension),$valid_extension)){
        
                // Check file size
                if($fileSize <= $maxFileSize){
        
                // File upload location
                $location = 'DailyReport';
        
                // Upload file
                $file->move($location,$filename);
        
                // Import CSV to Database
                $filepath = public_path($location."/".$filename);
        
                // Reading file
                $file = fopen($filepath,"r");
        
                $importData_arr = array();
                $i = 0;
        
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );
                    
                    // Skip first row (Remove below comment if you want to skip the first row)
                    /*if($i == 0){
                        $i++;
                        continue; 
                    }*/
                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }
                    $i++;
                }
                fclose($file);
        
                // Insert to MySQL database
                foreach($importData_arr as $importData){
                    //   dd($importData[1]);
                    $insertData = array(
                    "client_id"=>$importData[0],
                    "name"=>$importData[1],
                    "gross"=>$importData[2],
                    "remiser"=>$importData[3],
                    "created_at" => date('Y-m-d'));
                    DailyReport::insertData($insertData);
                }
                $dailyReport = DailyReport::all();
                foreach($dailyReport as $d)
                {
                    $adminWallet = AdminWallet::where('dailyreport_id', $d->id)->first();
                    if(empty($adminWallet))
                    {
                        $adminWallet = new AdminWallet();
                        $adminWallet->dailyreport_id = $d->id;
                        $adminWallet->client_id = $d->client_id;
                        $user = User::where('client_id', $d->client_id)->first();
                        $parent = User::where('client_id', $user->reference_id)->first();
                        if($parent == null)
                        {
                            $adminWallet->amount = $d->remiser;
                        }
                        else{
                            $adminWallet->amount = (0.5 * $d->remiser);
                        }
                        $adminWallet->income_date = $d->created_at;
                        $adminWallet->save();
                    }
                    $userWallet = UserWallet::where('dailyreport_id', $d->id)->first();
                    if(empty($userWallet))
                    {
                        $user = User::where('client_id', $d->client_id)->first();
                        $parent = User::where('client_id', $user->reference_id)->first();
                        if($parent != null)
                        {
                            $userWallet = new UserWallet();
                            $userWallet->dailyreport_id = $d->id;
                            $userWallet->client_id = $d->client_id;
                            $userWallet->parent_id = $parent->client_id;
                            $userWallet->amount = (0.5 * $d->remiser);
                            $userWallet->income_date = $d->created_at;
                            $userWallet->save();
                        }
                        
                        
                    }
                }
                // $dailyReports = DailyReport::where('created_at', $importData['created_at'])->get();
                // dd($dailyReports);
                Session::flash('success','Import Successful.');
                }else{
                Session::flash('danger','File too large. File must be less than 2MB.');
                }
        
            }else{
                Session::flash('success','Invalid File Extension.');
            }
        // }
         
        // Redirect to index
        return redirect('/admin/dailyReport');
    }

    public function adminWallet()
    {
        $adminWallet = AdminWallet::all();
        return view('admin.wallet.admin', compact('adminWallet'));
    }

    public function userWallet()
    {
        $userWallet = UserWallet::all();
        return view('admin.wallet.user', compact('userWallet'));
    }
}
