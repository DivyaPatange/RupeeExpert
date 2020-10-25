<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function search(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $data = User::where('client_id', 'LIKE', $request->referenceID.'%')
                ->get();
            // dd($data);  
        
            // declare an empty array for output
            $output = '';
           
            if (count($data)>0) {
                // concatenate output to the array
                // loop through the result array
                foreach ($data as $row){
                    // dd($request->user_referral_info == $row->referral_code);
                    if($request->referenceID == $row->client_id){
                    // concatenate output to the array
                    // $parentName = User::where('id', $row->parent_id)->first();

                    
                       $output .= $row->name;
                        
                        
                    }
                }
                // end of output
            }
            
            else {
                // if there's no matching results according to the input
                $output .= 'No results';
            }
            // return output result array
            // dd($output);
            return $output;
        }
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function Treeview()
    {
        $users = User::where('reference_id', '=', 0)->get();
        // dd($users);
        $allMenus = User::pluck('name', 'reference_id','id')->all();
        return view('admin.companyTree.index',compact('users','allMenus'));
    }
}
