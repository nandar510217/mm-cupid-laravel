var app = angular.module("myApp", []);
app.controller("myCtrl", function ($scope, $http) {
  $scope.member = {};
  $scope.cities = [];
  $scope.hobbies = [];
  $scope.partner_ages = [];
  $scope.streaming = false;
  $scope.init = function () {
    const data = {};
    const url = base_url + "api/sync_login_member.php";
    $http({
      method: "POST",
      url: url,
      data: data,
    }).then(
      function (response) {
        // console.log(response);
        if (response.data.status == 200) {
          $scope.member = response.data.data;
          $scope.member.city_id = String($scope.member.city_id);
          $scope.member.height_feet = String($scope.member.height_feet);
          $scope.member.height_inches = String($scope.member.height_inches);
          $scope.member.religion_value = String($scope.member.religion_value);
          $scope.member.partner_min_age = String($scope.member.partner_min_age);
          $scope.member.partner_max_age = String($scope.member.partner_max_age);
          $scope.member.gender_value = String($scope.member.gender_value);
          $scope.member.partner_gender = String($scope.member.partner_gender);
          $scope.bindImage($scope.member.images);
          $scope.getCities();
          $scope.getHobbies();
          $scope.getPartnerAges();
        }
      },
      function (error) {
        console.error(error);
      }
    );
  };
  $scope.bindImage = function (images) {
    for (let i = 0; i < images.length; i++) {
      const sort = images[i].sort;
      const image = images[i].image;
      const preview = document.getElementById("preview" + sort);
      preview.innerHTML = `<img src="${image}" alt="Preview" style="width:100%;height:100%;">`;
      $("#preview" + sort).removeClass("d-none");
      $(".change-photo" + sort).removeClass("d-none");
      $("#upload-icon-" + sort).addClass("d-none");
    }
  };
  $scope.backUserProfile = function () {
    $("#userProfile").click();
  };

  $scope.getCities = function () {
    const request_url = base_url + "api/get_cities.php";
    $http.get(request_url).then(function (response) {
      if (response.status == 200) {
        $scope.cities = response.data;
      }
    });
  };

  $scope.getHobbies = function () {
    const request_url = base_url + "api/get_hobbies.php";
    $http.get(request_url).then(function (response) {
      if (response.status == 200) {
        $scope.hobbies = response.data;
      }
    });
  };

  $scope.getPartnerAges = function () {
    for (let i = 18; i <= 55; i++) {
      $scope.partner_ages.push(i);
    }
  };
  $scope.isHobbyChecked = function (hobby_id) {
    const id = String(hobby_id);
    return $scope.member.hobbies.includes(id);
  };

  $scope.memberUpdate = function () {
    let data = {};
    const hobbies = [];
    data.username = $("#username").val();
    data.phone = $("#phone").val();
    data.birthday = $("#birthday").val();
    data.city = $("#city").val();
    data.height_feet = $("#heightfeet").val();
    data.height_inches = $("#heightinches").val();
    data.education = $("#education").val();
    data.about = $("#about").val();
    data.work = $("#work").val();
    data.religion = $("#religion").val();
    data.gender = $(".gender:checked").val();
    $(".hobby:checked").each(function () {
      if ($(this).is(":checked")) {
        hobbies.push($(this).val());
      }
    });
    data.hobbies = hobbies;
    data.partner_gender = $(".partner_gender:checked").val();
    data.min_age = $("#min_age").val();
    data.max_age = $("#max_age").val();
    const url = base_url + "api/update_member.php";
    $http({
      method: "POST",
      url: url,
      data: data,
    }).then(
      function (response) {
        // console.log(response);
        if (response.data.status == 200) {
          $scope.init();
          $scope.backUserProfile();
        }
      },
      function (error) {
        console.error(error);
      }
    );
    // console.log(data);
  };
  $scope.updatePhoto = function () {
    for (let i = 1; i <= 6; i++) {
      const input = $("#upload" + i)[0];
      if (input.files && input.files.length > 0) {
        const fileName = input.files[0].name;
        const fileExtension = fileName.split(".").pop().toLowerCase();
        console.log(fileExtension);
        if (
          fileExtension == "jpg" ||
          fileExtension == "jpeg" ||
          fileExtension == "png" ||
          fileExtension == "gif"
        ) {
          const url = base_url + "api/update_photo.php";
          const fileInput = document.getElementById("upload" + i);
          const file = fileInput.files[0];
          let formData = new FormData();
          formData.append("file", file);
          formData.append("sort", i);
          $http
            .post(url, formData, {
              headers: { "Content-Type": undefined },
            })
            .then(
              function (response) {
                // if (response.data.status == 200) {
                //   $("#profile").click();
                // }
                console.log("File uploaded successfully", response.data);
              },
              function (error) {
                console.error("Error uploading file", error);
              }
            );
        }
      }
    }
  };
  $scope.openCamera = function () {
    $("#photo").hide();
    let video = document.getElementById("video");
    $("#video").show();
    $("#take-photo").show();
    $(".btn-verify").hide();
    $(".take-photo").show();
    navigator.mediaDevices
      .getUserMedia({ video: true, audio: false })
      .then(function (stream) {
        video.srcObject = stream;
        video.play();
        $scope.streaming = true;
      })
      .catch(function (err) {
        console.log("An error occurred: " + err);
      });
  };
  $scope.takePhoto = function () {
    let canvas = document.getElementById("canvas");
    let photo = document.getElementById("photo");
    if (!$scope.streaming) {
      console.error("Camera not opened yet!");
      return;
    }
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);
    photo.src = canvas.toDataURL("image/png");
    $("#photo").show();
    $("#video").hide();
    $(".btn-verify").hide();
    $(".btn-half").show();
  };
  $scope.sendPhoto = function () {
    const image_src = $("#photo").attr("src");
    const data = { src: image_src };
    const url = base_url + "api/update_verify_photo.php";
    $http({
      method: "POST",
      url: url,
      data: data,
    }).then(
      function (response) {
        // if (response.data.status == 200) {
        //   $("#profile").click();
        // }
      },
      function (error) {
        console.error(error);
      }
    );
  };
});
