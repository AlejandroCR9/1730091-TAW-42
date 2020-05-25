<link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">      
<div class="container">
    <div class="jumbotron">
        <h2>Login</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <form action="index.php?m=ingresar" method="post">
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txtUsuario">Usuario:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="txtUsuario" value="">
                    </div> 
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txtContraseña">Contraseña:</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="txtContraseña" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-off-set-3">
            
                        <input type="submit" class="btn btn-primary form-control" name="" value="Ingresar">
             
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>