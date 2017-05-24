//--------------------- ALTA
function MenuCargarCliente(){    
    $.ajax({
        url: "partes/altaCliente.php",
        type: "POST"
    })
    .done(function(datos){        
        $("#salida").html(datos);
    });
}

function CargarCliente(){   
    var DatosEnvio = {
        nombre: $("#txtNombre").val(),
        mail: $("#txtMail").val(),
        clave: $("#txtClave").val(),
        edad: $("#txtEdad").val()
    }
    
    $.ajax({
        url: "php/ClienteCarga.php",
        type: "POST",
        data: DatosEnvio
    })
    .done(function(){
        $("#salida").html("Datos cargados correctamente");
    });
}
//--------------------- Validar Cliente 

function MenuValidarCliente(){
     $.ajax({
        url: "partes/menuValidar.php",
        type: "POST"
    })
    .done(function(datos){        
        $("#salida").html(datos);
    });
}


function IngresarCliente(){
    var DatosEnvio = {        
        mail: $("#txtMail").val(),
        clave: $("#txtClave").val(),        
    }
    
    $.ajax({
        url: "php/ValidarCliente.php",
        type: "POST",
        data: DatosEnvio
    })
    .done(function(datos){
        if(datos == "logueado"){
            $.ajax({
                url: "php/ClienteListado.php",
                type: "POST"
            })
            .done(function(datos){
                $("#salida").html(datos);
            });
        }else{
            $("#salida").html(datos);
        }        
    });
    
}

//------------- OTROS

function MenuListado(){
    $.ajax({
        url: "php/ClienteListado.php",
        type: "POST"
    })
    .done(function(datos){
        $("#salida").html(datos);
    });
}

function CerrarSesion(){
    $.ajax({
        url: "php/CerrarSesion.php",
        type: "POST"
    })
    .done(function(datos){        
        $("#salida").html(datos);
    });
}

//------------------  MODIFICAR

function borrar(param){
    $.ajax({
        url: "php/BorrarCliente.php",
        type: "POST",
        data: {parametro: param}
    })
    .done(function(datos){        
        $("#salida").html(datos);
    });
}

//------------------ PRODUCTOS

function AltaProducto(){
    var datosEnviar = {
            informacion: $("#txtInformacion").val(),
            imagen: $("#miImagen").val(),            
        }

        $.ajax({
            url: "php/ProductoAlta.php",
            type: "POST",
            data: datosEnviar
        })
}

function mAltaProducto(){
    $.ajax({
        url: "partes/mAltaProducto.php",
        type: "POST"
    })
    .done(function(datos){        
        $("#mProductos").html(datos);
    });
}

function MostrarProductos(){    
     $.ajax({
        url: "php/ProductosListar.php",
        type: "POST"
    })
    .done(function(datos){
        $("#mProductos").html(datos);
    });
}

function borrarProducto(p){
    
    $.ajax({
            url: "php/ProductoBorrar.php",
            type: "POST",
            data: {
                informacion: p
            }
        })
        .done(function(datos){
            $("#mProductos").html(datos);
        });   
}