let cant=1;
let total=0;
let last;


function agregar(ida){
    
    let producto = document.getElementById(ida+"p").innerHTML;
    let precio = document.getElementById(ida+"pe").innerHTML;
    let unidades = document.getElementById(ida+"s").innerHTML;
    let table = document.getElementById("example2");
    let tbo = document.getElementById("cuerpo");
    var t = $('#example2').DataTable();

    //Se quita el signo de pesos
    precio = precio.substr(2,precio.length);
  
    /*console.log(producto);
    console.log(precio);
    console.log(unidades);*/
    var txtcant='<input  class="form-control col-6" type="number" name="canti" id="canti" onclick="actualizarPrecio()" min=1 value=1 max='+unidades+ ' required>';
    var btnr='<button class="btn btn-danger btn-sm btn-icon" onclick="borrarFilaCarrito($(this))"><i class="fa fa-times"></i></button>';

    var infoTabla=t.data();
    var agrega=true;
    var i=0;
    /*for (i=0; i < t.data().rows().count(); i++){
        console.log(infoTabla[i][0]+' ' +infoTabla[i][3]);
    }*/
    for (i=0; i < t.data().rows().count(); i++){
        console.log(infoTabla[i][0] +" " +infoTabla[i][2]);
        if(infoTabla[i][0]==ida){
            agrega=false;
            break;
        }
    }
    //insertar fila
    if(agrega){
        t.row.add([ida,btnr,producto, txtcant,("$"+precio)]).draw(false);
    }else{
        let c = parseInt(document.getElementById("canti").value, 10);
        if(c+1 <= unidades){
            c++;
            txtcant='<input  class="form-control col-6" type="number" name="canti" id="canti" min=1 value='+c+' max='+unidades+ ' required>';
            t.cell(i,3).data( txtcant ).draw();
            t.cell(i,4).data( '$'+(c*precio) ).draw();
        }
        
      
    }
    //actualizarPrecio();
    
}

function borrarFilaCarrito(fila){
    let tabla = $('#example2').DataTable();
    tabla.row( fila.parents('tr') ).remove().draw();
    actualizarPrecio();
}

function actualizarPrecio(){
    let tabla = $('#example2').DataTable();
    let precios=tabla.data();
    for (var i=0; i < tabla.data().rows().count(); i++){
        let c = parseInt(document.getElementById("canti").value, 10);
        total+=(parseInt(precios[i][4].substr(1,precios[i][4].length)) * c );
        tabla.cell(i,4).data( '$'+total ).draw();
        
        console.log(precios[i][3].substr(120,1));
        
    }
    //alert(total);
    document.getElementById("total").innerText="$"+total.toFixed(2);
    document.getElementById("oculto").value=total.toFixed(2);
    total=0;
}


function enviar(){
    var url = "guardarventa.php";
    var ta = $('#example2').DataTable().data();
    console.log(ta);
}