@extends('base_layout._layout')
@section('body')

<form action="{{route('admin.index')}}" class="form-horizontal" method="post">
    {{csrf_field()}}
            <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("name")}}" class="form-control" name="name" placeholder="Enter your Name">
            </div>
          </div>
          <div class="form-group">
            <label for="userName" class="col-sm-2 control-label">UserName</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{old("userName")}}" class="form-control" name="userName" placeholder="Enter UserName">
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" value="{{old("email")}}" class="form-control" name="email" placeholder="enter email">
            </div>
          </div>
    
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label"> Password</label>
            <div class="col-sm-10">
              <input type="password" value="{{old("password")}}" class="form-control" name="password" placeholder="enter password  ">
            </div>
          </div>
    
          <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
              <input type="number" value="{{old("mobile")}}" class="form-control" name="mobile" placeholder="Enter Phone">
            </div>
          </div>
    
    
      
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Add</button>
                <a class="btn btn-default" href="{{route('admin.index')}}">Cancel</a>
            </div>
          </div>
        </form>
@endsection