@include('layouts.component.headerhomepage')


<section class="rev_slider_wrapper">
    <div class="rev_slider slider1" id="slider1"  data-version="5.0" data-height="720">
        <ul>
        @foreach ($kebunterbaru as $tampilkebun) 
        <li data-transition="random">
                <img src="{{ url ('gambarkebun/') }}/{{ $tampilkebun->gambar }}"  alt="" width="1920" height="720"  >
                <div class="tp-caption tp-resizeme text-center"
                    data-x="center" data-hoffset="0" 
                    data-y="top" data-voffset="235"
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-100%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"                         
                    data-start="500">
                    <div class="banner-caption-h2">{{$tampilkebun->nama }}<br />{{$tampilkebun->foreign_jeniskebun->jenis_kebun}}</div>                    
                </div>
                <div class="tp-caption tp-resizeme text-center"
                    data-x="center" data-hoffset="0" 
                    data-y="top" data-voffset="365"
                    data-transform_idle="o:1;"                         
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                    data-splitin="none" 
                    data-splitout="none" 
                    data-responsive_offset="on"                          
                    data-start="800">                    
                    <span class="banner-decor-line"></span>
                </div>
                <div class="tp-caption tp-resizeme text-center"
                    data-x="center" data-hoffset="0" 
                    data-y="top" data-voffset="427"
                    data-transform_idle="o:1;"                         
                    data-transform_in="x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[-100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none" 
                    data-responsive_offset="on"                         
                    data-start="1400">                    
                    <a href="{{ route ('homepage.detailkebun', $tampilkebun->id) }}" class="thm-btn">Detail</a>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</section>

<section class="service-box-one-wrapper sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-text">
                    <div class="sec-title outer-stroke">
                        <div class="inner">
                            <span class="tag-line">Welcome to our Website</span>
                            <h2>Know About us</h2>
                            <span class="decor-line"></span>
                        </div><!-- /.inner-->
                    </div><!-- /.sec-title-->
                    <div class="text-box">
                        <p>Provinsi Sulawesi Utara yaitu kota Manado -+25 Km. Jika dari Bandara Internasional Sam Ratulangi -+34 Km. Letak Wilayah Kota Tomohon dikelilingi oleh Wilayah Kabupaten Minahasa; yaitu sebelah Utara berbatasan dengan kecamatan Pineleng dan Tombulu (KAB. Minahasa). Sebelah Selatan berbatasan dengan kecamatan Sonder dan Remboken (Kab.Minahasa). Sebelah Barat dengan Kecamatan Tombariri (Kab.Minahasa) dan sebelah Timur berbatasan dengan Kecamatan Tondano (Kab.Minahasa) dan Kecamatan Airmadidi (Kab.Minahasa Utara). Sementara untuk kabupaten/kota yang berdekatan dengan Kota Tomohon adalah Kabupaten Minahasa Selatan (sebelah barat), Kota Manado (sebelah utara), Kabupaten Minahasa (sebelah timur), dan Kabupaten Minahasa Tenggara (sebelah selatan) (Admin 2017).</p>
                        <p>Dalam pembuatan aplikasi ini menggunakan sistem yang dinamakan Teknologi Geographic Information System (GIS). Geographic Information System (GIS) adalah sistem informasi khusus yang mengelola data yang memiliki informasi spasial. GIS juga merupakan sistem komputer yang memiliki kemampuan untuk membangun, menyimpan, mengelola dan menampilkan informasi bereferensi geografis, misalnya data yang diidentifikasi menurut lokasinya, dalam sebuah database. GIS menurut Winarno et al (1994) merupakan suatu sistem untuk mendayagunakan, menghasilgunakan penyimpangan, pengelolahan dan analisis data special (keruangan), serta data non spesail (tabular) dalam memperoleh berbagai informasi yang berkaitan dengan aspek keruangan, baik yang berorientasi ilmiah, komersal, pengolahan, maupun kebijakan.</p>
                        
                    </div><!-- /.text-box -->
                </div><!-- /.left-text -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
            	<img src="{{url('assetsdepan/img/aboutusfix.jpeg')}}" alt="Awesome Image"/>
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.service-box-one-wrapper -->

<section class="sec-pad fact-wrapper has-gray-texture">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sec-title semi">
                    <h2>Statistik<br /> <span class="base-color-text">Website</span></h2>
                </div><!-- /.sec-title-->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-fact-box clearfix">
                            <div class="text-box pull-left">
                                <div class="count-box">
                                    <span class="counter">{{$countkebun}}</span>
                                </div><!-- /.count-box -->
                                <p>Kebun</p>
                            </div><!-- /.text-box -->
                            <div class="icon-box pull-right">
                                <i class="lsp-icon-people"></i>
                            </div><!-- /.pull-right -->
                        </div><!-- /.single-fact-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="single-fact-box clearfix">
                            <div class="text-box pull-left">
                                <div class="count-box">
                                    <span class="counter">{{$countkecamatan}}</span>
                                </div><!-- /.count-box -->
                                <p>Kecamatan</p>
                            </div><!-- /.text-box -->
                            <div class="icon-box pull-right">
                                <i class="lsp-icon-people-1"></i>
                            </div><!-- /.pull-right -->
                        </div><!-- /.single-fact-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="single-fact-box clearfix">
                            <div class="text-box pull-left">
                                <div class="count-box">
                                    <span class="counter">{{$countjenis_kebun}}</span>
                                </div><!-- /.count-box -->
                                <p>Jenis Kebun</p>
                            </div><!-- /.text-box -->
                            <div class="icon-box pull-right">
                            <i class="lsp-icon-people"></i>
                            </div><!-- /.pull-right -->
                        </div><!-- /.single-fact-box -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.sec-pad fact-wrapper -->


