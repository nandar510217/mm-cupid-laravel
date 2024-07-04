var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope,$http) {
  $scope.username         = "";
  $scope.email            = "";
  $scope.password         = "";
  $scope.confirm_password = "";
  $scope.phone            = "";
  $scope.birthday         = "";
  $scope.city             = "";
  $scope.hfeet            = "";
  $scope.hinches          = "";
  $scope.gender           = "";
  $scope.partner_gender   = "";
  $scope.education        = "";
  $scope.about            = "";
  $scope.work             = "";
  $scope.religion         = "";
  $scope.cities           = [];
  $scope.hobbies          = [];
  $scope.partner_ages     = []; 
  $scope.min_age          = "";
  $scope.max_age          = "";
  $scope.error_message    = "";
  $scope.user_info        = true;
  $scope.user_photo       = false;
  $scope.data             = {};
  
  $scope.init = function() {
    for(let i=18;i<=55; i++) {
      $scope.partner_ages.push(i);
    }
    const request_url = base_url + "/api/cities ";
    $http.get(request_url)
    .then(function(response) {
      if(response.status == 200) {
        $scope.cities = response.data.data;
      }
    });
    const request_url2 = base_url + "/api/hobbies";
      $http.get(request_url2)
      .then(function(response) {
        if(response.status == 200) {
          $scope.hobbies = response.data.data;
        }
      });  
  }
  

  $scope.validate = function(field) {
    const form_value = $('#' + field).val();
    if(form_value == ''){
      switch(field){
        case "username":
          $scope.error_username     = true;
          $scope.error_username_msg = error_messages.A0001 + " your username."; 
          break;
        case "email":
          $scope.error_email     = true;
          $scope.error_email_msg = error_messages.A0001 + " your email."; 
          break;
          case "password":
          $scope.error_password     = true;
          $scope.error_password_msg = error_messages.A0001 + " your password."; 
          break;
        case "confirm-password":
          $scope.error_confirm_password     = true;
          $scope.error_confirm_password_msg = error_messages.A0001 + " your confirm password."; 
          break;
        case "phone":
          $scope.error_phone     = true;
          $scope.error_phone_msg = error_messages.A0001 + " your phone."; 
          break;
        case "birthday":
          $scope.error_birthday     = true;
          $scope.error_birthday_msg = error_messages.A0001 + " your birthday."; 
          break;
        case "city":
          $scope.error_city     = true;
          $scope.error_city_msg = error_messages.A0001 + " your city."; 
          break;
        case "hfeet":
          $scope.error_height_feet     = true;
          $scope.error_height_feet_msg = error_messages.A0001 + " your feet."; 
          break;
        case "hinches":
          $scope.error_height_inches     = true;
          $scope.error_height_inches_msg = error_messages.A0001 + " your inches."; 
          break;
        case "education":
          $scope.error_education     = true;
          $scope.error_education_msg = error_messages.A0001 + " your education."; 
          break;
        case "about":
          $scope.error_about     = true;
          $scope.error_about_msg = error_messages.A0001 + " about yourself."; 
          break;
        case "work":
          $scope.error_work     = true;
          $scope.error_work_msg = error_messages.A0001 + " your work."; 
          break;
        case "religion":
          $scope.error_religion     = true;
          $scope.error_religion_msg = error_messages.A0001 + " your religion."; 
          break;
        case "gender":
          $scope.error_gender     = true;
          $scope.error_gender_msg = error_messages.A0001 + " your gender."; 
          break;
        default:
      }
      
    }else{
      switch(field){
        case "username":
          $scope.error_username     = false;
          $scope.error_username_msg = ""; 
          break;
        case "email":
          $scope.error_email     = false;
          $scope.error_email_msg = ""; 
          break;
        case "password":
          $scope.error_password     = false;
          $scope.error_password_msg = ""; 
          break;
        case "confirm-password":
          const password = $('#password').val();
          const confirm_password = $('#confirm-password').val();
          if(password != confirm_password) {
            $scope.error_confirm_password = true;
            $scope.error_confirm_password_msg = error_messages.A0003; 
          }else{
            $scope.error_confirm_password = false;
            $scope.error_confirm_password_msg = "";
          }  
          break;
        case "phone":
          $scope.error_phone = false;
          $scope.error_phone_msg = ""; 
          break;
        case "birthday":
          $scope.error_birthday = false;
          $scope.error_birthday_msg = ""; 
          break;
        case "city":
          $scope.error_city = false;
          $scope.error_city_msg = ""; 
          break;
        case "hfeet":
          $scope.error_height_feet = false;
          $scope.error_height_feet_msg = ""; 
          break;
        case "hinches":
          $scope.error_height_inches = false;
          $scope.error_height_inches_msg = ""; 
          break;
        case "education":
          $scope.error_education = false;
          $scope.error_education_msg = ""; 
          break;
        case "about":
          $scope.error_about = false;
          $scope.error_about_msg = ""; 
          break;
        case "work":
          $scope.error_work = false;
          $scope.error_work_msg = ""; 
          break;
        case "religion":
          $scope.error_religion = false;
          $scope.error_religion_msg = ""; 
          break;
        case "gender":
          $scope.error_gender = false;
          $scope.error_gender_msg = ""; 
          break;
        default:
      }
    }
  }
  $scope.chooseMinAge = function(){
    $scope.min_age = $("#min-age").val();
    $scope.max_age = $("#max-age").val();
    if($scope.max_age != '' && $scope.max_age < $scope.min_age) {
      $("#max-age").val('');
      $scope.max_age = "";
    }
  }

  $scope.chooseMaxAge = function(){
    $scope.min_age = $("#min-age").val();
    $scope.max_age = $("#max-age").val();
    if($scope.min_age != '' && $scope.min_age > $scope.max_age) {
      $("#min-age").val('');
      $scope.max_age = "";
    }
    
  }

  $scope.nextStep = function(){
    $scope.process_err = false;
    $scope.error_username = false;
    $scope.error_username_msg = "";
    $scope.error_email = false;
    $scope.error_email_msg = "";
    $scope.error_password = false;
    $scope.error_password_msg = "";
    $scope.error_confirm_password = false;
    $scope.error_confirm_password_msg = "";
    $scope.error_phone = false;
    $scope.error_phone_msg = "";
    $scope.error_birthday = false;
    $scope.error_birthday_msg = "";
    $scope.error_city = false;
    $scope.error_city_msg = "";
    $scope.error_height_feet = false;
    $scope.error_height_feet_msg = "";
    $scope.error_max_height = false;
    $scope.error_max_height_msg = "";
    $scope.error_education = false;
    $scope.error_education_msg = "";
    $scope.error_about = false;
    $scope.error_about_msg = "";
    $scope.error_work = false;
    $scope.error_work_msg = "";
    $scope.error_religion = false;
    $scope.error_religion_msg = "";
    $scope.error_gender = false;
    $scope.error_gender_msg = "";


    $scope.error_min_age = false;
    $scope.error_min_age_msg = '';
    $scope.error_max_age = false;
    $scope.error_max_age_msg = '';

    $scope.username    = $("#username").val();
    $scope.email    = $("#email").val();
    $scope.password = $("#password").val();
    $scope.confirm_password = $("#confirm-password").val();
    $scope.phone = $("#phone").val();
    $scope.brithday = $("#brithday").val();
    $scope.heightfeet   = $("#hfeet").val();
    $scope.heightinches = $("#hinches").val();
    $scope.hobby  = $("#hobby").val();
    $scope.city  = $("#city").val();
    $scope.education  = $("#education").val();
    $scope.min_age = $("#min-age").val();
    $scope.max_age = $("#max-age").val();
    $scope.about  = $("#about").val();
    $scope.work  = $("#work").val();
    $scope.religion  = $("#religion").val();
    $scope.gender = $(".gender:checked").val();
    $scope.birthday = $("#birthday").val();

    if($scope.username == ''){
      $scope.error_username = true;
      $scope.process_err = true;
      $scope.error_username_msg = error_messages.A0001 + " your username."
    }
    if($scope.email == ''){
      $scope.process_err = true;
      $scope.error_email = true;
      $scope.error_email_msg += error_messages.A0001 + " your email.";
    }
    if($scope.password == ''){
      $scope.error_message += error_messages.A0001 + " password.";
      $scope.process_err = true;
    }
    if($scope.confirm_password == ''){
      $scope.error_message += error_messages.A0001 + " confirm password.\n";
      $scope.process_err = true;
    }
    if($scope.phone == ''){
      $scope.error_message += error_messages.A0001 + " phone.\n";
      $scope.process_err = true;
    }
    if($scope.birthday == ''){
      $scope.error_message += error_messages.A0001 + " birthday.\n";
      $scope.process_err = true;
    }
    if($scope.city == ''){
      $scope.error_city = true;
      $scope.error_city_msg += error_messages.A0001 + " your city.\n";
      $scope.process_err = true;
    }
    if($scope.heightfeet == ''){
      $scope.error_height_feet = true;
      $scope.error_height_feet_msg += error_messages.A0001 + " your feet.\n";
      $scope.process_err = true;
    }
    if($scope.heightinches == ''){
      $scope.error_height_inches = true;
      $scope.error_height_inches_msg += error_messages.A0001 + " your inches.\n";
      $scope.process_err = true;
    }
    if($scope.education == ''){
      $scope.error_height_inches = true;
      $scope.error_height_inches_msg += error_messages.A0001 + " your inches.\n";
      $scope.process_err = true;
    }
    if($scope.about == ''){
      $scope.error_about = true;
      $scope.error_about_msg += error_messages.A0001 + " about yourself.\n";
      $scope.process_err = true;
    }
    if($scope.work == ''){
      $scope.error_work = true;
      $scope.error_work_msg += error_messages.A0001 + " your work.\n";
      $scope.process_err = true;
    }
    if($scope.religion == ''){
      $scope.error_religion = true;
      $scope.error_religion_msg += error_messages.A0001 + " your religion.\n";
      $scope.process_err = true;
    }
    if($scope.gender == ''){
      $scope.error_gender = true;
      $scope.error_gender_msg += error_messages.A0001 + " your gender.\n";
      $scope.process_err = true;
    }



    if($scope.min_age == ''){
      // alert("min age")
      $scope.process_err = true;
      $scope.error_min_age = true;
      $scope.error_min_age_msg += error_messages.A0001 + " your minimum age.";
    }
    if($scope.max_age == ''){
      // alert("max age")
      $scope.process_err = true;
      $scope.error_max_age = true;
      $scope.error_max_age_msg += error_messages.A0001 + " your maximum age.";
    }
    // console.log($scope.process_err)
    if($scope.process_err == false) {
      $scope.data = {};
      let data    = {};
      let hobbies = [];
      data.username   = $('#username').val();
      data.email      = $('#email').val();
      data.password   = $('#password').val();
      data.phone      = $('#phone').val();
      data.birthday   = $('#birthday').val();
      data.education  = $('#education').val();
      data.about      = $('#about').val();
      data.work       = $('#work').val();
      data.religion   = $('#religion').val();
      data.gender     = $('.gender:checked').val();
      $('.hobby:checked').each(function() {
        hobbies.push($(this).val());
      });
      data.partner_gender = $('.partner_gender:checked').val();
      data.city           = $('#city').val();
      data.feet           = $('#hfeet').val();
      data.inches         = $('#hinches').val();
      data.hobbies        = hobbies;
      data.min_age        = $('#min-age').val();
      data.max_age        = $('#max-age').val();
      $scope.data         = data;
      $scope.user_info    = false;
      $scope.user_photo   = true;
    }
  }

  
  $scope.formSub = function(){
    const url = base_url + "/api/register";
    
    $http({
      method: 'POST',
      url: url,
      data: $scope.data
    }).then(function(response) {
      console.log(response);
        if(response.status == 200 || response.status ==201){
          $('#member-id').val(response.data.data.id);
          $('#my-form').submit();
        }else{
          alert(error_messages.A0004);
        }
    }, function(error){
        console.error(error);
      });
    // $('#my-form').submit();
  }

  $scope.filebrowse = function() {
    $('#upload' + index).click();
  }
  
});