@extends('backend.master')
@section('title', 'Update User Password') 
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
                        <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('user.update')}}" method="POST">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @csrf             
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
    @if($errors->has('password') || $errors->has('con-password'))       
        <script>
            var error_msg = '';
            @if($errors->has('password'))
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
