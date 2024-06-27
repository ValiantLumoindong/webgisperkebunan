@include('layouts.component.headerhomepage')

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light" style="background-image: url({{ url('assetsdepan/img/banner.jpg')}} );">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>{{ $produksiterbaru->nama_produksi }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">{{ $produksiterbaru->nama_produksi }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="farmer-single-area bg-gray default-padding-top">
        <div class="container">
            <div class="farmer-content-top">
                <div class="row">
                    <div class="col-lg-5 left-info">
                        <div class="thumb">
                            <img src="{{ url ('gambarproduksi/') }}/{{ $produksiterbaru->gambar }}" height="800" width="900" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-7 right-info">
                        <h2>{{ $produksiterbaru->nama_produksi }}</h2>
                        <span>{{$produksiterbaru->foreign_kecamatan->nama_kecamatan }}</span>
                        <?php echo $produksiterbaru->informasi_tambahan;?>
                        <ul class="team-list mt-25">
                            <li>Luas Tanam (Ha) : {{ $produksiterbaru->luas_tanam }}</li>
                            <li>Luas Panen (Ha) : {{ $produksiterbaru->luas_panen }}</li>
                            <li>Produksi (Ha) : {{ $produksiterbaru->produksi }}</li>
                            <li>Tanggal : {{ $produksiterbaru->created_at }}</li>
                            <li>GPS Kordinator : {{ $produksiterbaru->lokasi_gps }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Start Contact Us 
    ============================================= -->
    <div class="contact-area bg-gray default-padding" style="background-image: url(assets/img/shape/28.png);">
        <div class="container">
            <div class="row align-center">
                
                <div class="col-tact-stye-one col-lg-12">
                    <div class="contact-form-style-one mb-md-50">
                        <h5 class="sub-title">Maps Area</h5>
                        <h2 class="heading">Maps Area {{ $produksiterbaru->nama_produksi }}</h2>
                        <div id="mapke2"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact -->

    <script>

navigator.geolocation.getCurrentPosition(function(location) {
  var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

  var mapke2 = L.map('mapke2').setView([1.3234339197073528, 124.84063540933153], 11);;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapke2);

    L.Routing.control({
			waypoints: [
				L.latLng(latlng), //titik utama
				L.latLng({{ $produksiterbaru->lokasi_gps }},) //titik tujuan
			],
			routeWhileDragging: false
		}).addTo(mapke2);	
});
</script>


@include('layouts.component.footerhomepage')