@include('layouts.component.headerhomepage')

    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area text-center shadow dark bg-fixed text-light" style="background-image: url({{ url('assetsdepan/img/banner.jpg')}} );">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>Hasil Produksi Pertanian</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                            <li class="active">Hasil Produksi Pertanian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Gallery
    ============================================= -->
    <div class="gallery-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery masonary">
                        <div id="portfolio-grid" class="gallery-items colums-2">
                            <!-- Single Item -->
                            @foreach ($produksiterbaru as $tampilproduksi)  
                            <div class="pf-item">
                                <div class="gallery-style-two">
                                    <img src="{{ url ('gambarproduksi/') }}/{{ $tampilproduksi->gambar }}" height="800" width="800" alt="Thumb">
                                    <div class="overlay">
                                        <span>{{$tampilproduksi->foreign_kecamatan->nama_kecamatan }} ({{$tampilproduksi->created_at }})</span>
                                        <h4><a href="{{ route ('homepage.detailproduksi', $tampilproduksi->id) }}">{{$tampilproduksi->nama_produksi }}</a></h4>
                                    </div>
                                    <a class="link" href="{{ route ('homepage.detailproduksi', $tampilproduksi->id) }}"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->

    <!-- Start Contact Us 
    ============================================= -->
    <div class="contact-area bg-gray default-padding" style="background-image: url(assets/img/shape/28.png);">
        <div class="container">
            <div class="row align-center">
                
                <div class="col-tact-stye-one col-lg-12">
                    <div class="contact-form-style-one mb-md-50">
                        <h5 class="sub-title">Maps Area</h5>
                        <h2 class="heading">Maps Area</h2>
                        <div id="map"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact -->

    <script>

    var map = L.map('map').setView([1.3234339197073528, 124.84063540933153], 12);
    const apiKey = "AAPKe1e02d452ac74e9b9a57913d49e6ca73XntLgl_BvHud8Lw7nn-265FcxkM-UOu2yJhz4CRUaUda6WCx5pElHcaF15IvkHoL";
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    

    @foreach ($produksiterbaru as $tampilmaps)  
    var marker = L.marker([{{ $tampilmaps->lokasi_gps }}]).addTo(map).bindPopup("<div class='card'><img class='card-img-top' height='400px' src='{{ url ('gambarproduksi/') }}/{{ $tampilmaps->gambar }}' alt='gambar_wisata'><div class='card-body'><a href='{{ route ('homepage.detailproduksi',$tampilmaps->id) }}'>{{ $tampilmaps->nama_produksi}} ({{ $tampilmaps->created_at}})</a> </div></div>");
    @endforeach



</script>    

@include('layouts.component.footerhomepage')