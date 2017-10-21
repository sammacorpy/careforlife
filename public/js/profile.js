$('.changeimg').on('click', function() {
    $('.inpfileupload').click();
});

$('.inpfileupload').change(function() {
    $('#imageup').submit();
});



$('.changeimg').hover(function() {
    $('.changeimg').css('opacity', '1');

});
$('.changeimg').mouseout(function() {
    $('.changeimg').css('opacity', '0');

});

$('.errors').load(setTimeout(function() {
    $('.errors').fadeOut();

}, 3000));