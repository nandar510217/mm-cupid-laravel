@extends('frontend.master')
@section('title','Myanmar Cupid::Register')
@section('keywords','Myanmar Dating Website | Online Dating | Myanmar Cupid | သင့်ဖူးစာဖက်ကိုဒီနေရာမှာရှာပါ')
@section('description','mmcupid | MMcupid | myanmar dating | find love | find lover | future boyfriend | future partner | future girlfriend | online dating | ဖူးစာဖက် | ရည်းစားရှာ | ရည်းစား | ဒိတ်')
@section('content')
<div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init=init()>
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <h1 class="fw-bold" style="font-size: 60px">Sign up</h1>
            <div class="py-3" style="font-size: 14px;">
            Already have an account? <a href="{{url('/login')}}" class="text-black">Log in</a>
            </div>
            <div class="fw-medium" style="font-size: 14px;">Sign up with your email or phone number</div>
            <p style=display:none;>Error message</p>
            <form action="{{ route('register')}}" method="post" enctype="multipart/form-data" id="my-form">
                @csrf
                <div ng-if="user_info">
                    <input type="text" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Username" name="username" id="username" ng-blur="validate('username')"/>

                    <p class="text-danger" ng-if="error_username">@{{ error_username_msg }}</p>
                    
                    <input type="text" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Email" name="email" id="email" ng-blur="validate('email')"/>
                    <p class="text-danger" ng-if="error_email">@{{ error_email_msg}}</p>
                    
                    <input type="password" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Password" name="password" id="password" ng-model="password" ng-blur="validate('password')"/>
                    <p class="text-danger" ng-if="error_password">@{{ error_password_msg}}</p>
                    
                    <input type="password" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Confirm Password" name="confirm-password" id="confirm-password" ng-model="confirm_password" ng-blur="validate('confirm-password')" ng-model="confirm_password" ng-change="validate('confirm-password')"/>
                    <p class="text-danger" ng-if="error_confirm_password">@{{ error_confirm_password_msg}}</p>
                    
                    <input type="text" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Phone Number" name="phone" id="phone" ng-blur="validate('phone')"/>
                    <p class="text-danger" ng-if="error_phone">@{{ error_phone_msg}}</p>
                    
                    <input type="text" id="birthday" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Your Birthday" name="birthday" id="birthday" ng-blur="validate('birthday')"/>
                    <p class="text-danger" ng-if="error_birthday">@{{ error_birthday_msg}}</p>
                    
                    <select class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" ng-model="city" ng-blur="validate('city')" name="city" id="city" >
                    <option value="">Choose Your City</option>
                    <option value="@{{city.id}}" ng-repeat="city in cities">@{{ city.name }}</option>
                    </select>
                    <p class="text-danger" ng-if="error_city">@{{ error_city_msg}}</p>

                    <div class="d-flex align-items-center">
                    <select class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:40vh;" name="height-feet" id="hfeet" ng-model="hfeet" ng-blur="validate('hfeet')">
                        <option selected value="">Choose Your Height Feet</option>
                        <option value="0">4'</option>
                        <option value="1">5'</option>
                        <option value="2">6'</option>
                        <option value="3">7'</option>
                    </select>

                    <div style="width: 1rem;"></div>

                    <select class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:40vh;" name="height-inches" id="hinches" ng-model="hinches" ng-blur="validate('hinches')">
                        <option selected value="">Choose Your Height Inches</option>
                        <option value="0">0"</option>
                        <option value="1">1"</option>
                        <option value="2">2"</option>
                        <option value="3">3"</option>
                        <option value="4">4"</option>
                        <option value="5">5"</option>
                        <option value="6">6"</option>
                        <option value="7">7"</option>
                        <option value="8">8"</option>
                        <option value="9">9"</option>
                        <option value="10">10"</option>
                        <option value="11">11"</option>
                    </select>

                    </div class="row d-flex">
                    <div class="col-md-6">
                        <p class="text-danger" ng-if="error_height_feet">@{{ error_height_feet_msg}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-danger" ng-if="error_height_inches">@{{ error_height_inches_msg}}</p>
                    </div>
                    <div>

                    </div>

                    <textarea class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" name="education" id="education" ng-blur="validate('education')" rows="3" placeholder="Please Describe Your Education"></textarea>
                    <p class="text-danger" ng-if="error_education">@{{ error_education_msg}}</p>

                    <textarea class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" name="about" id="about" rows="3" ng-blur="validate('about')" placeholder="Please Tell Me About Yourself."></textarea>
                    <p class="text-danger" ng-if="error_about">@{{ error_about_msg}}</p>

                    <textarea class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" name="work" id="work" rows="3" ng-blur="validate('work')" placeholder="Please Describe Your Work."></textarea>
                    <p class="text-danger" ng-if="error_work">@{{ error_work_msg}}</p>

                    <select class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" ng-model="religion" name="religion" id="religion" ng-blur="validate('religion')">
                    <option value="">Choose Your Religion</option>
                    <option value="1">Christian</option>
                    <option value="2">Islam</option>
                    <option value="3">Buddish</option>
                    <option value="4">Hinduism</option>
                    <option value="5">Jain</option>
                    <option value="6">Shinto</option>
                    <option value="7">Atheism</option>
                    <option value="8">Other</option>
                    </select>
                    <p class="text-danger" ng-if="error_religion">@{{ error_religion_msg}}</p>

                    <!-- </div> -->
                    <p>Choose your gender</p>
                    <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input gender" type="radio" name="gender" id="male" value="0" ng-blur="validate('gender')">
                    <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input gender" type="radio" name="gender" id="female" value="1" ng-blur="validate('gender')">
                    <label class="form-check-label" for="female">Female</label>
                    </div>
                    <p class="text-danger" ng-if="error_gender">@{{ error_gender_msg}}</p>


                    <div style="width:81vh;">
                    <div class="row mt-2">
                        <p class="mt-2" style="font-size:20px">Choose your hobbies</p>
                        <div class="col-md-4" ng-repeat ="hobby in hobbies">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input hobby" type="checkbox" id="hobby-@{{hobby.id}}" value="@{{hobby.id}}" name="hobby[]">
                            <label class="form-check-label" for="hobby-@{{hobby.id}}">@{{hobby.name}}</label>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div style="width:81vh;">
                    <div class="row mt-2">
                        <p class="mt-2" style="font-size:20px">Choose your partner gender</p>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input partner_gender" type="radio" name="pgender" id="pMale" value="0">
                            <label class="form-check-label" for="pMale">Male</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input partner_gender" type="radio" name="pgender" id="pFemale" value="1">
                            <label class="form-check-label" for="pFemale">Female</label>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input partner_gender" type="radio" name="pgender" id="pBoth" value="2">
                            <label class="form-check-label" for="pBoth">Both</label>
                        </div>
                        </div>
                    </div>
        
                    <p class="mt-2" style="font-size:20px">Choose your partner age</p>
                    <div class="d-flex justify-content-between">
                        <div style="width:48%">
                        <select class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:40vh;" name="min-age" id="min-age" ng-model="min_age" ng-change="chooseMinAge()">
                            <option selected value="">Minimum age</option>
                            <option value="@{{age}}" ng-repeat="age in partner_ages">@{{age}}</option>
                        </select>
                        <p class="text-danger" ng-if="error_min_age">@{{ error_min_age_msg }}</p>
                        </div>
                        
                        <div style="width:48%">
                        <select class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:40vh;" name="max-age" id="max-age" ng-model="max_age" ng-change="chooseMaxAge()">
                            <option selected value="">Maximum age</option>
                            <option value="@{{age}}" ng-repeat="age in partner_ages">@{{age}}</option>
                        </select>
                        <p class="text-danger" ng-if="error_max_age">@{{ error_max_age_msg }}</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark rounded rounded-5 btn-lg mt-4" style="width:81vh;" ng-click="nextStep()">
                        Next
                    </button>
                    </div>
                </div>
                
                <div ng-if="user_photo">
                    <table class="mt-2" style="width: 100%; margin-left: -5px;">
                        <tr>
                            <td class="" colspan="2" rowspan="2">
                                <div class="bg-body-secondary position-relative overflow-hidden rounded-2 mx-1 d-flex justify-content-center align-items-center" ng-click="browseFile()" style="height: 48vh; width: 23vw;  ">
                                    <div id="preview1" class="d-none w-100 h-100"></div>
                                    <label for="" onclick="browseImage('1')" class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo1" style="opacity: 0.8" >Change</label>
                                    <i class="fa fa-upload fs-4" style="cursor: pointer" id="upload-icon-1" onclick="browseImage('1')"></i>
                                </div>
                            </td>
                            <td class="">
                                <div class="bg-body-secondary position-relative overflow-hidden rounded-2 m-1 d-flex justify-content-center align-items-center" style="height: 23vh; width: 11vw; ">
                                    <div id="preview2" class="d-none w-100 h-100"></div>
                                    <label for="" onclick="browseImage('2')" class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo2" style="opacity: 0.8" >Change</label>
                                    <i class="fa fa-upload fs-4" onclick="browseImage('2')" style="cursor: pointer" id="upload-icon-2"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <div class="bg-body-secondary position-relative overflow-hidden rounded-2 m-1 d-flex justify-content-center align-items-center" style="height: 23vh; width: 11vw; ">
                                    <div id="preview3" class="d-none w-100 h-100"></div>
                                    <label for="" onclick="browseImage('3')" class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo3" style="opacity: 0.8" >Change</label>
                                    <i class="fa fa-upload fs-4" onclick="browseImage('3')" style="cursor: pointer" id="upload-icon-3"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <div class="bg-body-secondary position-relative overflow-hidden rounded-2 m-1 d-flex justify-content-center align-items-center" style="height: 23vh; width: 11vw; ">
                                    <div id="preview4" class="d-none w-100 h-100"></div>
                                    <label for="" onclick="browseImage('4')" class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo4" style="opacity: 0.8" >Change</label>
                                    <i class="fa fa-upload fs-4" onclick="browseImage('4')" style="cursor: pointer" id="upload-icon-4"></i>
                                </div>
                            </td>
                            <td class="">
                                <div class="bg-body-secondary position-relative overflow-hidden rounded-2 m-1 d-flex justify-content-center align-items-center" style="height: 23vh; width: 11vw; ">
                                    <div id="preview5" class="d-none w-100 h-100"></div>
                                    <label for="" onclick="browseImage('5')" class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo5" style="opacity: 0.8" >Change</label>
                                    <i class="fa fa-upload fs-4" onclick="browseImage('5')" style="cursor: pointer" id="upload-icon-5"></i>
                                </div>
                            </td>
                            <td class="rounded-2">
                                <div class="bg-body-secondary position-relative overflow-hidden rounded-2 m-1 d-flex justify-content-center align-items-center" style="height: 23vh; width: 11vw; ">
                                    <div id="preview6" class="d-none w-100 h-100"></div>
                                    <label for="" onclick="browseImage('6')" class="btn btn-dark p-2 rounded-3 position-absolute hide change-photo change-photo6" style="opacity: 0.8" >Change</label>
                                    <i class="fa fa-upload fs-4" onclick="browseImage('6')" style="cursor: pointer" id="upload-icon-6"></i>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <input type="file" name="upload1" id="upload1" onchange="previewImage('1',this)" class="d-none">
                    <input type="file" name="upload2" id="upload2" onchange="previewImage('2')" class="d-none">
                    <input type="file" name="upload3" id="upload3" onchange="previewImage('3')" class="d-none">
                    <input type="file" name="upload4" id="upload4" onchange="previewImage('4')" class="d-none">
                    <input type="file" name="upload5" id="upload5" onchange="previewImage('5')" class="d-none">
                    <input type="file" name="upload6" id="upload6" onchange="previewImage('6')" class="d-none">
                    <button type="button" ng-click="formSub()" disabled id="upload-btn" class="btn btn-dark rounded rounded-5 btn-lg mt-4" style="width:105%;">
                        Upload
                    </button>
                </div>
                <input type="hidden" name="form-sub" value="1">
                <input type="hidden" name="member-id" id="member-id" value="">
            </form>
        
            <p class="w-75 mt-4 fw-medium text-center" style="font-size: 12px; line-height:16px;">By signing up, you agree to our
                <a href="" class="text-black">Terms & Conditions</a>. Learn how we
                use your data in our
                <a href="" class="text-black">Privacy Policy</a>
            </p>
        </div>

        <div class="col-md-4"></div>
        </div>
    </div>
@endsection
@section('javascript')
    {{-- <script>
        $(function(){
            $("#birthday").datepicker();
        });
    </script>
    <script src="{{url('assets/front/js/register.js?v=20240629')}}"></script> --}}

    <script>
        $( function() {
        $( "#brithday" ).datepicker();
      } );

      function browseImage (index) {
            $('#upload'+index).click();
        }

        function previewImage (index) {
            console.log(document.getElementById('upload3').value);

            const fileInput = document.getElementById('upload'+index);
            const preview = document.getElementById('preview'+index);

            let fileName = fileInput.value.split('\\').pop();
            let fileExtension = fileName.split('.').pop();

            let allow_extensions = ['jpg','jpeg','png','gif','webp'];

            let file = event.target.files[0];

            if(allow_extensions.includes(fileExtension)){
                if(file){
                    let reader = new FileReader();
                    reader.onload = function(event) {
                    let imgSrc = event.target.result;
                    preview.innerHTML = `<img src= ${imgSrc} class="" style="width: 100%; height: 100%; object-fit: cover" alt="Image Preview"/>`;
                    };
                    reader.readAsDataURL(file);
                    preview.style.display = "";
                    $('#upload-icon-'+index).hide();
                    $('.change-photo'+index).show();
                    $('#preview'+index).removeClass('d-none');
                    $('#upload-btn').prop('disabled', false);
                }
            }else{
               alert('Your uploaded file type is not accepted.')
            };
        }
    </script>
    <script src="{{url('assets/front/js/register.js?v=20240701')}}"></script>
    @if($errors->has('username') || $errors->has('password'))
		@if($errors->has('username'))
		<script>
			var error_message = '{{$errors->first('username')}}'
		</script>

		 @elseif($errors->has('password'))
		<script>
			var error_message = '{{$errors->first('password')}}'
		</script>

		 
		 @endif

		<script>  
			new PNotify({
						title: 'Oh No!',
						text: error_message,
						type: 'error',
						styling: 'bootstrap3'
					});
		</script>
    @endif


@endsection
