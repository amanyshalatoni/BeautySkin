@extends('base_layout._layout')


@section('body')
<dl class="dl-horizontal">
    <dt>Name</dt>
    <dd>{{$expert->name}}</dd>
    <dt>UserName</dt>
    <dd>{{$expert->username}}</dd>
    <dt>Email</dt>
    <dd>{{$expert->email}}</dd>
    <dt>Mobile </dt>
    <dd>{{$expert->phone}}</dd>
    <dt>Birthday </dt>
    <dd>{{$expert->birthday}}</dd>
    <dt>Gender </dt>
    <dd>{{$expert->gender}}</dd>
    <dt>City </dt>
    <dd>{{$expert->city}}</dd>
    <dt>Upload Cv </dt>
    <dd>{{$expert->cv}}</dd>
	<dt> Created_at</dt>
    <dd>{{$expert->created_at}}</dd>	
</dl>

<a class="btn btn-default" href="{{route('expert.index')}}">Cancel</a>
<hr>
 <a class="btn btn-danger delete-expert btn-md" href="{{route('expert.destroy')}}" >
	 <i class="fa fa-trash"></i>Delete Admin </a>
@endsection