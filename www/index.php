<?php include_once("config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>СИД</title>
    <meta http-equiv="content-type" content="text/html; charset = utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>    
	<body>	        
		<div id="dviCenter">
            <p id="pForm">
                <span>
                    <span>
                        <input id="checkUser" placeholder="Password" name="checkUser" type="text" size="40"/>
                    </span>
                </span>
                <span>
                    <input type="button" value="Check user" onclick="checkUser()"/>
                </span>
            </p>
        </div>
        <div id="ajaxError" style="display: none;">Pole pustoe!</div>
        <div class="clear"></div>        
        <div id="newUser" style="display: none;">
                <p>Новий пользовател</p>
				<span style="padding:1px;">
					<input id="login" placeholder="Логін" type="text" size="40"/>
				</span><br/>
				<span style="padding:1px;">
					<input id="edrpo" placeholder="ЕДРПОУ" type="text" size="40"/>
				</span><br/>
				<span style="padding:1px;">
					<input id="pass" placeholder="Пароль" type="text" size="40"/>
				</span><br/>
                <span style="padding:1px;">
					<input id="mail" placeholder="E-mail" type="text" size="40"/>
				</span><br/>
                <span style="padding:1px;">
					<input id="tel" placeholder="Тел" type="text" size="40"/>
				</span><br/>
                <span><input type="button" value="Зареєструвати" onclick="newUser()"/></span>
        <div class="clear"></div>
		</div>
		<div id="error" style="display: none;"></div>
		<div id="ok" style="display: none;"></div>
        <div class="clear"></div>
    </body>
</html>