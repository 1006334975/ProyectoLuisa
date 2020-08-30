<?php 

	
	$servidor = "localhost";
	$usuarioBD = "root";
	$passwordBD = "";
	$BD = "formulariophp";

	

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$cc = $_POST['cc'];
	$ciudad = $_POST['ciudad'];
	$genero = $_POST['genero'];
	
	$nombreusuario = $_POST['fusuario'];
	$password = $_POST['contra'];
	$repeatpassword = $_POST['vericontra'];
	$correo = $_POST['correo'];
	$tiposangre = $_POST['psangre'];

	$palabra = "murcielago";
	$contenedor = "";
	

	if ($password == $repeatpassword) {

		for ($i=0; $i <strlen($password); $i++) { 

			$condicion = true;
			
			for ($j=0; $j <strlen($palabra); $j++ && $condicion==true ) { 
				
				if ($password[$i] == $palabra[$j]) {
					
					$contenedor .= $j;
					$condicion = false;
					 
				} 
			}

			if ($condicion == true) {
				$contenedor .= $password[$i];
			}

		}

		$con=mysqli_connect($servidor,$usuarioBD,$passwordBD,$BD);

		if ($con==true) {

			$insertar = "INSERT INTO usuario VALUES (null, '$nombre' , '$apellido' , '$cc' , '$ciudad' , '$genero'
			, '$nombreusuario' , '$password' , 'correo' , '$tiposangre' , '$contenedor')";
			
			$result = mysqli_query($con,$insertar);

			if ($result) {
				echo "se insertaron los datos con exito";
			} else {
				echo "Error".mysqli_error($con);
			}

		} else {

			die("no se pudo conectar al servidor".mysqli_connect_error());

		}

	}else{
		echo "Los password no son iguales";
	}




?>