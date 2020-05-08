let cont=1;
let total=0;
let last;



function agregar(){
    let aux;
    let producto = document.getElementById("producto").value;
    let precio = document.getElementById("precio").value;
    let unidades = document.getElementById("unidades").value;
    let table = document.getElementById("tabla");

    console.log(producto);
    console.log(precio);
    console.log(unidades);
    
    if(precio==0 || unidades==0 || precio==null || unidades==null){
        alert("Ingresa todos los datos");
        aux=precio;
        console.log("asda");
    }else{
        let tr1 = document.createElement('tr');
        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');
        let td5 = document.createElement('td');
        let td6 = document.createElement('td');
        let borrar = document.createElement('img');
        let editar = document.createElement('img');
        let spacio = document.createElement('text');

        td1.innerText = cont;
        td2.innerText = producto;
        td3.innerText = "$"+precio;
        td4.innerText = unidades;
        td5.innerText = "$"+Number(precio*unidades);
        
        borrar.src="../../img/trash.png";
        borrar.setAttribute('onclick', 'eliminar(this,'+Number(precio*unidades)+')');
        borrar.style.width = "20px";
        editar.src="../../img/edit.png";
        editar.setAttribute('onclick', 'editar(this)');
        editar.style.width = "20px";
        spacio.innerText=' ';


    
        table.appendChild(tr1);
        tr1.appendChild(td1);
        tr1.appendChild(td2);
        tr1.appendChild(td3);
        tr1.appendChild(td4);
        tr1.appendChild(td5);
        tr1.appendChild(td6);
        td6.appendChild(editar);
        td6.appendChild(spacio);
        td6.appendChild(borrar);


        cont++;



        total = total + (precio*unidades);
        document.getElementById("total").innerText="$"+total.toFixed(2);
         document.getElementById("oculto").value=total.toFixed(2);
    }
    
    //document.getElementById('unidades').value='0';
    //document.getElementById('precio').value=aux;
    document.getElementById('producto').focus();
    
}

function guardar(){
    let rows = tabla.rows;
    let fila = rows[last].cells;
    let producto = document.getElementById('producto').value;
    let precio = document.getElementById("precio").value;
    let unidades = document.getElementById("unidades").value;

    fila[1].innerText = producto;
    fila[2].innerText = "$"+precio;
    fila[3].innerText = unidades;
    let anterior = fila[4].innerText.substring(1);
    fila[4].innerText = "$"+Number(precio*unidades);

    console.log(anterior);

 

    total = total - anterior + (precio*unidades);
    document.getElementById("total").innerText="$"+total.toFixed(2);
     document.getElementById("oculto").value=total.toFixed(2);
    document.getElementById('agregar').hidden=false;
    document.getElementById('guardar').hidden=true;
    document.getElementById('unidades').value='';
    document.getElementById('precio').value='';
    document.getElementById('producto').focus();
}

function editar(r){
    last = r.parentNode.parentNode.rowIndex;
    let tabla = document.getElementById("tabla");
    let rows = tabla.rows;
    let fila = rows[last].cells;
    
    document.getElementById('producto').value=fila[1].innerText;
    document.getElementById('precio').value=fila[2].innerText.substring(1);
    document.getElementById('unidades').value=fila[3].innerText;

    document.getElementById('agregar').hidden=true;
    document.getElementById('guardar').hidden=false;
}

function eliminar(r, precio){
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("tabla").deleteRow(i);
    


    total = total - precio;
    document.getElementById("total").innerText="$"+total.toFixed(2);
    document.getElementById("oculto").value=total.toFixed(2);
}


function enviar(){
    var aux;

    var d=document.getElementById("gamer").value;
    var d1=document.getElementById("oculto").value;
    console.log(d);
    console.log(d1);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            aux = this.responseText;
            if(aux){
                alert("Registro hecho");
                location.href='panel.php';
            }else{
               alert("Asegurate de proporcionar datos correctos");
                history.back();
                
            }
        }
    };
    xmlhttp.open("GET", "sqlagregar.php?idUsuario="+d+"&total="+d1, true);
    xmlhttp.send();
    //      console.log (aux);


}