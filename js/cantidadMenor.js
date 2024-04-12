function cantidadMenor() {
    var cantidad = document.getElementsByClassName('cantidad');
    var cant = document.getElementById('cantidad');
    console.log(cant.textContent);
    if (cant.textContent <= 3) {
        cant.classList.add('badge', 'bg-danger', 'rounded-pill');
    } else {
        cant.classList.remove('cantidad');
    }
}