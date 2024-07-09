@extends('frontend.master')
@section('title','Myanmar Cupid::login')
@section('keywords','Myanmar Dating Website | Online Dating | Myanmar Cupid | သင့်ဖူးစာဖက်ကိုဒီနေရာမှာရှာပါ')
@section('description','mmcupid | MMcupid | myanmar dating | find love | find lover | future boyfriend | future partner | future girlfriend | online dating | ဖူးစာဖက် | ရည်းစားရှာ | ရည်းစား | ဒိတ်')
@section('content')
    <div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init=init()>
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-6 offset-md-3">
                <h1 class="fw-bold" style="font-size: 60px">Login</h1>
                <div class="py-3 text-center" style="font-size: 14px;">
                If you don't have an account? <a href="{{url('register')}}" class="text-black">Register</a>
                </div>         
                <div class="fw-medium" style="font-size: 14px;">Sign up with your email or phone number</div>
                <form action ="{{route('login')}}" method ="POST" id="login_form">
                    @csrf
                    <div>
                        <input type="text" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Email" id="email" name= "email" ng-model="email" ng-blur="validate('email')"/>
                        <p class = "text-danger" ng-if="error_password">@{{error_email_msg}}</p>

                        <input type="password" class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2" style="width:81vh;" placeholder="Enter Password" name="password" id="password" ng-model="password" ng-blur="validate('password')"/>
                        <p class = "text-danger" ng-if="error_password">@{{error_password_msg}}</p>
                        <button type="button" class="btn btn-dark rounded rounded-5 btn-lg mt-4" style="width:81vh;" ng-click="login()" ng-disabled="is_disable">
                        Login
                        </button>  
                    </div>
                    <input type="hidden" name="form_sub" value="1"/>
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
    <script src="{{url('assets/front/js/login.js?v=20240704' )}}"></script>
    <script src="{{url('assets/js/jquery2.2/jquery.min.js' )}}"></script>
    <script src="{{url('assets/js/pnotify/pnotify.js' )}}"></script>    
        @if($errors->has('email'))
            <script>
                var error_message = "{{$errors->first('email')}}"
                new PNotify({
                title: 'Oh No!',
                text: error_message,
                type: 'error',
                styling: 'bootstrap3'
            });
            </script>
        @endif
        @if($errors->has('password'))
            <script>
                var error_message = "{{$errors->first('password')}}"
                new PNotify({
                title: 'Oh No!',
                text: error_message,
                type: 'error',
                styling: 'bootstrap3'
            });
            </script>
        @endif
@endsection
