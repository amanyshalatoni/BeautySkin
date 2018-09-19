<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\Rule;
use Illuminate\Auth\AuthenticationException;

class ExpertController extends Controller
{
    public function index(Request $request){
        
        $expert=Expert::where([]);
        if($request->has('name'))
            $expert = $expert->where('name','like','%'.$request->input('name').'%');
        if($request->has('username'))
            $expert = $expert->where('username','like','%'.$request->input('username').'%');
        if($request->has('phone'))
            $expert = $expert->where('phone','like','%'.$request->input('phone').'%');
        $expert = $expert->paginate(7);
        return view("expert.index",compact("expert"));
    }
    public function show($id){
        try{
         $expert = Expert::findOrFail($id);
            return view("expert.show",compact("expert"));
        }catch(\Exception $exception){
            return redirect()->route("expert.index")->with('error','expert is not found');
        } 
    }
    public function create(){
        return view("expert.create");
    }
    public function store(Request $request){
        $request->validate($this->rules());
        $image = $request->file('expert_image');
        $imageName = time() .'.' .$image->getClientOriginalExtension();
        $direction = public_path('image/');
        $image->move($direction, $imageName);
        $expert = new Expert();
        $expert->image = "image/" . $imageName;
        $expert->fill($request->all());
        $expert->save();
        return redirect()->back()->with('success','Expert has been Saved Successfully');
    }
    
    
    public function edit($id)
    {
      try{
          $expert = Expert::findOrFail($id);
          return view('expet.edit',compact('expert'));
      } catch (\Exception $exception){
          return redirect()->route('expert.index')
              ->with('error','expert is not found');
      } 
    }
    
    public function update(Request $request,$id){
        try{
            $expert = Expert::findOrFail($id);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('expert.index')
                ->with('error','expert is not found');
        }
        $request->validate($this->rules($expert->id));
            if ($request->hasFile('expert_image')) {
            if (File::exists(public_path($expert->image))) {
                File::delete(public_path($expert->image));
            }
            $expert->image = parent::uploadImage($request->file('expert_image'));
        }
        $expert->fill($request->all());
        $expert->update();
        return redirect()->route('expert.index')
            ->with('success','expert '.$expert->name . 'has been updated successfully');
    }
    
    public function destroy($id)
    {
         try {
            $expert = Expert::findOrFail($id);
            $expert->delete(); //hard delete
            return redirect()->back()->with('success', 'expert ' . $expert->name . ' has been deleted successfully');
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with('error', 'Expert is not existed');
        }
        
    }
    

    
           private
    function rules($id = null)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'cv' => 'required',
            'birthday' => 'required',
            'gender'=> 'required',
            'city'=> 'required',
        ];     if ($id) {
            $rules['expert_image'] = 'required|mimes:jpeg,bmp,png,jpg';
        }
        return $rules;
    }

}
