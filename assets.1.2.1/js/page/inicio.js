
function prueba()
{
    Swal.fire({
        title: 'Desea enviar este mensaje al administrador?',
        showDenyButton: true,

        confirmButtonText: 'Si',
        denyButtonText: `No`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire('Mensaje enviado correctamente!', '', 'success')
        } else if (result.isDenied) {
          Swal.fire('Mensaje no enviado', '', 'info')
        }
      })
      
}


function EnviarMensaje(){
    nombre = document.getElementById('nombre');
    email = document.getElementById('email');
    mensaje = document.getElementById('mensaje');
    if(nombre.value !== "" && mensaje.value !== ""){
        /////////// POST /////////
     
        var http = new FormData();
        http.append("request","grabar");
        http.append("nombre", nombre.value);

        var request = new XMLHttpRequest();
        request.open("POST", "prueba.php");
        request.send(http);
        request.onreadystatechange = function(){
           //console.log( request );
           if(request.readyState != 4) return;
           if(request.status === 200){
            resultado = JSON.parse(request.responseText);
                if(resultado.status !== true){
                   console.log("nose ha grabado nada");
                }
                //console.log( resultado );
                console.log("enviado");
                alert("si se envio, revise su bandeja de entrada");
            }
        };     
    }else{
        if(nombre.value === ""){
            nombre.className = "form-danger";
        }else{
            nombre.className = "form-control";
        }
       console.log("error");
    }
}
