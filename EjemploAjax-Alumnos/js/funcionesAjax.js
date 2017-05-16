
function MostrarError()
{
	//alert("error");
	//url:"nexoNoExiste.php",type:"post"
	$.ajax({
		url: "nexoNoExiste.php"
	}).then(funcionUno, funcionDos);
}



function funcionUno(retorno)
{
	console.info(retorno);
	$("#informe").html("Correcto!!");
	$("#principal").html(retorno);
	
}

function funcionDos(retorno) //Cuando anda mal
{
	console.info(retorno);
	$("#informe").html(retorno.responseText);
	$("#principal").html("Error :(");
}

function MostrarSinParametros()
{
	//url:"nexoTexto.php"});
	$.ajax({
		url: "nexoTexto.php"
	}).then(funcionUno, funcionDos);
	
}

function Mostrar(queMostrar)
{
		//alert(queMostrar);
	
		$.ajax({
			url: "nexo.php",
			type: "POST",
			data: {
				queHacer: queMostrar
			}
		}).then(funcionUno, funcionDos);
		//url:"nexo.php",
		//type:"post",
	
}

function MostarLogin()
{
		//alert(queMostrar);
		// ESTA FUNCIONA
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
	
	// $.ajax({
	// 	url: "nexo.php",
	// 	type: "POST",
	// 	data: {
	// 		queHacer:"MostrarLogin"
	// 	}
	// }).then(funcionUno, funcionDos);
}