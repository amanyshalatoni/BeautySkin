@extends('base_layout._layout')


@section('body')
<dl class="dl-horizontal">
    <dt>FirstName</dt>
    <dd>{{$person->first_name}}</dd>
       <dt>LastName</dt>
    <dd>{{$person->last_name}}</dd>
    <dt>UserName</dt>
    <dd>{{$person->username}}</dd>
    <dt>Email</dt>
    <dd>{{$person->email}}</dd>
    <dt>Mobile </dt>
    <dd>{{$person->phone}}</dd>
    <dt>Longitude </dt>
    <dd>{{$person->long}}</dd>
    <dt>Latitude </dt>
    <dd>{{$person->lat}}</dd>
    <dt>Gender </dt>
    <dd>{{$person->gender}}</dd>
    <dt>Age </dt>
    <dd>{{$person->age}}</dd>
    <dt>Type Skin </dt>
    <dd>{{$person->type_skin}}</dd>
    <dt>Color Skin </dt>
    <dd>{{$person->color_skin}}</dd>
    <dt>Color Hair </dt>
    <dd>{{$person->color_hair}}</dd>
    <dt>Freckles </dt>
    <dd>{{$person->freckles}}</dd>
    <dt>Eye color </dt>
    <dd>{{$person->eye_color}}</dd>
	<dt> Hight</dt>
    <dd>{{$person->height}}</dd>
	<dt> Wight</dt>
    <dd>{{$person->weight}}</dd>
	<dt> Activites</dt>
    <dd>{{$person->activities}}</dd>
	<dt> Sensitivity Skin</dt>
    <dd>{{$person->sensitivity}}</dd>
	<dt> Fire Sun</dt>
    <dd>{{$person->fire}}</dd>
	<dt> SPF</dt>
    <dd>{{$person->spf}}</dd>
	<dt> Water Resistance</dt>
    <dd>{{$person->water_resistance}}</dd>
	<dt> Amount Creame</dt>
    <dd>{{$person->amount_cream}}</dd>
	<dt> Image</dt>
    <dd>{{$person->image}}</dd>
	<dt> Type of Person</dt>
    <dd>{{$person->type_of_person}}</dd>
	<dt> CV</dt>
    <dd>{{$person->cv}}</dd>
	<dt> Created_at</dt>
    <dd>{{$person->created_at}}</dd>	
</dl>

<a class="btn btn-default" href="{{route('person.index')}}">Cancel</a>
<hr>

@endsection