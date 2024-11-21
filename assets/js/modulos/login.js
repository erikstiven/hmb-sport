const frm = document.querySelector("#formulario");
const email = document.querySelector("#email");
const clave = document.querySelector("#clave");

document.addEventListener("DOMContentLoaded", function () {//cuando se cargue la pagina
    frm.addEventListener("submit", function (e) {//al presionar el boton
        e.preventDefault();
        if (email.value == "" || clave.value == "") {
            alertas('Todos los campos son requeridos', 'warning');
        } else {
            let data = new FormData(this);
            const url = base_url + "admin/validar";//url del controlador
            const http = new XMLHttpRequest();//creamos el objeto
            http.open("POST", url, true);//abrimos la url
            http.send(data);//enviamos la lista
            http.onreadystatechange = function () {//cuando el objeto cambie de estado
                if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
                    console.log(this.responseText);
                    
                    const res = JSON.parse(this.responseText);//obtenemos la respuesta
                    if (res.icono == 'success') {
                        setTimeout(() => {
                            window.location.href = base_url + 'admin/home';
                        }, 2000);
                    } 
                    alertas(res.msg, res.icono);
                }
            };
        }
    });

})

function alertas(msg, icono) {
    Swal.fire(
        'Aviso?',
        msg.toUpperCase(),
        icono
    )
};
