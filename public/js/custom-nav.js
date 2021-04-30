function test(){
    var tabsNewAnim = $('#navbarSupportedContent');
    var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
    var activeItemNewAnim = tabsNewAnim.find('.active');
    var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
    var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
    var itemPosNewAnimTop = activeItemNewAnim.position();
    var itemPosNewAnimLeft = activeItemNewAnim.position();
    $(".hori-selector").css({
        "top":itemPosNewAnimTop.top + "px",
        "left":itemPosNewAnimLeft.left + "px",
        "height": activeWidthNewAnimHeight + "px",
        "width": activeWidthNewAnimWidth + "px"
    });
    $("#navbarSupportedContent").on("click","li",function(e){
        $('#navbarSupportedContent ul li').removeClass("active");
        $(this).addClass('active');
        var activeWidthNewAnimHeight = $(this).innerHeight();
        var activeWidthNewAnimWidth = $(this).innerWidth();
        var itemPosNewAnimTop = $(this).position();
        var itemPosNewAnimLeft = $(this).position();
        $(".hori-selector").css({
            "top":itemPosNewAnimTop.top + "px",
            "left":itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });
    });
    if (window.location.pathname == '/login') {
        console.log(window.location.pathname);
        $('#navbarSupportedContent ul li').removeClass("active");
        let loginazzo = $('#navbarSupportedContent ul li#loginazzo');
        $('#navbarSupportedContent ul li#loginazzo').addClass('active');
        let activeWidthNewAnimHeight = $(loginazzo).innerHeight();
        let activeWidthNewAnimWidth = $(loginazzo).innerWidth();
        let itemPosNewAnimTop = $(loginazzo).position();
        let itemPosNewAnimLeft = $(loginazzo).position();
        $(".hori-selector").css({
            "top":itemPosNewAnimTop.top + "px",
            "left":itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });
    } else if (window.location.pathname == '/books/create') {
        console.log(window.location.pathname);
        $('#navbarSupportedContent ul li').removeClass("active");
        let books = $('#navbarSupportedContent ul li#books');
        $('#navbarSupportedContent ul li#books').addClass('active');
        let activeWidthNewAnimHeight = $(books).innerHeight();
        let activeWidthNewAnimWidth = $(books).innerWidth();
        let itemPosNewAnimTop = $(books).position();
        let itemPosNewAnimLeft = $(books).position();
        $(".hori-selector").css({
            "top":itemPosNewAnimTop.top + "px",
            "left":itemPosNewAnimLeft.left + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });
    }
}
$(document).ready(function(){
    setTimeout(function(){ test(); });
});
$(window).on('resize', function(){
    setTimeout(function(){ test(); }, 500);
});
$(".navbar-toggler").click(function(){
    setTimeout(function(){ test(); });
});

