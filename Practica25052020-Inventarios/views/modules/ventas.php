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
        <div id="resp"></div>
        <div class="card card-secondary col-sm-6">
            <div class="card-header">
                <h3 class="card-title">Productos</h3>
            </div>
            <div class="card-body">
                Click en la fila para agregar producto:
                <div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example1" class="table table-bordered table-hover dataTable">
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
            <form method="post" action="index.php?action=inventario">
                <div class="form-group">
                    <label for="categoria">Cliente:</label>
                    <select class="form-control" type="text" name="cliente" id="cliente" required>
                    <?php
                        $respuesta_clientes= Datos::obtenerClientesModel("clients");
                        foreach ($respuesta_clientes as $row => $item) {
                    ?>
                            <option value="<?php echo $item["id"];?>"><?php echo $item["name"];?></option>
                            <?php
                        } 
                    ?>
                    </select>
                </div>
    
                <div class="row">
                    <div class="col">
                        <a onclick="enviar()" class="btn btn-light btn btn-outline-success col-8">Pagar</a>
                    </div>
                    <div class="col col-lg-4">
                        <a  class="btn btn-light btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">Cancelar</a>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <div id="example2-wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example2" class="table table-striped dispaly">
                                <thead class="table-info"> 
                                    <tr>
                                        <th>ID</th>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpo">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Cancelar toda la venta?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
				<label for="contra">Ingrese contraseña de administrador para cancelar:</label>
				<input  class="form-control" type="text" name="contra" id="contra" required>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>