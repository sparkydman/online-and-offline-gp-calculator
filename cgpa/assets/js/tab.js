function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
/*
$(".tablinks").on("click",function(){
   $("#defaultOpen").removeClass("active");
   $(this).addClass("active");
});*/
/*
$("#bookbtn").on("click", function(){
    $("#oneway").removeClass("active");
   $(this).addClass("active");
});*/

$('#terminal_list').on('change', function(){
    var city_id = this.value;
    $.ajax({
    type: "POST",
    url: "get_destination.php",
    data:'city_id='+country_id,
    success: function(result){
        $("#destination_list").html(result);
    }
    });
});