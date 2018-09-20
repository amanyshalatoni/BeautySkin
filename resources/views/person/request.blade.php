@extends('base_layout._layout')


@section('body')
 <div class="row">

        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-user"></i> Persons Who Request to be Expert</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>CV</th>
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
                                <td>
                                <a href = "download/{{$i->cv}}" download="{{$i->cv}}"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-download"> Download CV</i></button></a>
                                </td>
                                <td>{{$i->created_at}}</td>
                                <td>
                                    <a href="{{route('person.accept',['id' => $i->id])}}" class="btn btn-success">
                                        <i class="fa fa-check">Accept</i>
                                    </a>
                                      
                                      <a class="btn btn-danger reject-user"
                                       data-value="{{$i->id}}"
                                       data-title="{{$i->username}}" 
                                       >
                                        <i class="fa fa-close"> Reject </i>
                                    </a>
                                 
                                </td>
                            </tr>
                        @endforeach
                  
                        </tbody>
                    </table>
                    <div class="com-md-12 text-right">
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    
    

@endsection

@section("script")
<script>
 
        $('.reject-user').click(function () {
            var name = $(this).data('title')
            var id = $(this).data('value')
        
            swal({
                    title: "Are you sure?",
                    text: "Do you want to reject User " + name + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, reject it!",
                    closeOnConfirm: false
                },
                function () {
                    window.location ='{{route('person.reject')}}/' + id;
                });
        })
    
</script>

@endsection

