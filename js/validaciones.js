function validarLogin(event) {
    var correo = document.getElementById("correoL").value;
    var pass = document.getElementById("passL").value;

    var regex = /\w+@\w+\.+[a-z]/;;

    if (correo == "" || pass == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (correo.length > 100) {
        event.preventDefault();
        alert("El correo es demasiado largo");
    } else if (!regex.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    }
}

function validarContacto(event) {
    var nombre = document.getElementById("nombreC").value;
    var apellido = document.getElementById("apellidoC").value;
    var comentario = document.getElementById("comentarioC").value;
    var telefono = document.getElementById("telefonoC").value;
    var correo = document.getElementById("correoC").value;
    var regexC = /\w+@\w+\.+[a-z]/;;
    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;

    if (nombre == "" || apellido == "" || comentario == "" || telefono == "" || correo == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if(!regexL.test(nombre)) {
        event.preventDefault();
        alert("El nombre solo deben de ser letras");
    } else if(!regexL.test(apellido)) {
        event.preventDefault();
        alert("El apellido solo deben de tener letras");
    } else if (isNaN(telefono)) {
        event.preventDefault();
        alert("El telefono no debe de tener letras");
    } else if(!regexC.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    }

}

function validarComprador(event) {
    var correo = document.getElementById("emailCo").value;
    var nombre = document.getElementById("nombreCo").value;
    var telefono = document.getElementById("telefonoCo").value;
    var pass = document.getElementById("passwordCo").value;
    var regex = /\w+@\w+\.+[a-z]/;
    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexN = /^[0-9]+/;

    if (correo == "" || pass == "" || nombre == "" || telefono == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (!regex.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    } else if (!regexL.test(nombre)) {
        event.preventDefault();
        alert("El nombre no debe de tener numeros");
    } else if (isNaN(telefono)) {
        event.preventDefault();
        alert("El telefono no debe de tener letras");
    }
}

function validarVendedor(event) {
    var correo = document.getElementById("emailV").value;
    var nombre = document.getElementById("nombreV").value;
    var telefono = document.getElementById("telefonoV").value;
    var imagen = document.getElementById("fotoV").value;
    var pass = document.getElementById("passwordV").value;
    var id_pago = document.getElementById("id_pago").value;

    var regex = /\w+@\w+\.+[a-z]/;
    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexN = /^[0-9]+/;

    if (correo == "" || pass == "" || nombre == "" || telefono == "" || imagen == "" || id_pago == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (!regexL.test(nombre)) {
        event.preventDefault();
        alert("El nombre no debe de tener numeros");
    } else if (isNaN(telefono)) {
        event.preventDefault();
        alert("El telefono no debe de tener letras");
    } else if (!regex.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    } else if (pass.length <= 11 || pass.length >= 20) {
        event.preventDefault();
        alert("La contraseña debe ser mayor a 12 y menor a 20");
    }
}

function validarCompra(event) {
    var correo = document.getElementById("emailV").value;
    var nombre = document.getElementById("nombreV").value;
    var telefono = document.getElementById("telefonoV").value;
    var imagen = document.getElementById("fotoV").value;
    var pass = document.getElementById("passwordV").value;
    var id_pago = document.getElementById("id_pago").value;

    var regex = /\w+@\w+\.+[a-z]/;
    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexN = /^[0-9]+/;

    if (correo == "" || pass == "" || nombre == "" || telefono == "" || imagen == "" || id_pago == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (!regexL.test(nombre)) {
        event.preventDefault();
        alert("El nombre no debe de tener numeros");
    } else if (isNaN(telefono)) {
        event.preventDefault();
        alert("El telefono no debe de tener letras");
    } else if (!regex.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    } else if (pass.length <= 11 || pass.length >= 20) {
        event.preventDefault();
        alert("La contraseña debe ser mayor a 12 y menor a 20");
    }
}

function validarRefaccion(event) {
    var precio = document.getElementById("precio").value;
    var cantidad = document.getElementById("cantidad").value;
    var descripcion = document.getElementById("descripcion").value;

    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexN = /[!"#%&/()=?¡1']/;

    if (precio == "" || cantidad == "" || descripcion == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (isNaN(precio)) {
        event.preventDefault();
        alert("El precio no debe de tener letras");
    } else if (isNaN(cantidad)) {
        event.preventDefault();
        alert("La cantidad no debe de tener letras");
    } 
}

function validarRefaccionR(event) {
    var modelo = document.getElementById("modelo").value;
    var estatus = document.getElementById("estatus").value;
    var cantidad = document.getElementById("cantidad").value;
    var estatus = document.getElementById("estatus").value;
    var precio = document.getElementById("precio").value;
    var descripcion = document.getElementById("descripcion").value;
    var descripcion = document.getElementById("image").value;

    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexN = /[!"#%&/()=?¡1']/;

    if (modelo == "" || estatus == "" || precio == "" || cantidad == "" || descripcion == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } 
}

function validarMarca(event) {
    var nombreM = document.getElementById("nombreM").value;

    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;

    if (nombreM == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (!regexL.test(nombreM)) {
        event.preventDefault();
        alert("Solo se aceptan letras");
    } 
}

function validarCategoria(event) {
    var nombreC = document.getElementById("nombreC").value;

    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;

    if (nombreC == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if (!regexL.test(nombreC)) {
        event.preventDefault();
        alert("Solo se aceptan letras");
    } 
}

function validarUsuarioA(event) {
    var nombre = document.getElementById("nombre").value;
    var telefono = document.getElementById("telefono").value;
    var correo = document.getElementById("correo").value;
    var pass = document.getElementById("pass").value;

    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexC = /\w+@\w+\.+[a-z]/;

    if (nombre == "" || telefono == "" || correo == "" || pass == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if(!regexL.test(nombre)) {
        event.preventDefault();
        alert("El nombre solo acepta letras");
    } else if(isNaN(telefono)) {
        event.preventDefault();
        alert("El telefono solo son numeros");
    } else if(!regexC.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    } else if (pass.length <= 11 || pass.length >= 20) {
        event.preventDefault();
        alert("La contraseña debe ser mayor a 12 y menor a 20");
    }
}

function validarActualizarC(event) {
    var nombre = document.getElementById("nombre").value;
    var tel = document.getElementById("tel").value;
    var correo = document.getElementById("correo").value;
    var pass = document.getElementById("pass").value;

    var regexL = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
    var regexC = /\w+@\w+\.+[a-z]/;

    if (nombre == "" || tel == "" || correo == "" || pass == "") {
        event.preventDefault();
        alert("Todos los campos deben de estar llenos");
    } else if(!regexL.test(nombre)) {
        event.preventDefault();
        alert("El nombre solo acepta letras");
    } else if(isNaN(tel)) {
        event.preventDefault();
        alert("El telefono solo son numeros");
    } else if(!regexC.test(correo)) {
        event.preventDefault();
        alert("El formato del correo es incorrecto");
    } else if (pass.length <= 11 || pass.length >= 20) {
        event.preventDefault();
        alert("La contraseña debe ser mayor a 12 y menor a 20");
    }
}

function validarOpinion(event) {
    var opinion = document.getElementById("opinion").value;

    if (opinion == "") {
        event.preventDefault();
        alert("El campo debe de estar lleno");
    }
}