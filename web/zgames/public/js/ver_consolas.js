
const iniciarEliminacion = async function() {
    let id = this.idConsola;
    let resp = await Swal.fire({title:"Estas seguro?", text:"Esta operacion es irreversible", icon:"error", showCancelButton:true})
    if(resp.isConfirmed){
        Swal.fire("La persona quiere eliminar");
        if (await eliminarConsola(id)){
            let consolas = await getConsolas();
            cargarTabla(consolas);
            Swal.fire("Consola Eliminada","Consola eliminada exitodamente", "info");
        }else{
            Swal.fire("Error", "No se pudo atender la solicitud", "error");
        }
    }else{
        Swal.fire("Cancelado","Cancelado a peticion del usuario", "info")
    }


};
const cargarTabla = (consolas)=>{
    let tbody = document.querySelector("#tbody-consola");
    tbody.innerHTML= "";
    for(let i=0; i<consolas.length;++i){
        let tr = document.createElement("tr");
        let tdNombre = document.createElement("td");
        tdNombre.innerText = consolas[i].nombre;
        let tdMarca = document.createElement("td");
        tdMarca.innerText = consolas[i].marca;
        let tdAnio = document.createElement("td");
        tdAnio.innerText = consolas[i].anio;
        let tdAcciones = document.createElement("td");
        let botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.classList.add("btn","btn-danger");
        botonEliminar.idConsola = consolas[i].id;
        botonEliminar.addEventListener("click", iniciarEliminacion);
        tdAcciones.appendChild(botonEliminar);

        tr.appendChild(tdNombre);
        tr.appendChild(tdMarca);
        tr.appendChild(tdAnio);
        tr.appendChild(tdAcciones);

        tbody.appendChild(tr);
        
    }
};


document.addEventListener("DOMContentLoaded",async()=>{
    let consolas = await getConsolas();
    cargarTabla(consolas);
});