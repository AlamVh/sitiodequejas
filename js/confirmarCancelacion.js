function confirmarCancelarQueja() {
    var respuesta = confirm("¿Estas seguro de que deseas cancelar tu queja?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}
