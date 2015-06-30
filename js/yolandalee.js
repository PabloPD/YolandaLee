var getallbooks = "getallbook";


$(function (){
    
    
    $.post("Controller/Client.php", "method=" + getallbooks, function (response) {
                //var array = Array();
                if (response == 2 || response == 4)
                    location.href = "";
                else
                    alert("User or password are incorrect");

     });
    
    $(".temamarcado").click(function (){
       id = $(this).attr("id");
       alert(id);
    });
    
    
    
    
});


