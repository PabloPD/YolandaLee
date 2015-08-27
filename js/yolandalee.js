
$(function (){
    
    
    $("div").each(function () {
        $(this).mouseenter(function () {
            
            if($(this).attr('class') == "fondoLibro"){
                $(this).css('opacity',1);
            }
            });
         
        $(this).mouseleave(function () {
            
            if($(this).attr('class') == "fondoLibro"){
                $(this).css('opacity',0.7);
            }
            });
        
        $(this).click(function () {
            
            if($(this).attr('class') == "fondoLibro"){
                
                if($(this).css('opacity')== 0.7) $(this).css('opacity',1);
                else $(this).css('opacity',0.7);
            }
            });

    });
    
});