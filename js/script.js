
$(document).ready (function () {

    //jQuery til BURGERMENU ÅBEN
    $('.menuknap').click(function () {
        $('#menuOpen').hide();
        $('.topnavContentWrapper').show();
    });
    //jQuery til BURGERMENU LUKKE
    $('.burgermenuClose').click(function () {
        $('#menuOpen').show();
        $('.topnavContentWrapper').hide();
    });


});