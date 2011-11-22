/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function(){
    
    
    
    /*Noticias----------------------------------------------------------------*/
    $("#soloNoticia").hide();
    $("#noticias").show();
    
    $(".linkNoticia").click(function(){
        $("#noticias").hide();
        $("#soloNoticia").show();
    });
    $(".back").click(function(){
        $("#noticias").show();
        $("#soloNoticia").hide();
    });
    
    
    //---/
    $(".viewMatchLink").click(function(){
        $("#detallePartida").trigger('click');
    });
    
     $("#returnT").click(function(){
        $("#torneo").trigger('click');
    });
    //---/ 
     
  
     
    $(".showReplay").click(function(){
        $("#anchorVerReplay").trigger('click');
    });
    
    $(".linkA").click(function(){
        $("#anchorVerDH").trigger('click');
    });
    
    
    
    
    
       
    $(".showReplay2").click(function(){
        $(".contentDay").hide();
        $(".matchDetail2").show();
    });
       
       
    $(".backDay").click(function(){
        $(".matchDetail2").hide();
        $(".contentDay").show();
    });

    
    
});