<section class="home-cta-box has-base-color-overlay sec-pad text-center">
    <div class="container">
        <h3>Catatan : <br> Data yang ada diwebsite adalah data yang diupload oleh admin.<h3>
    </div><!-- /.container -->
</section><!-- /.home-cta-box -->


<section class="sec-pad team-wrapper">
    <div class="container">
        <div class="sec-title semi text-center">        
            <h2><span class="black-color-text">Website</span> <span class="base-color-text">FAQ</span></h2>
        </div><!-- /.sec-title-->
		<div class="row">
			<div class="col-md-6">
				<div class="single-faq-box">
					<h3>Apa itu Zonasi Perkebunan di Kota Tomohon?</h3>
					<p>Zonasi perkebunan di Kota Tomohon adalah penentuan wilayah-wilayah yang diperuntukkan untuk berbagai jenis kegiatan perkebunan di kota ini.</p>
				</div><!-- /.single-faq-box -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="single-faq-box">
					<h3>Apa tujuan dari zonasi perkebunan?</h3>
					<p>Tujuan utama dari zonasi perkebunan adalah mengatur dan mengoptimalkan penggunaan lahan untuk pertanian dan perkebunan demi mendukung pertumbuhan ekonomi dan keberlanjutan lingkungan di Kota Tomohon.</p>
				</div><!-- /.single-faq-box -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="single-faq-box">
					<h3>Bagaimana cara saya mendapatkan informasi tentang zonasi perkebunan di wilayah tertentu?</h3>
					<p>Anda dapat mengakses peta zonasi perkebunan melalui website kami atau menghubungi Dinas Pertanian dan Perkebunan Kota Tomohon untuk informasi lebih lanjut./p>
				</div><!-- /.single-faq-box -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="single-faq-box">
					<h3>Bagaimana saya bisa mengajukan izin untuk melakukan perkebunan di Kota Tomohon?</h3>
					<p>Anda harus mengajukan permohonan izin kepada Dinas Pertanian dan Perkebunan Kota Tomohon. Proses ini akan melibatkan evaluasi dan persyaratan tertentu yang harus Anda penuhi.</p>
				</div><!-- /.single-faq-box -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.sec-pad -->


<section class="client-testimonials sec-pad has-gray-texture2">
    
    <div class="container">
        <div class="sec-title semi text-center">        
            <h2><span class="black-color-text">Maps</span> <span class="base-color-text">Kebun</span></h2>
        </div><!-- /.sec-title-->
        <div id="map"></div>
    </div><!-- /.container -->
</section><!-- /.client-testimonials -->



<script>
var map = L.map('map').setView([1.3234339197073528, 124.84063540933153], 13);
const apiKey = "AAPKe1e02d452ac74e9b9a57913d49e6ca73XntLgl_BvHud8Lw7nn-265FcxkM-UOu2yJhz4CRUaUda6WCx5pElHcaF15IvkHoL";

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

@foreach ($mapskebun as $tampilmaps)  
(function() {
  var marker = L.marker([{{$tampilmaps->lokasi_gps}}]).addTo(map).bindPopup("<div class='card' style='width: 250px'><img class='card-img-top' src='{{ url ('gambarkebun/') }}/{{ $tampilmaps->gambar }}' alt='gambar'><br><br><div class='card-body' style='font-size: 16px;'><a href='{{ route ('homepage.detailkebun',$tampilmaps->id) }}'>Detail</a> </div></div>");
  
  // Tambahkan event listener untuk zoom ke marker saat diklik
  marker.on('click', function() {
    map.setView(marker.getLatLng(), 20); // Ganti angka 20 dengan level zoom yang diinginkan
  });
})();
@endforeach

function drawZone(){
        // alert("Called Draw Zone");
        
        let layers = [];
        let layerCoords = [];
        let layer = [];
        let zoneColor = '';
        var polygon;
        @foreach($zonasi as $z)
            layerCoords = {!!$z->zone_collections!!};
            layer = [];
            zoneColor = '{!!$z->warna!!}';
            layerCoords.forEach((latlng)=>{
                layer.push([latlng.lat,latlng.lng]);
            });
            polygon = L.polygon(layer,{color:zoneColor}).addTo(map).bindPopup("<div class='card' style='width: 250px'><img class='card-img-top' src='{{ url ('gambarkebun/') }}/{{ $tampilmaps->gambar }}' alt='gambar'><br><br><div class='card-body' style='font-size: 16px;'><a href='{{ route ('homepage.detailkebun',$tampilmaps->id) }}'>{{$z->kebun}}</a> </div></div>");;
            // polygon.on('click',function(){
            //     map.fitBounds(this.getBounds());
            // });
        @endforeach
    }
    @if(count($zonasi)>0)
        drawZone();
    @endif

</script>

@include('layouts.component.footerhomepage')