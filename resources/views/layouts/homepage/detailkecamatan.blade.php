@include('layouts.component.headerhomepage')

<div class="inner-banner has-base-color-overlay text-center">
	<div class="container">
		<div class="box">
			<h3>{{ $detailkecamatan->nama_kecamatan }}</h3>
		</div><!-- /.box -->
	</div><!-- /.container -->
</div><!-- /.inner-banner -->

<div class="breadcumb-wrapper">
	<div class="container">
		<div class="pull-left">
			<ul class="list-inline link-list">
				<li>
					<a href="#">Home</a>
				</li><!-- comment for inline hack
				--><li>
					<a href="#">Kecamatan</a>
				</li><!-- comment for inline hack
				 --><li>
					<span>Tampil Data Kecamatan</span>
				</li>
			</ul><!-- /.list-line -->
		</div><!-- /.pull-left -->
	</div><!-- /.container -->
</div><!-- /.breadcumb-wrapper -->


<section class="page sidebar-page sec-pad single-service-page">
    <div class="container">        
        <div class="row">           
            <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                <div class="sec-title medium">        
		            <h2><span class="black-color-text"><span class="base-color-text">{{$detailkecamatan->nama_kecamatanma}}</span></h2>
		        </div><!-- /.sec-title-->
                <?php echo $detailkecamatan->informasi_tambahan;?>
                <br>
                <div class="sec-title medium">        
		            <h2><span class="black-color-text"><span class="base-color-text">Maps Area Khusus Bagian {{ $detailkecamatan->nama_kecamatan }}</span></h2>
		        </div><!-- /.sec-title-->                
                <div id="map"></div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

</section><!-- /.news-wrapper -->


    <script>

    var map = L.map('map').setView([1.3234339197073528, 124.84063540933153], 12);
    const apiKey = "AAPKe1e02d452ac74e9b9a57913d49e6ca73XntLgl_BvHud8Lw7nn-265FcxkM-UOu2yJhz4CRUaUda6WCx5pElHcaF15IvkHoL";
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    

    @foreach ($produksikecamatan as $tampilmaps)  
    var marker = L.marker([{{ $tampilmaps->lokasi_gps }}]).addTo(map).bindPopup("<div class='card'><img class='card-img-top' width='250px' src='{{ url ('gambarkebun/') }}/{{ $tampilmaps->gambar }}' alt='gambar_wisata'><div class='card-body'><a href='{{ route ('homepage.detailkebun',$tampilmaps->id) }}'>{{ $tampilmaps->nama}} ({{ $tampilmaps->created_at}})</a> </div></div>");
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