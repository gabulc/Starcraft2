    <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Starcraft II Torneos Equipos</title>
        
        <meta name="title" content="Torneo StarCraft 2"/>
        <meta name="author" content="Eduardo Arenas, Anghelo Barboza, Gabriel Lucano, Jeffrey Pinedo, Jorge Valverde"/>
        <meta name="robots" content="all,follow,index"/>
        <meta name="keywords" content="starcraft2, starcraft, Starcraft2, starCraft2, StarCraft2, torneos de starcraft2, torneo, torneos"/>
        <meta name="description" content="Pagina Web de Administracion de Torneos de StartCraft 2"/>
        
          <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
        <link type="text/css" href="<?php echo base_url();?>css/inicio.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url();?>css/jquery-ui-1.7.3.custom.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url();?>css/style12.css" rel="stylesheet"/>
        
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.7.3.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/Inicio.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/ajaxupload.js"></script>

        <script type="text/javascript">
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


                $('#tabs-one-line').tabs();

            });
            $(function() {
                $( "#fechaInicio" ).datepicker();
            });
            $(function() {
                $( "#fechaFin" ).datepicker();

            });



            $(document).ready(function(){
                $("#agregado").hide();
                if($("#verifica").val()=='1'){
                    $("#contenido").hide();
                    $("#agregado").show();
                }


                $("#formuEquipo").validate({
                rules:{
                   'txtnombreequipo':"required",
                   'raza':"required",
                   'txtpaginaequipo':{
                       url:true
                   }

                },
                messages:{
                  'txtnombreequipo':{
                      required:"* Ingrese un Nombre"
                  },
                  'raza':{
                      required:"*"
                  },
                  'txtpaginaequipo':{
                      url:"<li>* Ingrese un valido url</li>"
                  }

                }
            })
        });
        $(document).ready(function(){
            $("#formuEquipo").submit(function(){
                var ruta1=$("#ruta1").val();

                $("#as").attr("value",ruta1);
                var ruta2 = $("#as").val();

                if(ruta2==""){
                    alert("NO SE PUEDE INGRESAR UN ARCHIVO VACIO");
                    return false;
                }

             })
        });
           $(document).ready(function(){

                $("#formuModificar").validate({
                rules:{

                   'razaM':"required",
                   'txtpaginaequipoM':{
                       url:true
                   }

                },
                messages:{

                  'razaM':{
                      required:"*"
                  },
                  'txtpaginaequipoM':{
                      url:"<li>* Ingrese un valido url</li>"
                  }

                }
            })
        });
        $(document).ready(function(){
            $("#formuModificar").submit(function(){
                var ruta1=$("#ruta1M").val();

                $("#asM").attr("value",ruta1);


             })
        });
        $(document).ready(function(){
             $("#jugador").validate({
                 rules:{
                    'txtNombre1':"required",
                    'txtApellido1':"required",
                    'txtNick1':"required",
                    'rank1"':"required",
                    'raza1':"required",
                    'txtNombre2':"required",
                    'txtApellido2':"required",
                    'txtNick2':"required",
                    'rank2':"required",
                    'raza2':"required"

                 },
                 messages:{
                     'txtNombre1':{
                        required:""
                     },
                    'txtApellido1':{
                        required:""
                    },
                    'txtNick1':{
                        required:""
                    },
                    'rank1':{
                        required:""
                    },
                    'raza1':{
                        required:""
                    },
                    'txtNombre2':{
                        required:""
                     },
                    'txtApellido2':{
                        required:""
                    },
                    'txtNick2':{
                        required:""
                    },
                    'rank2':{
                        required:""
                    },
                    'raza2':{
                        required:""
                    }
                 }
             });

               $("#jugador1").validate({
                   rules:{
                    'txtNombre3':"required",
                    'txtApellido3':"required",
                    'txtNick3':"required",
                    'rank3"':"required",
                    'raza3':"required"
                 },
                 messages:{
                     'txtNombre3':{
                        required:""
                     },
                    'txtApellido3':{
                        required:""
                    },
                    'txtNick3':{
                        required:""
                    },
                    'rank3':{
                        required:""
                    },
                    'raza3':{
                        required:""
                    }

                 }
               })
         });


    </script>


    
    </head>

    <body>
        <p id="userP"> Bienvenido, <?php echo $user;?></p>
        <img id="logosc2" src="<?php echo base_url();?>Imagenes/logosc2admin.png" alt="SC2 Logo" />
        
        <div id="salir">
            <a href="<?php echo base_url();?>index.php/LoginControl/logout"><input type="image"  src="<?php echo base_url();?>Imagenes/exit.png" /></a>
        </div>
        
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Equipo</a></li>
                <li><a href="#tabs-2">Jugadores</a></li>
            </ul>

            <div id="tabs-1">
               <ul>
                    <li><a href="#insequipo">Inscripción de Equipo</a></li>
                    <li><a href="#modEquipo">Modificar Equipo</a></li>
                    <li><a href="#elimEquipo">Eliminar Equipo</a></li>
                </ul>
                
                <div id="insequipo">
                    <div id="contenido" >
                    <table>
                        <tr>
                            <td>
                    <h1>Inscripción de Equipo</h1>



                    <form action="<?php echo base_url();?>index.php/EquipoControl/registrarEquipo" method="POST" id="formuEquipo">
                   
                    <div id="tourtCombo">
                    <input id="verifica" type="hidden" value="<?php echo $mensaje; ?>"/>
                    <label for="comboTourt">Seleccionar Torneo</label>
                    
                    <select id="comboTourt" name="torneo" >
                        <?php foreach($torneos as $torneo){ ?>
                       <option  value="<?php echo $torneo->getId(); ?>"><?php echo $torneo->getNombre(); ?></option>
                       
                       <?php } ?>
                    </select>
                    </div>
                      
                        <div class="rowElem"><label for="nombreequipo">Nombre del Equipo</label>
                            <input id="nombreequipos" name="txtnombreequipo" value="" type="text"/></div>
                        <div class="rowElem"> <label for="raza">Raza a usar</label>
                            <input type="hidden" name="user" value="<?php echo $user; ?>"/>
                            <input id="rterran" type="radio" name="raza" value="Terran" />Terran
                            <input id="rzerg" type="radio" name="raza" value="Zerg" />Zerg
                            <input id="rprotos"  type="radio" name="raza" value="Protos"/>Protoss
                        </div>    
                        <div class="rowElem"> <label for="paginaequipos">Pagina del Equipo</label>
                            <input id="paginaequipo" name="txtpaginaequipo" value="" type="text"/>
                            <input type="hidden" name="segunfo" id="as"/>
                        </div>
                        <div class="rowElem"><input id="insEquipo" type="submit" value="Inscribir Equipo" /></div>
                        <div class="rowElem"><input id="resEquipo" type="reset" value="Restablecer" /></div>
                        <input type="hidden" name="user" value="<?php echo $user;?>"/>
                       </form>
                       </td>
                       <td>
                        <div class="logo" ><label>Logo del Equipo: </label>

                                <form action="<?php echo base_url();?>uploads/ajaxupload.php" method="post" name="sleeker" id="sleeker">
                                        <input type="hidden" name="maxSize" value="9999999999" />
                                        <input type="hidden" name="maxW" value="200" />
                                        <input type="hidden" name="fullPath" value="uploads/" />
                                        <input type="hidden" name="relPath" value="../uploads/" />
                                        <input type="hidden" name="colorR" value="255" />
                                        <input type="hidden" name="colorG" value="255" />
                                        <input type="hidden" name="colorB" value="255" />
                                        <input type="hidden" name="maxH" value="300" />
                                        <input type="hidden" name="filename" value="filename" />
                                        <input id="ruta1" type="file" name="filename" onchange="ajaxUpload(this.form,'<?php echo base_url();?>uploads/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=<?php echo base_url();?>../uploads/&amp;relPath=uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'<?php echo base_url();?>Imagenes/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'<?php echo base_url();?>Imagenes/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                                 </form>

                        </div>
                        
                               <div id="upload_area">
                                    La imagen será cargada aquí.<br /><br />
                                    Usted puede cambiarla por otra si desea!
                               </div>
                         
                    </td></tr>
                    
                    </table>
                    
                    </div>
                    
                    
                    <div id="agregado">

                         <h1>Inscripción otro Torneo</h1>
                         <?php  if($mensajeExitoInsercionEquipo==null){  ?>
                        <p>Ya has agregado tu equipo</p>
                        <?php }else{ ?>
                        <p> <?php echo $mensajeExitoInsercionEquipo; ?></p>
                         <?php } ?>
                        
                        <?php if($torneos!=null){?>
                        <div id="otrotourtCombo">
                     <form action="<?php echo base_url();?>index.php/EquipoControl/registrarOtroTorneo" method="post">
                    Seleccionar Otro Torneo
                    <select id="comboTourt" name="torneo">
                        
                        <?php foreach($torneos as $torneo){ ?>
                       <option  value="<?php echo $torneo->getId(); ?>"><?php echo $torneo->getNombre(); ?></option>
                       <?php } ?>
                    </select>
                    </div>
                      <?php if($equipo!=null){?>
                    <input type="hidden" name="equipo" value="<?php echo $equipo->get_nombre(); ?>"/>
                          <?php }?>
                    <div id="buttonotro">
                    <input  type="submit" value="Registrar"/>
                    <input type="reset" value="Restablecer"/>
                    </div>
                    <input type="hidden" name="user" value="<?php echo $user;?>"/>
                    </form>

                          <?php }else{ ?>
                          <p>No existe un Torneo Hábil Para Matricularse</p>
                          <?php }?>
                   
                    </div>
                </div>
                
                <div id="modEquipo">
                   
                    <h1>Modificación de Equipo</h1>
                    
                    <?php if($equipo!=null){?>
                     <table>
                        <tr>
                            <td>
                    
                    <?php if($mensajeExitoModificacionEquipo!=null){?>
                    <p> <?php  echo $mensajeExitoModificacionEquipo; ?>   </p>
                    <?php }?>
                    <form action="<?php echo base_url();?>index.php/EquipoControl/modificarEquipo" method="POST" id="formuModificar">

                   

                        <div class="rowElem"><label for="nombreequipo">Nombre del Equipo</label>
                            <input id="nombreequipos" name="txtnombreequipoM" value="" type="text"/></div>
                        <div class="rowElem"> <label for="raza">Raza a usar</label>
                            <input id="rterran" type="radio" name="razaM" value="Terran" />Terran
                            <input id="rzerg" type="radio" name="razaM" value="Zerg" />Zerg
                            <input id="rprotos"  type="radio" name="razaM" value="Protos"/>Protoss
                        </div>
                        <div class="rowElem"> <label for="paginaequipos">Página del Equipo</label>
                            <input id="paginaequipo" name="txtpaginaequipoM" value="" type="text"/>
                            <input type="hidden" name="segunfoM" id="asM"/>
                        </div>
                        <div class="rowElem"><input id="insEquipo" type="submit" value="Modificar Equipo" /></div>
                        <div class="rowElem"><input id="resEquipo" type="reset" value="Restablecer" /></div>
                        <input type="hidden" name="userM" value="<?php echo $user;?>"/>
                       </form>
                       </td>
                       <td>
                        <div class="logo"><label>Logo del Equipo: </label>

                                <form action="<?php echo base_url();?>uploads/ajaxupload.php" method="post" name="sleeker" id="sleeker">
                                        <input type="hidden" name="maxSize" value="9999999999" />
                                        <input type="hidden" name="maxW" value="200" />
                                        <input type="hidden" name="fullPath" value="uploads/" />
                                        <input type="hidden" name="relPath" value="../uploads/" />
                                        <input type="hidden" name="colorR" value="255" />
                                        <input type="hidden" name="colorG" value="255" />
                                        <input type="hidden" name="colorB" value="255" />
                                        <input type="hidden" name="maxH" value="300" />
                                        <input type="hidden" name="filename" value="filename" />
                                        <input id="ruta1M" type="file" name="filename" onchange="ajaxUpload(this.form,'<?php echo base_url();?>uploads/ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=<?php echo base_url();?>../uploads/&amp;relPath=uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_areaM','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'<?php echo base_url();?>Imagenes/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'<?php echo base_url();?>Imagenes/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" />
                                 </form>

                        </div>

                               <div id="upload_areaM">
                                    La imagen será cargada aquí.<br /><br />
                                    Usted puede cambiarla por otra si desea!
                               </div>

                    </td></tr>
                    </table>
                    <?php } else{ ?>
                       <p>Aún no registras a tu equipo</p>
                    <?php } ?>
                </div>
                
                <div id="elimEquipo">
                        <h1>Retirarse de Torneo</h1>
                      
                        <?php if($mensajeEliminacioEquipo!=null){ ?>
                            <?php echo $mensajeEliminacioEquipo; ?>
                        <?php } ?>
                         <?php  if($listaTorneoEliminar!=null){ ?>
                        <form method="POST" action="<?php echo base_url();?>index.php/EquipoControl/eliminarEquipo">
                            
                    <div id="retirTor">
                    Seleccionar Torneo Para Retirarse
                   
                    <select id="comboTourt" name="eli">
                        
                        <?php foreach($listaTorneoEliminar as $torneo){ ?>
                        <option value="<?php echo $torneo->getId(); ?>"><?php echo $torneo->getNombre(); ?></option>
                    </select
                    
                 
                        <?php } ?>
                    <input type="hidden" name="user" value="<?php echo $user; ?>"/>
                    <input  type="submit" value="Eliminar Equipo" />
                    <input type="reset" value="Restablecer" />
                   
                    </div>
                            
                        </form>
                         <?php }else{ ?>
                         <p>No existe un torneo de donde te puedas retirar </p>
                         <?php }?>
                    
                </div>


            </div>  
            
