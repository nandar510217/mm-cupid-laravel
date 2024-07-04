@extends('backend.master')
@section('title','Update Setting') 
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Setting</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Update Setting</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content"><br/>
                            <form id="demo-form2" class="form-horizontal form-label-left" action="{{route('setting.update')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="point">Point <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="point" class="form-control" name="point" placeholder="Enter Point" value="{{ old('point', isset($setting) ? $setting->point : '')}}">                 
                                </div>
                            </div>   

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_name">Company Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company_name" class="form-control" name="company_name" placeholder="Enter Company Name" value="{{ old('company_name', isset($setting) ? $setting->company_name : '')}}">                 
                                </div>
                            </div>  

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_email">Company Email <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company_email" class="form-control" name="company_email" placeholder="Enter Company Email" value="{{ old('company_email', isset($setting) ? $setting->company_email : '')}}">                 
                                </div>
                            </div> 
                            
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_phone">Company Phone <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="company_phone" class="form-control" name="company_phone" placeholder="Enter Company Phone" value="{{ old('company_phone', isset($setting) ? $setting->company_phone : '')}}">                 
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_address">Company Address <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="company_address" id="company_address" rows="3">{{ old('company_address', isset($setting) ? $setting->company_address : '')}}</textarea>
                                </div>
                            </div> 

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_logo">Company Logo <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div class="choose-file" style="width:400px; max-height:300px; border:2px solid gray; overflow:hidden; border-radius:5px;">
                                        <label class="choose-label" style="font-size:25px; margin-top:30%; margin-bottom:30%; margin-left:30%; border:1px solid gray; padding:5px; border-radius:5px; cursor:pointer;" onclick="fileBrowse()">Choose File</label>
                                        <div id="preview-img" style="display:none; text-align: center;"></div>
                                    </div>
                                    <input style="display:none;" type="file" id="company_logo" class="form-control" name="company_logo" onchange="previewImage()">
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
    @if($errors->has('point') || $errors->has('company_name') || $errors->has('company_email') || $errors->has('company_phone') || $errors->has('company_address') || $errors->has('company_logo'))
        @if($errors->has('point'))
            <script>
                var error_msg = "{{$errors->first('point')}}";
            </script>
        @endif
        @if($errors->has('company_name')) 
            <script>
                var error_msg = "{{$errors->first('company_name')}}";
            </script>        
        @endif
        @if($errors->has('company_email')) 
            <script>
                var error_msg = "{{$errors->first('company_email')}}";
            </script>        
        @endif
        @if($errors->has('company_phone')) 
            <script>
                var error_msg = "{{$errors->first('company_phone')}}";
            </script>        
        @endif 
        @if($errors->has('company_address')) 
            <script>
                var error_msg = "{{$errors->first('company_address')}}";
            </script>        
        @endif 
        @if($errors->has('company_logo')) 
            <script>
                var error_msg = "{{$errors->first('company_logo')}}";
            </script>        
        @endif 

        <script>
            new PNotify({
            title: 'Oh No!',
            text: error_msg,
            type: 'error',
            styling: 'bootstrap3'
            });
        </script>
    @endif
    <script>
        function fileBrowse() {
            $('#company_logo').click()
        }
        function previewImage() {
            const fileInput = document.getElementById('company_logo');
            const preview = document.getElementById('preview-img');
            const file = fileInput.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                const imageUrl = event.target.result;
                preview.innerHTML = `<img src="${imageUrl}" alt="Preview" style="width:100%; height:100%; object-fit:cover; border-radius:5px;" onclick="fileBrowse()">`;
                };
                reader.readAsDataURL(file);
            }
            preview.style.display = 'block';
            $('.choose-label').hide();
        }
    </script>
@endsection
