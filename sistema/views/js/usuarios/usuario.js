//Creado por RAFAEL ANDRES CHAPARRO PARDO UNIR

window.onload = function (){


}

function onlyNumberKey(evt) {          
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57) && (ASCIICode < 90 || ASCIICode > 64) )
        return false;
    return true;
}



  function validar(){

    var claveUsuario= document.getElementById('claveUsuario');
    var claveUsuario2= document.getElementById('claveUsuario2');



        if(claveUsuario.value!="" && claveUsuario2.value!="")
        { 
            if(claveUsuario.value!=claveUsuario2.value)
            {
                claveUsuario2.setCustomValidity('Ingrese la misma clave');

            }
            else{
                claveUsuario2.setCustomValidity('');
            }
           
        }




  }

