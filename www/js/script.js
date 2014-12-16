/* Проверяем поле на пустоту */
function checkUser(){
    var valid = true;
    if($("#checkUser").val() === ""){
        $("#newUser").fadeOut();
        $("#ajaxError").fadeIn(); //плавное появление
        return false; // не производить переход по ссылке
    }else{
        $("#ajaxError").fadeOut();
        var myData = "pass="+ $("#checkUser").val();
        jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){
                //alert(response);
				if(response === ''){
                    $("#newUser").fadeIn(response);
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
	if($("#login").val().length < 2){
		$("#error").fadeIn(function(){
			$("#error").html("Pole ( login ) pusto!");			
		});
		$("#login").focus();
		setTimeout(function() {
			$("#error").fadeOut();
		}, 3000);
		return false;
	}else if($("#edrpo").val().length < 7){
		$("#error").fadeIn(function(){
			$("#error").html("Pole ( edrpo ) pusto!");			
		});
		$("#edrpo").focus();
		setTimeout(function() {
			$("#error").fadeOut();
		}, 3000);
		return false;
	}else if($("#pass").val().length < 4){
		$("#error").fadeIn(function(){
			$("#error").html("Pole ( password ) pusto!");			
		});
		$("#pass").focus();
		setTimeout(function() {
			$("#error").fadeOut();
		}, 3000);
		return false;	
	}else if($("#mail").val().length < 4){
		$("#error").fadeIn(function(){
			$("#error").html("Pole ( mail ) pusto!");			
		});
		$("#mail").focus();
		setTimeout(function() {
			$("#error").fadeOut();
		}, 3000);
		return false;
	}else if($("#tel").val().length < 4){
		$("#error").fadeIn(function(){
			$("#error").html("Pole ( tel ) pusto!");			
		});
		$("#tel").focus();
		setTimeout(function() {
			$("#error").fadeOut();
		}, 3000);
		return false;
	}	
	var myData = "name="+$("#login").val()+"&edrpo="+$("#edrpo").val()+"&pass="+$("#pass").val()+"&mail="+$("#mail").val()+"&tel="+$("#tel").val();	
	jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){				
				if(response === ''){
                    $("#error").fadeIn(function(){
						$("#error").html("Не удалось зарегистрировать пользователя!");
					});
                }
				if(response != ''){
                    $("#ok").fadeIn(function(){
						$("#ok").html(response);
					});					
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });	
}