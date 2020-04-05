

function validateData(){
    var txt = document.getElementById('user').value;
    if(txt == null || txt.length == 0){
        alert('ERROR: El campo usuario no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }
    
    var pass = document.getElementById('pass').value;
    if(pass == null || pass.length != 8){
        alert('ERROR: La contraseña debe contener 8 caracteres');
        return false;
    }

    var tel = document.getElementById('telefono').value;
    if(tel == null || tel.length != 9){
        alert('ERROR: Introduce un número de teléfono válido');
        return false;
    }
    var direccion = document.getElementById('direccion').value;
    if(direccion == null || direccion.length == 0){
        alert('ERROR: El campo dirección no debe ir vacío o lleno de solamente espacios en blanco');
        return false; 
    }
    var piso = document.getElementById('piso').value;
    if(piso == null || piso.length == 0){
        alert('ERROR: El campo piso no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }
    var letra = document.getElementById('letra').value;
    if(letra == null || letra.length == 0){
        alert('ERROR: El campo letra no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }

    var mail = document.getElementById('email').value;
    if(mail == null || mail.length == 0 || !mail.includes(".es") || !mail.includes(".com") ||!mail.includes("@")){
        alert('ERROR: Introduce un mail válido');
        return false;
    }
}