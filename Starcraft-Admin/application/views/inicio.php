<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />
        <title><?php echo $title;?></title>
        
        <meta name="title" content="Torneo StarCraft 2"/>
        <meta name="author" content="Eduardo Arenas, Anghelo Barboza, Gabriel Lucano, Jeffrey Pinedo, Jorge Valverde"/>
        <meta name="robots" content="all,follow,index"/>
        <meta name="keywords" content="starcraft2, starcraft, Starcraft2, starCraft2, StarCraft2, torneos de starcraft2, torneo, torneos"/>
        <meta name="description" content="Pagina Web de Administracion de Torneos de StartCraft 2"/>
        
        <link type="text/css" href="http://localhost/Starcraft-Admin/css/admin.css" rel="stylesheet" />
        <link type="text/css" href="http://localhost/Starcraft-Admin/css/jquery-ui-1.7.3.custom.css" rel="stylesheet" />
        <link type="text/css" href="http://localhost/Starcraft-Admin/css/jquery.validity.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css' />

        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/jquery-ui-1.7.3.custom.min.js"></script>
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/Inicio.js"></script>
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/ajaxupload.js"></script>
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/custom.js"></script>
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/dateformat.js"></script>
        
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/jQuery.validity.min.js"></script>
        
        <script type="text/javascript">
            
            
            $(document).ready(function(){
                
                // Parametros para el combo1
                $("#combo1").change(function () {
                    $("#combo1 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                                
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboEquipos" , {elegido: elegido}, function(data){
                           
                            $("#combo21").html(data);
                            $("#combo21").append("<option value='0' selected='selected'>Elija uno</option>");
                            $("#combo22").html(data);
                            $("#combo22").append("<option value='0' selected='selected'>Elija uno</option>");
                            $("#combo41").html("");
                            $("#combo41").append("<option value='0' selected='selected'>Elija uno</option>");
                            $("#combo42").html("");
                            $("#combo42").append("<option value='0' selected='selected'>Elija uno</option>");
                          
                        });			
                    });
                
                });
                // Parametros para el combo2
               
               
                $("#combo21").change(function () {
                    $("#combo21 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboJugadores", { elegido: elegido }, function(data){
                           
                  
                            var val = $('#combo21 option:selected').val();
                            var val2 = $('#combo22 option:selected').val();
                            if(val == val2){
                                alert("No puedes Jugar contra tu mismo equipo");
                            }
                          
                            
                           
                            
                            $("#combo41").html(data);
                            $("#combo41").append("<option value='0' selected='selected'>Elija un Jugador</option>");
                           
                            
                            
                        });			
                    });
                }) 
   
                $("#combo22").change(function () {
                    $("#combo22 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboJugadores", { elegido: elegido }, function(data){
                           
                            var val = $('#combo21 option:selected').val();
                            var val2 = $('#combo22 option:selected').val();
                            if(val == val2){
                                alert("No puedes Jugar contra tu mismo equipo");
                            }

                       
                            $("#combo42").html(data);
                            $("#combo42").append("<option value='0' selected='selected'>Elija un Jugador</option>");
                            
                           
                            
                        });			
                    });
                });
                
                $("#combo22").change(function () {
                    $("#combo22 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboJugadores", { elegido: elegido }, function(data){
                           
                            var val = $('#combo21 option:selected').val();
                            var val2 = $('#combo22 option:selected').val();
                            if(val == val2){
                                alert("No puedes Jugar contra tu mismo equipo");
                            }

                       
                            $("#combo42").html(data);
                            $("#combo42").append("<option value='0' selected='selected'>Elija un Jugador</option>");
                            
                           
                            
                        });			
                    });
                });
                
                            
            });
        </script>
        
         <script type="text/javascript">
            
            
            $(document).ready(function(){
            
                
                // Parametros para el combo1
                $("#mcombo1").change(function () {
                    $("#mcombo1 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                                
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboEquipos" , {elegido: elegido}, function(data){
                           
                            $("#mcombo21").html(data);
                            $("#mcombo21").append("<option value='0' selected='selected'>Elija uno</option>");
                            $("#mcombo22").html(data);
                            $("#mcombo22").append("<option value='0' selected='selected'>Elija uno</option>");
                            $("#mcombo41").html("");
                            $("#mcombo41").append("<option value='0' selected='selected'>Elija uno</option>");
                            $("#mcombo42").html("");
                            $("#mcombo42").append("<option value='0' selected='selected'>Elija uno</option>");
                          
                        });			
                    });
                
                });
                // Parametros para el combo2
               
               
                $("#mcombo21").change(function () {
                    $("#mcombo21 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboJugadores", { elegido: elegido }, function(data){
                           
                  
                            var val = $('#mcombo21 option:selected').val();
                            var val2 = $('#mcombo22 option:selected').val();
                            if(val == val2){
                                alert("No puedes Jugar contra tu mismo equipo");
                            }
                          
                            
                           
                            
                            $("#mcombo41").html(data);
                            $("#mcombo41").append("<option value='0' selected='selected'>Elija un Jugador</option>");
                           
                            
                            
                        });			
                    });
                }); 
                $("#mcombo22").change(function () {
                    $("#mcombo22 option:selected").each(function () {
                        //alert($(this).val());
                        var elegido=$(this).val();
                        $.post("http://localhost/Starcraft-Admin/index.php/PartidaControl/listarComboJugadores", { elegido: elegido }, function(data){
                           
                  
                            var val = $('#mcombo22 option:selected').val();
                            var val2 = $('#mcombo21 option:selected').val();
                            if(val == val2){
                                alert("No puedes Jugar contra tu mismo equipo");
                            }
                            
                            $("#mcombo42").html(data);
                            $("#mcombo42").append("<option value='0' selected='selected'>Elija un Jugador</option>");
                           
                            
                            
                        });			
                    });
                });
   
                 $("#fechaInicio1").change(function () {
                    start = $("#fechaInicio1").val();
                      days = 6;
                      date = new Date(start);
                      d = date.getDate();
                     m = date.getMonth();
                          y = date.getFullYear();
                    edate= new Date( y, m, d+days);
                   dateStr = $.format.date(edate,"yyyy-MM-dd"); 
                        $("#fechaFin1").val(dateStr);   
                        
                            
                }); 
                
                $("#fechaFin1").change(function () {
                    start = $("#fechaFin1").val();
                      days = 4;
                      date = new Date(start);
                      d = date.getDate();
                     m = date.getMonth();
                          y = date.getFullYear();
                    edate= new Date( y, m, d-days);
                   dateStr = $.format.date(edate,"yyyy-MM-dd"); 
                        $("#fechaInicio1").val(dateStr);   
                        
                            
                }); 
                
                 $("#fechaInicio2").change(function () {
                    start = $("#fechaInicio2").val();
                      days = 6;
                      date = new Date(start);
                      d = date.getDate();
                     m = date.getMonth();
                          y = date.getFullYear();
                    edate= new Date( y, m, d+days);
                   dateStr = $.format.date(edate,"yyyy-MM-dd"); 
                        $("#fechaFin2").val(dateStr);   
                        
                            
                }); 
                
                $("#fechaFin2").change(function () {
                    start = $("#fechaFin2").val();
                      days = 4;
                      date = new Date(start);
                      d = date.getDate();
                     m = date.getMonth();
                          y = date.getFullYear();
                    edate= new Date( y, m, d-days);
                   dateStr = $.format.date(edate,"yyyy-MM-dd"); 
                        $("#fechaInicio2").val(dateStr);   
                        
                            
                }); 
               

                
                
                            
            });
        </script>


        <script  type="text/javascript">
             $(function() { 
                $("#registrarResultado").validity("input: text");
            });
        
            
        $(function(){
            // Tabs
            $('#tabs').tabs({
                cookie: {
                    // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
            });
            $('#tabs-1').tabs({
                cookie: {
                    // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
            });
            $('#tabs-2').tabs({
                cookie: {
                    // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
            });
            $('#tabs-3').tabs({
                cookie: {
                    // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
            });
            $('#tabs-4').tabs({
                cookie: {
                    // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
            });
            $('#tabs-5').tabs({
                cookie: {
                    // store cookie for a day, without, it would be a session cookie
                    expires: 1
                }
            });
            
	
        });
        $(function() {
            $( "#fechaInicio1" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#fechaInicio2" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });                        
        $(function() {
            $( "#fechaFin1" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#fechaFin2" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
            
        $(function() {
            $("#tiempoJugado" ).timepicker({
                showSecond: true,
                timeFormat: 'hh:mm:ss',
                hourMax: 4,
                hourGrid: 1,
                minuteGrid: 10,
                secondGrid: 20
            });
        });
        
         $(function() {
            $("#tiempoJugadoMod" ).timepicker({
                showSecond: true,
                timeFormat: 'hh:mm:ss',
                hourMax: 4,
                hourGrid: 1,
                minuteGrid: 10,
                secondGrid: 20
            });
        });
        
        
            
       $(function() {
            fit = $("#fit").val();
            fft=$("#fft").val();
            date = new Date(fit);
            d = date.getDate();
            m = date.getMonth();
            y = date.getFullYear();
           
            dateFin = new Date(fft);
            d2 = dateFin.getDate();
            m2 = dateFin.getMonth();
            y2 = dateFin.getFullYear();
            h=dateFin.getHours();
            min=  dateFin.getMinutes();
            $( ".fechaHoraInicio" ).datetimepicker({
                ampm: true,
                dateFormat: 'yy/mm/dd',
                minDate: new Date(y, m , d+1),
                maxDate: new Date(y2, m, d2+1, h+4, min+59)
            });
        });


            $(document).ready(function(){
                $("#crearNoticiaForm").submit(function(){
                    var titulo = $("#titulo").val();
                    var desc = $("#descripcion1").val();
                    var ruta = $("#ruta").val();
                    $("#hiddenAjaxAddNoticia").attr("value", ruta);
                    if(titulo!=''&&desc!=''&&ruta!=''){
                        alert("Se ha registrado exitosamente la noticia: "+titulo);
                    }else{
                        alert("No se ha registrado. Falta llenar campo(s)");
                    }
                });

                $("#modNoticiaForm").submit(function(){
                    var titulo2 = $("#titulo2").val();
                    var desc2 = $("#descripcion").val();
                    var ruta2 = $("#ruta2").val();
                    $("#hiddenAjaxModNoticia").attr("value", ruta2);
                    if(titulo2!=' '&&desc2!=' '){
                        alert("Se ha modificado exitosamente la noticia: "+titulo2);
                    }else{
                        alert("Ha dejado un campo vacío. No se pudo modificar");
                    }
                });
                
                $("#crearTorneoForm").submit(function(){
                    var nombre = $("#nombreTorneo").val();
                    var inicio = $("#fechaInicio1").val();
                    var fin = $("#fechaFin1").val();
                    var lugar = $("#lugar").val();
                    var primero = $("#premioPrimero").val();
                    var segundo = $("#premioSegundo").val();
                    var tercero = $("#premioTercero").val();
                    if(nombre!=''&&inicio!=''&&fin!=''&&lugar!=''&&primero!=''&&segundo!=''&&tercero!=''){
                        alert("Se ha registrado exitosamente el torneo: "+nombre);
                    }else{
                        alert("No se ha registrado. Falta llenar campo(s)");
                    }
                });
                
                $("#modTorneoForm").submit(function(){
                    var nombre = $("#nombreTorneo2").val();
                    var inicio = $("#fechaInicio2").val();
                    var fin = $("#fechaFin2").val();
                    var estado = $("#estado").val();
                    var lugar = $("#lugar2").val();
                    var primero = $("#premioPrimero2").val();
                    var segundo = $("#premioSegundo2").val();
                    var tercero = $("#premioTercero2").val();
                    if(nombre!=''&&inicio!=''&&fin!=''&&estado!=''&&lugar!=''&&primero!=''&&segundo!=''&&tercero!=''){
                        alert("Se ha modificado exitosamente el torneo: "+nombre);
                    }else{
                        alert("Ha dejado un campo vacío. No se pudo modificar");
                    }
                });
                
                $("#registrarResultado").submit(function(){
                    var combo = $("#combo1").val();
                    var combo1 = $("#combo21").val();
                    var combo2 = $("#combo22").val();
                    var combo3 = $("#combo41").val();
                    var combo4 = $("#combo42").val();
                    var fases = $("#comboFases").val();
                    var tiempo = $("#tiempoJugado").val();
                    var unidades1 = $("#unidades1").val();
                    var unidades2 = $("#unidades2").val();
                    var recursos1 = $("#recursos1").val();
                    var recursos2 = $("#recursos2").val();
                    var minerales1 = $("#minerales1").val();
                    var minerales2 = $("#minerales2").val();
                    var razas1 = $("#razas1").val();
                    var razas2 = $("#razas2").val();
                    var ruta = $("#ruta3").val();
                    $("#hiddenAjaxRegResultado").attr("value", ruta);
                    if(combo!=''&&combo1!=''&&combo2!=''&&combo3!=''&&combo4!=''&&fases!=''&&tiempo!=''&&
                       unidades1!=''&&unidades2!=''&&recursos1!=''&&recursos2!=''&&
                       minerales1!=''&&minerales2!=''&&razas1!=''&&razas2!=''&&ruta!=''){
                        alert("Se ha registrado exitosamente la partida entre: "+combo1+'('+combo3+') VS '+combo2+'('+combo4+')');
                    }else{
                        alert("No se ha registrado. Falta llenar campo(s)");
                    }
                });
                
                $("#modFormResultado").submit(function(){
                    var combo = $("#mcombo1").val();
                    var combo1 = $("#mcombo21").val();
                    var combo2 = $("#mcombo22").val();
                    var combo3 = $("#mcombo41").val();
                    var combo4 = $("#mcombo42").val();
                    var fases = $("#mFases").val();
                    var tiempo = $("#tiempoJugadoMod").val();
                    var unidades1 = $("#munidades1").val();
                    var unidades2 = $("#munidades2").val();
                    var recursos1 = $("#mrecursos1").val();
                    var recursos2 = $("#mrecursos2").val();
                    var minerales1 = $("#mminerales1").val();
                    var minerales2 = $("#mminerales2").val();
                    var razas1 = $("#mRazas1").val();
                    var razas2 = $("#mRazas2").val();
                    var ruta = $("#ruta4").val();
                    $("#hiddenAjaxModResultado").attr("value", ruta);
                    if(combo!=''&&combo1!=''&&combo2!=''&&combo3!=''&&combo4!=''&&fases!=''&&tiempo!=''&&
                       unidades1!=''&&unidades2!=''&&recursos1!=''&&recursos2!=''&&
                       minerales1!=''&&minerales2!=''&&razas1!=''&&razas2){
                        alert("Se ha modificado exitosamente la partida entre: "+combo1+' VS '+combo2);
                    }else{
                        alert("Ha dejado un campo vacío. No se pudo modificar ");
                    }
                });
            });
           
            
        </script>

    </head>

    <body>
        
        <div id="racezI">
        <img id="sc11" src="http://localhost/Starcraft-Admin/Imagenes/sc2Zerg2.png" /><br/>
        <img id="sc12" src="http://localhost/Starcraft-Admin/Imagenes/sc2Protoss2.png" /><br/>
        <img id="sc13" src="http://localhost/Starcraft-Admin/Imagenes/sc2Terran2.png" />
        </div>
        
        <div id="container">
            <p id="userP"> Bienvenido, <?php echo $nombreCompleto;?> </p>
            <img id="logosc2" src="http://localhost/Starcraft-Admin/Imagenes/logosc2admin.png" alt="SC2 Logo" />

            <div id="tabs-one-line">

                <a href="index.php?c=LoginControl&m=logout"><input id="Salir" type="image"  src="http://localhost/Starcraft-Admin/Imagenes/exit.png" /></a>



            </div>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Noticias</a></li>
                    <li><a href="#tabs-2">Torneos</a></li>
                    <li><a href="#tabs-3">Resultados</a></li>
                    <li><a href="#tabs-4">Horarios</a></li>
                    <li><a href="#tabs-5">Replays</a></li>

                </ul>

                <div id="tabs-1">
                    <ul>
                    <li><a href="#agnoticia">Agregar Noticia</a></li>
                    <li><a href="#menoticia">Ver Noticias</a></li>
                    <li><a id="anchorMod" href="#modNoticias">Modificar Noticias</a></li>  
                    <li><a href="#utlimas">Últimas Noticias</a></li>
                    
                    
                </ul>
                <div id="agnoticia">
                    <h1>Agregar Noticia</h1>
                        <form id="crearNoticiaForm" method="post" action="index.php?c=TorneoControl&m=crearNoticia">

                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>

                            <table id="agregarNoticiaTabla" cellpadding="5">
                                <tr>
                                    <td><label for="titulo">Título: </label></td>
                                    <td><input id="titulo" name="titulo" value="" title="titulo" tabindex="4" type="text"/></td>
                                    <td><label for="imagen">Imagen: </label></td>

                                </tr>
                                <tr>
                                    <td><label for="descripcion">Descripción: </label></td>
                                    <td><textarea id="descripcion1" cols="20" rows="3" name="descripcion"></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" id="hiddenAjaxAddNoticia" name="rutaNoticia"/></td>
                                    <td align="center"><input id="agregarSubmit" value="Agregar" tabindex="6" type="submit"/></td>
                                    <td><input id="resetNSubmit" type="reset" value="Reset" /></td>
                                </tr>
                            </table>
                            <div id="upload_area0">
                                            La imagen será cargada aquí.<br /><br />
                                            Usted puede cambiarla por otra si desea!
                            </div>
                        </form>
                    <form action="http://localhost/Starcraft-Admin/uploads/ajaxupload.php" method="post" name="sleeker" id="formAjaxAddNoticia">
                        <input type="hidden" name="maxSize" value="9999999999" />
                        <input type="hidden" name="maxW" value="200" />
                        <input type="hidden" name="fullPath" value="http://localhost/Starcraft-Admin/uploads/" />
                        <input type="hidden" name="relPath" value="../uploads/" />
                        <input type="hidden" name="colorR" value="255" />
                        <input type="hidden" name="colorG" value="255" />
                        <input type="hidden" name="colorB" value="255" />
                        <input type="hidden" name="maxH" value="300" />
                        <input type="hidden" name="filename" value="filename" />
                        <input id="ruta" type="file" name="filename" onchange="ajaxUpload(this.form,'http://localhost/Starcraft-Admin/uploads/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://localhost/Starcraft-Admin/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area0','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'Imagenes/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'Imagenes/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                    </form>
                </div>
                <div id="menoticia">
                    <h1>Ver Noticias</h1>
                        <table id="modEliNoticiaTabla" align="center" border="2">
                            <tr>
                                <th width="600">Noticias</th>
                                <th width="200">Modificar</th>
                                <th width="200">Eliminar</th>
                            </tr>
                            <?php foreach($noticias as $n){?>
                            <tr>
                                <td><?php echo $n->getTitulo();?></td>
                                <td align="center">
                                    <form method="post" action="index.php?c=TorneoControl&m=getNoticiaById">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idModificarNoticia" value="<?php echo $n->getId();?>"/>
                                        <a href="#"><input class="buttonModificarN" type="submit" value="Modificar"/></a>
                                    </form>
                                </td>
                                <td align="center">
                                    <form method="post" action="index.php?c=TorneoControl&m=eliminarNoticia">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idEliminarNoticia" value="<?php echo $n->getId();?>"/>
                                        <input class="buttonEliminarN" type="submit" value="Eliminar"/>
                                    </form>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                </div>
                
                    <div id="modNoticias">
                         <h1>Modificación de Noticias</h1>
                         <?php if($noticia==null){?>
                        <p>No se ha seleccionado alguna Noticia.</p>
                        <?php }else{?>
                        
                        <form id="modNoticiaForm" method="post" action="index.php?c=TorneoControl&m=modificarNoticia">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <input type="hidden" name="idNoticiaMod" value="<?php echo $noticia->getId();?>"/>
                            <table id="modNoticiaTabla" cellpadding="5">
                                <tr>
                                    <td><label for="titulo">Título: </label></td>
                                    <td><input id="titulo2" name="tituloNoticiaMod" value="<?php echo $noticia->getTitulo();?>" title="titulo" tabindex="4" type="text"/></td>
                                    <td><label for="imagen">Imagen: </label></td>
                                </tr>
                                <tr>
                                    <td><label for="descripcion">Descripción: </label></td>
                                    <td><textarea id="descripcion" cols="15" rows="3" name="descripcionNoticiaMod"><?php echo $noticia->getDescripcion();?></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" id="hiddenAjaxModNoticia" name="rutaNoticia"/></td>
                                    <td align="center"><input id="modNSubmit" value="Modificar" tabindex="6" type="submit"/></td>
                                    <td><input id="resetMNSubmit"  type="reset" value="Reset" /></td>
                                </tr>
                            </table>
                            <div id="upload_area1">
                                La imagen será cargada aquí.<br />
                                <img src="http://localhost/Starcraft-Admin/uploads/noticia/<?php echo $noticia->getId();?>.png" alt=""/><br />
                                Usted puede cambiarla por otra si desea!
                            </div>
                        </form>
                        
                     <form action="http://localhost/Starcraft-Admin/uploads/ajaxupload.php" method="post" name="sleeker" id="formAjaxModNoticia">
                        <input type="hidden" name="maxSize" value="9999999999" />
                        <input type="hidden" name="maxW" value="200" />
                            <input type="hidden" name="fullPath" value="http://localhost/Starcraft-Admin/uploads/" />
                            <input type="hidden" name="relPath" value="../uploads/" />
                            <input type="hidden" name="colorR" value="255" />
                            <input type="hidden" name="colorG" value="255" />
                            <input type="hidden" name="colorB" value="255" />
                            <input type="hidden" name="maxH" value="300" />
                            <input type="hidden" name="filename" value="filename" />
                            <input id="ruta2" type="file" name="filename" onchange="ajaxUpload(this.form,'http://localhost/Starcraft-Admin/uploads/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://localhost/Starcraft-Admin/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area1','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'Imagenes/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'Imagenes/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                         </form>
                        <?php }?> 
                    </div>
                    
                <div id="utlimas">
                    <h1>Seleccionar Últimas Noticias</h1>
                    <form id="ultimasNoticiasForm" method="post" action="index.php?c=TorneoControl&m=destacarNoticia">
                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                        <table id="ultimasNotiTabla" border="2">
                              <tr>
                                    <th>Título de la Noticia</th>
                                    <th class="ultCol">Seleccionar</th>
                              </tr>

                              <?php foreach($noticias as $n){?>
                              <tr>
                                    <td><?php echo $n->getTitulo();?></td>
                                    <td align="center">
                                        <?php if($n->getDestacada()==1){?>
                                        <input type="checkbox" name="noticiasDestacadas<?php echo $n->getId();?>" value="<?php echo $n->getId();?>" checked=""/>
                                        <?php }else{?>
                                        <input type="checkbox" name="noticiasDestacadas<?php echo $n->getId();?>" value="<?php echo $n->getId();?>"/>
                                        <?php }?>
                                    </td>
                              </tr>
                              <?php }?>
                        </table>
                        <input id="seleccionar" value="Seleccionar" type="submit"/>
                    </form>
                </div>a
                </div>

                <div id="tabs-2">
                    <ul>
                        <li><a href="#empezarTorneo">Empezar Torneo</a></li>
                        <li id="liCrearTorneo"><a href="#creartorneo">Crear Torneo</a></li>
                        <li id="liVerTorneo"><a href="#vertorneo">Ver Torneo</a></li>
                        <li id="liModTorneo"><a id="aModtorneo" href="#modtorneo">Modificar Torneo</a></li>
                        <li id="liVerDetalles"><a id="anchorVerD" href="#verdetalles">Ver Detalles</a></li>

                    </ul>
                    
                    <div id="empezarTorneo">
                        <h1>Empezar Torneo</h1>
                        <?php if ($torneosLlenosC==null){?>
                        <p>Aun no tenemos torneos completos. Debe llegar a tener 16 equipos para empezar el torneo.</p>
                        <?php }else{?>
                        <p>A continuación se listan los torneos que se encuentran con 16 equipos, por lo cual, se encuentran 
                            aptos para empezar.</p>
                        <form method="post" action="index.php?c=TorneoControl&m=empezarTorneo">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table>
                                <?php foreach($torneosLlenosC as $t){?>
                                <tr>
                                    <td><input name="t<?php echo $t->getId();?>" type="checkbox" value="<?php echo $t->getId();?>"/></td>
                                    <td><?php echo $t->getNombre();?></td>
                                </tr>
                                <?php }?>
                            </table><br/>
                            <input type="submit" value="Empezar Torneo"/>
                        </form>
                        <?php }?>
                    </div>
                    
                    <div id="creartorneo">
                        <h1>Crear Torneo</h1>
                        <form id="crearTorneoForm" method="post" action="index.php?c=TorneoControl&m=crearTorneo">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table id="crearTorneoTabla">
                                <tr>
                                    <td class="labels"><label for="nombreTorneo">Nombre del Torneo</label></td>
                                    <td class="inputs"><input id="nombreTorneo" class="parametro" name="nombreTorneo" type="text"/></td>
                                </tr>
                                <tr>
                                    <td><label for="nroEquipos">Número de Equipos</label></td>
                                    <td><input id="nroEquiposDisabled" class="parametro" type="text" name="nroEquipos" value="16" readonly="true"/></td>
                                </tr>
                                <tr>
                                    <td><label for="fechaInicio">Fecha de Inicio</label></td>
                                    <td><div class="fechaInicio">
                                            <input id="fechaInicio1" class="parametro" type="text" name="fechaInicio"/>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><label for="fechaFin">Fecha de Fin</label></td>
                                    <td><div class="fechaFin">
                                            <input id="fechaFin1" class="parametro" type="text" name="fechaFin"/>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><label for="estado">Estado del Torneo</label></td>
                                    <td><input id="estadoDisabled" class="parametro" type="text" name="estado" value="En espera" readonly="true"/></td>
                                </tr>
                                <tr>
                                    <td><label for="lugar">Lugar de Realización</label></td>
                                    <td><input id="lugar" class="parametro" name="lugar" type="text"/></td>
                                </tr>
                            </table>
                            <fieldset id="crearTorneoTabla2">
                                <legend>Premios</legend>
                            <table id="crearTorneoTabla3">
                                <tr>
                                    <td><label for="premioPrimero">1er Puesto</label></td>
                                    <td><input id="premioPrimero" class="parametro" type="text" name="premioPrimero" /></td>
                                </tr>
                                <tr>
                                    <td><label for="premioSegundo">2do Puesto</label></td>
                                    <td><input id="premioSegundo" class="parametro" name="premioSegundo" type="text"/></td>
                                </tr>
                                <tr>
                                    <td><label for="premioTercero">3er Puesto</label></td>
                                    <td><input id="premioTercero" class="parametro" type="text" name="premioTercero"/></td>
                                </tr>
                            </table>
                            </fieldset>
                            <input class="botonRegistrar" type="submit" value="Registrar"/>
                            <input class="botonRestablecer" type="reset" value="Restablecer"/>
                        </form>
                    </div>
                    <div id="vertorneo">
                        <h1 id="h1verTorneo">Ver Torneos</h1>
                        <table id="verTorneoTabla">
                            <tr>
                                <th class="primFila">Torneo</th>
                                <th class="primFila">Número de Equipos</th>
                                <th class="primFila">Fecha de Inicio</th>
                                <th class="primFila">Fecha de Fin</th>
                                <th class="primFila">Estado</th>
                                <th class="primFila">Equipos</th>
                                <th class="primFila">Modificar</th>
                                <th class="primFila">Eliminar</th>
                            </tr>
                            <?php foreach($torneos as $t){?>
                            <tr>
                                <td><?php echo $t->getNombre();?></td>
                                <td>16</td>
                                <td><?php echo $t->getFechaInicio();?></td>
                                <td><?php echo $t->getFechaFin();?></td>
                                <td><?php echo $t->getEstado();?></td>
                                <td>
                                    <form method="post" action="index.php?c=TorneoControl&m=verDetalles">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idVerDetalles" value="<?php echo $t->getId();?>"/>
                                        <input class="aVerDetalles" type="submit" value="Ver Detalles"/>
                                    </form>
                                </td>
                                <td align="center">
                                    <form method="post" action="index.php?c=TorneoControl&m=getTorneoById">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idModificarTorneo" value="<?php echo $t->getId();?>"/>
                                        <input class="buttonModificar"  type="submit" value="Modificar"/>
                                    </form>
                                </td>
                                <td align="center">
                                    <form method="post" action="index.php?c=TorneoControl&m=eliminarTorneo">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idEliminarTorneo" value="<?php echo $t->getId();?>"/>
                                        <input class="buttonEliminar" type="submit" value="Eliminar"/>
                                    </form>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                    <div id="modtorneo">
                        <h1>Modificación de Torneo</h1>
                        <form id="modTorneoForm" method="post" action="index.php?c=TorneoControl&m=modificarTorneo">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <?php if($torneo==null){?>
                            <p>No se ha seleccionado algún Torneo para su modificación.</p>
                            <?php }else{?>
                            <input type="hidden" name="idTorneoMod" value="<?php echo $torneo->getId();?>"/>
                            <table id="modTorneoTabla">
                                <tr>
                                    <td class="labels"><label for="nombreTorneoMod">Nombre del Torneo</label></td>
                                    <td class="inputs"><input id="nombreTorneo2" class="parametro" name="nombreTorneoMod" type="text" value="<?php echo $torneo->getNombre();?>"/></td>
                                </tr>
                                <tr>
                                    <td><label for="fechaInicioMod">Fecha de Inicio</label></td>
                                    <td><div class="fechaInicio">
                                            <input id="fechaInicio2" class="parametro" type="text" name="fechaInicioMod" value="<?php echo $torneo->getFechaInicio();?>"/>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><label for="fechaFinMod">Fecha de Fin</label></td>
                                    <td><div class="fechaFin">
                                            <input id="fechaFin2" class="parametro" type="text" name="fechaFinMod" value="<?php echo $torneo->getFechaFin();?>"/>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><label for="estadoMod">Estado del Torneo</label></td>
                                    <td><select id="estado" name="estadoMod" class="parametro">
                                            <option value="<?php echo $torneo->getEstado();?>"><?php echo $torneo->getEstado();?></option>
                                            <option disabled="true">---------</option>
                                            <option value="En espera">En espera</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Cancelado">Cancelado</option>
                                            <option value="Terminado">Terminado</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td><label for="lugarMod">Lugar de Realización</label></td>
                                    <td><input id="lugar2" class="parametro" name="lugarMod" type="text" value="<?php echo $torneo->getLugar();?>"/></td>
                                </tr>
                            </table>
                            <fieldset id="modTorneoTabla2">
                                <legend>Premios</legend>
                            <table id="modTorneoTabla3">
                                <tr>
                                    <td><label for="premioPrimero">1er Puesto</label></td>
                                    <td><input id="premioPrimero2" class="parametro" type="text" name="premioPrimeroMod" value="<?php echo $torneo->getPremioPrimero();?>"/></td>
                                </tr>
                                <tr>
                                    <td><label for="premioSegundo">2do Puesto</label></td>
                                    <td><input id="premioSegundo2" class="parametro" name="premioSegundoMod" type="text" value="<?php echo $torneo->getPremioSegundo();?>"/></td>
                                </tr>
                                <tr>
                                    <td><label for="premioTercero">3er Puesto</label></td>
                                    <td><input id="premioTercero2" class="parametro" type="text" name="premioTerceroMod" value="<?php echo $torneo->getPremioTercero();?>"/></td>
                                </tr>
                            </table>
                            </fieldset>
                            <input class="botonModificar" type="submit" value="Modificar"/>
                            
                            <input class="botonCancelar" type="reset" value="Restablecer"/>
                            <?php }?>
                        </form>
                    </div>
                    <div id="verdetalles">
                        <?php if($torneo==null){?>
                        <h1>Detalles del Torneo:</h1>
                        <p>No ha seleccionado algún torneo.</p>
                        <?php }else{?>
                        <h1>Detalles del Torneo: "<?php echo $torneo->getNombre();?>"</h1>
                        <table id="verDetallesTorneoTabla">
                            <tr>
                                <td class="primCol" colspan="2" align="center"><?php echo $torneo->getNombre();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Nombre:</td>
                                <td><?php echo $torneo->getNombre();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">N° de Equipos</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td class="primCol">Fecha de Inicio</td>
                                <td><?php echo $torneo->getFechaInicio();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Fecha Fin</td>
                                <td><?php echo $torneo->getFechaFin();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Estado</td>
                                <td><?php echo $torneo->getEstado();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Lugar</td>
                                <td><?php echo $torneo->getLugar();?></td>
                            </tr>
                            <tr>
                                <td class="primCol" colspan="2" align="center">Premios :</td>
                            </tr>
                            <tr>
                                <td class="primCol">1er Premio</td>
                                <td><?php echo $torneo->getPremioPrimero();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">2do Premio</td>
                                <td><?php echo $torneo->getPremioSegundo();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">3er Premio</td>
                                <td><?php echo $torneo->getPremioTercero();?></td>
                            </tr>
                        </table>
                        <?php }?>
                        <h2>Equipos participantes</h2>
                        <div id="equiposParticipantes">
                            <table id="verEquiposPorTorneoTabla">
                                <tr>
                                    
                                    <th class="primFila">Nombre</th>
                                    <th class="primFila">Raza</th>
                                    <th class="primFila">Fase Actual</th>
                                </tr>
                                <?php if($equipos==null){?>
                                <tr>
                                    <td colspan="4">Aun no se han registrado los equipos.</td>
                                </tr>
                                <?php }else{?>
                                <?php foreach($equipos as $e){?>
                                <tr>
                                    <td><?php echo $e->getNombre();?></td>
                                    <td><?php echo $e->getRaza();?></td>
                                    <td><?php echo $e->getFaseActual();?></td>
                                </tr>
                                <?php }?>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tabs-3">
                    <ul>
                        <li><a href="#rresultado">Registrar Resultado</a></li>
                        <li><a href="#verResultados">Ver Resultados</a></li>
                        <li><a id="aModResultado" href="#modificarResultado">Modificar Resultado</a></li>
                        <li><a id="aVerDetallesResultado"  href="#verDetallesResultado">Ver Resultados</a></li>

                    </ul>
                    <div id="rresultado">
                        <h1>Resultados Partida</h1>
                        <form id="registrarResultado" method="post" action="index.php?c=TorneoControl&m=crearPartida">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table id="tableResultado">
                                <tr>
                                    <td> Torneo
                                        <select class="selRegResult" name="torneo" id="combo1">
                                            <option value="0"   selected="selected">Seleccionar Torneo</option>
                                            <?php foreach($torneosLlenos as $t) { ?>
                                            <option value="<?php echo $t->getId(); ?>"> <?php echo $t->getNombre(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>

                                 <tr >
                                    <td colspan="6" >Equipo Ganador <select id="combo21" name="equipo1" >
                                            <option disabled="true">-----------</option>
                                        </select> 
                                        VS  Equipo Perdedor
                                        <select id="combo22" name="equipo2"  ><option disabled="true">-----------</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="6">Jugador 1 <select id="combo41" class="combo41" name="jugador1">
                                            <option disabled="true">-----------</option>
                                        </select> Jugador 2 <select id="combo42" class="combo42" name="jugador2">
                                            <option disabled="true">-----------</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table>
                                            <tr><td>Fase <select id="comboFases" class="selFasRes" name="fase"><option>Grupos</option><option>Cuartos de Final</option><option>Semifinal</option><option>Tercer Lugar</option><option>Final</option></select></td></tr>
                                            <tr><td>Tiempo Jugado <input id="tiempoJugado"  type="text" name="tiempo" value="00:00:00" size="8"/></td></tr>
                                        </table>
                                    </td>
                                    <td>
                                        <p>Imagen</p>
                                        <input type="hidden" id="hiddenAjaxRegResultado" name="rutaResultado"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset>
                                            <legend>Detalles</legend>
                                            <table>
                                                <tr>
                                                    <td>Raza:</td>
                                                    <td><select id="razas1" name="raza1">
                                                            <option value="Zerg">Zerg</option>
                                                             <option value="Terran">Terran</option>
                                                             <option value="Protoss">Protoss</option>
                                                        </select> 
                                                    </td>
                                                    <td>Raza:</td>
                                                    <td><select id="razas2" name="raza2">
                                                            <option value="Zerg">Zerg</option>
                                                             <option value="Terran">Terran</option>
                                                             <option value="Protoss">Protoss</option>
                                                        </select> 
                                                    </td>
                                                </tr>
                                                <tr><td>Unidades </td><td> <input id="unidades1" type="text" name="unidades1" value="" size="5"/></td><td>Unidades:</td><td>  <input id="unidades2" type="text" name="unidades2" value="" size="5"/></td></tr>
                                                <tr><td>Estructuras</td><td> <input id="recursos1" type="text" name="recursos1" value="" size="5"/> </td><td>Estructuras:</td><td>  <input id="recursos2" type="text" name="recursos2" value="" size="5"/> </td></tr>
                                                <tr><td>Minerales</td><td> <input id="minerales1" type="text" name="minerales1" value="" size="5"/></td><td>Minerales:</td><td>  <input id="minerales2" type="text" name="minerales2" value="" size="5"/></td></tr>

                                            </table>
                                      </fieldset>
                                    </td>
                                    <td>
                                        <div id="upload_area2">
                                            La imagen será cargada aquí.<br /><br />
                                            Usted puede cambiarla por otra si desea!
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input class="botonRegistrarR" type="submit" value="Registrar"/></td>
                                    
                                    <td><input class="botonRestablecerR" type="reset" value="Restablecer"/></td>
                                </tr>
                            </table>
                        </form>
                        <form action="http://localhost/Starcraft-Admin/uploads/ajaxupload.php" method="post" name="sleeker" id="formAjaxRegResultado">
                            <input type="hidden" name="maxSize" value="9999999999" />
                            <input type="hidden" name="maxW" value="200" />
                            <input type="hidden" name="fullPath" value="http://localhost/Starcraft-Admin/uploads/" />
                            <input type="hidden" name="relPath" value="../uploads/" />
                            <input type="hidden" name="colorR" value="255" />
                            <input type="hidden" name="colorG" value="255" />
                            <input type="hidden" name="colorB" value="255" />
                            <input type="hidden" name="maxH" value="300" />
                            <input type="hidden" name="filename" value="filename" />
                            <input id="ruta3" type="file" name="filename" onchange="ajaxUpload(this.form,'http://localhost/Starcraft-Admin/uploads/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://localhost/Starcraft-Admin/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area2','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'Imagenes/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'Imagenes/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                        </form>
                    </div>
                    <div id="verResultados">
                        <h1>Ver Resultado</h1>
                        <table id="mresultadoTabla">
                            <tr>
                                <th class="primCol">Equipos de La Partida</th>
                                <th class="primFila">Fase</th>
                                <th class="primFila">Ver Detalles</th>
                                <th class="primFila">Modificar</th>
                                <th class="primFila">Eliminar</th>
                            </tr>
                            <?php foreach($partidas as $p){?>
                            <tr>
                                <td><?php echo $p->get_equipo1();?> VS <?php echo $p->get_equipo2();?></td>
                                <td><?php echo $p->get_fase();?></td>
                                <td>
                                    <form method="post" action="index.php?c=TorneoControl&m=verDetallesPartida">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username1" type="hidden" name="username" value="<?php echo $username;?>" />
                                        <input type="hidden" name="idVerDetallesResultado" value="<?php echo $p->get_id(); ?>"/>
                                        <input class="buttonVerDetallesR" type="submit" value="Ver Detalles"/>
                                    </form>
                                </td>
                                <td align="center">
                                    <form method="post" action="index.php?c=TorneoControl&m=getPartidaById">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idModificarPartida" value="<?php echo $p->get_id(); ?>"/>
                                        <input class="buttonModificarR"  type="submit" value="Modificar"/>
                                    </form>
                                </td>
                                <td align="center">
                                    <form method="post" action="index.php?c=TorneoControl&m=eliminarPartida">
                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="hidden" name="idEliminarPartida" value="<?php echo $p->get_id(); ?>"/>
                                        <input class="buttonEliminarR" type="submit" value="Eliminar"/>
                                    </form>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                            
                            
                            
                        </div>
     
                    <div id="modificarResultado">
                        <h1>Modicación de Resultados</h1>
                        <?php if($partida==null){?>
                            <p>No se ha seleccionado alguna Partida para su modificación.</p>
                            <?php }else{?>
                        <form id="modFormResultado" method="post" action="index.php?c=TorneoControl&m=modificarPartida">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            
                            <input type="hidden" name="idPartidaMod" value="<?php echo $partida->get_id();?>"/>
                            <table id="tableModResultado">
                                <tr>
                                    <td> Torneo Actual <input class="inputTorAct" size="15" type="text" disabled="true" value="<?php echo $partida->getNombreTorneoById($partida->get_torneo()); ?>" />
                                        <input type="hidden" value="<?php echo $partida->get_torneo();?>"/>
                                    </td>
                                    <td>
                                        Torneo
                                        <select name="mtorneo" id="mcombo1" class="mcombo1">
                                            <option disabled="true">-------------</option>
                                            <option value="0">Seleccionar Torneo</option>
                                            <?php foreach($torneosLlenos as $t) { ?>
                                            <option value="<?php echo $t->getId(); ?>"> <?php echo $t->getNombre(); ?></option>
                                            <?php } ?>
                                            
                                        </select>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Equipo Ganador Actual <input class="mcomboA" size="15" type="text" disabled="true" value="<?php echo $partida->get_equipoGanador(); ?>" />
                                    </td>
                                    <td>
                                        VS  Equipo Perdedor Actual<input class="mcomboA" size="19" type="text" disabled="true" value="<?php echo $partida->get_equipoPerdedor(); ?>" />
                                    </td>
                                </tr>
                                 <tr >
                                    <td>Equipo Ganador <select id="mcombo21" class="mcombo21" name="mequipo1" >
                                           
                                            <option disabled="true"> </option>
                                        </select>
                                    </td>
                                    <td>
                                        VS  Equipo Perdedor
                                        <select id="mcombo22" class="mcombo22" name="mequipo2"  >
                                            
                                            <option disabled="true"></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jugador 1 Actual  <input class="inputJug1" size="15" type="text" disabled="true" value="<?php echo $partida->getNickById($partida->get_jugador1()); ?>" />
                                    </td>
                                    <td>
                                        Jugador 2 Actual  <input class="inputJug2" size="19" type="text" disabled="true" value="<?php echo $partida->getNickById($partida->get_jugador2()) ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jugador 1 <select id="mcombo41" class="mcombo41" name="mjugador1">
                                            <option disabled="true">--------------</option>
                                            </select>
                                    </td>
                                    <td>
                                        Jugador 2 <select id="mcombo42" class="mcombo42" name="mjugador2">
                                            <option disabled="true">---------------</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset>
                                            <legend>Fase Y Tiempo</legend>
                                        <table>
                                            <tr><td>Fase <select id="mFases" name="mfase" class="faseselec">
                                            <option value="<?php echo $partida->get_fase();?>"><?php echo $partida->get_fase();?></option>
                                            <option disabled="true">--------------</option>
                                             <option>Grupos</option>
                                             <option>Cuartos de Final</option>
                                             <option>Semifinal</option>
                                             <option>Tercer Lugar</option>
                                             <option>Final</option></select>
                                              </td></tr>
                                            <tr><td>Tiempo Jugado <input id="tiempoJugadoMod"  type="text" name="mtiempo" value="<?php echo $partida->get_tiempo();?>"/></td></tr>
                                        </table>
                                        </fieldset>
                                    </td>
                                    <td>
                                        <p>Imagen</p>
                                        <input type="hidden" id="hiddenAjaxModResultado" name="rutaResultado"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <fieldset id="modpdetail" >
                                            <legend>Detalles</legend>
                                            <table>

                                                <tr><td>Raza:</td><td>  <select id="mRazas1" class="razaCombo" name="mraza1" >
                                                    <option value="<?php echo $partida->get_raza1();?>"><?php echo $partida->get_raza1();?></option>
                                                    <option disabled="true">--------------</option>
                                                    <option value="Zerg">Zerg</option>
                                                    <option value="Terran">Terran</option>
                                                    <option value="Protoss">Protoss</option>

                                            </select></td><td>Raza:</td><td>   <select id="mRazas2" class="razaCombo" name="mraza2" >
                                                    <option value="<?php echo $partida->get_raza2();?>"><?php echo $partida->get_raza2();?></option>
                                                    <option disabled="true">--------------</option>
                                             <option value="Zerg">Zerg</option>
                                             <option value="Terran">Terran</option>
                                             <option value="Protoss">Protoss</option>

                                            </select></td></tr>
                                                <tr><td>Unidades </td><td> <input id="munidades1" type="text" name="munidades1" value="<?php echo $partida->get_unidades1();?>" size="5"/></td><td>Unidades:</td><td>  <input id="munidades2" type="text" name="munidades2" value="<?php echo $partida->get_unidades2();?>" size="5"/></td></tr>
                                                <tr><td>Estructuras</td><td> <input id="mrecursos1" type="text" name="mrecursos1" value="<?php echo $partida->get_recursos1();?>" size="5"/> </td><td>Estructuras:</td><td>  <input id="mrecursos2" type="text" name="mrecursos2" value="<?php echo $partida->get_recursos2();?>" size="5"/> </td></tr>
                                                <tr><td>Minerales</td><td> <input id="mminerales1" type="text" name="mminerales1" value="<?php echo $partida->get_minerales1();?>" size="5"/></td><td>Minerales:</td><td>  <input id="mminerales2" type="text" name="mminerales2" value="<?php echo $partida->get_minerales2();?>" size="5"/></td></tr>
                                                <tr><td><input name="mfechaHoraInicio"  type="hidden" value="<?php echo $partida->get_fechaHoraInicio();?>"/></td>
                                                <td><input name="mreplay" type="hidden" value="<?php echo $partida->get_replay();?>"/></td></tr>
                                            </table>
                                        </fieldset>
                                    </td>
                                    <td>
                                        <div id="upload_area3">
                                            La imagen será cargada aquí.<br />
                                            <img id="modPartidaImg" src="http://localhost/Starcraft-Admin/uploads/partida/<?php echo $partida->get_id();?>.png" alt=""/><br />
                                            Usted puede cambiarla por otra si desea!
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                   
                                    <td><input class="botonModificarR" type="submit" value="Modificar"/></td>
                                    
                                
                                    <td><input class="botonRestablecerR" type="reset" value="Restablecer"/></td>
                                </tr>
                                
                            </table>
                        </form>
                        <form action="http://localhost/Starcraft-Admin/uploads/ajaxupload.php" method="post" name="sleeker" id="formAjaxModResultado">
                            <input type="hidden" name="maxSize" value="9999999999" />
                            <input type="hidden" name="maxW" value="200" />
                            <input type="hidden" name="fullPath" value="http://localhost/Starcraft-Admin/uploads/" />
                            <input type="hidden" name="relPath" value="../uploads/" />
                            <input type="hidden" name="colorR" value="255" />
                            <input type="hidden" name="colorG" value="255" />
                            <input type="hidden" name="colorB" value="255" />
                            <input type="hidden" name="maxH" value="300" />
                            <input type="hidden" name="filename" value="filename" />
                            <input id="ruta4" type="file" name="filename" onchange="ajaxUpload(this.form,'http://localhost/Starcraft-Admin/uploads/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=http://localhost/Starcraft-Admin/uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area3','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'Imagenes/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'Imagenes/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                        </form>
                        <?php }?>
                    </div>
                        
                    <div id="verDetallesResultado">
                        <?php if($partida==null){?>
                        <h1>Detalles de la Partida:</h1>
                        <p>No ha seleccionado ninguna Partida.</p>
                        <?php }else{?>
                        <h1>Detalles de la Partida: "<?php echo $partida->get_equipo1();?> VS <?php echo $partida->get_equipo2();?>"</h1>
                        <table id="verDetallesResultadoTabla">
                            <tr>
                                <td class="primCol" colspan="2" align="center"><?php echo $partida->get_equipo1();?> VS <?php echo $partida->get_equipo2();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Nombre:</td>
                                <td><?php echo $partida->get_equipo1();?> VS <?php echo $partida->get_equipo2();?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Fase</td>
                                <td><?php echo $partida->get_fase(); ?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Ganador</td>
                                <td><?php echo $partida->get_equipoGanador();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Perdedor</td>
                                <td><?php echo $partida->get_equipoPerdedor();?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Fecha de Inicio</td>
                               
                                <td><?php if (date('Y-m-d',strtotime($partida->get_fechaHoraInicio())) != '1970-01-01' ) {  ?>
                                    <?php echo date('Y-m-d',strtotime($partida->get_fechaHoraInicio())) ?>
                                    <?php } else{ ?>
                                        <?php echo 'Aún no se ha registrado la fecha de la partida' ?>
                                    <?php }?>
                                </td>
                            </tr>
                            
                            <tr>
                            <td class="primCol">Hora de Inicio</td>
                               
                                <td><?php echo date('g:i:a',strtotime($partida->get_fechaHoraInicio())); ?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Tiempo</td>
                                <td><?php echo $partida->get_tiempo();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Replay</td>
                                <td><a id="verReplay" href="<?php echo $partida->get_replay();?>"> Ver Replay</a></td>
                            </tr>
                          
                        </table>
                        
                        <table id="verDetallesResultadoJug1Tabla">
                            <tr>
                                <td class="primCol" colspan="2" align="center"><?php echo $partida->getNickById($partida->get_jugador1());?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Jugador 1:</td>
                                <td><?php echo $partida->getJugadorById($partida->get_jugador1());?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Raza</td>
                                <td><?php echo $partida->get_raza1(); ?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Unidades</td>
                                <td><?php echo $partida->get_unidades1();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Estructuras</td>
                                <td><?php echo $partida->get_recursos1();?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Minerales</td>
                               
                                <td><?php echo $partida->get_minerales1();?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Total</td>
                               
                                <td><?php echo $partida->get_total1();?></td>
                            </tr>
                            
                            
                           
                            
                        </table>
                        
                        <table id="verDetallesResultadoJug2Tabla">
                            <tr>
                                <td class="primCol" colspan="2" align="center"><?php echo $partida->getNickById($partida->get_jugador2());?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Jugador 2:</td>
                                <td><?php echo $partida->getJugadorById($partida->get_jugador2());?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Raza</td>
                                <td><?php echo $partida->get_raza2(); ?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Unidades</td>
                                <td><?php echo $partida->get_unidades2();?></td>
                            </tr>
                            <tr>
                                <td class="primCol">Estructuras</td>
                                <td><?php echo $partida->get_recursos2();?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Minerales</td>
                               
                                <td><?php echo $partida->get_minerales2();?></td>
                            </tr>
                            
                            <tr>
                                <td class="primCol">Total</td>
                               
                                <td><?php echo $partida->get_total2();?></td>
                            </tr>

                        </table>
                        
                        <?php }?>
                    </div>


                </div>

                <div id="tabs-4">
                    <ul>
                        <li><a href="#rhorario">Registrar Horario</a></li>
                        <li><a href="#mehorario">Ver Horarios</a></li>

                    </ul>
                    <div id="rhorario">
                        <h1>Horario de la Partida</h1>
                        <form method="post" action="index.php?c=TorneoControl&m=listarPartidaPorTorneoFase">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table id="tableHorario">
                                <tr>
                                    <td>Torneos</td>
                                    <td>
                                        <select name="torneosReplay">
                                            <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fase</td>
                                    <td>
                                        <select name="faseReplay">
                                            <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><input class="inputTabHor" type="submit" value="Listar Partidas"/></td>
                                </tr>
                            </table>

                        </form>
                        <br /> 
                        <?php if($partidasReplay!=null){?>
                        
                           
                            <input id="fit" type="hidden" value="<?php echo $fit;?>" />
                            <input id="fft"type="hidden" value="<?php echo $fft;?>" />
                            
                               
                            <table id="regHorario">
                                <tr>
                                    <th>Partida</th>
                                    <th>Horario</th>
                                    <th>Acciones</th>
                                </tr>
                                   <?php foreach($partidasReplay as $par){?>
                                    
                                    <form method="post" action="index.php?c=TorneoControl&m=modificarPartidaHorario">
                                <tr>
                                    <td>
                                        <select name="idPartidaHorario">
                                            <option value="<?php echo $par->get_id();?>"><?php echo $par->get_equipo1();?> VS <?php echo $par->get_equipo2();?></option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="fechaHoraInicio" type="text" name="fechaHoraInicioHorario"/>
                                    </td>
                                    <td>

                                        <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                                        <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                                        <input type="submit" value="Registrar"/> 
                                        <input type="reset" value="Restablecer"/>
                                    </td> 
                                </tr>
                                    </form>
                                   <?php }?>
                                    
                                </table>
                            
                        
                        <?php }?>

                    </div>
                    <div id="mehorario">
                        <h1>Ver Horario</h1>
                        <form method="post" action="index.php?c=TorneoControl&m=listarPartidaPorTorneoFase">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table id="tableReplay">
                                <tr>
                                    <td>Torneos</td>
                                    <td>
                                        <select name="torneosReplay">
                                            <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fase</td>
                                    <td>
                                        <select name="faseReplay">
                                            <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><input class="inputTabRep" type="submit" value="Listar Partidas"/></td>
                                </tr>
                            </table>

                        </form>
                        <?php if($partidasReplay!=null){?>
                        <table id="modHorarioTable">
                            <tr>
                                <th class="segCol">Equipos de la Partida</th>
                                <th class="primFila">Fase</th>
                                <th class="primFila">Horario Inicio</th>
                            </tr>
                            <?php foreach($partidasReplay as $par){?>
                            <tr>
                                <td><?php echo $par->get_equipo1();?> VS <?php echo $par->get_equipo2();?></td>
                                <td><?php echo $par->get_fase();?></td>
                                <td><?php echo $par->get_fechaHoraInicio();?></td>
                            </tr>
                            <?php }?>
                        </table>
                        <?php }?>
                    </div>


                </div>
                <div id="tabs-5">
                    <ul>
                        <li><a href="#rreplay">Registrar Replay</a></li>
                        <li><a href="#mereplay">Ver Replays</a></li>
                    </ul>
                    <div id="rreplay"> 
                        <h1>Replay de la Partida</h1>
                        <form method="post" action="index.php?c=TorneoControl&m=listarPartidaPorTorneoFase">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table id="tableReplay">
                                <tr>
                                    <td>Torneos</td>
                                    <td>
                                        <select name="torneosReplay">
                                            <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fase</td>
                                    <td>
                                        <select name="faseReplay">
                                            <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><input  class="inputTabRep"  type="submit" value="Listar Partidas"/></td>
                                </tr>
                            </table>

                        </form>
                        <br/>
                        
                      <?php if($partidasReplay!=null){?>
                        
                                <table id="regHorario">
                                    <tr>
				<th>Partida</th>
                                    <th>Link</th>
                                    <th>Acciones</th>
				</tr>
									
                                       <?php foreach($partidasReplay as $par){?>
					<form method="post" action="index.php?c=TorneoControl&m=modificarPartidaReplay">
										<tr>
										<td>
                                            <select name="idPartidaReplay">
                                                
                                                <option value="<?php echo $par->get_id();?>"><?php echo $par->get_equipo1();?> VS <?php echo $par->get_equipo2();?></option>
                                                
                                            </select>

                                        </td>
					<td><input type="text" name="linkReplay"/></td>
					<td> <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
					<input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
					<input  type="submit" value="Registrar"/> 
                                        <input  type="reset" value="Restablecer"/></td>
                                    </tr>
                                    
                                    </form>
                                        
                                    <?php }?>
                                </table>
                          
                        
                        <?php }?>
                    </div>

                    <div id="mereplay">
                        <h1>Ver Replays</h1>
                        <form method="post" action="index.php?c=TorneoControl&m=listarPartidaPorTorneoFase">
                            <input type="hidden" name="nombreCompleto" value="<?php echo $nombreCompleto;?>"/>
                            <input id="username" type="hidden" name="username" value="<?php echo $username;?>"/>
                            <table id="tableReplay">
                                <tr>
                                    <td>Torneos</td>
                                    <td>
                                        <select name="torneosReplay">
                                            <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fase</td>
                                    <td>
                                        <select name="faseReplay">
                                            <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><input  class="inputTabRep"  type="submit" value="Listar Partidas"/></td>
                                </tr>
                            </table>
                        </form>
                        <br/>

                        <?php if($partidasReplay!=null){?>
                        <table id="modReplayTable">
                            <tr>
                                <th class="primCol">Equipos de la Partida</th>
                                <th class="primFila">Fase</th>
                                <th class="primFila2">Link</th>
                            </tr>
                            <?php foreach($partidasReplay as $par){?>
                            <tr>
                                <td><?php echo $par->get_equipo1();?> VS <?php echo $par->get_equipo2();?></td>
                                <td><?php echo $par->get_fase();?></td>
                                <td><?php echo $par->get_replay();?></td>
                            </tr>
                            <?php }?>
                        </table>
                        <?php }?>
                    </div>
                </div>

            </div>

            <div id="footer">
                <img id="blizzard" src="http://localhost/Starcraft-Admin/Imagenes/blizzard.png" alt="SC2 Logo" />
                <p id="footerp">�2011 Blizzard Entertainment.All Rights Reserved. <br /> WORLD CYBER GAMES, Inc. All Rights Reserved.</p>
                <img id="wcg" src="http://localhost/Starcraft-Admin/Imagenes/wcg.png" alt="SC2 Logo" />
            </div>
        </div>
    </body>
</html>