<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Redirect;

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
        $request->validate([
            'client_id' => 'unique:users,client_id,'.$id,
        ]);
        $user = User::findorfail($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->contact_no = $request->contact_no;
        // $user->client_id = $request->client_id;
        // $user->address = $request->address;
        if($request->reference_id){
            $referenceID = User::where('client_id', $request->reference_id)->first();
            if($referenceID != null){
                $user = User::where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact_no' => $request->contact_no,
                    'client_id' => $request->client_id,
                    'address' => $request->address,
                    'reference_id' => $request->reference_id,
                ]);
            }
            else{
                return Redirect::back()->with("danger", "This Reference ID doesn't exist" );
            }
        }
        else{
            $user = User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'contact_no' => $request->contact_no,
                'client_id' => $request->client_id,
                'address' => $request->address,
                'reference_id' => 0,
            ]);
        }
        // $user->update($request->all());
        return redirect('/admin/users')->with('success', 'User Updated  Successfully!');
    }

    public function show($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.show', compact('user'));
    }

    public function Treeview()
    {
        $users = User::where('reference_id', '=', '0')->get();
        // dd($users);
        $allMenus = User::pluck('name', 'reference_id', 'client_id')->all();
        // dd($allMenus);
        return view('admin.companyTree.index',compact('users','allMenus'));
    }
}
