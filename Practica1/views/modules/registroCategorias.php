<h1>REGISTRO DE Categotria</h1>

<form method="post">
    <input type="text" placeholder="nombre" name="nombreRegistro" required>
    <input type="submit" value="Enviar">
</form>

<?php
    //ENVIAR LOS PARAMETROS DEL REGISTRO AL CONTROLADOR
    $registro = new catController();
    $registro->registroCatController();

    if(isset($_GET['action'])){
        if($_GET['action'] == 'okC'){
            echo 'Registro exitoso.';
        }
    }
   ?>