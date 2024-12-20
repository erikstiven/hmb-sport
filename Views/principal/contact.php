<?php include_once 'Views/template/header-principal.php'; ?>

<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contact Us</h1>
        <p>
            Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            Lorem ipsum dolor sit amet.
        </p>
    </div>
</div>

<!-- Start Map -->
<div id="mapid"></div>

<!-- Script de Leaflet -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Coordenadas de HMB Sport (asegúrate de obtenerlas correctamente desde Google Maps)
    var lat = -3.250204; // Latitud
    var lon = -79.947741; // Longitud

    // Crear el mapa
    var mymap = L.map('mapid').setView([lat, lon], 16); // Zoom inicial 16

    // Cargar los mosaicos desde OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19, // Zoom máximo permitido
        tileSize: 256 // Tamaño de los mosaicos
    }).addTo(mymap);

    // Añadir marcador para HMB Sport
    L.marker([lat, lon]).addTo(mymap)
        .bindPopup("<b>HMB Sport</b><br>Ubicación exacta en Google Maps.")
        .openPopup();
</script>
<!-- Ena Map -->

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto"  role="form" id="frmContactos">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="nombre">Name</label>
                    <input type="text" class="form-control mt-1" id="nombre" name="name" placeholder="Nombre" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Correo electrônico" required>
                </div>
            </div>
           
            <div class="mb-3">
                <label for="inputmessage">Mensaje</label>
                <textarea class="form-control mt-1" id="message" placeholder="Mensaje" rows="8"></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3" id="btnContactos">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->
<?php include_once 'Views/template/footer-principal.php'; ?>


<script src="<?php echo BASE_URL . 'assets/js/modulos/contactos.js'; ?>"></script>


</body>

</html>