<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/modal.css"> <!-- Add this line -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        
    <title>Registro</title>
    
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('America/Guayaquil');
$date = date('Y-m-d');

$_SESSION["date"]=$date;

if($_POST){
    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );

    print_r($_SESSION["personal"]);
    header("location: create-account.php");
}

?>

<center>
<div class="container">
    <form action="" method="POST">
        <table border="0">
            <tr>
                <td colspan="2">
                    <p class="header-text">Empecemos</p>
                    <p class="sub-text">Añade tus datos personales para continuar</p>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Nombre: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="Nombre" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Apellido" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Direccion: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Direccion" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="nic" class="form-label">Identificacion: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="nic" class="input-text" placeholder="Numero de cedula" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Fecha de nacimiento: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="button" id="openModal" class="login-btn btn-secondary btn">
                        Revisar Términos y Condiciones
                    </button>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" value="Limpiar" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Siguiente" class="login-btn btn-primary btn">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">¿Ya tienes una cuenta&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Iniciar sesion</a>
                    <br><br><br>
                </td>
            </tr>
        </table>
    </form>
</div>
</center>
<!-- Modal --> 
<div id="myModal" class="modal"> 
    <div class="modal-content"> 
        <span class="close">&times;</span> 
        <h2>Términos y Condiciones de Uso</h2> 
        <p>Por favor, revisa nuestros 
            <a href="terminos_condiciones.html">
                Términos y Condiciones de Uso</a> y nuestras 
                <a href="politicas_privacidad.html">
                    Políticas de Privacidad</a> antes de continuar.</p> 
    </div> 
</div> 
<!-- Estilos para el Modal --> 
<style> 
.modal { 
    display: none; 
    position: fixed; 
    z-index: 1; 
    padding-top: 100px; 
    left: 0; 
    top: 0; 
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
} 
.modal-content { 
    background-color: #fefefe; 
    margin: auto; 
    padding: 20px; 
    border: 1px solid #888; 
    width: 80%; 
} 
.close { 
    color: #aaa; 
    float: right; 
    font-size: 28px; 
    font-weight: bold; 
} 
.close:hover, .close:focus { 
    color: black; 
    text-decoration: none; 
    cursor: pointer; 
} 
</style> 
<script> 
document.addEventListener('DOMContentLoaded', function() {
    // Obtener el modal 
    var modal = document.getElementById("myModal"); 
    // Obtener el botón que abre el modal 
    var btn = document.getElementById("openModal"); 
    // Obtener el elemento <span> que cierra el modal 
    var span = document.getElementsByClassName("close")[0]; 
    // Cuando el usuario hace clic en el botón, se abre el modal 
    btn.onclick = function() { 
        modal.style.display = "block"; 
    } 
    // Cuando el usuario hace clic en <span> (x), se cierra el modal 
    span.onclick = function() { 
        modal.style.display = "none"; 
    } 
    // Cuando el usuario hace clic en cualquier lugar fuera del modal, se cierra el modal 
    window.onclick = function(event) { 
        if (event.target == modal) { 
            modal.style.display = "none"; 
        } 
    } 
});
</script> 
</body>
</html>