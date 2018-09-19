<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Auth\AuthenticationException;
class UserController extends Controller
{
    public function index(Request $request){
        $user = User::where([]);
        if($request->has('name'))
            $user = $user->where('name','like','%'.$request->input('name').'%');
        if($request->has('username'))
            $user = $user->where('username','like','%'.$request->input('username').'%');
        if($request->has('phone'))
            $user = $user->where('phone','like','%'.$request->input('phone').'%');
        $user = $user->paginate(7);
        return view("user.index",compact("user"));
    }
}
