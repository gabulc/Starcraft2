$(document).ready(function(){    
   
$("#combo31").hide();
$("#pGan").hide();

  /*Crear Torneos------------------------------------------------------------*/
        
    $(".parametro").click(function(){this.style.backgroundColor="#ffa";this.style.color="#000";});
    
  /*Ver Torneos------------------------------------------------------------*/  
    $(".aVerDetalles").click(function(){
        $("#anchorVerD").trigger('click');
    });
    $(".buttonModificar").click(function(){
        $("#aModtorneo").trigger('click');
    });
    
    $(".buttonModificarN").click(function(){
        $("#anchorMod").trigger('click');
    });
    
    $(".buttonEliminar").click(function(){
        alert("Se ha eliminado el Torneo.");
    });
    
    
    
    
    
 /*Ver Resultados------------------------------------------------------------*/
    $(".buttonModificarR").click(function(){
        $("#aModResultado").trigger('click');
        
    
    });
    
   

    $(".buttonVerDetallesR").click(function(){
        $("#aVerDetallesResultado").trigger('click');
    });
    
    
    
    
    /*Modificar Resultado--------------------------------------------------------*/
    $("#modResultado").hide();
    $("#mresultadoTabla").show();
    $("#mresultadoTabla .buttonModificar").click(function(){
        $("#modResultado").show();
        $("#mresultadoTabla").hide();
    });
    
    $("#modResultado .botonCancelar").click(function(){
        $("#modResultado").hide();
        $("#mresultadoTabla").show();
    });
    
    
    
    
    /*Registrar Resultado---------------------------------------------------------*/
    /*Registrar horarios----------------------------------------------------------*/
    /*Registrar Replays----------------------------------------------------------*/
    /*Modificar Replay----------------------------------------------------------*/
    $("#rreplay .botonRegistrar").click(function(){
        alert("Se ha registrado exitosamente la Replay de la Partida.");
    });
    $("#modReplay").hide();
    $("#modReplayTable").show();
    $("#modReplayTable .buttonModificar").click(function(){
        $("#modReplay").show();
        $("#modReplayTable").hide();
    });
    $("#modReplay .botonModificar").click(function(){
        alert("Se ha modificado exitosamente el Replay de la Partida.");
    });
    $("#modReplay .botonCancelar").click(function(){
        $("#modReplay").hide();
        $("#modReplayTable").show();
    });
    /*Modificar Horario----------------------------------------------------------*/
    $("#rhorario .botonRegistrar").click(function(){
        alert("Se ha registrado exitosamente el Horario de la Partida.");
    });
    $("#modHorario").hide();
    $("#modHorarioTable").show();
    $("#modHorarioTable .buttonModificar").click(function(){
        $("#modHorario").show();
        $("#modHorarioTable").hide();
    });
    $("#modHorario .botonModificar").click(function(){
        alert("Se ha modificado exitosamente el Horario de la Partida.");
    });
    $("#modHorario .botonCancelar").click(function(){
        $("#modHorario").hide();
        $("#modHorarioTable").show();
    });
    /*user mode----------------------------------------------------------*/
    
    /*Noticias----------------------------------------------------------*/

   
    
    
});


