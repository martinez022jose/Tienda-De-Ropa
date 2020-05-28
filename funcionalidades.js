
    var imagenUnica = document.querySelector('.cajaPantallaUnica');
    var imagenes = document.querySelectorAll('section .cajaGaleria .cajaItems .item  .cajaImagen .img');
    var buttonClose = document.querySelector('section .cajaPantallaUnica .cajaImg #buttonClose');
    var resFormularioPass = document.querySelector('section .cajaDeConfiguracion .cajaFormulario .formulario .resFormularioPass');
    var buttonCambiarPass = document.querySelector('section .cajaDeConfiguracion .cajaFormulario .formulario  .item #cambiarPass');
    var resFormularioPerfil = document.querySelector('section .cajaDeConfiguracion .cajaFormulario .formulario .resFormularioPerfil');
    var buttonCambiarPerfil = document.querySelector('section .cajaDeConfiguracion .cajaFormulario .formulario  .item  #cambiarPerfil');
    
    document.addEventListener('DOMContentLoaded',generarCambioPerfil);
    document.addEventListener('DOMContentLoaded',generarCambioPass);
   
    
    imagenes.forEach((imagen)=>{
        imagen.addEventListener('click',()=>{
            var ruta = imagen.getAttribute('src');

            document.querySelector('.cajaPantallaUnica .cajaImg img').src=ruta;
            
            imagenUnica.classList.add('activoPantallaUnica');

        });

    });

    buttonClose.addEventListener('click',()=>{
        imagenUnica.classList.remove('activoPantallaUnica');

    });

   
    
    
    function generarCambioPass(){
        buttonCambiarPass.addEventListener('click',validarCambioPass);
    }
    function generarCambioPerfil(){
        buttonCambiarPerfil.addEventListener('click',validarCambioPerfil);
    }
    
    function validarCambioPerfil(){
        resFormularioPerfil.innerHTML = '';
        var user = document.getElementById('inputUser').value;
        var foto = document.getElementById('inputFile').value;
        var pass = document.getElementById('inputPass').value;
        var datosAEnviar = 'nuevoUser=' +user+ '&imgPerfil=' +foto+ '&passVerificacion='+pass;
    
        var xhttp = new XMLHttpRequest();
    
        xhttp.open("POST","validarCambioPerfil.php",true);
    
        xhttp.onreadystatechange = function(){
            if(xhttp.status == 200 && xhttp.readyState == 4){
                var mensaje = xhttp.responseText;
                resFormularioPerfil.innerHTML += mensaje;}
            }
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send( datosAEnviar);
    }
    
    function validarCambioPass(){
        resFormularioPass.innerHTML = '';
        var nuevaPass = document.getElementById('nuevaPass').value;
        var confPass = document.getElementById('confPass').value;
        
        var datosAEnviar = 'nuevaPass='+nuevaPass+'&confPass='+confPass;
        
        var xhttp = new XMLHttpRequest();
    
        xhttp.open("POST","validacionCambioPass.php",true);
    
        xhttp.onreadystatechange = function(){
            if(xhttp.status == 200 && xhttp.readyState == 4){
                var mensaje = xhttp.responseText;
                resFormularioPass.innerHTML += mensaje;}
            }
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(datosAEnviar);
    }


    


