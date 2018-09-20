<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Auth\AuthenticationException;

class AdminController extends Controller
{
  
    public function index(Request $request)
    {
        
        $admin=Admin::where([]);
        if($request->has('name'))
            $admin = $admin->where('name','like','%'.$request->input('name').'%');
        if($request->has('username'))
            $admin = $admin->where('username','like','%'.$request->input('username').'%');
        if($request->has('phone'))
            $admin = $admin->where('phone','like','%'.$request->input('phone').'%');
        $admin = $admin->paginate(7);
        
        return view("admin.index",compact("admin"));
    }

    public function show($id)
    {
        $admin=Admin::find($id);
        if($admin==NULL)
            return redirect()->route(admin.index);
        return view("admin.show",compact("admin"));
    }
    

//        public function changepassword()
//    {
//        return view('admin.changepassword');
//    }
//    
//    //post
//    public function postChangepassword(ChangePasswordRequest $request){
//		
//		//المستخدم اللي عامل دخول
//		$user = \Auth::user();
//		
//		if($this->IsValidOldPassword($request->input("oldpassword")))
//		{
//			$user->password=Hash::make($request['password']);
//			$user->save();			
//			Session::flash("msg","s:تمت عملية تغيير كلمة المرور بنجاح");
//			return redirect("/admin/changepassword");
//		}
//		else
//		{			
//			Session::flash("msg","e:كلمة المرور الحالية غير صحيحة");
//			return redirect("/admin/changepassword");
//		}
//	}
//    
//    
//	function IsValidOldPassword($password)
//	{
//		$user = \Auth::User();
//		
//		$credentials2 = ['email' => $user->email, 
//			'password' => $password];
//
//		if (\Auth::validate($credentials2)) {
//			return 1;
//		}
//		else
//			return 0;
//	}
    
    public function profile(){
        try{
             $admin=Admin::findOrFail($this->id);
            return view ("admin.profile",compact("admin"));
        }catch(\Exception $exception){
            return redirect()->route("person.index")->with('error','Admin not found');
        }
    }
    
    public function updateprofile(Request $request)
    {       
        
        $admin = Admin::findOrFail($this->id);        
        $admin->name= $request["name"];      
        $admin->username= $request["username"];
        $admin->phone= $request["phone"];
        $admin->email= $request["email"];

        $admin->save();
        
        return redirect()->back()->with('success','Your Profile Updated Sucessfully!');
    }
    
    
       private
    function rules($id = null)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6',
            'email' => 'required|email',
        ];
  
        return $rules;
    }
    
}
