<?php
include_once "database.php";
$mensaje="";
if (!empty($_POST["nombre"])&& !empty($_POST["apellido"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
{
$sql = " INSERT INTO  user(nombre,apellido,email,password) values (:nombre, :apellido, :email, :password)";
    $stmt = $conn ->prepare($sql);
  $stmt->bind_param(":nombre",$_POST["nombre"]);
  $stmt->bind_param(":apellido",$_POST["apellido"]);
  $stmt->bind_param(":email",$_POST["email"]);
  $password= password_hash($_POST["password"],PASSWORD_BCRYPT);
  $stmt->bind_param(":password",$password);
    if($stmt->execute()){
        $mensaje = "SU REGISTRO FUE CREADO EXITOSAMENTE";
    } else{
        $mensaje= "Lo sientimos, hubo un error al crear su cuenta";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>REGISTRATE</title>
    <link href="https://fonts.googleapis.com/css2?family=Potta+One&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styleBG.css">
</head>
<body>
<?php require "partials/header.php" ?>
<?php if(!empty($mensaje)): ?>
<p><?=$mensaje?></p>
<?php endif; ?>


<H1>REGISTRATE</H1>

<form action="signup.php" method="post">
    <input type="text" name="nombre" placeholder="ingrese su nombre">
    <input type="text" name="apellido" placeholder="ingrese sus apellidos">
    <input type="email" name="email" placeholder="ingrese su correo electronico">
    <INPUT TYPE="password" name="password" placeholder="Ingrese su contraseña">
    <INPUT TYPE="password" name="rep_password" placeholder="repita su contraseña">
    <input type="submit" value="enviar">


</form>
<span>ó <a href="login.php">INICIA SESION</a> </span>
</body>
</html>

