function alta(){
    var datosEnviar = {
        numero: $("#txtNumero").val(),
        descripcion: $("#txtDescripcion").val(),
        pais: $("#txtPais").val(),
        foto: "https://static.pexels.com/photos/104827/cat-pet-animal-domestic-104827.jpeg"//$("#txtFoto").val()
    }
    $.ajax({
        url: "php/alta.php",
        type: "POST",
        data: datosEnviar
    })
    .done(function(datos){
            $("#salida").html(datos);
    });
}

function mostrar(){
    $.ajax({
        url: "php/mostrar.php",
        type: "POST"
    })
    .done(function(datos){
            $("#salida").html(datos);
    });
}

function borrar(p){
    $.ajax({
        url: "php/baja.php",
        type: "POST",
        data: {
            numero: p
        }
    })
}

function modificar(pNumero){
    $.ajax({
        url: "php/modificar.php",
        type: "POST",
        data: {
            pNumero: pNumero,
            descripcion: $("#txtDescripcion").val(),
            pais: $("#txtPais").val(),
            foto: $("#txtFoto").val()
        }
    })
    .done(function(datos){
            $("#salida").html(datos);
    });
}