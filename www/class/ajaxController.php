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
            $my_id = $db->lastInsertId(); //Get ID of last inserted record from MySQL
            $query = $db->query("SELECT * FROM list WHERE id = $my_id");
            $rezult = $query->fetchAll(PDO::FETCH_ASSOC);
            $cnt = count($rezult) - 1;
            for($i = 0; $i<=$cnt; $i++){
                $id_user = $rezult[$i]['id_user'];
                echo '<li style="background-color: #EEE9E9; margin-right: 35px;" id="item_'.$rezult[$i]["id"].'">';
                    echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$rezult[$i]["id"].'">';
                        echo '<img src="images/icon_del.gif" border="0" />';
                        echo '</a>';
                    echo '</div>';
                    echo '<span id="viewsCompany">Пользователь: <span>'.$rezult[$i]["login"].'</span><span style="float:right; margin-right: 15px;">'.$rezult[$i]["data"].'</span></span><br/><br/>';
                    echo '<span>'.$rezult[$i]["text"].'</span>';
                echo '</li>';
            }
            unset($db);
        }else{
            header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
            exit();
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