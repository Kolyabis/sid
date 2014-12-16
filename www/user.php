<?php include_once("config.php"); ?>
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
        <div>
        <div class="content_wrapper">
            <ul id="responds" style=" height: 500px; overflow: auto;" class="scroll-pane">
            <?php
                  /*$rezult = $db->query("select l.*, a.id as idAdmin, a.name, a.sessiya, u.id as idUser, u.pidpriemstvo, u.session from list l, admin a, users u where u.session = l.sessiya and a.sessiya = l.sessiya");
                    $query = $rezult->fetchAll(PDO::FETCH_ASSOC);
                    $cnt = count($query) - 1;
                    for($i = 0; $i<=$cnt; $i++){
                        $idUser = $query[$i]['idUser'];
                        if($query[$i]["id_admin"] != 0){
                            echo '<li style="background-color: rgb(182, 232, 255); margin-left: 35px;" id="item_'.$query[$i]["id"].'">';
                                echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$query[$i]["id"].'">';
                                    echo '<img src="images/icon_del.gif" border="0" />';
                                    echo '</a>';
                                echo '</div>';
                            echo '<span id="viewsCompany">'.$query[$i]["name"].'</span><br/>';
                            echo '<span>'.$query[$i]["text"].'</span>';
                            echo '</li>';
                        }else{
                            echo '<li style="background-color: #EEE9E9; margin-right: 35px;" id="item_'.$query[$i]["id"].'">';
                                echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$query[$i]["id"].'">';
                                    echo '<img src="images/icon_del.gif" border="0" />';
                                    echo '</a>';
                                echo '</div>';
                            echo '<span id="viewsCompany">Найменування компанії: <span>'.$query[$i]["pidpriemstvo"].'</span><span style="float:right; margin-right: 15px;">'.$query[$i]["data"].'</span></span><br/><br/>';
                            echo '<span>'.$query[$i]["text"].'</span>';
                            echo '</li>';
                        }
                    }*/
            ?>
            </ul>
            <div class="form_style">
                <input type="hidden" value="1"/>
                <input type="hidden" id="token" value="<?php echo $_COOKIE['PHPSESSID']; ?>"/>
                <input type="hidden" id="idUser" value="<?php echo $idUser; ?>"/>
                <textarea name="content_txt" id="contentText" cols="61" rows="5"></textarea>
                <button id="FormSubmit" onclick="goAjax()">ОТПРАВИТЬ</button>
            </div>
        </div>
    </div>
    </body>
</html>