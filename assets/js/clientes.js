const tableLista = document.querySelector("#tableListaProductos tbody");
document.addEventListener("DOMContentLoaded", function () {
  getListaProductos();
});

function getListaProductos() {
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
              </tr>
              `;
      });
      tableLista.innerHTML = html;//insertamos el html en el body
      document.querySelector('#totalProducto').textContent = 'TOTAL A PAGAR: ' + res.moneda + ' ' + res.total;
    }
  };
}