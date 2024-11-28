const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const tittleModal = document.querySelector("#titleModal");
const btnAccion = document.querySelector("#btnAccion");
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'))//iniciamos el modal
let tblCategorias;

document.addEventListener("DOMContentLoaded", function () {

    tblCategorias = $('#tblCategorias').DataTable({
        ajax: {
            url: base_url + 'categorias/listar',//asignar rutas
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'categoria' },
            { data: 'imagen' },
            { data: 'accion' }

        ],
        dom,
        buttons,
        responsive: true,
        language
    });
    //levantar el modal
    nuevo.addEventListener("click", function () {
        document.querySelector('#id').value = '';
        document.querySelector('#imagen_actual').value = '';
        document.querySelector('#imagen').value = '';
        tittleModal.textContent = "NUEVA CATEGORIA";
        btnAccion.textContent = "Registrar";
        frm.reset();
        myModal.show();
    });
    //submit  categorias
    frm.addEventListener("submit", function (e) {
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + "categorias/registrar";//url del controlador
        const http = new XMLHttpRequest();//creamos el objeto
        http.open("POST", url, true);//abrimos la url
        http.send(data);//enviamos la lista
        http.onreadystatechange = function () {//cuando el objeto cambie de estado
            if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
                console.log(this.responseText);

                const res = JSON.parse(this.responseText);//obtenemos la respuesta
                if (res.icono == 'success') {
                    myModal.hide();
                    tblCategorias.ajax.reload();
                }

                Swal.fire(
                    'Aviso?',
                    res.msg.toUpperCase(),
                    res.icono
                )
            }
        };
    })

});

//funcion eliminar usuario
function eliminarCat(idCat) {
    Swal.fire({
        title: "Aviso?",
        text: "Estas seguro de eliminar el registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "categorias/delete/" + idCat;//url del controlador
            const http = new XMLHttpRequest();//creamos el objeto
            http.open("GET", url, true);//abrimos la url
            http.send();//enviamos la lista
            http.onreadystatechange = function () {//cuando el objeto cambie de estado
                if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
                    console.log(this.responseText);

                    const res = JSON.parse(this.responseText);//obtenemos la respuesta
                    if (res.icono == 'success') {
                        tblCategorias.ajax.reload();
                    }

                    Swal.fire(
                        'Aviso?',
                        res.msg.toUpperCase(),
                        res.icono
                    )
                }
            };


        }
    });

}

//Editar usuario
function editCat(idCat) {
    const url = base_url + "categorias/edit/" + idCat;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#id').value = res.id;
            document.querySelector('#categoria').value = res.categoria;
            document.querySelector('#imagen_actual').value = res.imagen;
            btnAccion.textContent = 'Actualizar';
            tittleModal.textContent = "MODIFICAR CATEGORIA";
            myModal.show();
            //$('#nuevoModal').modal('show');
        }
    }
}