
function Enviar()
{
    Swal.fire({
        title: 'Desea enviar este mensaje al administrador?',
        showDenyButton: true,

        confirmButtonText: 'Si',
        denyButtonText: `No`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          EnviarMensaje();
        } else if (result.isDenied) {
          Swal.fire('Mensaje no enviado', '', 'info')
        }
      })
      
}


function EnviarMensaje(){
    nombre = document.getElementById('nombre');
    email = document.getElementById('email');
    mensaje = document.getElementById('mensaje');
    telefono = document.getElementById('telefono');
    if(nombre.value !== "" && mensaje.value !== "" && email.value !== "" && telefono.value !== ""){
        /////////// POST /////////
     
        var http = new FormData();
        http.append("request","grabar");
        http.append("nombre", nombre.value);
        http.append("mail", email.value);
        http.append("mensaje", mensaje.value); 
        http.append("telefono", telefono.value);      
        var request = new XMLHttpRequest();
        request.open("POST", "ajax/ajax_contactanos.php");
        request.send(http);
        request.onreadystatechange = function(){
           //console.log( request );
           if(request.readyState != 4) return;
           if(request.status === 200){
            resultado = JSON.parse(request.responseText);
                if(resultado.status !== true){
                  alert("no se envio");
                  return;
                }
                //console.log( resultado );
               // console.log("enviado");
               
                /*Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: resultado.message,
                  showConfirmButton: false,
                  timer: 1500
                });*/
                swal(
                  'Mensaje enviado!',
                  'Pronto recibiras respuesta...',
                  'success'
                )
                setTimeout("location.href='index.html'", 1600);
            }
        };     
    }else{
        if(email.value == "" || mensaje.value  == "" ){
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Debes completar todos los campos..',
         
          });
        }else{
            nombre.className = "form-control";
        }

    }
}
