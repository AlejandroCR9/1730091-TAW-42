let minutos;
let cont=0;
let time;

function generar(){
    cont++;
    let producto = document.getElementById("equipo").value;
    let inicio = document.getElementById("inicio").value;
    let final = document.getElementById("final").value;
    let cartas = document.getElementById("cartas");
    minutos = (final.substring(0,2) - inicio.substring(0,2))*60;

    
        let div1 = document.createElement('div');
        let div2 = document.createElement('div');
        let div3 = document.createElement('div');
        let div4 = document.createElement('div');
        let div5 = document.createElement('div');
        let nombre = document.createElement('div');
        let hora = document.createElement('div');
        let tiempo = document.createElement('div');

        div1.setAttribute('class','col-xl-3 col-md-6 mb-4');
        div2.setAttribute('class','card border-left-primary shadow h-100 py-2');
        div3.setAttribute('class','card-body');
        div4.setAttribute('class','row no-gutters align-items-center');
        div5.setAttribute('class','col mr-2');
        nombre.setAttribute('class','text-xs font-weight-bold text-primary text-uppercase mb-1');
        hora.setAttribute('class','h5 mb-0 font-weight-bold text-gray-800');
        tiempo.setAttribute('class','h5 mb-0 font-weight-bold text-gray-800');
        tiempo.setAttribute('id','time'+cont);

        nombre.innerText = producto;
        hora.innerText = inicio + " - " + final;
        tiempo.innerText = minutos + " minutos";
        time = setInterval(myTimer, 1000);

        cartas.appendChild(div1);
        div1.appendChild(div2);
        div2.appendChild(div3);
        div3.appendChild(div4);
        div4.appendChild(div5);
        div5.appendChild(nombre);
        div5.appendChild(hora);
        div5.appendChild(tiempo);
}

function myTimer(){
    minutos = minutos-1;
    if(minutos==0){
        clearInterval(time);
        document.getElementById("time"+cont).innerHTML = "STOP";
    }else{
        document.getElementById("time"+cont).innerHTML = minutos + " minutos";
    }
}