<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Starcraft II Torneos</title>
        
        <meta name="title" content="Torneo StarCraft 2"/>
        <meta name="author" content="Eduardo Arenas, Anghelo Barboza, Gabriel Lucano, Jeffrey Pinedo, Jorge Valverde"/>
        <meta name="robots" content="all,follow,index"/>
        <meta name="keywords" content="starcraft2, starcraft, Starcraft2, starCraft2, StarCraft2, torneos de starcraft2, torneo, torneos"/>
        <meta name="description" content="Pagina Web de Administracion de Torneos de StartCraft 2"/>
        
        <link type="text/css" href="<?php echo base_url();?>css/cliente.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url();?>css/style12.css" rel="stylesheet" />
        
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
        <link type="text/css" href="<?php echo base_url();?>css/jquery-ui-1.7.3.custom.css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.7.3.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/Inicio.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.nivo.zoom.pack.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/ajaxupload.js"></script>
        
        
        <script type="text/javascript">
            
           function showWinner( gameID )
            {
            $('#winnerOff_'+gameID).hide();
            $('#winnerOn_'+gameID).show();
            }
            
            function resultsOver( gameID )
            {
                $('#subagame'+gameID).show();
                $('#subbgame'+gameID).show();
            }
            function resultsOut( gameID )
            {
                $('#subagame'+gameID).hide();
                $('#subbgame'+gameID).hide();
            }
            
        </script>


        <script type="text/javascript">
            $(function(){
                // Tabs
                $('#tabs').tabs({
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
                $('#tabs-5').tabs({
                    cookie: {
                        // store cookie for a day, without, it would be a session cookie
                        expires: 1
                    }
                });
                $('#tabs-6').tabs({
                    cookie: {
                        // store cookie for a day, without, it would be a session cookie
                        expires: 1
                    }
                });
                $('#tabs-7').tabs({
                    cookie: {
                        // store cookie for a day, without, it would be a session cookie
                        expires: 1
                    }
                });
                
            });

            $(document).ready(function(){
                
                
                
                var currentPosition = 0;

  var slideWidth = 1100;

  var slides = $('.slide');

  var numberOfSlides = slides.length;



  // Remove scrollbar in JS

  $('#slidesContainer').css('overflow', 'hidden');



  // Wrap all .slides with #slideInner div

  slides

    .wrapAll('<div id="slideInner"></div>')

    // Float left to display horizontally, readjust .slides width

	.css({

      'float' : 'left',

      'width' : slideWidth

    });
    
    $('#slideInner').css('width', slideWidth * numberOfSlides);
    
   $('#noticias')

    .prepend('<input type="image" class="control" id="leftControl" src="<?php echo base_url();?>Imagenes/back.png"/>')

    .append('<input type="image" class="control" id="rightControl" src="<?php echo base_url();?>Imagenes/next.png" />');
    
    
    // Hide left arrow control on first load
  manageControls(currentPosition);

  // Create event listeners for .controls clicks
  $('.control')
    .bind('click', function(){
    // Determine new position
	currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
    
	// Hide / show controls
    manageControls(currentPosition);
    // Move slideInner using margin-left
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  });

  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $('#leftControl').hide() } else{ $('#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $('#rightControl').hide() } else{ $('#rightControl').show() }
  }	

                
                   
                    

                    "<?php foreach($torneos as $torneo) {?>"
                           $("#a<?php echo $torneo->getId(); ?>").hide();
                        "<?php }?>"
                        "<?php foreach($torneos as $torneo) {?>"
                            if($("#comboTourt").val()=="<?php echo $torneo->getId(); ?>"){
                                $("#a<?php echo $torneo->getId(); ?>").show();

                            }

                        "<?php }?>"



                 $("#comboTourt").change(function(){
                     var d = $("#comboTourt").val();
                        "<?php foreach($torneos as $torneo) {?>"
                           $("#a<?php echo $torneo->getId(); ?>").hide();
                        "<?php }?>"
                        "<?php foreach($torneos as $torneo) {?>"
                            if(d=="<?php echo $torneo->getId(); ?>"){
                                $("#a<?php echo $torneo->getId(); ?>").show();

                            }

                        "<?php }?>"

                 });
            });

        </script>   


    </head>

    <body>
        
        <img id="raynorimg" src="<?php echo base_url();?>Imagenes/marine.png" alt="Raynor" />
        <img id="bc" src="<?php echo base_url();?>Imagenes/cruiser.png" alt="BattleCruiser" />
       
         <img id="hydra" src="<?php echo base_url();?>Imagenes/hydra.png" alt="hydra" />
         <img id="zealot" src="<?php echo base_url();?>Imagenes/zealot.png" alt="zealot" />
        
        <img id="logosc2" src="<?php echo base_url();?>Imagenes/logosc2equipos.png" alt="SC2 Logo" />
        <div id ="social">
            <a href="http://www.facebook.com/"><input id="facebook" type="image"  src="<?php echo base_url();?>Imagenes/facebook.png" title="Síguenos en Facebook" alt="fb" /> </a>
            <a href="http://twitter.com/"><input id="twitter" type="image" src="<?php echo base_url();?>Imagenes/twitter.png" title="Síguenos en Twitter" alt="twitter" /></a>
            <a href="http://www.youtube.com" ><input id="youtube" type="image"  src="<?php echo base_url();?>Imagenes/youtube-icon.png" title="Síguenos en Youtube" alt="youtube" /></a>
        </div >    

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Noticias</a></li>
                <li><a href="#tabs-2">Mirar en Vivo</a></li>
                <li><a href="#tabs-3">Inscribe a tu Equipo</a></li>
                <li><a href="#tabs-4">Equipos</a></li>
                <li><a href="#tabs-5">Resultados</a></li>
                <li><a href="#tabs-6">Horarios</a></li>
                <li><a href="#tabs-7">Replays</a></li>
            </ul>
            <div id="tabs-1">
                 <!------------------------------------------------SLIDER NOTICIAS-------------------------------------------------------->
                
                <div id="noticias">
                    <?php if( $noticiasDestacadas!= null) { ?>
                    
                        <div id="slidesContainer">
                        <?php foreach($noticiasDestacadas as $n){?>
                        <div class="slide"  >
                                <h1><?php echo $n->getTitulo();?></h1>
                                <img class="imagenNoticia" src="http://localhost/Starcraft-Admin/uploads/noticia/<?php echo $n->getId();?>.png"/>
                                <p><?php echo $n->getDescripcion();?></p>

                        </div>
                        <?php }?>

                        </div>  
                    <?php } else {?>
                        <p>No hay Ninungna Noticia destacada para mostrar</p>
                    <?php } ?>
                
            </div>
            </div>
            <div id="tabs-2">
                 <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaLive">
                Seleccionar Torneo
                    <select name="torneoLive">
                        <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                    </select>
                <input name="fhl" type="hidden" value="<?php date_default_timezone_set('America/Lima'); echo date('H'); ?>" />
               <input name="dia" type="hidden" value="<?php date_default_timezone_set('America/Lima'); echo date('d'); ?>" />
                <input type="submit" value="Ver Partida en Vivo" />
                </form>
                
                <?php if($partida!=null) {?>
                
                <div id="partidasLive">
                <h1><?php echo $partida->get_equipo1()." VS ".$partida->get_equipo2(); ?> ° Fase: <?php echo $partida->get_fase(); ?></h1>
                   
                
                <iframe id="videoVivo" width="960" height="515" src="<?php echo $partida->get_replay(); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
                <?php } else { ?>
                <p id="ptech">No hay Partidas en Vivo en el Momento, Traté Visitarnos más Tarde </p>
                <img id="tech" alt="Support" src="<?php echo base_url();?>Imagenes/scv.png" />
                <?php } ?>
                </div>

            <div id="tabs-3">
                <ul>
                    <li><a href="#reglas">Reglas</a></li>
                    <li><a href="#premios">Premios</a></li>
                    <li><a href="#equipo">Equipo</a></li>
                    <li><a href="#jugadores">Jugadores</a></li>
                </ul>
                <div id="reglas">
                    <div id="descReglas">
                        <h1>Reglas</h1>
                        <p>Digan lo que digan y hagan lo que hagan, no puede existir un torneo sin que el Clasico de Blizzard este presente. Abran paso al rey ! </p>
                        <p>El Torneo de StarCraft esta siendo patrocinado por Antec, los cuales estaran proveyendo al ganador de un fabuloso case de ultima generacion. El Torneo de StarCraft aparece justo en la epoca donde la expectativa crece dado que la nueva version, StarCraft 2, ya ha sido anunciada con bombos y platillos por Blizzard.</p>

                        <p>Las reglas del torneo son las siguientes :<br/>
                            - Version de Juego : StarCraft : BroodWar Patch 1.16.1<br/>
                            - Modo de Competencia : Melee 1vs1<br/>
                            - Velocidad : Fastest<br/>
                            - Mapas : Blue Storm, Python, Tau Cross, Destination<br/>
                            - Todos los Replays deben ser grabados.<br/>
                            - Prohibido aliarse con jugadores enemigos para evitar ataques (Minas Terran, etc)<br/>
                            - Cualquier bug detectado (Flying Drone, Construcciones Terran para destruir unidades incluido Engineering Bay con construcciones, Lurker Burrow Bug, Templar Bug, SCV Bug, Bugs de Agrupamiento, Waypoint Bug, etc.) significa una descalificacion. Esto debe ser constatado en el Replay a la hora de terminar el juego.<br/>
                            - Desconexiones intencionales seran motivo de descalificacion.<br/>
                            - Si se desconecta alguien antes de los 3 minutos se reinicia la partida, luego se realiza un analisis del partido y si no habia un claro vencedor, se reinicia (Juicio de Arbitro).<br/>
                            - Cualquier Hack sera sancionado.</p>
                        <p>Este torneo se juega en el BYOC, mas la gran final sera jugada en pantallas gigantes para beneplacito de todos los asistentes. Asi que sientan el poder del Dominio Terran, dejense llevar por la furia Zerg o encomiendense a Adun .. que es hora de demostrar quien es el mejor !</p>
                    </div>

                </div>

                <div id="premios">
                    <div id="descPremios">
                        <h1>Premios</h1>
                        <p>Organizamos torneos online de Starcraft 2, seleccione un torneo para ver sus siguientes premios: </p>
                        <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/verPremios">
                            <select id="comboTourt" name="torneoPremios">
                                <?php  foreach($torneos as $torneo){ ?>
                                    <option  value="<?php echo $torneo->getId(); ?>"><?php echo $torneo->getNombre(); ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" value="Ver Premios"/>
                        </form>
                        <?php if($torneoPremios!=null){?>
                            <p>1er Puesto: <?php echo $torneoPremios->getPremioPrimero();?> </p>
                            <p>2do Puesto: <?php echo $torneoPremios->getPremioSegundo();?> </p>
                            <p>3er Puesto: <?php echo $torneoPremios->getPremioTercero();?> </p>
                        <?php }else{?>
                            <p>Seleccione un torneo.</p>
                            <?php }?>
                        <p>El reglamento del mismo, así como las inscripciones, las pueden encontrar en la pestaña anterios.
                             Para inscribirse es necesario registrar su equipo, para luego los jugadores, pero primero yendo 
                             a la pestaña Equipo o Jugadorres. 
                            <br/>
                            <br/>Encontrarán mayores detalles en el reglamento!<br/><br/>¡Esperamos que participen! </p>
                    </div>

                </div>

                <div id="equipo">
                 
                    <div id="descEquipo">
                        <h1>Inscribe a tu Equipo</h1>
                        <p class="linkIs"   >Para poder Inscribir a tu Equipo, O si ya lo tienes accede aqui: <a href ="<?php echo base_url();?>index.php/TorneoControl/irALogin">CLICK AQUÍ</a></p>
                        <img id="sc2teampage" src="<?php echo base_url();?>Imagenes/teamsc2.png" />
                    </div>
                 

                </div>
                
                <div id="jugadores">
                   <div id="descJug">
                        <h1>Inscribe a tus Jugadores</h1>
                        <p class="linkIs">Para poder Inscribir a los jugadores, O si ya los inscribiste accede aqui: <a href ="<?php echo base_url();?>index.php/TorneoControl/irALogin">CLICK AQUÍ</a></p>
                         <img id="sc2teampage" src="<?php echo base_url();?>Imagenes/teamsc2.png"/>
                   </div>
                </div>
            </div>

            <div id="tabs-4">
                <div id="tourtCombo">
                    <label for="comboTourt">Seleccionar Torneo</label>
                    
                    <select id="comboTourt" style="width:300px">
                       <?php  foreach($torneos as $torneo){ ?>
                             <option  value="<?php echo $torneo->getId(); ?>"><?php echo $torneo->getNombre(); ?></option>
                         <?php } ?>
                    </select>
                </div>
                <div id="allteams">
                    <?php foreach($torneos as $torneo){ $equip=$torneo->get_equipos();?>
                        <?php if($equip!=null){ ?>
                            <div id="a<?php echo $torneo->getId(); ?>">
                             <?php  $valor= count($equip)/4; ?>
                             <?php $count2=1;for($i=0;$i<$valor;$i++){?>
                                <div class="teamRow">
                                 <?php $count=1;for($j=$i*4;$j<=$i*4+3;$j++){  ?>
                                        <?php if($count2>count($equip)){break;} ?>
                                        <div class="teamBlock teamBlock<?php echo $count;?>">
                                            <div class="teamImage"><img src="<?php echo base_url();?>ImageEquipos/<?php echo $equip[$j]->get_nombre(); ?>.png" border="0" /></div>
                                            <div class="teamName"><?php echo $equip[$j]->get_nombre(); ?></div>
                                            <div class="teamRace"><img src="<?php echo base_url();?>Imagenes/<?php echo $equip[$j]->get_raza();?>.png" width="40" height="40" border="0" /><?php echo $equip[$j]->get_raza(); ?></div>
                                        
                                        <div class="teamPlayersTxt">P L A Y E R S</div>
                                        
                                        <div class="teamPlayers">
                                            <?php $jugadores=$equip[$j]->get_jugadores();if($jugadores!=null){ foreach($jugadores as $jugador){ ?>
                               
                                            <a href="#" class='tooltip' title="<?php echo $jugador->get_descripcion() ?>"><?php echo $jugador->get_nombre(); ?> <span class="nickname"><?php echo $jugador->get_nick(); ?></span> <?php echo $jugador->get_apellido(); ?></a>  <img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/<?php echo $jugador->get_ranking(); ?>.png" width="30px" height="30px" /> <br/>
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div class="teamPage"><a href="<?php echo $equip[$j]->get_pagina(); ?>">Team page</a><img src="<?php echo base_url();?>Imagenes/link.gif" width="20" height="20" border="0" /></div>
                                        </div>
                                 <?php $count2++; $count++; } ?>
                                </div>
                             <?php $count=0;} ?>
                           </div>
                     <?php } ?>
                    <?php }?>
                   </div>
                 
            </div>
            
            <div id="tabs-5">

                <ul>
                    <li><a href="#grupos">Grupos</a></li>
                    <li><a href="#torneo">Torneo</a></li>
                    <li><a href="#detallePartida">Ver Detalle Partida</a></li>
                </ul>
                <div id="grupos">
                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/verGrupos">
                        <div id="grCombo">
                        Seleccionar Torneo
                        <?php if($torneosLlenos !=null){?>
                            <select id="comboTourt2" name="torneosLlenosResultados">
                                <option disabled="true" value="">-- Elija un Torneo --</option>
                                <?php foreach ($torneosLlenos as $torneo){?>
                                <option value="<?php echo $torneo->getId();?>"><?php echo $torneo->getNombre();?></option>
                                <?php }?>
                            </select>
                        <input type="submit" value="Ver Grupos"/>
                        </div>
                        <?php }else{?>
                        <p>No hay torneos activos. Regístrate a uno para participar!</p>
                        <?php }?>
                    </form>

                    <div id="resultsGroupStage">
                        <div id="resultsBlockDescrption">
                        </div>
                        <?php if($equiposEnGrupos!=null){?>
                        <div class="groupResultsBlock" id="groupResultsBlockA">
                            <div class="groupLetter">Group A</div>
                            <div class="wins">Wins</div>
                            <div class="losses">Losses</div>
                            <table id="grupoA">
                                <?php foreach($grupoA as $equipo){?>
                                <tr>
                                    <td><img class="equipoImg" src="<?php echo base_url();?>ImageEquipos/<?php echo $equipo->get_nombre();?>.png" alt=""/></td>
                                    <td class="equipoNombre"><?php echo $equipo->get_nombre();?></td>
                                    <td class="equipoGanadas"><?php echo $equipo->get_ganadas();?></td>
                                    <td class="equipoPerdidas"><?php echo $equipo->get_perdidas();?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="groupResultsBlock" id="groupResultsBlockB">
                            <div class="groupLetter">Group B</div>
                            <div class="wins">Wins</div>
                            <div class="losses">Losses</div>
                            <table id="grupoB">
                                <?php foreach($grupoB as $equipo){?>
                                <tr>
                                    <td><img class="equipoImg" src="<?php echo base_url();?>ImageEquipos/<?php echo $equipo->get_nombre();?>.png" alt=""/></td>
                                    <td class="equipoNombre"><?php echo $equipo->get_nombre();?></td>
                                    <td class="equipoGanadas"><?php echo $equipo->get_ganadas();?></td>
                                    <td class="equipoPerdidas"><?php echo $equipo->get_perdidas();?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="groupResultsBlock" id="groupResultsBlockC">
                            <div class="groupLetter">Group C</div>
                            <div class="wins">Wins</div>
                            <div class="losses">Losses</div>
                            <table id="grupoC">
                                <?php foreach($grupoC as $equipo){?>
                                <tr>
                                    <td><img class="equipoImg" src="<?php echo base_url();?>ImageEquipos/<?php echo $equipo->get_nombre();?>.png" alt=""/></td>
                                    <td class="equipoNombre"><?php echo $equipo->get_nombre();?></td>
                                    <td class="equipoGanadas"><?php echo $equipo->get_ganadas();?></td>
                                    <td class="equipoPerdidas"><?php echo $equipo->get_perdidas();?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="groupResultsBlock" id="groupResultsBlockD">
                            <div class="groupLetter">Group D</div>
                            <div class="wins">Wins</div>
                            <div class="losses">Losses</div>
                            <table id="grupoD">
                                <?php foreach($grupoD as $equipo){?>
                                <tr>
                                    <td><img class="equipoImg" src="<?php echo base_url();?>ImageEquipos/<?php echo $equipo->get_nombre();?>.png" alt=""/></td>
                                    <td class="equipoNombre"><?php echo $equipo->get_nombre();?></td>
                                    <td class="equipoGanadas"><?php echo $equipo->get_ganadas();?></td>
                                    <td class="equipoPerdidas"><?php echo $equipo->get_perdidas();?></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <?php }else{?>
                        <p>Seleccione un torneo para ver el detalle de los grupos de éste.</p>
                        <?php }?>
                    </div>

                </div>
                <div id="torneo">
                <?php if($equiposEnGrupos!=null){?>
                    <div id="winnerBracketOuter">
                <?php }else{?>
                    <div id="winnerBracketOuter1">
                <?php }?>
                        <div id="comboTourt3">
                            <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/verMapa">
                                <p><label for="comboTourt2">Seleccionar Torneo</label></p><br/>
                                <?php if($torneosLlenos !=null){?>
                                <p><select id="comboTourt2" name="torneosLlenosResultados">
                                        <option disabled="true" value="">-- Elija un Torneo --</option>
                                        <?php foreach ($torneosLlenos as $torneo){?>
                                        <option value="<?php echo $torneo->getId();?>"><?php echo $torneo->getNombre();?></option>
                                        <?php }?>
                                    </select></p>
                                <input type="submit" value="Ver Fase de Eliminatorias"/>
                                <?php }else{?>
                                    <p>No hay torneos activos. Regístrate a uno para participar!</p>    
                                <?php }?>
                            </form>
                        </div>
                <?php if($equiposEnGrupos!=null){?>
                        <div id="winnerBracket">
                    <!--------------------Cuartos de Final-------------------->
                            <div id="teamagame1" onmouseover="resultsOver(1)" onmouseout="resultsOut(1)"  class="positionBlock">
                                <?php if($primeroA!=null){?>
                                <div  class="subTag" id="subagame1"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroA->get_nombre().'/'.$segundoB->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span> </div>
                                <div class="gameBlockTeamName" id="match1a_name"><?php echo $primeroA->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match1a_name">1ro del A</div>
                                <?php }?>
                            </div>

                            <div id="teambgame1"  onmouseover="resultsOver(1)" onmouseout="resultsOut(1)" class="positionBlock">
                                <?php if($segundoB!=null){?>
                                <div class="subTag" id="subbgame1"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroA->get_nombre().'/'.$segundoB->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match1b_name"><?php echo $segundoB->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match1b_name">2do del B</div>
                                <?php }?>
                            </div>

                            <div id="teamagame2"  onmouseover="resultsOver(2)" onmouseout="resultsOut(2)"  class="positionBlock">
                                <?php if($primeroB!=null){?>
                                <div  class="subTag" id="subagame2"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroB->get_nombre().'/'.$segundoA->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match2a_name"><?php echo $primeroB->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match2a_name">1ro del B</div>
                                <?php }?>
                            </div>

                            <div id="teambgame2"  onmouseover="resultsOver(2)" onmouseout="resultsOut(2)" class="positionBlock">
                                <?php if($segundoA!=null){?>
                                <div  class="subTag" id="subbgame2"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroB->get_nombre().'/'.$segundoA->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match2b_name"><?php echo $segundoA->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match2b_name">2do del A</div>
                                <?php }?>
                            </div>

                            <div id="teamagame3"  onmouseover="resultsOver(3)" onmouseout="resultsOut(3)" class="positionBlock">
                                <?php if($primeroC!=null){?>
                                <div  class="subTag" id="subagame3"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroC->get_nombre().'/'.$segundoD->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match3a_name"><?php echo $primeroC->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match3a_name">1ro del C</div>
                                <?php }?>
                            </div>
                            <div id="teambgame3" onmouseover="resultsOver(3)" onmouseout="resultsOut(3)" class="positionBlock">
                                <?php if($segundoD!=null){?>
                                <div  class="subTag" id="subbgame3"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroC->get_nombre().'/'.$segundoD->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match3b_name"><?php echo $segundoD->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match3b_name">2do del D</div>
                                <?php }?>
                            </div>

                            <div id="teamagame4"  onmouseover="resultsOver(4)" onmouseout="resultsOut(4)" class="positionBlock"  >
                                <?php if($primeroD!=null){?>
                                <div  class="subTag" id="subagame4"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroD->get_nombre().'/'.$segundoC->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match4a_name"><?php echo $primeroD->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match4a_name">1ro del D</div>
                                <?php }?>
                            </div>

                            <div id="teambgame4"  onmouseover="resultsOver(4)" onmouseout="resultsOut(4)" class="positionBlock" >
                                <?php if($segundoC!=null){?>
                                <div class="subTag" id="subbgame4"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primeroD->get_nombre().'/'.$segundoC->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match4b_name"><?php echo $segundoC->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match4b_name">2do del C</div>
                                <?php }?>
                            </div>
                    <!--------------------Semifinales-------------------->
                            <div id="teamagame5"  onmouseover="resultsOver(5)" onmouseout="resultsOut(5)" class="positionBlock" >
                                <?php if($primerCuarto!=null){?>
                                <div  class="subTag" id="subagame5"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primerCuarto->get_nombre().'/'.$segundoCuarto->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match5a_name"><?php echo $primerCuarto->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match5a_name">1er Cuarto</div>
                                <?php }?>
                            </div>

                            <div id="teambgame5" onmouseover="resultsOver(5)" onmouseout="resultsOut(5)" class="positionBlock">
                                <?php if($segundoCuarto!=null){?>
                                <div  class="subTag" id="subbgame5"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$primerCuarto->get_nombre().'/'.$segundoCuarto->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match5b_name"><?php echo $segundoCuarto->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match5b_name">2do Cuarto</div>
                                <?php }?>
                            </div>

                            <div id="teamagame6"  onmouseover="resultsOver(6)" onmouseout="resultsOut(6)" class="positionBlock">
                                <?php if($tercerCuarto!=null){?>
                                <div  class="subTag" id="subagame6"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$tercerCuarto->get_nombre().'/'.$cuartoCuarto->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match6a_name"><?php echo $tercerCuarto->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match6a_name">3er Cuarto</div>
                                <?php }?>
                            </div>

                            <div id="teambgame6"  onmouseover="resultsOver(6)" onmouseout="resultsOut(6)" class="positionBlock">
                                <?php if($cuartoCuarto!=null){?>
                                <div  class="subTag" id="subbgame6"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$tercerCuarto->get_nombre().'/'.$cuartoCuarto->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match6b_name"><?php echo $cuartoCuarto->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match6b_name">4to Cuarto</div>
                                <?php }?>
                            </div>
                    <!--------------------Final-------------------->
                            <div id="teamagame7"  onmouseover="resultsOver(7)" onmouseout="resultsOut(7)" class="positionBlock" >
                                <?php if($finalista1!=null){?>
                                <div  class="subTag" id="subagame7"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$finalista1->get_nombre().'/'.$finalista2->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match7a_name"><?php echo $finalista1->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match7a_name">Finalista 1</div>
                                <?php }?>
                            </div>

                            <div id="teambgame7"  onmouseover="resultsOver(7)" onmouseout="resultsOut(7)" class="positionBlock">
                                <?php if($finalista2!=null){?>
                                <div  class="subTag" id="subbgame7"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$finalista1->get_nombre().'/'.$finalista2->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match7b_name"><?php echo $finalista2->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match7b_name">Finalista 2</div>
                                <?php }?>
                            </div>
                    <!--------------------Campeon-------------------->
                            <div id="teamwinner" class="positionBlock" >
                                <?php if($campeon!=null){?>
                                <div class="gameBlockTeamName" id="match28b_name"><?php echo $campeon->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match28b_name">Campeón</div>
                                <?php }?>
                            </div>
                    <!--------------------3er puesto-------------------->
                            <div id="teamwinner3" class="positionBlock" >
                                <?php if($tercerPuesto!=null){?>
                                <div class="gameBlockTeamName" id="match28b_name"><?php echo $tercerPuesto->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match28b_name">3er Puesto</div>
                                <?php }?>
                            </div>
                    <!--------------------3er Lugar-------------------->
                            <div id="teama3"  onmouseover="resultsOver(8)" onmouseout="resultsOut(8)" class="positionBlock" >
                                <?php if($perdedor1!=null){?>
                                <div  class="subTag" id="subagame8"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$perdedor1->get_nombre().'/'.$perdedor2->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match5a_name"><?php echo $perdedor1->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match5a_name">Perdedor 1</div>
                                <?php }?>
                            </div>
                    
                            <div id="teamb3"  onmouseover="resultsOver(8)" onmouseout="resultsOut(8)" class="positionBlock">
                                <?php if($perdedor2!=null){?>
                                <div  class="subTag" id="subbgame8"><span class="viewMatchLink">
                                        <?php echo anchor('TorneoControl/verPartidaDetalle/'.$perdedor1->get_nombre().'/'.$perdedor2->get_nombre().'/'.$idTorneo,'Ver Partida');?>
                                    </span></div>
                                <div class="gameBlockTeamName" id="match5b_name"><?php echo $perdedor2->get_nombre();?></div>
                                <?php }else{?>
                                <div class="gameBlockTeamName" id="match5b_name">Perdedor 2</div>
                                <?php }?>
                            </div>
                            
                    <!--Posiciones del !ero al 3er Puesto-->
                    <h3 id="h3posiciones">Posiciones: </h3>
                            <ul id="posiciones">
                                <?php if($campeon!=null){?>
                                <li>1er Puesto: <?php echo $campeon->get_nombre();?></li>
                                <?php }else{?>
                                <li>1er Puesto: -</li>
                                <?php }?>
                                
                                <?php if($segundoPuesto!=null){?>
                                <li>2do Puesto: <?php echo $segundoPuesto->get_nombre();?></li>
                                <?php }else{?>
                                <li>2do Puesto: -</li>
                                <?php }?>
                                
                                <?php if($tercerPuesto!=null){?>
                                <li>3er Puesto: <?php echo $tercerPuesto->get_nombre();?></li>
                                <?php }else{?>
                                <li>3er Puesto: -</li>
                                <?php }?>
                            </ul>
                        </div>
                   <?php }else{?>
                        <p>Seleccione un torneo para ver la fase eliminatoria de éste.</p>
                        <?php }?>
                    </div>
                </div>
                
                <div id="detallePartida">
                    <div id ="matchDetail">
                        <h1>Detalle de Partida</h1>
                        <?php if($partidaDetalle!=null){?>
                        <p id="pJug1"><?php echo $partidaDetalle->get_equipo1();?></p>
                            <img id="imgdet1" src="<?php echo base_url();?>ImageEquipos/<?php echo $partidaDetalle->get_equipo1();?>.jpg"/>  
                        
                            <p id="pVs"> VS </p>
                        
                        <p id="pJug2"><?php echo $partidaDetalle->get_equipo2();?></p>
                            <img id="imgdet2" src="<?php echo base_url();?>ImageEquipos/<?php echo $partidaDetalle->get_equipo2();?>.jpg"/>   
                        <div id="detal"><p >Fase: <?php echo $partidaDetalle->get_fase();?></p> <p>Tiempo de Partida: <?php echo $partidaDetalle->get_tiempo();?> </p></div >
                       
                        <div id="detailjug1">
                            <label class="ldet"><?php echo $jugadorUno->get_nombre().' '.$jugadorUno->get_apellido().' "'.$jugadorUno->get_nick().'"';?></label><img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/gm.png" width="30px" height="30px"/><br /> <br /> <br /> 
                            <label class="ldet">  Raza : <?php echo $partidaDetalle->get_raza1();?></label> <img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/<?php echo $partidaDetalle->get_raza1();?>.png" width="40px" height="40px"/><br /><br />
                            <label class="ldet">  Recursos : <?php echo $partidaDetalle->get_recursos1();?> </label> <br /><br />
                            <label class="ldet">  Unidades : <?php echo $partidaDetalle->get_unidades1();?> </label> <br /><br />
                            <label class="ldet">  Minerales : <?php echo $partidaDetalle->get_minerales1();?> </label> <br /><br />
                            <label class="ldet">  Total : <?php echo $partidaDetalle->get_total1();?> </label> 
                        </div>
                        <a href="<?php echo base_url();?>index.php/TorneoControl/verMapa">
                            <input id="returnT" type="button" value="Regresar a Torneos" />
                        </a>
                        <div id="detailjug2">
                            <label class="ldet"><?php echo $jugadorDos->get_nombre().' '.$jugadorDos->get_apellido().' "'.$jugadorDos->get_nick().'"';?></label><img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/gm.png" width="30px" height="30px"/><br /> <br /> <br /> 
                            <label class="ldet">  Raza : <?php echo $partidaDetalle->get_raza2();?> </label> <img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/<?php echo $partidaDetalle->get_raza2();?>.png" width="40px" height="40px"/><br /><br />
                            <label class="ldet">  Recursos : <?php echo $partidaDetalle->get_recursos2();?> </label> <br /><br />
                            <label class="ldet">  Unidades : <?php echo $partidaDetalle->get_unidades2();?> </label> <br /><br />
                            <label class="ldet">  Minerales : <?php echo $partidaDetalle->get_minerales2();?> </label> <br /><br />
                            <label class="ldet">  Total : <?php echo $partidaDetalle->get_total2();?> </label> 
                        </div>
                        
                        <div id="screenshot">
                           
                                <img id="screenshotimg" src="http://localhost/Starcraft-Admin/uploads/partida/<?php echo $partida->get_id();?>.png" alt="" />
                                
                        </div>
                        <?php }else{?>
                        <p>No ha selecciona alguna Partida para ver su detalle.</p>
                        <?php }?>
                    </div>
                </div>
                
            </div>

            <div id="tabs-6">
                <ul>
                    <li><a href="#dia1">Día 1</a></li>
                    <li><a href="#dia2">Día 2</a></li>
                    <li><a href="#dia3">Día 3</a></li>
                    <li><a href="#dia4">Día 4</a></li>
                    <li><a href="#dia5">Día 5</a></li>
                    <li><a href="#dia6">Día 6</a></li>
                    <li><a id="anchorVerDH" href="#verDetallePH">Ver Detalles</a></li>
                </ul>
                
                <div id="dia1">
                    <div id="tourtComboDay">
                        <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFaseFecha1">
                            Seleccionar Torneo
                            <select name="torneoHorario">
                                <option disabled="true">Seleccione el Torneo</option>
                                <option disabled="true">--------------</option>
                                <?php foreach($torneosLlenos as $t){?>
                                <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                <?php }?>
                            </select>
                            Fase
                            <select name="faseHorario">
                                <option disabled="true">Seleccione la Fase</option>
                                <option disabled="true">--------------------</option>
                                <option value="Grupos">Grupos</option>
                                <option value="Cuartos de Final">Cuartos de Final</option>
                                <option value="Semifinales">Semifinales</option>
                                <option value="Tercer Lugar">Tercer Lugar</option>
                                <option value="Final">Final</option>
                            </select>

                            Fecha
                            <select name="fechaHorario">
                                <option disabled="true">--------------</option>
                                <?php foreach($torneosLlenos as $t){?>
                                <option value="<?php echo $t->getFechaInicio();?>"><?php echo $t->getFechaInicio();?></option>
                                <?php }?>
                            </select>

                            <input type="submit" class="submitListar" value="Listar" />
                        </form>
                    </div>
                    
                    <div class="contentDay">
                        <?php if ($partidasHorario!=null) { ?>
                        <h2>Día 1</h2>

                        <table class="table1" >
                            <thead>				
                                <tr>
                                    <th>N</th>
                                    <th>Hora de Inicio</th>
                                    <th>Equipos</th>
                                    <th>Fase</th>
                                    <th>Detalle de Partida</th>
                                    <th>Ganador</th>						
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; foreach($partidasHorario as $h) { ?>
                                    <?php if($i%2!=0) { ?>
                                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                        <tr class="odd">
                                            <td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
                                            <td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
                                            <td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
                                            <td><?php echo $h->get_fase(); ?></td>
                                            <td><input type="submit" class="linkA" value="Ver"/></td>
                                            <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
                                            
                                        </tr>
                                    </form>    
                                    
                                    <?php } else { ?>
                                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                        <tr class="even">
                                            <td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
                                            <td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
                                            <td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
                                            <td><?php echo $h->get_fase(); ?></td>
                                            <td><input type="submit" class="linkA" value="Ver"/></td>
                                            <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
                                        </tr>
                                    </form>        
                                     <?php } ?>
                                     <?php $i++ ?>
                                 <?php } ?>
                            </tbody>
                        </table>
                        
                       
                        <?php } else  {?>
                            <p class="msjHorarioNotFound">No se han elegido Horarios Para Mostrar</p>
                        <?php } ?>
                    
                    </div>
                </div>
               
                <div id="dia2">
                     <div id="tourtComboDay">
                         <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFaseFecha2">
                            Seleccionar Torneo
                            <select name="torneoHorario">
                                <option disabled="true">Seleccione el Torneo</option>
                                <option disabled="true">--------------</option>
                                <?php foreach($torneosLlenos as $t){?>
                                <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                <?php }?>
                            </select>
                            Fase
                            <select name="faseHorario">
                                <option disabled="true">Seleccione la Fase</option>
                                <option disabled="true">--------------------</option>
                                <option value="Grupos">Grupos</option>
                                <option value="Cuartos de Final">Cuartos de Final</option>
                                <option value="Semifinales">Semifinales</option>
                                <option value="Tercer Lugar">Tercer Lugar</option>
                                <option value="Final">Final</option>
                            </select>
                            Fecha
                            <select name="fechaHorario">
                                <option disabled="true">--------------</option>
                                <?php foreach($torneosLlenos as $t){?>
                                    <option value="<?php $date = date_create($t->getFechaInicio()); date_add($date, date_interval_create_from_date_string('1 days')); echo date_format($date, 'Y-m-d');?>">
                                        <?php $date = date_create($t->getFechaInicio()); date_add($date, date_interval_create_from_date_string('1 days')); echo date_format($date, 'Y-m-d');?>
                                    </option>
                                <?php }?>
                            </select>
                            <input type="submit" class="submitListar" value="Listar" />
                        </form>
                    </div>
                    
                    <div class="contentDay">
                    <?php if ($partidasHorario2!=null) { ?>
                    <h2>Día 2</h2>
                    
                    <table class="table1" >
                        <thead>				
                            <tr>
                                <th>N</th>
                                <th>Hora de Inicio</th>
                                <th>Equipos</th>
                                <th>Fase</th>
                                <th>Detalle de Partida</th>
                                <th>Ganador</th>						
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; foreach($partidasHorario2 as $h) { ?>
                                <?php if($i%2!=0) { ?>
                                <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                    <tr class="odd">
                                            <td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
                                            <td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
                                            <td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
                                            <td><?php echo $h->get_fase(); ?></td>
                                            <td><input type="submit" class="linkA" value="Ver"/></td>
                                           <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
                                    </tr>
                                </form>    
                                <?php } else { ?>
                                <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                    <tr class="even">
                                            <td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id(); ?>" /><?php echo $h->get_id(); ?></td>
                                            <td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
                                            <td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
                                            <td><?php echo $h->get_fase(); ?></td>
                                            <td><input type="submit" class="linkA" value="Ver"/></td>
                                            <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
                                    </tr>
                                </form>       
                                <?php } ?>
                                <?php $i++; ?>
                             <?php } ?>
                            </tbody>
                        </table>
                        <?php } else  {?>
                            <p class="msjHorarioNotFound">No se han elegido Horarios Para Mostrar</p>
                        <?php } ?>
                    </div>
                    
                </div>
                <div id="dia3">
                    
                    <div id="tourtComboDay">
                        <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFaseFecha3" >
                    Seleccionar Torneo
                    <select name="torneoHorario">
                        <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                    </select>
                    Fase
                    <select name="faseHorario">
                       <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                    </select>
                    Fecha
                    <select name="fechaHorario">
                        <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php
                                            $date = date_create($t->getFechaInicio());
                                            date_add($date, date_interval_create_from_date_string('2 days'));
                                            echo date_format($date, 'Y-m-d');?>">
                                            <?php $date = date_create($t->getFechaInicio());
                                                  date_add($date, date_interval_create_from_date_string('2 days'));
                                                  echo date_format($date, 'Y-m-d');
                                             ?></option>
                                            
                                            
                                            <?php }?>
                    </select>
                    
                    <input type="submit" class="submitListar" value="Listar"/>
                   </form>
                </div>
                    
                   
                    
                    <div class="contentDay">
                    <?php if ($partidasHorario3!=null) { ?>
                    <h2>Día 3</h2>
                    
                    <table class="table1" >
                      <thead>				
							<tr>
								<th>N</th>
								<th>Hora de Inicio</th>
								<th>Equipos</th>
								<th>Fase</th>
								<th>Detalle de Partida</th>
								<th>Ganador</th>						
							</tr>
						</thead>
						<tbody>
                                                         <?php $i=0; foreach($partidasHorario3 as $h) { ?>
                                                    <?php if($i%2!=0) { ?>
                                                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                                        
							<tr class="odd">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                    </form>    
                                                        <?php } else { ?>
                                                <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
							<tr class="even">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                </form>       
                                                     <?php } ?>
                                                     <?php $i++ ?>
                                                     <?php } ?>
						</tbody>
                    </table>
                    <?php } else  {?>
                        <p class="msjHorarioNotFound">No se han elegido Horarios Para Mostrar</p>
                    <?php } ?>
                    </div>
                    
                </div>
                <div id="dia4">
                     <div id="tourtComboDay">
                          <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFaseFecha4" >
                    Seleccionar Torneo
                    <select id="">
                        <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                    </select>
                    Fase
                    <select id="">
                       <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                    </select>
                    Fecha
                    <select id="">
                        <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php
                                            $date = date_create($t->getFechaInicio());
                                            date_add($date, date_interval_create_from_date_string('3 days'));
                                            echo date_format($date, 'Y-m-d');?>">
                                            <?php $date = date_create($t->getFechaInicio());
                                                  date_add($date, date_interval_create_from_date_string('3 days'));
                                                  echo date_format($date, 'Y-m-d');
                                             ?></option>
                                            
                                            
                                            <?php }?>
                    </select>
                    
                   <input type="submit" class="submitListar" value="Listar" />
                   </form>
                </div>
                    

                    
                  
                    <div class="contentDay">
                 <?php if ($partidasHorario4!=null) { ?>
                    <h2>Día 4</h2>
                    
                    <table class="table1" >
                      <thead>				
							<tr>
								<th>N</th>
								<th>Hora de Inicio</th>
								<th>Equipos</th>
								<th>Fase</th>
								<th>Detalle de Partida</th>
								<th>Ganador</th>						
							</tr>
						</thead>
						<tbody>
                                                        <?php $i=0; foreach($partidasHorario4 as $h) { ?>
                                                    <?php if($i%2!=0) { ?>
                                                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                                        
							<tr class="odd">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                    </form>    
                                                        <?php } else { ?>
                                                <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
							<tr class="even">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                </form>       
                                                     <?php } ?>
                                                     <?php $i++ ?>
                                                     <?php } ?>
						</tbody>
                    </table>
                    <?php } else  {?>
                        <p class="msjHorarioNotFound">No se han elegido Horarios Para Mostrar</p>
                    <?php } ?>
                    </div>
                  
                </div>

                <div id="dia5">
                     <div id="tourtComboDay">
                         <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFaseFecha5" >
                    Seleccionar Torneo
                    <select id="">
                        <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                    </select>
                    Fase
                    <select id="">
                       <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                    </select>
                    Fecha
                    <select id="">
                        <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                             
                                            <option value="<?php
                                            $date = date_create($t->getFechaInicio());
                                            date_add($date, date_interval_create_from_date_string('4 days'));
                                            echo date_format($date, 'Y-m-d');?>">
                                            <?php $date = date_create($t->getFechaInicio());
                                                  date_add($date, date_interval_create_from_date_string('4 days'));
                                                  echo date_format($date, 'Y-m-d');
                                             ?></option>
                                            
                                            
                                            <?php }?>
                    </select>
                    
                    <input type="submit" class="submitListar" value="Listar" />
                    </form>
                </div>
                    
                    
                    <div class="contentDay">
                    <?php if ($partidasHorario5!=null) { ?>
                    <h2>Día 5</h2>
                    
                    <table class="table1" >
                      <thead>				
							<tr>
								<th>N</th>
								<th>Hora de Inicio</th>
								<th>Equipos</th>
								<th>Fase</th>
								<th>Detalle de Partida</th>
								<th>Ganador</th>						
							</tr>
						</thead>
						<tbody>
                                                        <?php $i=0; foreach($partidasHorario5 as $h) { ?>
                                                    <?php if($i%2!=0) { ?>
                                                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                                        
							<tr class="odd">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                    </form>    
                                                        <?php } else { ?>
                                                <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
							<tr class="even">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                </form>       
                                                     <?php } ?>
                                                     <?php $i++ ?>
                                                     <?php } ?>
						</tbody>
                    </table>
                    <?php } else  {?>
                        <p class="msjHorarioNotFound">No se han elegido Horarios Para Mostrar</p>
                    <?php } ?>
            </div>
            </div>
                
                
                <div id="dia6">
                     <div id="tourtComboDay">
                         <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFaseFecha5" >
                    Seleccionar Torneo
                    <select id="">
                        <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                    </select>
                    Fase
                    <select id="">
                       <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                    </select>
                    Fecha
                    <select id="">
                        <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getFechaFin();?>"><?php echo $t->getFechaFin();?></option>
                                            
                                            <?php }?>
                    </select>
                    
                    <input type="submit" class="submitListar" value="Listar" />
                     </form>
                     </div>
                    
                    
                    <div class="contentDay">
                    <?php if ($partidasHorario6!=null) { ?>
                    <h2>Día 6 </h2>
                    
                    <table class="table1" >
                      <thead>				
							<tr>
								<th>N</th>
								<th>Hora de Inicio</th>
								<th>Equipos</th>
								<th>Fase</th>
								<th>Detalle de Partida</th>
								<th>Ganador</th>						
							</tr>
						</thead>
						<tbody>
                                                        <?php $i=0; foreach($partidasHorario4 as $h) { ?>
                                                    <?php if($i%2!=0) { ?>
                                                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
                                                        
							<tr class="odd">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                                <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                    </form>    
                                                        <?php } else { ?>
                                                <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getPartidaByIdDetail">
							<tr class="even">
								<td><input type="hidden" name="idPartidaDet" value="<?php echo $h->get_id() ?>" /><?php echo $h->get_id() ?></td>
								<td><?php echo date('g:i:a',strtotime($h->get_fechaHoraInicio())); ?></td>
								<td><?php echo $h->get_equipo1()." VS ".$h->get_equipo2() ?></td>
								<td><?php echo $h->get_fase(); ?></td>
								<td><input type="submit" class="linkA" value="Ver"/></td>
                                                               <td><div id="winnerOff_<?php echo $h->get_id(); ?>" ><a href="javascript:showWinner('<?php echo $h->get_id(); ?>');">Mostrar Ganador</a></div>
                                                <div id="winnerOn_<?php echo $h->get_id(); ?>" class="schedWinner" ><?php echo $h->get_equipoGanador(); ?></div>
                                            </td>
							</tr>
                                                </form>       
                                                     <?php } ?>
                                                     <?php $i++ ?>
                                                     <?php } ?>
						</tbody>
                    </table>
                    <?php } else  {?>
                        <p class="msjHorarioNotFound">No se han elegido Horarios Para Mostrar</p>
                    <?php } ?>
                    </div>
                    
                </div>
                    
                     <div id="verDetallePH">
                          <div class ="matchDetail">
                        <h1>Detalle de Partida</h1>
                        <?php if($partida!=null) { ?>
                        
                        <p id="pJug1"><?php echo $partida->get_equipo1(); ?></p>
                            <img id="imgdet1" src="<?php echo base_url();?>ImageEquipos/<?php echo $partida->get_equipo1();?>.png"/>    
                            
                        <p id="pVs"> VS </p> 
                        
                        <p id="pJug2"><?php echo $partida->get_equipo2(); ?></p> 
                            <img id="imgdet2" src="<?php echo base_url();?>ImageEquipos/<?php echo $partida->get_equipo2();?>.png"/>    
                        <div id="detal">
                            <p> Fase : <?php echo $partida->get_fase(); ?></p> 
                            <p> Tiempo de Partida: <?php echo $partida->get_tiempo(); ?> </p></div >
                        
                        <div id="detailjug1">
                            <br />
                            <label class="ldet">  <?php echo $partida->getNombreById($partida->get_jugador1()); ?> "<?php echo $partida->getNickById($partida->get_jugador1()); ?>" <?php echo $partida->getApellidoById($partida->get_jugador1()); ?> </label><img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/<?php echo $partida->getRankingById($partida->get_jugador1()); ?>.png" width="30px" height="30px"/><br /> <br /> <br /> 
                            <label class="ldet">  Raza : <?php echo $partida->get_raza1(); ?>  </label> <img class="imgrankedtpc" src="<?php echo base_url();?>Imagenes/<?php echo $partida->get_raza1(); ?>.png" width="40px" height="40px"/><br /><br />
                            <label class="ldet">  Recursos : <?php echo $partida->get_minerales1(); ?> </label> <br /><br />
                            <label class="ldet">  Unidades : <?php echo $partida->get_unidades1(); ?> </label> <br /><br />
                            <label class="ldet">  Estructuras : <?php echo $partida->get_recursos1(); ?> </label> <br /><br />
                            <label class="ldet">  Total : <?php echo $partida->get_total1(); ?> </label> 

                        </div>
                        
                        <div id="detailjug2">
                             <br />
                            <label class="ldet">  <?php echo $partida->getNombreById($partida->get_jugador2()); ?> "<?php echo $partida->getNickById($partida->get_jugador2()); ?>" <?php echo $partida->getApellidoById($partida->get_jugador2()); ?> </label><img class="imgrankedtp" src="<?php echo base_url();?>Imagenes/<?php echo $partida->getRankingById($partida->get_jugador1()); ?>.png" width="30px" height="30px"/><br /> <br /> <br /> 
                            <label class="ldet">  Raza : <?php echo $partida->get_raza2(); ?>  </label> <img class="imgrankedtpc" src="<?php echo base_url();?>Imagenes/<?php echo $partida->get_raza2(); ?>.png" width="40px" height="40px"/><br /><br />
                            <label class="ldet">  Recursos : <?php echo $partida->get_minerales2(); ?> </label> <br /><br />
                            <label class="ldet">  Unidades : <?php echo $partida->get_unidades2(); ?> </label> <br /><br />
                            <label class="ldet">  Estructuras : <?php echo $partida->get_recursos2(); ?> </label> <br /><br />
                            <label class="ldet">  Total : <?php echo $partida->get_total2(); ?> </label> 
                        </div>
                        <div id="screenshot">
                           
                                <img id="screenshotimg" src="http://localhost/Starcraft-Admin/uploads/partida/<?php echo $partida->get_id();?>.png" alt="" />
                                
                        </div>
                        
                        <?php } else { ?>
                            <p>No se ha seleccionado ninguna partida para ver</p>
                        <?php } ?>
                        
                        </div>
                     </div>
            </div>               
           
                     <div id="tabs-7">
                
                <ul>
                    <li><a href="#contentReplay">Lista Replays</a></li>
                    <li><a id="anchorVerReplay" href="#videoReplay">Ver Replay</a></li>

                </ul>
                         
                <div id="contentReplay">
                    <h1>Replays</h1>
                    <div id="tourtComboReplay">
                    <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/listarPartidaPorTorneoFase  ">            
                                    Torneos
                                    
                                        <select name="torneosReplay">
                                            <option disabled="true">Seleccione el Torneo</option>
                                            <option disabled="true">--------------</option>
                                            <?php foreach($torneosLlenos as $t){?>
                                            <option value="<?php echo $t->getId();?>"><?php echo $t->getNombre();?></option>
                                            <?php }?>
                                        </select>
                                    
                               
                             
                                    Fase
                                   
                                        <select name="faseReplay">
                                            <option disabled="true">Seleccione la Fase</option>
                                            <option disabled="true">--------------------</option>
                                            <option value="Grupos">Grupos</option>
                                            <option value="Cuartos de Final">Cuartos de Final</option>
                                            <option value="Semifinales">Semifinales</option>
                                            <option value="Tercer Lugar">Tercer Lugar</option>
                                            <option value="Final">Final</option>
                                        </select>
                                    
                                
                                
                                    <input  class="inputTabRep"  type="submit" value="Listar Partidas"/>
                    </form>
                     
                </div>
                  <br/>
                    <?php if($partidasReplay!=null){?>
                    <table id="replaysTabla" class="table1">
                        <tr>
                            <th class="primCol">Equipos</th>
                            <th class="primFila">Fase</th>
                            <th class="primFila">Ver Replay</th>
                        </tr>
                        <?php foreach($partidasReplay as $par){?>
                        
                        <form method="post" action="<?php echo base_url();?>index.php/TorneoControl/getReplayById">
     
                            <tr>
                                
                                <td><input type="hidden" name="idPartidaReplay"  value="<?php echo $par->get_id(); ?>" /><?php echo $par->get_equipo1();?> VS <?php echo $par->get_equipo2();?></td>
                                <td><?php echo $par->get_fase();?></td>
                                <td><input class="showReplay" type="submit" value="Ver Replay" /></td>
                            </tr>
                       </form>
                        <?php }?>
                        </table>
                    <?php }else {?>
                        <p>No se busco Replay's para mostrar</p>
                    <?php }?>
                    
                    </div>
                         
                   <div id ="videoReplay">
                       <h1>Replays-Ver</h1>
                    <?php if ($replay_partida!=null) { ?>
                   
                    <iframe id="verVideoReplay"  width="900" height="580" src="<?php echo $replay_partida?>" frameborder="0" allowfullscreen> </iframe>
                    
                    <?php } else {?>
                        Aún no se ha selecciona ninguna Partida para ver el replay
                    <?php } ?>
                   </div>
                  
                    
            </div>
            
            <div id="footer">
                <img id="blizzard" src="<?php echo base_url();?>Imagenes/blizzard.png" alt="SC2 Logo" />
                <p id="footerp">©2011 Blizzard Entertainment.All Rights Reserved. <br /> WORLD CYBER GAMES, Inc. All Rights Reserved.</p>
                <img id="wcg" src="<?php echo base_url();?>Imagenes/wcg.png" alt="SC2 Logo" />
            </div>
        </div>
    </body>
</html>