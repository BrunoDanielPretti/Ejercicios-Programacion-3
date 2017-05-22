function borrar(p){
    
    $.ajax({
            url: "administracion/borrarPorNombre.php",
            type: "POST",
            data: {
                nombre: p
            }
        })
        .done(function(datos){
            $("#salida").html(datos);
        });   
}


function modificar(p){
    
    $.ajax({
            url: "administracion/modificarPorNombre.php",
            type: "POST",
            data: {
                nombreB: p,
                nombre: $("#txtNombre").val(),
                apellido: $("#txtApellido").val(),
                numero: $("#txtNumero").val()
            }
        })
        .done(function(datos){
            $("#salida").html(datos);
        });   
}