@extends('backend.master')
@section('title',isset($hobby) ? 'Hobby Update' : 'Hobby City') 
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Hobby</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Hobby</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"><br/>
                        @if(isset($hobby))
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('hobby.update')}}" method="POST">
                            <input type="hidden" name="id" value="{{ $hobby->id }}">
                        @else
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('hobby.store')}}" method="POST">
                        @endif
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter Hobby Name" value="{{ old('name', isset($hobby) ? $hobby->name : '')}}">                 
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
