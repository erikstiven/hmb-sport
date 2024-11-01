const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
const btnAddcarrito = document.querySelectorAll('.btnAddcarrito');
const btnDeseo = document.querySelector('#btnCantidadDeseo');
const btnCarrito = document.querySelector('#btnCantidadCarrito');//boton de carrito
const verCarrito = document.querySelector('#verCarrito');
const tableListaCarrito = document.querySelector("#tableListaCarrito tbody");

//VER CARRITO
const myModal = new bootstrap.Modal(document.getElementById('myModal'))//iniciamos el modal

let listaDeseo, listaCarrito;
document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('listaDeseo') != null) {
        listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'));
    }
    if (localStorage.getItem('listaCarrito') != null) {
        listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'));
    }

    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener('click', function () {
            let idProducto = btnAddDeseo[i].getAttribute('prod');
            agregarDeseo(idProducto);
        });
    }
    for (let i = 0; i < btnAddcarrito.length; i++) {
        btnAddcarrito[i].addEventListener('click', function () {
            let idProducto = btnAddcarrito[i].getAttribute('prod');
            agregarCarrito(idProducto, 1);
        });
    }
    cantidadDeseo();
    cantidadCarrito();
    verCarrito.addEventListener('click', function () {//al presionar el boton
        getListaCarrito();//llamamos la funcion
        myModal.show();//mostramos
    });
});

//AGREGAR PRODUCTOS A LA LISTA DE DESEOS
function agregarDeseo(idProducto) {
    if (localStorage.getItem('listaDeseo') == null) {
        listaDeseo = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem('listaDeseo'));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i]['idProducto'] == idProducto) {
                Swal.fire({
                    title: "Aviso?",
                    text: "El producto ya se encuentra en la lista de deseos?",
                    icon: "warning",
                });
                return;
            }
        }
        listaDeseo.concat(localStorage.getItem('listaDeseo'));
    }
    listaDeseo.push({
        "idProducto": idProducto,
        "cantidad": 1
    })
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    Swal.fire({
        title: "Aviso?",
        text: "Producto agregado a la lista de deseos?",
        icon: "success",
    });
    cantidadDeseo();
}

function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));
    if (listas != null) {
        btnDeseo.textContent = listas.length;
    } else {
        btnDeseo.textContent = 0;
    }

}

//AGREGAR PRODUCTOS AL CARRITO

function agregarCarrito(idProducto, cantidad, accion = false) {
    if (localStorage.getItem('listaCarrito') == null) {//si la lista no existe
        listaCarrito = [];//creamos la lista
    } else {//si la lista existe
        let listaExiste = JSON.parse(localStorage.getItem('listaCarrito'));//obtenemos la lista        
        for (let i = 0; i < listaExiste.length; i++) {//verificamos si el producto ya existe
            if(accion){
                eliminarListaDeseo(idProducto);
            }
            if (listaExiste[i]['idProducto'] == idProducto) {//si el id del producto coincide
                Swal.fire({
                    title: "Aviso",
                    text: "El producto ya esta agregado",
                    icon: "warning",
                });
                return;
            }
        }
        listaCarrito.concat(localStorage.getItem('listaCarrito'));//agregamos el producto
    }
    listaCarrito.push({
        idProducto: idProducto,
        cantidad: cantidad
    })
    localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
    Swal.fire(
        'Aviso?',
        'Producto agregado al carrito!',
        'success'
    )
    cantidadCarrito();
}

//FUNCION CANTIDAD CARRITO

function cantidadCarrito() {
    let listas = JSON.parse(localStorage.getItem('listaCarrito'));
    if (listas != null) {
        btnCarrito.textContent = listas.length;
    } else {
        btnCarrito.textContent = 0;
    }

}

//VER CARRITO
function getListaCarrito() {
    const url = base_url + "principal/listaProductos";//url del controlador
    const http = new XMLHttpRequest();//creamos el objeto
    http.open("POST", url, true);//abrimos la url
    http.send(JSON.stringify(listaCarrito));//enviamos la lista
    http.onreadystatechange = function () {//cuando el objeto cambie de estado
      if (this.readyState == 4 && this.status == 200) {//si el estado es correcto
        const res = JSON.parse(this.responseText);//obtenemos la respuesta
        let html = "";//creamos el html
        res.productos.forEach((producto) => {//recorremos la lista de productos
          html += `<tr>
                      <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100" ></td>
                      <td>${producto.nombre}</td>
                      <td><span class="badge bg-warning">${res.moneda + ' ' + producto.precio}</span></td>
                      <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                      <td>${producto.subTotal}</td>
                      <td><button class="btn btn-danger btnDeletecart" type="button" prod="${producto.id}"><i class="fas fa-times-circle"></i></button> </td>
              </tr>
              `;
        });
        tableListaCarrito.innerHTML = html;//insertamos el html en el body
        document.querySelector('#totalGeneral').textContent = res.total;  
        btnEliminarCarrito();
    
      }
    };
  }

  function btnEliminarCarrito(){
    let listaEliminar = document.querySelectorAll('.btnDeletecart');
    for (let i = 0; i < listaEliminar.length; i++) {
        listaEliminar[i].addEventListener('click', function () {
            let idProducto = listaEliminar[i].getAttribute('prod');
eliminarListaCarrito(idProducto);            
        })
    }
}

function eliminarListaCarrito(idProducto){
    for (let i = 0; i < listaCarrito.length; i++) {   //Elimina el producto de la lista
        if (listaCarrito[i]['idProducto'] == idProducto) {//si el id del producto coincide
            listaCarrito.splice(i, 1);
        }
    }
    localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito));
    getListaCarrito();
    cantidadCarrito();
    Swal.fire({
        title: "Aviso?",
        text: "Producto eliminado del carrito",
        icon: "success",
      });
}