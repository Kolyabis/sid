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
                    var url = location.href;
                    window.location.href = url+response+'.php';
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
	}else if($("#pass").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( password ) pusto!");			
		});
		$("#pass").focus();
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
	var myData = "key="+$("#key").val()+"&name="+$("#loginUser").val()+"&edrpo="+$("#edrpo").val()+"&pass="+$("#pass").val()+"&mail="+$("#mail").val()+"&tel="+$("#tel").val();
	jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){				
				if(response === ''){
                    $("#error").slideDown(function(){
						$("#error").html("Не удалось зарегистрировать пользователя!");
					});
                }
				if(response != ''){
                    $("#ok").slideDown(function(){
						$("#ok").html(response);
					});
                    setTimeout(function() {
                        $("#ok").slideUp();
                    }, 5000);
                    var url = location.href;
                    window.location.href = url+'user.php';
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });	
}