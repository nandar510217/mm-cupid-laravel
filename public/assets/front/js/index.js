var app = angular.module("myApp", []);
app.controller("myCtrl", function ($scope, $http) {
  $scope.members = [];
  $scope.page = 1;
  $scope.show_more = true;
  $scope.member = [];
  $scope.member_index = undefined;
  $scope.search_gender_type = member_gender;
  $scope.search_gender = gender_type[$scope.search_gender_type];
  $scope.partner_ages = [];
  $scope.partner_min_age = partner_min_age;
  $scope.partner_max_age = partner_max_age;
  $scope.is_search = false;
  $scope.init = function () {
    const data = { page: $scope.page };
    $scope.syncMember(data);
    $scope.setDefaultSetting();
    for (let i = 18; i <= 55; i++) {
      $scope.partner_ages.push(i);
    }
  };
  $scope.loadMore = function (is_search) {
    $scope.page = $scope.page + 1;
    const data =
      $scope.is_search == true
        ? {
            page: $scope.page,
            search_gender: $scope.search_gender_type,
            search_partner_min: $scope.partner_min_age,
            search_partner_max: $scope.partner_max_age,
          }
        : { page: $scope.page };
    // if($scope.is_search = true){
    //   const data   = {
    //     page:$scope.page,
    //     search_gender : $scope.search_gender_type,
    //     search_partner_min : $scope.partner_min_age,
    //     search_partner_max : $scope.partner_max_age
    //   };
    // }else{
    //   const data = {page: $scope.page};
    // }
    $scope.syncMember(data);
  };
  $scope.syncMember = function (data) {
    const url = base_url + "api/sync_members.php";
    $http({
      method: "POST",
      url: url,
      data: data,
    }).then(
      function (response) {
        if (response.data.status == 200) {
          $scope.members = $scope.members.concat(response.data.data);
          $scope.show_more = response.data.show_more;
        }
      },
      function (error) {
        console.error(error);
      }
    );
  };
  $scope.showModel = function (index) {
    $scope.member = $scope.members[index];
    $scope.member_index = index;
    // console.log($scope.member);
    if (index <= 0) {
      $("#prev").addClass("disabled");
    } else {
      if ($("#prev").hasClass("disabled")) {
        $("#prev").removeClass("disabled");
      }
    }

    if ((index+1) >= $scope.members.length) {
      $("#next").addClass("disabled");
    } else {
      if ($("#next").hasClass("disabled")) {
        $("#next").removeClass("disabled");
      }
    }
    const imageContent = document.querySelector("#image-content");
    const getCarousel = document.querySelector(".carousel-inner");
    const profile = document.querySelector("#member-profile");
    imageContent.style.zIndex = "5";
    getCarousel.innerHTML = "";
    profile.style.zIndex = "10";
  };

  $scope.showNext = function (index) {
    // alert(index);
    if (index + 1 < $scope.members.length) {
      $scope.member_index = parseInt(index) + 1;
      // console.log($scope.member_index);
      $scope.showModel($scope.member_index);
    }
  };

  $scope.showPrev = function (index) {
    if ($scope.members.length >= 0) {
      $scope.member_index = parseInt(index) - 1;
      $scope.showModel($scope.member_index);
    }
  };

  $scope.cancelProfile = function () {
    const imageContent = document.querySelector("#image-content");
    const profile = document.querySelector("#member-profile");
    profile.style.zIndex = "-10";
    imageContent.style.zIndex = "10";
  };

  $scope.genderFilter = function () {
    const gender = $('input[name="gender"]:checked').val();
    // alert(gender);
    $scope.search_gender_type = gender;
    $scope.search_gender = gender_type[$scope.search_gender_type];
    $("#offcanvas-search-btn").click();
  };

  $scope.setDefaultSetting = function () {
    if ($scope.search_gender_type == 0) {
      $("#gender-man").attr("checked", true);
    } else if ($scope.search_gender_type == 1) {
      $("#gender-woman").attr("checked", true);
    } else {
      $("#gender-every").attr("checked", true);
    }
  };

  $scope.setAgeRange = function () {
    $scope.partner_min_age = $("#min-age").val();
    $scope.partner_max_age = $("#max-age").val();
    $("#offcanvas-search-btn").click();
    // alert($('#min-age').val());
    // alert($('#max-age').val());
  };

  $scope.search = function () {
    $scope.is_search = true;
    const data = {
      page: 1,
      search_gender: $scope.search_gender_type,
      search_partner_min: $scope.partner_min_age,
      search_partner_max: $scope.partner_max_age,
    };
    // console.log($scope.search_gender_type,$scope.partner_min_age,$scope.partner_max_age)
    $scope.syncMember(data);
  };

  $scope.startDate = function (id) {
    const data = { id: id };
    const url = base_url + "api/invite_dating.php";
    $http({
      method: "POST",
      url: url,
      data: data,
    }).then(
      function (response) {
        // console.log(response.data);
        if (response.data.status == 200) {
          // $(".loading").hide();
          const response_data = response.data.data;
          $(".point-date").text(response_data.point);
          $scope.cancelProfile();
          new PNotify({
            title: "Success!",
            text: success_messages.Z0001,
            type: "success",
            styling: "bootstrap3",
          });
        } else {
          const error_code = response.data.error;
          new PNotify({
            title: "Fail!",
            text: success_messages[error_code],
            type: "success",
            styling: "bootstrap3",
          });
        }
      },
      function (error) {
        console.error(error);
      }
    );
  };
});
