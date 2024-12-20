const btnRegister = document.querySelector('#btnRegister');
const btnLogin = document.querySelector('#btnLogin')
const frmLogin = document.querySelector('#frmLogin');
const frmRegister = document.querySelector('#frmRegister');
const registrarse = document.querySelector('#registrarse');
const login = document.querySelector('#login')
//datos del formulario registro
const nombreRegistro = document.querySelector('#nombreRegistro');
const correoRegistro = document.querySelector('#correoRegistro');
const claveRegistro = document.querySelector('#claveRegistro');
//datos del formulario de login
const correoLogin = document.querySelector('#correoLogin');
const claveLogin = document.querySelector('#claveLogin');


const modalLogin = new bootstrap.Modal(document.getElementById('modalLogin'))//iniciamos el modal

const inputBusqueda = document.querySelector("#search");


//const tableLista = document.querySelector("#tableListaProductos tbody");
document.addEventListener("DOMContentLoaded", function () {
  btnRegister.addEventListener('click', function () { //cuando le den click en el boton de registro
    frmLogin.classList.add('d-none');
    frmRegister.classList.remove('d-none');

  })
  btnLogin.addEventListener('click', function () { //cuando le den click en el boton de registro
    frmRegister.classList.add('d-none');
    frmLogin.classList.remove('d-none');

  });
  //REGISTRO
  registrarse.addEventListener('click', function () {
    if (nombreRegistro.value == '' || correoRegistro.value == '' || claveRegistro.value == '') {//validacion campos vacios
      Swal.fire("Aviso?", 'Todos los campos son requeridos', 'warning');
    } else {
      let formData = new FormData();
      formData.append('nombre', nombreRegistro.value);
      formData.append('clave', claveRegistro.value);
      formData.append('correo', correoRegistro.value);
      const url = base_url + "clientes/registroDirecto";//url del controlador
      const http = new XMLHttpRequest();//creamos el objeto
      http.open("POST", url, true);//abrimos la url
      http.send(formData);//enviamos la lista
      http.onreadystatechange = function () {//cuando el objeto cambie de estado
        if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
          const res = JSON.parse(this.responseText);//obtenemos la respuesta
          Swal.fire("Aviso?", res.msg, res.icono);
          if (res.icono == 'success') {
            setTimeout(() => {
              enviarCorreo(correoRegistro.value, res.token);
            }, 2000);
          }
        };
      }
    }

  });
  //Login directo
  login.addEventListener('click', function () {
    if (correoLogin.value == "" || claveLogin.value == "") {
      Swal.fire("Aviso?", "Todos los campos son requeridos", "warning")
    }
    let formData = new FormData();
    formData.append('correoLogin', correoLogin.value);
    formData.append('claveLogin', claveLogin.value);
    const url = base_url + "clientes/loginDirecto";//url del controlador
    const http = new XMLHttpRequest();//creamos el objeto
    http.open("POST", url, true);//abrimos la url
    http.send(formData);//enviamos la lista
    http.onreadystatechange = function () {//cuando el objeto cambie de estado
      if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
        const res = JSON.parse(this.responseText);//obtenemos la respuesta
        Swal.fire("Aviso?", res.msg, res.icono);
        if (res.icono == 'success') {
          setTimeout(() => {
            window.location.reload();
          }, 2000);
        }
      };
    }
  });

  //busqueda de productos
  inputBusqueda.addEventListener("keyup", function (e) {
    if (e.target.value != "") {
      const url = base_url + "principal/busqueda/" + e.target.value;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          let html = "";
          res.forEach((producto) => {
            html += `<div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                      <a href="#">
                        <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}">
                      </a>
                      <div class="card-body">
                        <a href="#" class="h2 text-decoration-none text-dark">${producto.nombre}</a>
                        <p class="card-text">
                        $${producto.precio}
                        </p>
                        <div class="buy_bt"><a href="#" onclick="agregarCarrito(${producto.id}, 1)">Añadir</a></div>
                      </div>
                    </div>
                  </div>`;
          });
          document.querySelector("#resultBusqueda").innerHTML = html;
        }
      };
    }else{
        document.querySelector('#resultBusqueda').innerHTML = '';
    }
  });
});

//Funcion enviar Correo
function enviarCorreo(correo, token) {
  let formData = new FormData();
  formData.append('token', token);
  formData.append('correo', correo);
  const url = base_url + "clientes/enviarCorreo";//url del controlador
  const http = new XMLHttpRequest();//creamos el objeto
  http.open("POST", url, true);//abrimos la url
  http.send(formData);//enviamos la lista 
  http.onreadystatechange = function () {//cuando el objeto cambie de estado
    if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
      const res = JSON.parse(this.responseText);//obtenemos la respuesta
      Swal.fire("Aviso?", res.msg, res.icono);
      if (res.icono == 'success') {
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    };
  }
}

//modal login
function abrirModalLogin() {
  myModal.hide();//ocultamos el modal del carrito
  modalLogin.show();//mostramos el modal del login

}