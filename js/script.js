$('.owl-carousel').owlCarousel({
    autoplay: true,
    autoplayHoverPause: true,
    items: 3,
    nav: true,
    loop:true,
    dots: true,
});

$('#owl-theme').owlCarousel({
    autoplay: true,
    autoplayHoverPause: true,
    items: 2,
    nav: true,
    loop:true,
    dots: true,
});



$(document).ready(function(){
    $('#searchBtn').keyup(function(){
        let searchResult = $('#searchResult');
        let search= $('#search').val(); 
        //alert(search);

        $.ajax({
            method: 'POST',
            url: '../libs/index_search_fetch.php',
            data: {search:search},
            success: function(data) {
                searchResult.html(data)
            },
            error: function() {
                alert('Something went wrong!')
            }
        });
        
    });
});






        // $(document).ready(function(){
        //     $('#main_search_text').onkeyup(function(){
        //         var text = ($this).val(); alert(text);
        //         if (text != '') {
                    
        //         }else{
        //             $('#main_search_result').html('');
        //             $.ajax({
        //                 url: 'fetch.php',
        //                 method: 'post',
        //                 data: {search:text},
        //                 dataType: 'text',
        //                 success: function(data) {
        //                     $('#main_search_result').html(data);
        //                 }
        //             });
        //         }
        //     });
        
        // });