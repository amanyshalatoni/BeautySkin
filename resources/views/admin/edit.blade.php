@extends('base_layout._layout')
@section('breadcrumb')

@section("content")
<form action="{{route('admin.update')}}" class="form-horizontal" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put" />
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">UserName</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$item->name}}" class="form-control" name="name" placeholder="UserName">
            </div>
          </div>
    
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="text" value="{{$item->email}}" class="form-control" name="email" placeholder="Email">
            </div>
          </div>
    
    
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
          </div>
    
          <div class="form-group">
            <label for="mobile" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-10">
              <input type="number" value="{{$item->mobile}}" class="form-control" name="mobile" placeholder="Phone">
            </div>
          </div>
    
       
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-default" href="/admin/admin">Cancel</a>
            </div>
          </div>
        </form>
@endsection