<!--  termina primer tabs-1 -->

            <div id="tabs-2">
                <ul>
                    <li><a href="#insjug">Inscribir Jugadores</a></li>
                    <li><a href="#modjug">Modificar Jugadores</a></li>
                    <li><a href="#elimjug">Eliminar Jugadores</a></li>

                </ul>
                
                <div id="insjug">
                     <h2>Formulario de Inscripción Jugadores</h2>
                    <?php if($listaJugadores==null){  ?>
                            <?php if($equipo!=null){ ?>
                   
                    <form id="jugador" action="<?php echo base_url();?>index.php/EquipoControl/eREgistrarEquipo2" method="post">
                        <div id="rowCombo">
                            Equipo <?php echo $equipo->get_nombre(); ?>
                             <input type="hidden" name="user" value="<?php  echo $user;?>"/>
                            <input id="insJugador" type="submit" value="Inscribir Jugadores" />
                            <input id="resJugador" type="reset" value="Restablecer" />
                        </div>

                        <div class="float-left-half">
                            <div class="ui1">				
                                <fieldset>
                                    <h3>Jugador 1</h3>
                                    <label for="txtNombre1">Nombre</label>
                                    <input type="text" name="txtNombre1" id="txtNombre1" size="10" title="Tu Nombre" placeholder="Tu Nombre"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtApellido1">Apellido</label>
                                    <input type="text" name="txtApellido1" id="txtApellido1" size="10" title="Tu Apellido" placeholder="Tu Apellido"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtNick1">Nick</label>
                                    <input type="text" name="txtNick1" id="txtNick1" size="10" title="Tu Nick" placeholder="Tu Nick"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtDNI1">DNI</label>
                                    <input type="text" name="txtDNI1" id="txtDNI1" size="10" title="Tu DNI" placeholder="Tu DNI"/>
                                </fieldset>
                                <fieldset>
                                   <label for="raza">Raza a usar</label>
                            <input id="rterran" name="raza1" value="Terran" type="radio"/>Terran
                            <input id="rzerg" name="raza1" value="Zerg" type="radio"/>Zerg
                            <input id="rprotos" name="raza1" value="Protoss" type="radio"/>Protoss
                                </fieldset>
                                <fieldset>
                                    <label for="txtDescribete1">Describete</label>
                                    <textarea  name="txtDescribete1" id="txtDescribete1" cols="30" rows="5" >
                                    </textarea>
                                </fieldset>
                                
                                    <div class="ranked">
                                        Ranking BNET<br/>
                                        <input name="rank1" value="diamond" type="radio"/>Diamante <img class="imgranked" src="<?php echo base_url();?>Imagenes/diamond.png"/><br/>
                                        <input name="rank1" value="platinum" type="radio"/>Platino <img class="imgranked" src="<?php echo base_url();?>Imagenes/platinum.png"/> <br/>
                                        <input name="rank1" value="gold" type="radio"/>Oro <img class="imgranked" src="<?php echo base_url();?>Imagenes/gold.png"/><br/>
                                        <input name="rank1" value="silver" type="radio"/>Plata <img class="imgranked" src="<?php echo base_url();?>Imagenes/silver.png"/> <br/>
                                        <input name="rank1" value="bronze" type="radio"/>Bronze  <img class="imgranked" src="<?php echo base_url();?>Imagenes/bronze.png" /><br/>
                                        <input name="rank1" value="m" type="radio"/>Master <img class="imgranked" src="<?php echo base_url();?>Imagenes/m.png" /> <br/>
                                        <input name="rank1" value="gm" type="radio"/>GrandMaster <img class="imgranked" src="<?php echo base_url();?>Imagenes/gm.png"/><br/>
                                    </div>    
             
                            </div>
                        </div>

                        <div class="float-left-half">
                            <div class="ui1">				
                                <fieldset>
                                    <h3>Jugador 2</h3>
                                    <label for="txtNombre2">Nombre</label>
                                    <input type="text" name="txtNombre2" id="txtNombre2" size="10" title="Tu Nombre" placeholder="Tu Nombre"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtApellido2">Apellido</label>
                                    <input type="text" name="txtApellido2" id="txtApellido2" size="10" title="Tu Apellido" placeholder="Tu Apellido"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtNick2">Nick</label>
                                    <input type="text" name="txtNick2" id="txtNick2" size="10" title="Tu Nick" placeholder="Tu Nick"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtDNI2">DNI</label>
                                    <input type="text" name="txtDNI2" id="txtDNI2" size="10" title="Tu DNI" placeholder="Tu DNI"/>
                                </fieldset>
                              <fieldset>
                                   <label for="raza">Raza a usar</label>
                            <input id="rterran" name="raza2" value="Terran" type="radio"/>Terran
                            <input id="rzerg" name="raza2" value="Zerg" type="radio"/>Zerg
                            <input id="rprotos" name="raza2" value="Protoss" type="radio"/>Protoss
                                </fieldset>
                                <fieldset>
                                    <label for="txtDescribete2">Describete</label>
                                    <textarea name="txtDescribete2" id="txtDescribete2" cols="30" rows="5" >
                                    </textarea>
                                </fieldset>
                            
                                <div class="ranked">Ranking BNET<br/>
                                    <input name="rank2" value="diamond" type="radio" />Diamante <img class="imgranked" src="<?php echo base_url();?>Imagenes/diamond.png" width="30px" height="30px"/><br/>
                                    <input name="rank2" value="platinum" type="radio"/>Platino <img class="imgranked" src="<?php echo base_url();?>Imagenes/platinum.png" width="30px" height="30px"/> <br/>
                                    <input name="rank2" value="gold" type="radio"/>Oro <img class="imgranked" src="<?php echo base_url();?>Imagenes/gold.png" width="30px" height="30px"/><br/>
                                    <input name="rank2" value="silver" type="radio"/>Plata <img class="imgranked" src="<?php echo base_url();?>Imagenes/silver.png" width="30px" height="30px"/> <br/>
                                    <input name="rank2" value="bronze" type="radio"/>Bronze  <img class="imgranked" src="<?php echo base_url();?>Imagenes/bronze.png" width="30px" height="30px"/><br/>
                                    <input name="rank2" value="m" type="radio"/>Master <img class="imgranked" src="<?php echo base_url();?>Imagenes/m.png" width="30px" height="30px"/> <br/>
                                    <input name="rank2" value="gm" type="radio"/>GrandMaster <img class="imgranked" src="<?php echo base_url();?>Imagenes/gm.png" width="30px" height="30px"/><br/>
                                    <input type="hidden" name="user" value="<?php echo $user; ?>"/>
                                </div>    										
                            </div>
                        </div>

                    </form>
                    <?php } else{ ?>
                    <p>No tiene ningún equipo registrado</p>
                     <?php }  ?>
                    <?php } ?>

                    <?php if(count($listaJugadores)==1){ ?>
                    <h2>Formulario de Inscripción Jugadores</h2>
                    <form id="jugador1" action="<?php echo base_url();?>index.php/EquipoControl/eRegistrarEquipo1" method="post">
                        <div id="rowCombo">
                            Equipo <?php echo $equipo->get_nombre(); ?>
                            <input type="hidden" name="user" value="<?php  echo $user;?>"/>
                            <input id="insJugador" type="submit" value="Inscribir Jugadores" />
                            <input id="resJugador" type="reset" value="Restablecer" />
                        </div>

                        <div class="float-left-half">
                            <div class="ui1">
                                <fieldset>
                                    <h3>Jugador 2</h3>
                                    <label for="txtNombre1">Nombre</label>
                                    <input type="text" name="txtNombre3" id="txtNombre3" size="10" title="Tu Nombre" placeholder="Tu Nombre"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtApellido1">Apellido</label>
                                    <input type="text" name="txtApellido3" id="txtApellido3" size="10" title="Tu Apellido" placeholder="Tu Apellido"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtNick1">Nick</label>
                                    <input type="text" name="txtNick3" id="txtNick3" size="10" title="Tu Nick" placeholder="Tu Nick"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtDNI1">DNI</label>
                                    <input type="text" name="txtDNI3" id="txtDNI3" size="10" title="Tu DNI" placeholder="Tu DNI"/>
                                </fieldset>
                                   <fieldset>
                                   <label for="raza">Raza a usar</label>
                            <input id="rterran" name="raza3" value="Terran" type="radio"/>Terran
                            <input id="rzerg" name="raza3" value="Zerg" type="radio"/>Zerg
                            <input id="rprotos" name="raza3" value="Protoss" type="radio"/>Protoss
                                </fieldset>
                                <fieldset>
                                    <label for="txtDescribete1">Describete</label>
                                    <textarea  name="txtDescribete3" id="txtDescribete3" cols="30" rows="5" >
                                    </textarea>
                                </fieldset>
                                    <div class="ranked">
                                        Ranking BNET<br/>
                                        <input name="rank3" value="diamond" type="radio"/>Diamante <img class="imgranked" src="<?php echo base_url();?>Imagenes/diamond.png"/><br/>
                                        <input name="rank3" value="platinum" type="radio"/>Platino <img class="imgranked" src="<?php echo base_url();?>Imagenes/platinum.png"/> <br/>
                                        <input name="rank3" value="gold" type="radio"/>Oro <img class="imgranked" src="<?php echo base_url();?>Imagenes/gold.png"/><br/>
                                        <input name="rank3" value="silver" type="radio"/>Plata <img class="imgranked" src="<?php echo base_url();?>Imagenes/silver.png"/> <br/>
                                        <input name="rank3" value="bronze" type="radio"/>Bronze  <img class="imgranked" src="<?php echo base_url();?>Imagenes/bronze.png" /><br/>
                                        <input name="rank3" value="m" type="radio"/>Master <img class="imgranked" src="<?php echo base_url();?>Imagenes/m.png" /> <br/>
                                        <input name="rank3" value="gm" type="radio"/>GrandMaster <img class="imgranked" src="<?php echo base_url();?>Imagenes/gm.png"/><br/>
                                    </div>

                            </div>
                        </div>
                      </form>
                    <?php } ?>
                    <?php if(count($listaJugadores)==2){ ?>
                    <p>Ya Registraste tus dos Jugadores</p>
                    <?php } ?>
                </div>
                
                <div id="modjug">

                    <h2>Modificación de Jugadores</h2>
                    <?php  if($listaJugadores==null){  ?>
                       <p>Primero debes Registrar Tus Jugadores</p>
                    <?php }?>
                    <?php  if(count($listaJugadores)==2){ ?>

                     <form  action="<?php echo base_url();?>index.php/EquipoControl/eModificar2" method="post">
                        <div id="rowCombo">
                              Equipo <?php echo $equipo->get_nombre(); ?>
                            <input type="hidden" name="user" value="<?php  echo $user;?>"/>
                            <input type="hidden" name="jugador1" value="<?php echo $listaJugadores[0]->get_id()?>"/>
                            <input type="hidden" name="jugador2" value="<?php echo $listaJugadores[1]->get_id()?>"/>
                            <input id="insJugador" type="submit" value="Inscribir Jugadores" />
                            <input id="resJugador" type="reset" value="Restablecer" />
                        </div>

                        <div class="float-left-half">
                            <div class="ui1">
                                <fieldset>
                                    <h3>Jugador 1</h3>
                                    <label for="txtNombre1">Nombre</label>
                                    <input type="text" nane="mtxtNombre1" id="mtxtNombre1" size="10" title="Tu Nombre" placeholder="Tu Nombre"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtApellido1">Apellido</label>
                                    <input type="text" name="mtxtApellido1" id="mtxtApellido1" size="10" title="Tu Apellido" placeholder="Tu Apellido"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtNick1">Nick</label>
                                    <input type="text" name="mtxtNick1" id="mtxtNick1" size="10" title="Tu Nick" placeholder="Tu Nick"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtDNI1">DNI</label>
                                    <input type="text" name="mtxtDNI1" id="mtxtDNI1" size="10" title="Tu DNI" placeholder="Tu DNI"/>
                                </fieldset>
                                <fieldset>
                                   <label for="raza">Raza a usar</label>
                            <input id="rterran" name="mraza1" value="Terran" type="radio"/>Terran
                            <input id="rzerg" name="mraza1" value="Zerg" type="radio"/>Zerg
                            <input id="rprotos" name="mraza1" value="Protoss" type="radio"/>Protoss
                                </fieldset>
                                <fieldset>
                                    <label for="txtDescribete1">Describete</label>
                                    <textarea name="mtxtDescribete1" id="mtxtDescribete1" cols="30" rows="5" >
                                    </textarea>
                                </fieldset>
                                    <div class="ranked">
                                        Ranking BNET<br/>
                                        <input name="mrank1" value="diamond" type="radio"/>Diamante <img class="imgranked" src="<?php echo base_url();?>Imagenes/diamond.png"/><br/>
                                        <input name="mrank1" value="platinum" type="radio"/>Platino <img class="imgranked" src="<?php echo base_url();?>Imagenes/platinum.png"/> <br/>
                                        <input name="mrank1" value="gold" type="radio"/>Oro <img class="imgranked" src="<?php echo base_url();?>Imagenes/gold.png"/><br/>
                                        <input name="mrank1" value="silver" type="radio"/>Plata <img class="imgranked" src="<?php echo base_url();?>Imagenes/silver.png"/> <br/>
                                        <input name="mrank1" value="bronze" type="radio"/>Bronze  <img class="imgranked" src="<?php echo base_url();?>Imagenes/bronze.png" /><br/>
                                        <input name="mrank1" value="m" type="radio"/>Master <img class="imgranked" src="<?php echo base_url();?>Imagenes/m.png" /> <br/>
                                        <input name="mrank1" value="gm" type="radio"/>GrandMaster <img class="imgranked" src="<?php echo base_url();?>Imagenes/gm.png"/><br/>
                                    </div>

                            </div>
                        </div>

                        <div class="float-left-half">
                            <div class="ui1">
                                <fieldset>
                                    <h3>Jugador 2</h3>
                                    <label for="txtNombre2">Nombre</label>
                                    <input type="text" name="mtxtNombre2" id="mtxtNombre2" size="10" title="Tu Nombre" placeholder="Tu Nombre"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtApellido2">Apellido</label>
                                    <input type="text" name="mtxtApellido2" id="mtxtApellido2" size="10" title="Tu Apellido" placeholder="Tu Apellido"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtNick2">Nick</label>
                                    <input type="text" name="mtxtNick2" id="mtxtNick2" size="10" title="Tu Nick" placeholder="Tu Nick"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtDNI2">DNI</label>
                                    <input type="text" name="mtxtDNI2" id="mtxtDNI2" size="10" title="Tu DNI" placeholder="Tu DNI"/>
                                </fieldset>
                                <fieldset>
                                   <label for="raza">Raza a usar</label>
                            <input id="rterran" name="mraza2" value="Terran" type="radio"/>Terran
                            <input id="rzerg" name="mraza2" value="Zerg" type="radio"/>Zerg
                            <input id="rprotos" name="mraza2" value="Protoss" type="radio"/>Protoss
                                </fieldset>
                                <fieldset>
                                    <label for="txtDescribete2">Describete</label>
                                    <textarea name="mtxtDescribete2" id="mtxtDescribete2" cols="30" rows="5" >
                                    </textarea>
                                </fieldset>

                                <div class="ranked">Ranking BNET<br/>
                                    <input name="mrank2" value="diamond" type="radio"/>Diamante <img class="imgranked" src="<?php echo base_url();?>Imagenes/diamond.png" width="30px" height="30px"/><br/>
                                    <input name="mrank2" value="platinum" type="radio"/>Platino <img class="imgranked" src="<?php echo base_url();?>Imagenes/platinum.png" width="30px" height="30px"/> <br/>
                                    <input name="mrank2" value="gold" type="radio"/>Oro <img class="imgranked" src="<?php echo base_url();?>Imagenes/gold.png" width="30px" height="30px"/><br/>
                                    <input name="mrank2" value="silver" type="radio"/>Plata <img class="imgranked"  src="<?php echo base_url();?>Imagenes/silver.png" width="30px" height="30px"/> <br/>
                                    <input name="mrank2" value="bronze" type="radio"/>Bronze  <img class="imgranked" src="<?php echo base_url();?>Imagenes/bronze.png" width="30px" height="30px"/><br/>
                                    <input name="mrank2" value="m" type="radio"/>Master <img class="imgranked" src="<?php echo base_url();?>Imagenes/m.png" width="30px" height="30px"/> <br/>
                                    <input name="mrank2" value="gm" type="radio"/>GrandMaster <img class="imgranked" src="<?php echo base_url();?>Imagenes/gm.png" width="30px" height="30px"/><br/>
                                </div>
                            </div>
                        </div>

                    </form>
                    <?php } ?>

                    <?php if(count($listaJugadores)==1){ ?>

                    <form  action="<?php echo base_url();?>index.php/EquipoControl/eModificar1" method="post">

                            <div id="rowCombo">
                            Equipo <?php echo $equipo->get_nombre(); ?>
                            <input type="hidden" name="user" value="<?php  echo $user;?>"/>
                            <input type="hidden" name="jugador" value="<?php echo $listaJugadores[0]->get_id()?>"/>

                            <input id="insJugador" type="submit" value="Inscribir Jugadores" />
                            <input id="resJugador" type="reset" value="Restablecer" />
                        </div>

                        <div class="float-left-half">
                            <div class="ui1">
                                <fieldset>
                                    <h3>Jugador 1</h3>
                                    <label for="txtNombre1">Nombre</label>
                                    <input type="text" name="mtxtNombre3" id="mtxtNombre3" size="10" title="Tu Nombre" placeholder="Tu Nombre"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtApellido1">Apellido</label>
                                    <input type="text" name="mtxtApellido3" id="mtxtApellido3" size="10" title="Tu Apellido" placeholder="Tu Apellido"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtNick1">Nick</label>
                                    <input type="text" name="mtxtNick3" id="mtxtNick3" size="10" title="Tu Nick" placeholder="Tu Nick"/>
                                </fieldset>
                                <fieldset>
                                    <label for="txtDNI1">DNI</label>
                                    <input type="text" name="mtxtDNI3" id="mtxtDNI3" size="10" title="Tu DNI" placeholder="Tu DNI"/>
                                </fieldset>
                                 <fieldset>
                                   <label for="raza">Raza a usar</label>
                            <input id="rterran" name="mraza3" value="Terran" type="radio"/>Terran
                            <input id="rzerg" name="mraza3" value="Zerg" type="radio"/>Zerg
                            <input id="rprotos" name="mraza3" value="Protoss" type="radio"/>Protoss
                                </fieldset>
                                <fieldset>
                                    <label for="txtDescribete1">Describete</label>
                                    <textarea name="mtxtDescribete3" id="mtxtDescribete3" cols="30" rows="5" >
                                    </textarea>
                                </fieldset>
                                    <div class="ranked">
                                        Ranking BNET<br/>
                                        <input name="mrank3" value="diamond" type="radio"/>Diamante <img class="imgranked" src="<?php echo base_url();?>Imagenes/diamond.png"/><br/>
                                        <input name="mrank3" value="platinum" type="radio"/>Platino <img class="imgranked" src="<?php echo base_url();?>Imagenes/platinum.png"/> <br/>
                                        <input name="mrank3" value="gold" type="radio"/>Oro <img class="imgranked" src="<?php echo base_url();?>Imagenes/gold.png"/><br/>
                                        <input name="mrank3" value="silver" type="radio"/>Plata <img class="imgranked" src="<?php echo base_url();?>Imagenes/silver.png"/> <br/>
                                        <input name="mrank3" value="bronze" type="radio"/>Bronze  <img class="imgranked" src="<?php echo base_url();?>Imagenes/bronze.png" /><br/>
                                        <input name="mrank3" value="m" type="radio"/>Master <img class="imgranked" src="<?php echo base_url();?>Imagenes/m.png" /> <br/>
                                        <input name="mrank3" value="gm" type="radio"/>GrandMaster <img class="imgranked" src="<?php echo base_url();?>Imagenes/gm.png"/><br/>
                                    </div>

                            </div>
                        </div>
                        </form>
                    <?php } ?>

                   
                </div>
                
                
                <div id="elimjug">
                   <h1>Eliminación de Jugadores</h1>
                        <?php if ($equipo!=null) { ?>
                        <form method="POST" action="<?php echo base_url();?>index.php/EquipoControl/eliminar">
                            
                    <div>
                    <label for="comboTourt">Seleccionar Jugador</label>
                    <select id="comboTourt" name="selecEquipo">
                        
                        <option value="0">Todos</option>
                        <?php foreach($listaJugadores as $jugador){ ?>
                        <option value="<?php echo $jugador->get_id(); ?>"><?php echo $jugador->get_nombre(); ?></option>
                        <?php } ?>
                        
                        
                    </select>
                    <input type="hidden" name="user" value="<?php echo $user; ?>"/>
                    <input  type="submit" value="Eliminar  Jugador" />
                    <input type="reset" value="Restablecer" />
                     </div>
                        </form>
                   <?php } else { ?>
                         <p>No tienes ningún jugador para eliminar</p>
                   <?php } ?>
                  </div>
            </div>
        <!-- Cierro tag 2 -->
        </div>
        <div id="footer">
            <img id="blizzard" src="<?php echo base_url();?>Imagenes/blizzard.png" alt="SC2 Logo" />
            <p id="footerp">©2011 Blizzard Entertainment.All Rights Reserved. <br /> WORLD CYBER GAMES, Inc. All Rights Reserved.</p>
            <img id="wcg" src="<?php echo base_url();?>Imagenes/wcg.png" alt="SC2 Logo" />
        </div>         
   </body>
</html>