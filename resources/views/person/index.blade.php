@extends('base_layout._layout')


@section('body')
 <div class="row">

        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('person.index')}}" method="GET">
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
                                <div class="col-sm-4 form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control"
                                           value="{{app('request')->get('email')}}">
                                </div>
                                
                                <div class="form-action col-sm-12 text-right">
                                         
      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i> search </button>
    
                                    <a class="btn btn-default" href="{{route('person.index')}}">Cancel</a>
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
                    <h3 class="panel-title"><i class="fa fa-book"></i>Persons</h3>
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
                        @foreach($person as $i)
                            <tr>
                                <td>{{$i->first_name}}</td>
                                <td>{{$i->username}}</td>
                                <td>{{$i->email}}</td>
                                <td>{{$i->phone}}</td>
                                <td>{{$i->created_at}}</td>
                                <td>
                                    <a href="{{route('person.show',['id' => $i->id])}}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                      
                                      <a class="btn btn-warning block-user" data-value="{{$i->id}}"
                        data-title="{{$i->username}}"  data-blocked="{{$i->blocked}}">
                                        <i class=""> {{($i->blocked)== 0 ?"blocked":"unBlocked"}} </i>
                                    </a>
                                 
                                </td>
                            </tr>
                        @endforeach
                  
                        </tbody>
                    </table>
                    <div class="com-md-12 text-right">
                        {{$person->links()}}
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section("script")
<script>
 
        $('.block-user').click(function () {
            var name = $(this).data('title')
            var id = $(this).data('value')
            var blocked =  $(this).data('blocked')
            var blocked_status = 'blocked'
            if (blocked == 0){
                blocked_status = 'blocked';
            }else{
                blocked_status = 'unblocked';
            }
            swal({
                    title: "Are you sure?",
                    text: "Do you want to "+ blocked_status + " User " + name + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Block it!",
                    closeOnConfirm: false
                },
                function () {
                    window.location ='{{route('person.block')}}/' + id;
                });
        })
    
</script>

@endsection

