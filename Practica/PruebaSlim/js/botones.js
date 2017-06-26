pNexo = "nexo.php/";

function btnNexo(){
    paseSinParam("");
}


function EnviarParametros(param, metodo="GET"){
    envio = {
        nombre: $("#txtNombre").val(),
        numero: $("#txtNumero").val()
    }
    $.ajax({
        url: pNexo+param,
        type: metodo,
        data: envio,
        dataType: "text"
    }).done(function(datos){
        $("#info").text(datos);
        $("#infoSpan").html( pNexo+"parametros");
        $("#infoDosSpan").html("POST");
    })
}


function paseSinParam(param, metodo="GET"){
    pagina = pNexo+param;
    $.ajax({
        url: pagina,
        type: metodo
    }).done(function(datos){
        $("#info").html(datos);
        $("#infoSpan").html(pagina);
        $("#infoDosSpan").html(metodo);
    })    
}