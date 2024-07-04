@extends('backend.master')
@section('title',isset($city) ? 'User Update' : 'User City') 
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create User</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create User</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"><br/>
                        @if(isset($user))
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('user.update')}}" method="POST">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                        @else
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('user.store')}}" method="POST">
                        @endif
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Username <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" class="form-control" name="username" placeholder="Enter User Name" value="{{ old('username', isset($user) ? $city->name : '')}}">                 
                                </div>
                            </div>   

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">User Role <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 " id="role">
                                    <select id="heard" class="form-control" name="role">
                                        <option value="">Choose User Role</option>
                                        <option value="{{ getUserRole('admin') }}" {{ old('role') == getUserRole('admin') ? 'selected' : '' }}>Admin</option>
                                        <option value="{{ getUserRole('Editor') }}" {{ old('role') == getUserRole('Editor') ? 'selected' : '' }}>Editor</option>
                                        <option value="{{ getUserRole('customer_service') }}" {{ old('role') == getUserRole('customer_service') ? 'selected' : '' }}>Customer Service</option>
                                    </select> 
                                </div>
                            </div> 
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="password" class="form-control" name="password" placeholder="Enter Password" value="">
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="confirm-password">Confirm Password <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="confirm-password" class="form-control" name="con-password" placeholder="Enter Confirm Password" value="">
                                </div>
                            </div> 

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    {{-- <button class="btn btn-primary" type="reset">Reset</button> --}}
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <input type="hidden" name="form-sub" value="1"/>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section('javascript')
    @if($errors->has('username') || $errors->has('role') || $errors->has('password') || $errors->has('con-password'))
        <script>
            var error_msg = '';
            @if($errors->has('username'))
                error_msg = "{{ $errors->first('username') }}";
            @elseif($errors->has('role'))
                error_msg = "{{ $errors->first('role') }}";
            @elseif($errors->has('password'))
                error_msg = "{{ $errors->first('password') }}";
            @elseif($errors->has('con-password'))
                error_msg = "{{ $errors->first('con-password') }}";
            @endif
    
            new PNotify({
            title: 'Oh No!',
            text: error_msg,
            type: 'error',
            styling: 'bootstrap3'
            });
        </script>
    @endif
@endsection
