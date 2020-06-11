<?php 
	/*Se verifica que exista la sesion, en caso de que no sea aso, se muestta el login*/
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
    }
    $inventario= new MvcController();

?>
<div class="container-fluid">
	<div class="row">
        <div class="card card-secondary col-sm-6">
            <div class="card-header">
                <h3 class="card-title">Productos</h3>
            </div>
            <div class="card-body">
                <div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example1" class="table table-striped dispaly">
                                <thead class="table-info"> 
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Existencias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $inventario->vistaProducto2Controller(); ?>
                                </tbody>
                                
                            </table>	
                        </div>
                    </div>	
                </div>
            </div>
        </div>
        <div class="card card-secondary col-sm-6">
            <div class="card-header">
                <h3 class="card-title">Carrito</h3>
            </div>
            <div class="card-body">
                <div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example1" class="table table-striped dispaly">
                                <thead class="table-info"> 
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Total a pagar: </td>
                                        <td id="total">$ 0</td>
                                        <input id="oculto" hidden></input>
                                    </tr>
                                </tfoot>
                            </table>	
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
</div> <!--/.container-fluid-->