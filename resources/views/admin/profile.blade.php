@extends('base_layout._layout')


@section('body')
<form action="{{route('admin.profile')}}" class="form-horizontal" method="post">
    {{csrf_field()}}
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$admin->name}}" class="form-control" id="name" name="name" placeholder=" Name">
            </div>
          </div>
      <div class="form-group">
            <label for="username" class="col-sm-2 control-label">username</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$admin->username}}" class="form-control" id="username" name="username" placeholder=" username">
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email </label>
            <div class="col-sm-10">
              <input type="email" value="{{$admin->email}}" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>
    
          <div class="form-group">
            <label for="country_id" class="col-sm-2 control-label">Mobile</label>
            <div class="col-sm-10">
                <input type="number" value="{{$admin->phone}}" class="form-control" id="phone" name="phone" placeholder="phone">
            </div>
          </div>
    
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>


@endsection()