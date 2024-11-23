const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const tittleModal = document.querySelector("#titleModal");
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
            { data: 'perfil' }

        ],
        dom,
        buttons,
        responsive: true,
        language
    });
    //levantar el modal
    nuevo.addEventListener("click", function () {
        tittleModal.textContent = "NUEVO USUARIO";
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