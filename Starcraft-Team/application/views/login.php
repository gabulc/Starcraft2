
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Starcraft II Torneos Admin</title>
        <meta name="title" content="Torneo StarCraft 2"/>
        <meta name="author" content="Eduardo Arenas, Anghelo Barboza, Gabriel Lucano, Jeffrey Pinedo, Jorge Valverde"/>
        <meta name="robots" content="all,follow,index"/>
        <meta name="keywords" content="starcraft2, starcraft, Starcraft2, starCraft2, StarCraft2, torneos de starcraft2, torneo, torneos"/>
        <meta name="description" content="Pagina Web de Administracion de Torneos de StartCraft 2"/>
        
        <link type="text/css" href="<?php echo base_url();?>css/login.css" rel="stylesheet" />
        <link type="text/css" href="<?php echo base_url();?>css/jquery-ui-1.7.3.custom.css" rel="stylesheet" />
        
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.7.3.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/Inicio.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.nivo.zoom.pack.js"></script>
        
        <script type="text/javascript">

                $(function(){
                        // Tabs
                       $('#tabs').tabs({
                    cookie: {
                        // store cookie for a day, without, it would be a session cookie
                        expires: 1
                    }
                });

 });
        </script>
    </head>
    <body>
        <div id="volverCliente">
            <a href="<?php echo base_url();?>index.php/TorneoControl/index"><input type="image"  src="<?php echo base_url();?>Imagenes/exit.png" /></a>
        </div>
        <img id="logosc2" src="<?php echo base_url();?>Imagenes/logosc2equipos.png" alt="SC2 Logo" />
        
        <div id="tabs">
	<ul>
		<li><a href="#tabs-1">Log In</a></li>
		<li><a href="#tabs-2">Olvido de Contraseña</a></li>
                <li><a href="#tabs-3">Regístrate</a></li>
	</ul>
	<div id="tabs-1">
            <form method="post" id="signin" action="<?php echo base_url();?>index.php/LoginControl/login">
                <table id="loginTabla">
                    <tr>
                        <td><label for="username">Usuario</label></td>
                        <td><input id="username" name="username" value="" title="username" tabindex="4" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label for="password">Contraseña</label></td>
                        <td><input id="password" name="password" value=""  title="password" tabindex="5" type="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input id="entrar" value="Log in" tabindex="6" type="submit"/></td>
                    </tr>
                </table> 
                <p><?php echo $mensajeLogin;?></p>
            </form>
	</div>
	<div id="tabs-2">
               <form method="post" id="cont" action="<?php echo base_url();?>index.php/LoginControl/enviarEmail">
		<p>Escriba el email donde será enviado la contraseña</p>
                    <label for="email">Email</label>
                    <input id="email" name="email" value="" title="email" tabindex="4" type="text"/>
                    <input id="botonEnviar" value="Enviar" tabindex="6" type="submit"/><br/><br/><br/><br/>
                    <p><?php echo $mensajeEmail;?></p>
             </form>
        </div>
            
       <div id="tabs-3">
       
            <form method="post" id="signin" action="<?php echo base_url();?>index.php/LoginControl/registrarse">
                <table id="registrarseTabla">
                    <tr>
                        <td><label for="username">Usuario</label></td>
                        <td><input id="username" name="username" value="" title="username" tabindex="4" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label for="password">Contraseña</label></td>
                        <td><input id="password" name="password" value=""  title="password" tabindex="5" type="password"/></td>
                    </tr>
                    
                    <tr>
                        <td><label for="password2">Confirmar Contraseña</label></td>
                        <td><input id="password2" name="password2" value=""  title="password2" tabindex="5" type="password"/></td>
                    </tr>
                    
                    <tr>
                        <td><label for="e-mail">E-mail</label></td>
                        <td><input id="e-mail" name="mail" value=""  title="Email" tabindex="5" type="text"/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center">
                            <input id="entrar" value="Regístrate" tabindex="6" type="submit"/> 
                            <input id="entrar" value="Resetear" tabindex="6" type="reset"/>
                        </td>
                    </tr>
                </table> <br/><br/>
                <p><?php echo $mensajeRegistro;?></p>
            </form>
       </div>
	</div>
    </body>
</html>
