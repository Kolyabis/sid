/* Проверяем поле на пустоту */
function checkUser(){
    var valid = true;
    if($("#login").val() .length < 3){
        $("#newUser").slideUp();
        $("#ajaxError").slideDown(function(){
            $("#ajaxError").html('Поле ( Login ) пусто!');
        }); //плавное появление
        return false; // не производить переход по ссылке
    }else if($("#pass").val() .length < 5){
        $("#newUser").slideUp();
        $("#ajaxError").slideDown(function(){
            $("#ajaxError").html('Поле ( Password ) пусто!');
        });
        return false; // не производить переход по ссылке
    }else{
        $("#ajaxError").slideUp();
        var myData = "login="+ $("#login").val() +"&pass="+ $("#pass").val();
        jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){
				if(response === ''){
                    $("#newUser").slideDown(response);
                }else if(response != ''){
                    var login = $("#login").val();
                    login = encodeURIComponent(login);
                    var pass = $("#pass").val();
                    pass = encodeURIComponent(pass);
                    var url = location.href;
                    window.location.href = url+response+'.php?name='+login+'&pass='+pass;
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });
    }
}
/* Функция ajax добавление нового пользователя */
function newUser(){
	var valid = true;
    if($("#loginUser").val().length < 2){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( login ) pusto!");			
		});
		$("#loginUser").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 5000);
		return false;
	}else if($("#edrpo").val().length < 7){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( edrpo ) pusto!");			
		});
		$("#edrpo").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 5000);
		return false;
	}else if($("#newPass").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( password ) pusto!");			
		});
		$("#newPass").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 5000);
		return false;	
	}else if($("#mail").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( mail ) pusto!");			
		});
		$("#mail").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 5000);
		return false;
	}else if($("#tel").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( tel ) pusto!");			
		});
		$("#tel").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 5000);
		return false;
	}
	var myData = "key="+$("#key").val()+"&name="+$("#loginUser").val()+"&edrpo="+$("#edrpo").val()+"&pass="+$("#newPass").val()+"&mail="+$("#mail").val()+"&tel="+$("#tel").val();
	jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){				
				if(response === ''){
                    alert(response);
                    $("#error").slideDown(function(){
						$("#error").html("Не удалось зарегистрировать пользователя!");
					});
                }else{
                    alert(response);
                    $("#ok").slideDown(function(){
						$("#ok").html(response);
					});
                    setTimeout(function() {
                        $("#ok").slideUp();
                    }, 5000);
                    setInterval(function(){
                        var url = location.href;
                        window.location.href = url+'user.php?name='+$("#loginUser").val()+'&pass='+$("#newPass").val();
                    }, 3000);
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });	
}
/* Функция отправки данных ajax и возврат результата */
function goAjax(){
    if($("#contentText").val()===""){
        $("#errorList").slideDown(function(){
            $("#errorList").html('Поле с сообщением пусто');
        });
        return false;
    }else{
        var myData = "txt="+ $("#contentText").val() +"&token="+ $("#token").val()+"&id="+ $("#idUser").val()+"&login="+ $("#login").val();
        $.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){
                $("#responds").append(response);
                $("#contentText").val(''); //очищаем текстовое поле после успешной вставки
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });
    }
}
/* Выход с программы */
function closeSid(){
    var url = location.href;
    alert(url);
}
$(document).ready(function() {$("#responds").scrollTop(10000);});

