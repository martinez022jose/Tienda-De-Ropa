
    var imagenUnica = document.querySelector('.cajaPantallaUnica');
    var imagenes = document.querySelectorAll('section .cajaGaleria .cajaItems .item  .cajaImagen .img');
    var buttonClose = document.querySelector('section .cajaPantallaUnica #buttonClose');
    
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
    


