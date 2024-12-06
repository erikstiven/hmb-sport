<?php include_once __DIR__ . '/../Views/template/header-principal.php'; ?>
<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/Carrusel1.jpeg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>HMB SPORT</b> eCommerce</h1>
                            <h3 class="h2">Ropa Deportiva de Alta Calidad</h3>
                            <p style="text-align: justify;">
                                Bienvenido a <b>HMB SPORT</b>, tu taller especializado en la creación de ropa de todo tipo. En este primer carrusel, te presentamos nuestra exclusiva colección de ropa deportiva, diseñada para brindarte el máximo confort, rendimiento y estilo. Ya sea para entrenamientos, deportes al aire libre o actividades en el gimnasio, nuestras prendas están fabricadas con materiales de alta calidad, pensadas para adaptarse a tus necesidades y ayudarte a alcanzar tu mejor desempeño.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/Carrusel2.jpeg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Equipos Personalizados</h1>
                            <h3 class="h2">Diseño Sublimado para tu Equipo</h3>
                            <p style="text-align: justify;">
                                En <b>HMB SPORT</b>, ofrecemos uniformes deportivos sublimados y personalizados, ideales para equipos de todas las disciplinas. Ya sea para fútbol, baloncesto, voleibol o cualquier otro deporte, nuestros uniformes están diseñados para brindarte la mejor calidad y comodidad en cada partido. Con tecnología de sublimación, podemos ofrecerte diseños vibrantes y duraderos que no se desvanecen con el tiempo, permitiendo que tu equipo se destaque tanto en rendimiento como en apariencia.
                                Personaliza tu uniforme con los colores, logos y nombres que desees. ¡Haz que tu equipo luzca como nunca antes!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/Carrusel3.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Uniformes Escolares</h1>
                            <h3 class="h2">Alta Calidad y Personalización para tu Institución</h3>
                            <p style="text-align: justify;">
                                En <b>HMB SPORT</b>, ofrecemos uniformes escolares personalizados, ideales para instituciones educativas de todo Ecuador. Nos especializamos en crear uniformes cómodos, duraderos y con diseños que se adaptan a las normativas y colores de cada colegio o escuela. Ya sea para niños o adolescentes, nuestros uniformes están confeccionados con materiales de alta calidad que garantizan comodidad y resistencia durante todo el año escolar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
    <i class="fas fa-chevron-left" style="color: black; font-size: 24px;"></i>
</a>
<a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
    <i class="fas fa-chevron-right" style="color: black; font-size: 24px;"></i>
</a>

</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categorias</h1>
            <p>
                Descubre tu estilo en HMB-Sport. Ropa casual, formal y deportiva hecha para destacar. ¡Elige calidad y comodidad en cada prenda!
            </p>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['categorias'] as $categoria) { ?>
            <div class="col-12 col-md-2 p-5 mt-3">
                <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"><img src="<?php echo $categoria['imagen']; ?>" alt="" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria']; ?></h5>
            </div>
        <?php } ?>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Productos Destacados</h1>
                <p>
                    Elige lo mejor con nuestro Producto Destacado en HMB-Sport. Una prenda que combina calidad, estilo y máxima comodidad, perfecta para cualquier ocasión. ¡Añádela a tu colección y destaca con cada paso!
                </p>
            </div>
        </div>
   

        <div class="row">
        <?php foreach ($data['nuevosProductos'] as $producto) { ?>
            <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo BASE_URL . $producto['imagen']; ?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white btnAddDeseo" href="#" prod="<?php echo $producto['id']; ?>"><i class="fas fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>"><i class="fas fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2 btnAddcarrito" href="#" prod="<?php echo $producto['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h3 text-decoration-none"><?php echo $producto['nombre']; ?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0"><?php echo MONEDA . ' ' . $producto['precio']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

    </div>
</section>
<!-- End Featured Product -->
<?php include_once __DIR__ . '/../Views/template/footer-principal.php'; ?>




</body>

</html>