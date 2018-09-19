@extends('base_layout._layout')


@section('body')
 <div class="row">

        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.index')}}" method="GET">
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
    
                                    <a class="btn btn-default" href="{{route('admin.index')}}">Cancel</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-book"></i>Admins</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th> created_at</th>
                            <th style="text-align: center">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admin as $i)
                            <tr>
                                <td>{{$i->name}}</td>
                                <td>{{$i->username}}</td>
                                <td>{{$i->email}}</td>
                                <td>{{$i->phone}}</td>
                                <td>{{$i->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.show',['id' => $i->id])}}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                   
                                 
                                </td>
                            </tr>
                        @endforeach
                  
                        </tbody>
                    </table>
                    <div class="com-md-12 text-right">
                        {{$admin->links()}}
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section("script")
<script>
 
        $('.delete-admin').click(function () {
            var title = $(this).data('title')
            var id = $(this).data('value')
            swal({
                    title: "Are you sure?",
                    text: "Do you want to delete Admin " + name + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function () {
                    {{--window.location = '{{route('admin.destroy')}}/' + id--}}
                });
        })
    
</script>

@endsection

