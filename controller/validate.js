
function validateData(){
    var user = document.getElementById('user').value;
    if(user == null || user.length == 0){
        alert('ERROR: El campo usuario no debe ir vacío o lleno de solamente espacios en blanco');
        return false;
    }
    
    var pass = document.getElementById('pass').value;
    if(pass == null || pass.length != 8){
        alert('ERROR: La contraseña debe contener 8 caracteres');
        return false;
    }
}

function validateContactData(){

    var name = document.getElementById('name').value;
    if(name == null || name.length == 0){
        alert('ERROR: El nombre no puede ir vacío o lleno de espacios en blanco');
        return false;
    }

    var tel = document.getElementById('phone').value;
    if(tel == null || tel.length != 9){
        alert('ERROR: Introduce un número de teléfono válido');
        return false;
    }

    var checkbox = document.getElementById('checkbox');
    if(!checkbox.checked){
        alert('ERROR: Debe aceptar los términos y condiciones');
        return false;
    }
    
    var textarea = document.getElementById('message').value;
    if(textarea.length<25){
        alert('ERROR: El mensaje debe tener al menos 25 caracteres');
        return false;
    }
    var mail = document.getElementById('email').value;
    if(mail == null || mail.length == 0 ||!mail.includes("@") )
        var mailLength= mail.length;
        alert(typeof(mailLength));
        var mailLengthTocheck = mailLength - 4;
        alert(mailLengthTocheck);
        var endOfMail= mail.substring(mailLengthTocheck,mailLength);
        alert(endOfMail);
    if(!endOfMail.includes(".es") && !endOfMail.includes(".com")){
        alert('ERROR: Introduce un mail válido');
        return false;
    }

}

    
