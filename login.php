<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/login.css">
    <title>Iniciar Sesión</title>
</head>
<body>
<?php
// Mover todo el código PHP al principio del archivo
session_start();

$_SESSION["user"] = "";
$_SESSION["usertype"] = "";

// Set the new timezone
date_default_timezone_set('America/Guayaquil');
$date = date('Y-m-d');

$_SESSION["date"] = $date;

// Import database
include("connection.php");

if ($_POST) {
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];

    $error = '<label for="promter" class="form-label"></label>';

    $result = $database->query("SELECT * FROM webuser WHERE email='$email'");
    if ($result->num_rows == 1) {
        $utype = $result->fetch_assoc()['usertype'];
        if ($utype == 'p') {
            $checker = $database->query("SELECT * FROM patient WHERE pemail='$email' AND ppassword='$password'");
            if ($checker->num_rows == 1) {
                $_SESSION['user'] = $email;
                $_SESSION['usertype'] = 'p';
                header('Location: patient/index.php');
                exit(); // Asegúrate de salir después de redirigir
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: Correo electrónico o contraseña incorrectos</label>';
            }
        } elseif ($utype == 'a') {
            $checker = $database->query("SELECT * FROM admin WHERE aemail='$email' AND apassword='$password'");
            if ($checker->num_rows == 1) {
                $_SESSION['user'] = $email;
                $_SESSION['usertype'] = 'a';
                header('Location: admin/index.php');
                exit();
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: Correo electrónico o contraseña incorrectos</label>';
            }
        } elseif ($utype == 'd') {
            $checker = $database->query("SELECT * FROM doctor WHERE docemail='$email' AND docpassword='$password'");
            if ($checker->num_rows == 1) {
                $_SESSION['user'] = $email;
                $_SESSION['usertype'] = 'd';
                header('Location: doctor/index.php');
                exit();
            } else {
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Credenciales incorrectas: Correo electrónico o contraseña incorrectos</label>';
            }
        }
    } else {
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">No podemos encontrar ninguna cuenta para este correo electrónico.</label>';
    }
} else {
    $error = '<label for="promter" class="form-label">&nbsp;</label>';
}
?>
    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">¡Bienvenido de nuevo!</p>
                </td>
            </tr>
            <div class="form-body">
                <tr>
                    <td>
                        <p class="sub-text">Inicie sesión con sus datos para continuar</p>
                    </td>
                </tr>
                <tr>
                    <form action="" method="POST">
                    <td class="label-td">
                        <label for="useremail" class="form-label">Email: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="email" name="useremail" class="input-text" placeholder="Dirección de correo electrónico" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <label for="userpassword" class="form-label">Contraseña: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td">
                        <input type="password" name="userpassword" class="input-text" placeholder="Contraseña" required>
                    </td>
                </tr>
                <tr>
                    <td><br>
                    <?php echo $error ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Iniciar sesión" class="login-btn btn-primary btn">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">No tienes cuenta&#63; </label>
                        <a href="signup.php" class="hover-link1 non-style-link">Regístrate</a>
                        <br><br><br>
                    </td>
                </tr>
                </form>
            </div>
        </table>
    </div>
    </center>
</body>
</html>
