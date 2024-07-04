@extends('backend.master')
@section('title',isset($city) ? 'City Update' : 'Create City') 
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create City</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create City</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"><br/>
                        @if(isset($city))
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('city.update')}}" method="POST">
                            <input type="hidden" name="id" value="{{ $city->id }}">
                        @else
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('city.store')}}" method="POST">
                        @endif
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">City Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Enter city name" value="{{ old('name', isset($city) ? $city->name : '')}}">
                                </div>
                            </div>                   

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
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
    @if($errors->has('name'))
        <script> 
            new PNotify({
            title: 'Oh No!',
            text: "{{ $errors->first('name')}}",
            type: 'error',
            styling: 'bootstrap3'
            });
        </script>
    @endif
@endsection
