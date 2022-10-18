<!DOCTYPE html>
    <html lang="es">
        <head> 
            <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" type="text/css" href="css/imta.css">
                <link rel="stylesheet" type="text/css" href="css/imta_login.css">
            <!-- Otros -->
                <link rel="stylesheet" href="css/sweetalert2.css"/>
                <script src="js/jquery-3.5.1.min.js"></script>
                <script src="js/sweetalert2.js"></script>            
        </head>
        <body>
            <form action="logueo.php" method="post">
                <div class="container-fluid align-items-center">
                    <div id="input-container">
                        <b class="login-iconos">* D.N.I. N°:</b>
                        <input id="txt_dni" type="text" class="form-control form-control-sm txt" name="0dni" placeholder="Incluir los puntos (12.345.678)" required title="Escriba su número de documento, incluyendo los puntos." size="10" maxlength="10" autofocus>
                    </div>
                    <div id="input-container">
                        <b class="login-iconos">* E-mail:</b>
                        <input id="txt_mail" type="email" class="form-control form-control-sm txt" name="0mail" required title="Escriba su dirección de e-mail." placeholder="usuario@dominio.com">
                    </div>
                    </br>
                    <div id="input-container">
                        <b class="login-iconos">* Contraseña:</b>
                        <input id="txt_psw" type="password" class="form-control form-control-sm txt" name="0psw" required title="Escriba su contraseña (el sistema distingue entre mayúsculas y minúsculas).">
                    </div>                  
                    <div class="divbtn">
                        <button type="submit" class="btn" id="btn_ingresar"><b> INGRESAR</b></button>
                    </div>
                </div>
    <?php
        if(isset($_GET['login'])=='false') {                    
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "¡ERROR!",
                    text: "Alguno de los datos ingresados, es incorrecto. Intenta de nuevo.",
                    showConfirmButton: true,
                    confirmButtonText: "ACEPTAR"
                });
            </script>';
        }
    ?>  
            </form>           
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="js/bootstrap.min.js"></script>
        </body>
    </html>