<?php
include("../config.php");
class ajaxController{
	/*Проверяем существует ли пользователь или даем форму регистрации */
	public function checkUser($login, $pass, $db){
		if(!empty($login) and !empty($pass)){
        $login = stripcslashes(strip_tags($login));
        $pass = md5($pass);
        $rezult = $db->query("SELECT * FROM user WHERE login = '$login' AND pass = '$pass'");
        $rez = $rezult->fetchAll(PDO::FETCH_ASSOC);
			if($rez != null){
				$cnt = count($rez);
				for($i = 0; $i < $cnt; $i++){
					if(!empty($rez[$i]['persona'])){
						echo $rez[$i]['persona'];
					}
				}
			}
		}else{
			echo "Не возможно проверить введенные данные!";
		}
	}
	/* Метод добовления нового пользователя */
	public function insertUser($key, $name, $pass, $edrpo, $mail, $tel, $db){
		$pass = md5($pass);
        $rezult = $db->exec("INSERT INTO user (`key`, `login`, `pass`, `edrpo`, `mail`, `tel`, `data`, `persona`) VALUES ('$key', '$name', '$pass', '$edrpo', '$mail', '$tel', NOW(), 'user')");
		if($rezult){
			echo "Пользователь: (".$name.") успешно добавлен!";
		}
	}
    /* Метод проверки list сообщения */
    public function addListComent($txt, $token, $id, $login, $db){
        $txt = filter_var($txt);
        if($db->query("INSERT INTO list (`id_user`,`login`,`key`,`text`,`data`,`persona`) VALUES ($id,'$login','$token','$txt', NOW(), 'user')")){
            echo("INSERT INTO list (`id_user`,`login`,`key`,`text`,`data`,`persona`)VALUES ($id,'$login','$token','$txt', NOW(), 'user')");
        }
    }
}
$ajax = new ajaxController();
	/*Проверяем существует ли пользователь или даем форму регистрации */
	if(isset($_POST['login']) and isset($_POST['pass']) and !empty($_POST['login']) and !empty($_POST['pass'])){
		$ajax->checkUser($_POST['login'], $_POST['pass'], $db);
	}

	/* Метод добовления нового пользователя */
	if(isset($_POST['name']) and !empty($_POST['name'])){
		$ajax->insertUser($_POST['key'], $_POST['name'], $_POST['pass'], $_POST['edrpo'], $_POST['mail'], $_POST['tel'], $db);
	}

    /* Метод проверки list сообщения */
    if(isset($_POST['txt']) and isset($_POST['token']) and isset($_POST['id']) and isset($_POST['login'])){
        $ajax->addListComent($_POST['txt'], $_POST['token'], $_POST['id'], $_POST['login'], $db);
    }
?>