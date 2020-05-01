window.onload = function() {
    
  };

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


    