const btnAddCart = document.querySelector("#btnAddCart");//boton de carrito
const cantidad = document.querySelector("#product-quanity");//input de cantidad
const idProducto = document.querySelector("#idProducto");//id del producto
document.addEventListener("DOMContentLoaded", function () {//cuando se cargue la pagina
    btnAddCart.addEventListener("click", function () {//al presionar el boton
        agregarCarrito(idProducto.value, cantidad.value);//agregar al carrito
    });
    
})