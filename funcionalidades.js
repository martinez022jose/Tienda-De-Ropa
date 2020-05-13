(()=>{
    let imagenes = document.querySelectorAll('.cajaSlider .cajaImgen img');
    console.log(imagenes);

        
     //Trabajamos sobre la imagen selecccionada

    var imagenUnica = document.querySelector('.cajaPantallaUnica');

       imagenes.forEach((imagen)=>{
        	imagen.addEventListener('click',()=>{
        		var ruta = imagen.getAttribute('src');

        		document.querySelector('.cajaPantallaUnica .cajaImg img').src=ruta;
                
                imagenUnica.classList.add('activoPantallaUnica');

            });
   
        });
        
       


});