$(document).ready(function() {
    $('button').click(function() {
        $(this).css('transform', 'translateY(5px)'); 
        setTimeout(function() {
            $('button').css('transform', 'translateY(0px)'); 
        }, 200);
    });
});