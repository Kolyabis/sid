<?php session_start(); ?>
<?php include_once("config.php"); ?>
<?php
    //echo $_GET['name']." - ".$_GET['pass'];
    if(isset($_GET['name']) and isset($_GET['pass']) and !empty($_GET['name']) and !empty($_GET['pass'])){
        $pass = md5($_GET['pass']);
        $token = $db->query("SELECT `key` FROM user WHERE `login` = '".$_GET['name']."' AND `pass`= '$pass'");
        $query = $token->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['key'] = $query[0]['key'];
    }
    if(empty($_SESSION['key'])){
        unset($_SESSION['key']);
        header("Location: index.php");
    }
?>
<?php
    $token = $db->query("SELECT `key`, `login` FROM user WHERE `key` = '".$_SESSION['key']."'");
    $query = $token->fetchAll(PDO::FETCH_ASSOC);
    $user = $query[0]['login'];
    $key = $query[0]['key'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>СИД</title>
    <meta http-equiv="content-type" content="text/html; charset = utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="jscrollpane.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
    <body>
        <div style="float: right;">Вы зашли как: <?php echo $user; ?><span><a href="#" onclick="closeSid()">Sing out</a></span></div>
        <div>
            <div class="content_wrapper">
                <ul id="responds" style=" height: 500px; overflow: auto;" class="scroll-pane">
                <?php
                    $queryList = $db->query("SELECT * FROM list WHERE `key` = '$key'");
                    $query = $queryList->fetchAll(PDO::FETCH_ASSOC);
                    $cnt = count($query) - 1;
                    for($i = 0; $i<=$cnt; $i++){
                        $id_user = $query[$i]['id_user'];
                        if($query[$i]['persona'] != 'user'){
                            echo '<li style="background-color: rgb(182, 232, 255); margin-left: 35px;" id="item_'.$query[$i]["id"].'">';
                                echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$query[$i]["id"].'">';
                                    echo '<img src="images/icon_del.gif" border="0" />';
                                    echo '</a>';
                                echo '</div>';
                            echo '<span id="viewsCompany">Администратор: <span>'.$query[$i]["login"].'</span><span style="float:right; margin-right: 15px;">'.$query[$i]["data"].'</span></span><br/>';
                                echo '<span>'.$query[$i]["text"].'</span>';
                            echo '</li>';
                        }else{
                            echo '<li style="background-color: #EEE9E9; margin-right: 35px;" id="item_'.$query[$i]["id"].'">';
                                echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$query[$i]["id"].'">';
                                    echo '<img src="images/icon_del.gif" border="0" />';
                                    echo '</a>';
                                echo '</div>';
                                echo '<span id="viewsCompany">Пользователь: <span>'.$query[$i]["login"].'</span><span style="float:right; margin-right: 15px;">'.$query[$i]["data"].'</span></span><br/>';
                                echo '<span>'.$query[$i]["text"].'</span>';
                            echo '</li>';
                        }
                    }
                ?>
                </ul>
                test
                <div class="form_style">
                    <input type="hidden" value="1"/>
                    <input type="text" id="token" value="<?php echo $key; ?>"/>
                    <input type="text" id="idUser" value="<?php echo $id_user; ?>"/>
                    <input type="text" id="login" value="<?php echo $user; ?>"/>
                    <textarea name="content_txt" id="contentText" cols="61" rows="5"></textarea>
                    <button id="FormSubmit" onclick="goAjax()">ОТПРАВИТЬ</button>
                </div>
                <div id="errorList" style="display: none;"></div>
            </div>
    </div>
    </body>
</html>