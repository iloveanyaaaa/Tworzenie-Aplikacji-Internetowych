$(document).ready(function() {
    $(".gallery-item").hover(
        function() {
            $(this).find("img").css("transform", "scale(1.5)");
            $(this).find(".caption").fadeIn(200);
        },
        function() {
            $(this).find("img").css("transform", "scale(1)");
            $(this).find(".caption").fadeOut(200);
        }
    );
});