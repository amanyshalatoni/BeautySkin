@extends('base_layout._layout')
@section('style')
    @if(app()->getLocale() == 'ar')
        <style>
            .fa-plus {
                margin-left: 5px;
            }
        </style>
    @else
        <style>
            .fa-plus {
                margin-right: 5px;
            }
        </style>
    @endif
@endsection
@section('breadcrumb')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{route('expert.index')}}">@lang('expert.titles.experts')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>@lang('lang.add')</span>
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-plus"></i>@lang('Expert.titles.add_expert')</div>
                <div class="panel-body">
                    <form action="{{route('expert.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group " style="text-align: center">
                            <div class="fileinput fileinput-new col-md-12" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 200px; height: 150px;"></div>
                                <div>
                                                                <span class="btn red btn-outline btn-file">
                                                                    <span class="fileinput-new"> @lang('lang.select_image') </span>
                                                                    <span class="fileinput-exists"> @lang('lang.change') </span>
                                                                    <input type="file" name="expert_image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                        @lang('lang.remove') </a>

                                </div>
                            </div>
                            <span class="error text-center">{{$errors->first('expert_image')}}</span>

                        </div>
                        <div class="form-group">
                            <label for="title">@lang('expert.fields.name') <span class="required">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            <span class="error">{{$errors->first('name')}}</span>
                        </div>
                
                        <div class="form-group">
                            <label for="username">@lang('expert.fields.username') <span class="required">*</span></label>
                            <input type="text" class="form-control" name="username" value="{{old('username')}}">
                            <span class="error">{{$errors->first('username')}}</span>
                        </div>

                       <div class="form-group">
                            <label for="phone">@lang('expert.fields.phone') <span class="required">*</span></label>
                            <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                            <span class="error">{{$errors->first('phone')}}</span>
                        </div>

                       <div class="form-group">
                            <label for="email">@lang('expert.fields.email') <span class="required">*</span></label>
                            <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            <span class="error">{{$errors->first('email')}}</span>
                        </div>
                        
                          <div class="form-group">
                            <label for="password">@lang('expert.fields.password') <span class="required">*</span></label>
                            <input type="text" class="form-control" name="password" value="{{old('password')}}">
                            <span class="error">{{$errors->first('password')}}</span>
                        </div>
                        
   <div class="form-group "> <label for="password">@lang('expert.fields.Choose Your Cv') <span class="required">*</span></label>
                    <div class="field-wrap">
            <input class="uploud" type="file" name="cv" accept="image/*">
          </div></div>
                        
             <div class="form-group">
            <label for="dob">
              Date of Birthday<span class="required"> </span>
            </label>
            <input type="date" class="form-control" required autocomplete="off" name="dob" value="{{old('dob')}}"/>
          </div>
                      
                         <div class="form-group">
              <select class="form-control" name="gender">
                <option value="">Choose Gender</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </div>
                      
                                <div class="form-group">
              <select class="form-control" name="gender">
                <option value="">Choose Your City</option>
                <option value="1">Palestine</option>
                <option value="0">Egypt</option>
                <option value="0">Canda</option>
                <option value="0">Syria</option>
                <option value="0">Lebanon</option>
                <option value="0">UAE</option>
                <option value="0">Egypt</option>
              </select>
            </div>      
                       
                       
                        <div class="form-action text-center">
                            <input type="submit" name="store" value="@lang('lang.store')" class="btn btn-primary">
                            <a href="{{route('expert.index')}}" type="reset" name="cancel"
                               class="btn btn-default">@lang('lang.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection