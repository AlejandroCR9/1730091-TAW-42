let cont=1;
let total=0;
let last;


function agregar(ida){
    let aux;
    
    let producto = document.getElementById(ida+"p").innerHTML;
    let precio = document.getElementById(ida+"pe").innerHTML;
    let unidades = document.getElementById(ida+"s").innerHTML;
    let table = document.getElementById("example2");
    let tbo = document.getElementById("cuerpo");

    //Se quita el signo de pesos
    precio = precio.substr(2,precio.length);

    console.log(producto);
    console.log(precio);
    console.log(unidades);
    var t = $('#example2').DataTable();
    t.row.add([producto, 1,("$"+precio)]).draw(false);

    total = total + (precio*1);
    document.getElementById("total").innerText="$"+total.toFixed(2);
    document.getElementById("oculto").value=total.toFixed(2);
    
    /*let tr1 = document.createElement('tr');
    let td1 = document.createElement('td'); //Nombre
    let td2 = document.createElement('td'); //Cantidad a comprar
    let td3 = document.createElement('td'); //Total precio en producto

    td1.innerText = producto;
    td2.innerText = unidades;
    td3.innerText = "$"+precio;

    table.appendChild(tbo);
    tbo.appendChild(tr1);
    tr1.appendChild(td1);
    tr1.appendChild(td2);
    tr1.appendChild(td3);

    */
    
}
