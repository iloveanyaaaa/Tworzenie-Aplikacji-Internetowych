$(document).ready(function() {

    $("h1").text("Zadanie z jQuery");

    $("p").addClass("highlight");

    $("#image").attr("src", "https://th.bing.com/th/id/R.f892d407baacb26ee4b0fc7281d20c13?rik=ASH6gMZ507dnkA&riu=http%3a%2f%2fsdrp.katowice.pl%2fwp-content%2fuploads%2f2023%2f02%2fWojciech-Cejrowski-2-655x381.png&ehk=s5fNCtqyoHff1ndzhtwZ6VCpreV%2fcLtzQ5LkY38Ax20%3d&risl=&pid=ImgRaw&r=0").show();

    $("#colorBtn").click(function() {
        const kolor = '#' + Math.floor(Math.random() * 16777215).toString(16);
        $("body").css("background-color", kolor);
    });

    $("#toggleImageBtn").click(function() {
        $("#image").fadeToggle();
    });

    $("#slideTextBtn").click(function() {
        $("#textSection").slideToggle();
    });

    $("#addParaBtn").click(function() {
        $("#content").append("<p>Nowy paragraf</p>");
    });

    $("#removeParaBtn").click(function() {
        $("#content p:last").remove();
    });

    $("#showDateBtn").click(function() {
        const data = new Date().toLocaleString();
        $("#date").text("Aktualna data i godzina: " + data);
    });

});