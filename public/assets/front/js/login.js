var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
        $scope.error_email = false;
        $scope.error_email_msg = "";
        $scope.error_password = false;
        $scope.error_password_msg = "";
        $scope.email       = '';
        $scope.password    = '';
        $scope.is_disable = false;
        $scope.validate = function(field){
            if(field == 'email'){
                if($scope.email == ''){
                    $scope.error_email = true;
                    $scope.error_email_msg = error_messages.A0001 + " your email";
                    $scope.is_disable = true;
                }else{
                    if($scope.validEmailFormat($scope.email)){
                        $scope.error_email = false;
                        $scope.error_email_msg = "";
                        $scope.is_disable = false;
                    }else{
                        $scope.is_disable = true;
                        $scope.error_email = true;
                        $scope.error_email_msg = error_messages.A0002;
                    }
                   
                }
            }
            if(field == 'password'){
                if($scope.password == ''){
                    $scope.error_password     = true;
                    $scope.error_password_msg = error_messages.A0001 + " your password";
                    $scope.is_disable = true;
                }else{
                    $scope.error_password     = false;
                    $scope.error_password_msg = "";
                    $scope.is_disable = false;
                }
            } 
        }
        $scope.login = function(){
            let process_error = false;
            if ($scope.email === '') {
                process_error = true;
                $scope.error_email = true;
                $scope.error_email_msg = error_messages.A0001 + " your email";
            } else if (!$scope.validEmailFormat($scope.email)) {
                process_error = true;
                $scope.error_email = true;
                $scope.error_email_msg = error_messages.A0002;
            } else {
                $scope.error_email = false;
                $scope.error_email_msg = "";
            }

            if ($scope.password === '') {
                process_error = true;
                $scope.error_password = true;
                $scope.error_password_msg = error_messages.A0001 + " your password";
            } else {
                $scope.error_password = false;
                $scope.error_password_msg = "";
            }
            if(process_error == false){
                $('#login_form').submit();
            }
        }
        $scope.validEmailFormat = function(email){
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email); 
        }

    });