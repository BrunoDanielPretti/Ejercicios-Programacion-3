correo:<input type="text" id="txtMail" value="<?php 
if(isset($_COOKIE["mail"])){echo $_COOKIE["mail"];}
?>"><br>
clave:<input type="password" id="txtClave" value=""><br> 
<input type="button" class="btn btn-success" value="Ingresar" onclick="IngresarCliente()">