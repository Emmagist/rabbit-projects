// editUserAccount
$(document).ready(function () {
    $(document).on('click', '#editUserAccount', function () {
        var firstName = $('#firstName').val();
        var lastName  = $('#lastName').val();
        var email     = $('#email').val();
        var address   = $('#address').val();
        var task      = $('#task').val();

        // assigning all data into one variable
        var dataString = 'first_name='+firstName+'last_name='+lastName+'email='+email+'address='+address+'task='+task;
        $ajax({
            url: 'modalFetch.php',
            data: dataString,
            type: 'post',
            success: function (data) {
                if ($.trim(data) == "error") {
                    $("#error").show();
                    setTimeout(function(){
                      $("#error").fadeOut();
                    }, 4000);
                }else{
                    alert("Testing")
                    $('#userDashboardModal').modal('hide');
                    location.reload();
                }
            }
        });
    });
});