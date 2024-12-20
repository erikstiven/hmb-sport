const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const tittleModal = document.querySelector("#titleModal");
const btnAccion = document.querySelector("#btnAccion");
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'))//iniciamos el modal
let tblUsuario;

document.addEventListener("DOMContentLoaded", function () {

    tblUsuario = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + 'usuarios/listar',//asignar rutas
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'nombres' },
            { data: 'apellidos' },
            { data: 'correo' },
            { data: 'perfil' },
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

        tittleModal.textContent = "NUEVO USUARIO";
        btnAccion.textContent = "Registrar";
        frm.reset();
        document.querySelector('#clave').removeAttribute('readonly');

        myModal.show();
    })
    //submit  usuarios
    frm.addEventListener("submit", function (e) {
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + "usuarios/registrar";//url del controlador
        const http = new XMLHttpRequest();//creamos el objeto
        http.open("POST", url, true);//abrimos la url
        http.send(data);//enviamos la lista
        http.onreadystatechange = function () {//cuando el objeto cambie de estado
            if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
                console.log(this.responseText);

                const res = JSON.parse(this.responseText);//obtenemos la respuesta
                if (res.icono == 'success') {
                    myModal.hide();
                    tblUsuario.ajax.reload();
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
function eliminarUser(idUser) {
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
            const url = base_url + "usuarios/delete/" + idUser;//url del controlador
            const http = new XMLHttpRequest();//creamos el objeto
            http.open("GET", url, true);//abrimos la url
            http.send();//enviamos la lista
            http.onreadystatechange = function () {//cuando el objeto cambie de estado
                if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
                    console.log(this.responseText);

                    const res = JSON.parse(this.responseText);//obtenemos la respuesta
                    if (res.icono == 'success') {
                        tblUsuario.ajax.reload();
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
function editUser(idUser) {
    const url = base_url + "usuarios/edit/" + idUser;//url del controlador
    const http = new XMLHttpRequest();//creamos el objeto
    http.open("GET", url, true);//abrimos la url
    http.send();//enviamos la lista
    http.onreadystatechange = function () {//cuando el objeto cambie de estado
        if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
            console.log(this.responseText);

            const res = JSON.parse(this.responseText);//obtenemos la respuesta
            document.querySelector('#id').value = res.id;
            document.querySelector('#nombre').value = res.nombres;
            document.querySelector('#apellido').value = res.apellidos;
            document.querySelector('#correo').value = res.correo;
            document.querySelector('#clave').setAttribute('readonly', 'readonly');
            btnAccion.textContent = "Actualizar";
            tittleModal.textContent = "MODIFICAR USUARIO";
            myModal.show();
        };
    }

}