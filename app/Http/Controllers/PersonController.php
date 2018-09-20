<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Auth\AuthenticationException;
use SoftDeletes;

class PersonController extends Controller
{
    public function index(Request $request){
        $person = Person::where([]);
        if($request->has('username'))
            $person = $person->where('username','like','%'.$request->input('username').'%');
        if($request->has('phone'))
            $person = $person->where('phone','like','%'.$request->input('phone').'%');
        if($request->has('email'))
            $person = $person->where('email','like','%'.$request->input('email').'%');
        $person = $person->paginate(7);
        return view("person.index",compact("person"));
    }
    
    public function show($id){
        try{
            $person = Person::findOrFail($id);
            return view ("person.show",compact("person"));
        }catch(\Exception $exception){
            return redirect()->route("person.index")->with('error','Person not found');
        }
    }
  
    public function block($id){
        try{
        $person = Person::findOrFail($id);
        $person->blocked=!$person->blocked;
        $person->update();    
            return redirect()->back()->with('success', ($person->blocked)== 0 ?"Person unblocked":"Blocked" );

        }catch(ModelNotFoundException $modelNotFoundException ){
            return redirect()->back()->with('error', 'Person is not existed');

        }
    }
    
     public function accept($id){
        try{
        $person = Person::findOrFail($id);
        $person->type_of_person='expert';
        $person->update();    
            return redirect()->back()->with('success','user changed to expert' );

        }catch(ModelNotFoundException $modelNotFoundException ){
            return redirect()->back()->with('error', 'Person is not existed');

        }
    }
    
     public function reject($id){
        try{
        $person = Person::findOrFail($id);
        $person->cv=Null;
        $person->update();    
            return redirect()->back()->with('success','user rejected to be expert' );

        }catch(ModelNotFoundException $modelNotFoundException ){
            return redirect()->back()->with('error', 'Person is not existed');

        }
    }
    
    public function reqExp(Request $request){
//       $person = Person::whereRaw("cv"== !null)->get();
      $person = Person::whereNotNull('cv')
          ->where('type_of_person','user')
          ->get();
        
    
        $searchperson = Person::where([]);   
        if($request->has('username'))
            $searchperson = $searchperson->where('username','like','%'.$request->input('username').'%');
        if($request->has('phone'))
            $searchperson = $searchperson->where('phone','like','%'.$request->input('phone').'%');
        if($request->has('email'))
            $searchperson = $searchperson->where('email','like','%'.$request->input('email').'%');
   //     $searchperson = $searchperson->paginate(7);
    return view("person.request",compact("person","searchperson"));
    
    }
    
}
