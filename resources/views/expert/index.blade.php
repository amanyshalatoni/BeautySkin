@extends('base_layout._layout')


@section('body')
 <div class="row">

        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('expert.index')}}" method="GET">
                                <div class="col-sm-4 form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control"
                                           value="{{app('request')->get('name')}}">
                                </div>
                                 <div class="col-sm-4 form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                           value="{{app('request')->get('username')}}">
                                </div>
                                 <div class="col-sm-4 form-group">
                                    <label for="phone">phone</label>
                                    <input type="text" name="phone" class="form-control"
                                           value="{{app('request')->get('phone')}}">
                                </div>
                                
                                <div class="form-action col-sm-12 text-right">
                                         
      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> search </button>
    
                                    <a class="btn btn-default" href="{{route('expert.index')}}">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive-sm">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-book"></i>Experts</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>cv</th>
                            <th>gender</th>
                            <th>city</th>
                            <th>Birthday</th>
                            <th> created_at</th>
                            <th style="text-align: center">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expert as $i)
                            <tr>
                                <td style="width: 8%">{{$i->name}}</td>
                                <td style="width: 8%">{{$i->username}}</td>
                                <td style="width: 7%">{{$i->email}}</td>
                                <td style="width: 6%">{{$i->phone}}</td>
                                <td style="width: 3%">{{$i->cv}}</td>
                                <td style="width: 3%">{{$i->gender}}</td>
                                <td style="width: 4%">{{$i->city}}</td>
                                <td style="width: 4%">{{$i->birthday}}</td>
                                <td style="width: 6%">{{$i->created_at}}</td>
                                <td style="width: 17%">
                                    <a href="{{route('expert.show',['id' => $i->id])}}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('expert.edit',['id' => $i->id])}}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                      <a class="btn btn-danger delete-expert"
                        href="{{route('expert.destroy',['id' =>$i->id ])}}"
                        data-value="{{$i->id}}"
                        data-title="{{$i->name}}"
                        >     <i class="fa fa-trash"></i>
                                    </a>
                                 
                                </td>
                            </tr>
                        @endforeach
                  
                        </tbody>
                    </table>
                    <div class="com-md-12 text-right">
                        {{$expert->links()}}
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section("script")
<script>
 
        $('.delete-expert').click(function () {
            var title = $(this).data('title')
            var id = $(this).data('value')
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete Expert " + name + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function () {
                    {{--window.location = '{{route('expert.destroy')}}/' + id--}}
                });
        })
    
</script>

@endsection

