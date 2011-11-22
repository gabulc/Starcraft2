
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $title;?></title>
        
        <meta name="title" content="Torneo StarCraft 2"/>
        <meta name="author" content="Eduardo Arenas, Anghelo Barboza, Gabriel Lucano, Jeffrey Pinedo, Jorge Valverde"/>
        <meta name="robots" content="all,follow,index"/>
        <meta name="keywords" content="starcraft2, starcraft, Starcraft2, starCraft2, StarCraft2, torneos de starcraft2, torneo, torneos"/>
        <meta name="description" content="Pagina Web de Administracion de Torneos de StartCraft 2"/>
                
        <link href="http://localhost/Starcraft-Admin/css/login.css" rel="stylesheet" type="text/css" />

        <link type="text/css" href="http://localhost/Starcraft-Admin/css/jquery-ui-1.7.3.custom.css" rel="stylesheet" />	
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="http://localhost/Starcraft-Admin/js/jquery-ui-1.7.3.custom.min.js"></script>
                
                <script type="text/javascript">
                    
                    $(function(){
                        // Tabs
                        $('#tabs').tabs({
                            cookie: {
                            // store cookie for a day, without, it would be a session cookie
                            expires: 1
                    }
                }   );
                $('#tab-1').tabs({
                            cookie: {
                            // store cookie for a day, without, it would be a session cookie
                            expires: 1
                    }
                }   );
                $('#tab-2').tabs({
                            cookie: {
                            // store cookie for a day, without, it would be a session cookie
                            expires: 1
                    }
                }   );
                        $( "input:submit").button();
			});
                        
                        
		</script>
    </head>
    <body>
    <div id="container">
        <img id="logosc2" src="http://localhost/Starcraft-Admin/Imagenes/logosc2admin.png" alt="SC2 Logo" />
        
        <div id="tabs">
	<ul>
		<li><a href="#tabs-1">Log In</a></li>
		<li><a href="#tabs-2">Olvido de Contraseña</a></li>
	</ul>
	<div id="tabs-1">
            <form method="post" id="signin" action="index.php?c=LoginControl&m=login">
                <table id="loginTabla">
                    <tr>
                        <td><label for="username">Usuario</label></td>
                        <td><input id="username" name="username" value="" title="username" tabindex="4" type="text"/></td>
                    </tr>
                    <tr>
                        <td><label for="password">Contrase&#241;a</label></td>
                        <td><input id="password" name="password" value=""  title="password" tabindex="5" type="password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input id="entrar" value="Ingresar" tabindex="6" type="submit"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="left"><?php echo $msjError;?></td>
                    </tr>
                </table>                  
            </form>
	</div>
	<div id="tabs-2">
               <form method="post" id="cont" action="index.php?c=LoginControl&m=enviarEmail">
		<p>Escriba el email donde ser&#225; enviado la contrase&#241;a</p>
                <label for="email">Email</label>
                    <input id="email" name="email" value="" title="email" tabindex="4" type="text"/>
                <input id="botonEnviar" value="Enviar" tabindex="6" type="submit"/>
             </form>
            <p id="mensaje"><?php echo $mensaje;?></p>
        </div>
	</div>
    </div>
    </body>
</html>