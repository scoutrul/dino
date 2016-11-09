

<!-- Feedback form -->
	<div id="contactForm" class="contactForm">
		<form action="#">
			<div>
				<div class="orderclose closenow">+</div>
				<h4 class="contactform-label">Будем рады общению!</h4>
				<div class="contactform-note">*мы обязательно ответим по e-mail, либо позвоним по указанному номеру телефона</div>
				<label>Представьтесь:
					<input type="text" placeholder="Ваше имя" id="form_name">
				</label>
				<label>Контакты:
					<input type="text" placeholder="e-mail или номер телефона" id="form_contact">
				</label>
				<label>Сообщение:
					<textarea name="text" cols="30" rows="10" placeholder="Что Вас интересует?" id="form_text"></textarea>
				</label>
				<div align="center">		
					<button class="send_mail">Отправить сообщение *</button>
					<div class="closenow">Закрыть</div>
				</div>
			</div>
		</form>
	</div>
	<!-- //Feedback form -->
	<div class="feedback_me">Консультация</div>


<style>
	/* contact form */

	@keyframes formError {
		0% {
			background-color: rgb(239, 5, 5);;
		}
		100% {
			background-color: rgb(255, 255, 255);
		}
	}
	@-webkit-keyframes formError {
		0% {
			background-color: rgb(239, 5, 5);;
		}
		100% {
			background-color: rgb(255, 255, 255);
		}
	}

	.form_error {
		transition: .3s ease-in;
		animation: formError 1s;
		-webkit-animation: formError 1s;
	}



	.contactForm {
	    border-radius: 50%;
	    background-color: rgba(158, 167, 181, 0.96);
	    position: fixed;
	    top: 0;
	    left: 0;
	    height: 100%;
	    width: 100vw;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    display: -webkit-flex;
	    z-index: 10;
	    opacity: 0;
	    filter: alpha(opacity=0);
	    -ms-transform: scale(2);
	        transform: scale(2);
	    -webkit-transform: scale(2);
		display: none;
	    z-index: 3;
	}

	.contactForm.active {
		opacity:1;
		filter: alpha(opacity=100);
		-ms-transform: scale(1);
		    transform: scale(1);
	    -webkit-transform: scale(1);
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    display: -webkit-flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		    -ms-flex-direction: column;
		        flex-direction: column;
		-webkit-flex-direction: column;
		border-radius: 0%;
		z-index: 1005;
		width: 100%;
		overflow: hidden;
	}

	form label {
		color: #FFF;
		display: block;
		margin: auto;
		width: 580px;
		overflow: hidden;
	}

	.contactForm form {
	    margin: auto;
	    letter-spacing: 0.08em;
	    min-width: 480px;
	    max-width: 800px;
	    width: 100%;
	    position: relative;
	}

	.contactForm input {
		background-color: #FFF;
		padding: 30px;
		border-radius: 3px;
		border: 0;
		margin: 5px auto;
		display: block;
		width: 580px;
		font-size: 100%;
		color: #757575;
		box-sizing: content-box;

	}

	.contactForm textarea {
		display: block;
		padding: 30px;
		border-radius: 3px;
		border: 0;
		width: 100%;
		margin: 0 0 20px auto;
		width: 580px;
		font-size: 100%;
		color: #757575;
		overflow: hidden;
		    box-sizing: border-box;
	}

	
	.contactForm button {
	    border-radius: 3px;    
	    border: 0;
	    padding: 20px;
	    margin: auto;
	    text-transform: uppercase;
	    background-color: #088AEF;
	    color: #FFF;
	    font-size: 1em;
	    font-weight: 300;
	    text-align: center;
	    display: block;
	    cursor: pointer;
	    display: inline-block;
	}

	.contactForm button:hover {
	    background-color: #efc508;
	}

	.contactForm .closenow {
		background: none !important;
		color: rgb(255, 61, 61);
		text-decoration: underline;
		margin: 50px auto auto auto;
		width: 160px;
		text-align: center;
		cursor: pointer;
		display: inline-block;
	}
	.contactForm .closenow:hover {
		color: #F2D92C;
	}

	.contactForm .orderclose {
		color: #FF4900;
		cursor: pointer;
		position: absolute;
		padding: 10px;
		font-size: 2.2em;
		font-weight: 300;
		-webkit-transform: rotate(-495deg);
		-ms-transform: rotate(-495deg);
		transform: rotate(-495deg);
		z-index: 1000;
		width: 50px;
		right: 40px;
		top: -70px;
		text-decoration: none;
	}

	.contactForm .orderclose:hover {
	    color: #F2D92C;
		    }

	.contactForm .h1,
	.contactForm .contactform-label {
		font-size: 200%;
		color: #FFF;
		font-weight: 600;
		margin: 50px 0;
		max-width: 600px;
		text-align: center;
		margin:auto auto 20px auto;
	}
	.contactForm .h1 > div {
		    font-weight: 300;
	}


	.contactform-note {
		color: #FFF;
		max-width: 580px;
		text-align: center;
		margin: auto auto 20px auto;
		font-size: 70%;
	}



	.feedback_me {
		position: fixed;
		top: 60%;
		width: 105px;
		right: -60px;
		line-height: 20px;
		font-size: 14px;
		text-align: center;
		-webkit-transform: rotate(90deg);
		-ms-transform: rotate(90deg);
		transform: rotate(90deg);
		z-index: 111;
		padding: 10px 15px 5px;
		border-bottom-left-radius: 20px;
		border-bottom-right-radius: 20px;
		color: #fff;
		transition: .3s ease-in;
		box-shadow: 1px -3px 5px rgba(0, 0, 0, 0.45);
		font-family: 'Open Sans';
		background-image: linear-gradient(180deg, #ffc945, #ff5858);
	}
	.feedback_me:hover {
		background-image: linear-gradient(180deg,#4aaf42,#11e404);
		cursor: pointer;
	}


</style>

<script>

$(function(){

// close
	$('#contactForm .closenow').click(function(){
		$('#contactForm').removeClass('active animated slideInLeft slideOutLeft');
		$('#contactForm').addClass('active animated slideOutLeft');

		$('.feedback_me').css({'right':'-60px'})
	});

//the consultation form
	$('.feedback_me, .send_otzyv').click(function(){
		$('#contactForm').removeClass('animated slideInLeft slideOutLeft');
		$('#contactForm').addClass('active animated slideInLeft');

		$('.feedback_me').css({'right':'-90px'})
	});


	$(".send_mail").click(function() {

		$('.form_error').removeClass('form_error');

		var hasError = false;

		var name = $("#form_name").val();
		if (name == '') {
			$("#form_name").focus().addClass('form_error');
			hasError = true;
			return false;
		} 

		var contact = $("#form_contact").val();
		if(contact == '') {
			$("#form_contact").focus().addClass('form_error');
			hasError = true;
			return false;
		}


		var message = $("#form_text").val();
		if(message == '' ) {
			$("#form_text").focus().addClass('form_error');
			hasError = true;
			return false;
		}


		var dataString = 'name=' + name + '&contact=' + contact + '&message=' + message;

		$.ajax({
		type: "POST",
		url: "/mail.php",
		data: dataString,
			success: function() {
				$('.contactForm').removeClass('active animated slideInDown slideOutUp');
				$('.contactForm').addClass('active animated slideOutUp').find("input[type=text], textarea").val("");
				alert("Ваше сообщение отправленно!"); 
			}
		});
		return false;
	});
});	
</script>
