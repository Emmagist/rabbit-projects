jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

    $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
    });
   
});

// userDisabled show table
$(document).ready(function () {
    $('#userDisabled').on('click', function () {
        $('#disabledSpan').removeClass('fa-circle');
        $('#disabledUsersTable').show();
    });
});

// viewCategory show table
$(document).ready(function () {
    $('#viewCategory').on('click', function () {
        $('#viewCategoryTable').show();
    });
});

// viewUser table
$(document).ready(function () {
    $('#viewUser').on('click', function () {
        $('#viewUsersTable').show();
    });
});

// viewTasker table
viewTasker
$(document).ready(function () {
    $('#viewTasker').on('click', function () {
        $('#viewTaskersTable').show();
    });
});