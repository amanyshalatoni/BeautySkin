@extends('base_layout._layout')


@section('body')
<dl class="dl-horizontal">
    <dt>Name</dt>
    <dd>{{$admin->name}}</dd>
    <dt>UserName</dt>
    <dd>{{$admin->username}}</dd>
    <dt>Email</dt>
    <dd>{{$admin->email}}</dd>
    <dt>Mobile </dt>
    <dd>{{$admin->phone}}</dd>
	<dt> Created_at</dt>
    <dd>{{$admin->created_at}}</dd>	
</dl>

<a class="btn btn-default" href="{{route('admin.index')}}">Cancel</a>
<hr>

@endsection