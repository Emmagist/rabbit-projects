$('.owl-carousel').owlCarousel({
    autoplay: true,
    autoplayHoverPause: true,
    items: 3,
    nav: true,
    loop:true,
    dots: true,
});

// $(window).on('scroll', function () {
//    if ($(window).scrollTop()) {
//     $('nav').addClass('black-scroll');
//    }else{
//     $('nav').removeClass('black-scroll');
//    }
// });

// $('#owl-theme').owlCarousel({
//     autoplay: true,
//     autoplayHoverPause: true,
//     lazyLoad: true,
//     margin: 5,
//     stagePadding: 5,
//     responsive: {
//         0: {
//             items: 1,
//             dots: false,
//         },
//         485: {
//             items: 2,
//             dots: false,
//         },
//         728: {
//             items: 3,
//             loop: true,
//         },
//         960: {
//             items: 4,
//             loop: true,
//         },
//         1200: {
//             items: 5,
//             dots: false,
//         }
//     }
// });

// $('#owl-theme').on('mousewheel', '.owl-stage', function (e) {
//     if (e.delay > 0) {
//         ('#owl-theme').trigger('next.owl');
//     }else{
//         ('#owl-theme').trigger('prev.owl');
//     }
//     e.preventDefault();
// });


// index header search
$(document).ready(function(){
    $("#search").keyup(function() {
        var search = $("#search").val();
        if (search != '') {
            $.ajax({
                url: '../libs/index_search_fetch.php',
                method: 'POST',
                data: {search:search},
                success: function (data) {
                    $('#search_search').html(data);
                }
            });
        }else{
            $('#search_search').html('');
        }
        $(document).on('click', 'a', function() {
            $("#search").val($(this).text());
            $('#search_search').html('');
        })
    });
});


// $(document).ready(function(){
//     $('#searchBtn').keyup(function(){
//         let searchResult = $('#searchResult');
//         let search= $('#search').val(); 
//         //alert(search);

//         $.ajax({
//             method: 'POST',
//             url: '../libs/index_search_fetch.php',
//             data: {search:search},
//             success: function(data) {
//                 searchResult.html(data)
//             },
//             error: function() {
//                 alert('Something went wrong!')
//             }
//         });
        
//     });
// });






// $(document).ready(function(){
//     $('#search_text').keyup(function(){
//         var text = $('#search_text').val();alert(text);
//         if (text != '') {
            
//         }else{
//             $('#location_div_result').html('');
//             $.ajax({
//                 url: '../libs/index_search_fetch.php',
//                 method: 'post',
//                 data: {search:text},
//                 dataType: 'text',
//                 success: function(data) {
//                     $('#location_div_result').html(data);
//                 }
//             });
//         }
//     });

// });


// Add active class to the current button (highlight it)
// var header = document.getElementById("active_userdashboard_ul");
// var btns = header.getElementsByClassName("userdashboard_li");
// for (var i = 0; i < btns.length; i++) {
//   btns[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace(" active", "");
//   this.className += " active";
//   });
// }

// $(document).on('click', '.active_userdashboard_ul .userdashboard_li', function () {
//     $(this).addClass('active').siblings.removeClass('active');
// });
