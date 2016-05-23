$(document).ready(function() {

	$('select').prop('value', false);
		$('#reset').click(function(){
			$('form input[type="text"], form input[type="password"]').val('');
			$('select').prop('value', false);
			$('div.error').hide();
		});

	$('#registration').validate({

		rules: {
			login: {
				required: true,
				login: true,
				minlength: 5,
				maxlength: 20,
			},
			password: {
				required: true,
				login: true,
				minlength: 5,
				maxlength: 20,
			},
			repassword: {
				equalTo: "#password",
			},
			phone: {
				required: true,
				phone: true,
				minlength: 10,
				maxlength: 19,
			},
			invite: {
				required: true,
				digits: true,
				minlength: 6,
				maxlength: 6,
			},
		},

		messages: {
			login: {
				required:  "Это поле обязательое для заполнения",
				minlength: "Логин должен быть минимум 5 символов",
				maxlength: "Максимальное число символов поля 20",
			},
			password: {
				required:  "Это поле обязательое для заполнения",
				minlength: "Пароль должен быть минимум 5 символов",
				maxlength: "Максимальное число символов поля 20",
			},
			phone: {
				required:  "Это поле обязательое для заполнения",
				digits:    "Значением поля могут быть только цифры",
				minlength: "Телефон должен быть минимум 10 символов",
				maxlength: "Максимальное число символов поля 15",
			},
			invite: {
				required:  "Это поле обязательое для заполнения",
				digits:    "Значением поля могут быть только цифры",
				minlength: "Поле инвайт должно состоять из 6 цифр",
				maxlength: "Поле инвайт должно состоять из 6 цифр",
			},
		}

	});

	$("select[name='country']").bind("change", function(){
		$.get("/countryCheck.php", {country: $("select[name='country']").val()},
			function(data) {
				data = JSON.parse(data);
				$("select[name='city']").empty();
				for(var id in data){
					$("select[name='city']").append( $("<option value='" + data[id] + "'>" + data[id] + "</option>"));
				}
			});
	});

	$("#send").bind("click", function () {
		$.ajax({
			url: "/dataCheck.php",
			type: "POST",
			data: ({
				login: $("#login").val(),
				password: $("#password").val(),
				phone: $("#phone").val(),
				country: $("#country").val(),
				city: $("#city").val(),
				invite: $("#invite").val(),
			}),
			success: function(data) {
				alert(data);
			}
		});
	});
});