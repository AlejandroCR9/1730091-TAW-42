<h1>REGISTRO DE USUARIO</h1>

<form method="post">
    <input type="text" placeholder="Nombre" name="nombreRegistro" required>
    <input type="text" placeholder="Descripcion" name="descripcionRegistro" required>
    <input type="text" placeholder="Precio Compra" name="preciocompraRegistro" required>
    <input type="text" placeholder="Precio Venta" name="precioRegistro" required>
    <input type="text" placeholder="Num Inventario" name="inventarioRegistro" required>
    <label for="cars">Categoria:</label>

    <select id="idcategoriaRegistro">
        <?php $respuesta = DatosProd::vistaCat("categorias"); 
            foreach ($respuesta as $row => $item) {
                echo('<option value="'.$item["id"].'">'.$item["nombre"].'</option>');
            }
        ?>

    </select>
    
    <input type="submit" value="Enviar">
</form>

<?php
    //ENVIAR LOS PARAMETROS DEL REGISTRO AL CONTROLADOR
    $registro = new prodController();
    $registro->registroProdController();

    if(isset($_GET['action'])){
        if($_GET['action'] == 'okP'){
            echo 'Registro exitoso.';
        }
    }
   ?> 