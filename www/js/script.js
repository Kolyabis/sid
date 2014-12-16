/* Проверяем поле на пустоту */
function checkUser(){
    var valid = true;
    if($("#checkUser").val() === ""){
        $("#newUser").slideUp();
        $("#ajaxError").slideDown(); //плавное появление
        return false; // не производить переход по ссылке
    }else{
        $("#ajaxError").slideUp();
        var myData = "pass="+ $("#checkUser").val();
        jQuery.ajax({
            type: "POST", // HTTP метод  POST
            url: "class/ajaxController.php", //url-адрес, по которому будет отправлен запрос
            dataType:"text", // Тип данных,  которые пришлет сервер в ответ на запрос ,например, HTML, json
            data:myData, //данные, которые будут отправлены на сервер (post переменные)
            success:function(response){
                //alert(response);
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
	if($("#login").val().length < 2){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( login ) pusto!");			
		});
		$("#login").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 3000);
		return false;
	}else if($("#edrpo").val().length < 7){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( edrpo ) pusto!");			
		});
		$("#edrpo").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 3000);
		return false;
	}else if($("#pass").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( password ) pusto!");			
		});
		$("#pass").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 3000);
		return false;	
	}else if($("#mail").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( mail ) pusto!");			
		});
		$("#mail").focus();
		setTimeout(function() {
			$("#error").slideUp();
		}, 3000);
		return false;
	}else if($("#tel").val().length < 4){
		$("#error").slideDown(function(){
			$("#error").html("Pole ( tel ) pusto!");			
		});
		$("#tel").focus();
		setTimeout(function() {
			$("#error").slideUp();
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
                    $("#error").slideDown(function(){
						$("#error").html("Не удалось зарегистрировать пользователя!");
					});
                }
				if(response != ''){
                    $("#ok").slideDown(function(){
						$("#ok").html(response);
					});					
                }
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //выводим ошибку
            }
        });	
}