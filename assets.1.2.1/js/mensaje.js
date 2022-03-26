
setTimeout(function(){ 
	var VideHeader = document.getElementById("video");
	VideHeader.muted = false;
}, 1000);

function mensaje(){
	nombre = document.getElementById('nombre');
	apellido = document.getElementById('apellido');
	email = document.getElementById('email');
	phone = document.getElementById('phone');
	title = document.getElementById('title');
	message = document.getElementById('message');
	var boton = document.getElementById("btn-enviar");
	loadingBtn(boton);
	if(nombre.value !== "" && apellido.value !== "" && email.value !== "" && phone.value !== "" && title.value !== "" && message.value !== ""){
		//alert('--');
		var http = new FormData();
		http.append("nombre", nombre.value);
		http.append("apellido", apellido.value);
		http.append("email", email.value);
		http.append("phone", phone.value);
		http.append("title", title.value);
		http.append("message", message.value);
		var request = new XMLHttpRequest();
		request.open("POST", "EXEmail.php");
		request.send(http);
		request.onreadystatechange = function(){
			console.log( request );
			if(request.readyState != 4) return;
			if(request.status === 200){
				//console.log( request.responseText );
				resultado = JSON.parse(request.responseText);
				if(resultado.status !== true){
					swal("Error", resultado.message , "error").then((value) => { deloadingBtn(boton,'<i class="fa fa-send"></i> Enviar'); });
					return;
				}
				swal("Mensaje enviado", resultado.message , "success").then((value) => { deloadingBtn(boton,'<i class="fa fa-send"></i> Enviar'); });
				return;
			}
		};
	}else{
		swal("Ups!", "Por favor, complete los campos requeridos \n(se\u00F1alados con un *)...", "warning").then((value) => { deloadingBtn(boton,'<i class="fa fa-send"></i> Enviar'); });
	}
}

function loadingBtn(elemento){
	elemento.innerHTML = '<i class="fa fa-spinner fa-pulse fa-2x"></i>';
	elemento.setAttribute("disabled","disabled");
}	

function deloadingBtn(elemento,txthtml){
	elemento.innerHTML = txthtml;
	elemento.removeAttribute("disabled");
}

/////////////////// VIDEO ///////////////////
function muteVideo() {
	var VideHeader = document.getElementById("video");
	var boton1 = document.getElementById("btn-sound"); 
	var boton2 = document.getElementById("btn-mute"); 
	boton1.className = 'btn btn-secondary btn-sm';
	boton2.className = 'btn btn-secondary hidden btn-sm';
	VideHeader.muted = true;
}

function soundVideo() {
	var VideHeader = document.getElementById("video");
	var boton1 = document.getElementById("btn-sound"); 
	var boton2 = document.getElementById("btn-mute"); 
	boton1.className = 'btn btn-secondary hidden btn-sm';
	boton2.className = 'btn btn-secondary btn-sm';
	VideHeader.muted = false; 
}

function playVideo() {
	var VideHeader = document.getElementById("video");
	var boton1 = document.getElementById("btn-play"); 
	var boton2 = document.getElementById("btn-contact"); 
	boton1.className = 'hidden';
	boton2.className = 'btn btn-transparent js-scroll-trigger boton-contact';
	VideHeader.play(); 
}

function pauseVideo() {
	var VideHeader = document.getElementById("video");
	var boton1 = document.getElementById("btn-play"); 
	var boton2 = document.getElementById("btn-pause"); 
	boton1.className = 'btn btn-secondary btn-sm';
	boton2.className = 'btn btn-secondary hidden btn-sm';
	VideHeader.pause(); 
} 

function goFullscreen() {
	var element = document.getElementById("video");       
	if (element.mozRequestFullScreen) {
		element.mozRequestFullScreen();
	} else if (element.webkitRequestFullScreen) {
		element.webkitRequestFullScreen();
	}
	element.controls = true; 
}


