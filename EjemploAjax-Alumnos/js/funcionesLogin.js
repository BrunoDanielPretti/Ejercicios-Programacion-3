function validarLogin()
{
		var varUsuario=$("#correo").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');
		
$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	//sleep(3);
	//	url:"php/validarUsuario.php",
	//	type:"post",
	$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data: {
			usuario: varUsuario,
			clave:	 varClave,
			recordarme: recordar
		}
	})
	.done(function(retorno){
		if(1==1){	
				MostarBotones();
				MostarLogin();

				$("#BotonLogin").html("Ir a salir<br>-Sesión-");
				$("#BotonLogin").addClass("btn btn-danger");				
				$("#usuario").val("usuario: "+retorno);
			}else
			{
				$("#informe").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}

		
	})
	.fail(funcionDos);


		
			// si esta logeado le habilito los botones 
			//if(????????){	
				//MostarBotones();
			//	MostarLogin();

			//	$("#BotonLogin").html("Ir a salir<br>-Sesión-");
			//	$("#BotonLogin").addClass("btn btn-danger");				
			//	$("#usuario").val("usuario: "+retorno);
			//}else
			//{
			//	$("#informe").html("usuario o clave incorrecta");	
			//	$("#formLogin").addClass("animated bounceInLeft");
		//	}
	//error de ajax muestro lo siguiente
	//	$("#botonesABM").html(":(");
	//	$("#informe").html(retorno.responseText);	

	
}
function deslogear()
{		
	$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	})
	.done(function(){
		location.reload();
		MostarLogin();		
		//$(document).ready(MostrarLogin());
	})
		// url:"php/deslogearUsuario.php",
		// type:"post"		

}
function MostarBotones()
{	
	$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	})
	.done(function(data){		
		$("#botonesABM").html(data);
	})
	//	url:"nexo.php",
	//	type:"post",
	//	data:{queHacer:"MostarBotones"}


	
}


