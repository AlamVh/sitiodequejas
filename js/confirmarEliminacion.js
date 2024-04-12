function confirmarEliminar() {
    var respuesta = confirm("¿Estas seguro de que deseas eliminarlo?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}
