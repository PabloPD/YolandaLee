var getallbooks = "getallbook";


$(function (){
    
    
    $(".temamarcado").click(function (){
       id = $(this).attr("id");
       alert(id);
    });
    
    $("div").each(function () {
        $(this).mouseenter(function () {
            
            if($(this).attr('class') == "fondoLibro"){
                $(this).css('opacity',1);
            }
            });
         
        $(this).mouseleave(function () {
            
            if($(this).attr('class') == "fondoLibro"){
                $(this).css('opacity',0.2);
            }
            });
        

    });
    
});