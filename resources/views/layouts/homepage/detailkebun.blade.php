@include('layouts.component.headerhomepage')
<div class="inner-banner has-base-color-overlay text-center">
	<div class="container">
		<div class="box">
			<h3>{{$kebunterbaru->nama}}</h3>
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
					<a href="#">Kebun</a>
				</li><!-- comment for inline hack
				 --><li>
					<span>Tampil Data Kebun</span>
				</li>
			</ul><!-- /.list-line -->
		</div><!-- /.pull-left -->
	</div><!-- /.container -->
</div><!-- /.breadcumb-wrapper -->

<section class="page sidebar-page sec-pad single-service-page">
    <div class="container">        
        <div class="row">
            <div class="col-md-3 col-sm-12  col-xs-12 pull-left">
                <div class="single-sidebar">
	        		<div class="agent-widget">
	        			<div class="single-agent-widget">
	        				<h3>Tanggal Diupload : {{$kebunterbaru->created_at}}</h3>
	        				<h3>Jenis : {{$kebunterbaru->foreign_jeniskebun->jenis_kebun}}</h3>
	        				<h3>Kecamatan : {{$kebunterbaru->foreign_kecamatan->nama_kecamatan}}</h3>
	        			</div><!-- /.single-agent-widget -->
	        		</div><!-- /.agent-widget -->
        		</div><!-- /.single-sidebar -->
                <div class="single-sidebar">
	        		<div class="agent-widget">
	        			<div class="single-agent-widget">
	        				<h3>Informasi Lainnya</h3>
                            @forelse ($menukecamatan as $tampilmenukecamatan)
                            <a href="{{ route ('homepage.detailkecamatan',$tampilmenukecamatan->id) }}"><h5>{{$tampilmenukecamatan->nama_kecamatan}}</h5></a>
                            @empty
	        				<h3>tidak ada data</h3>
                            @endforelse   
	        			</div><!-- /.single-agent-widget -->
	        		</div><!-- /.agent-widget -->
        		</div><!-- /.single-sidebar -->                
            </div>            
            <div class="col-md-9 col-sm-12 col-xs-12 pull-right">
                <div class="sec-title medium">        
		            <h2><span class="black-color-text"><span class="base-color-text">{{$kebunterbaru->nama}}</span></h2>
		        </div><!-- /.sec-title-->
		        <img src="{{ url ('gambarkebun/') }}/{{ $kebunterbaru->gambar }}" alt="Awesome Image" height="400" width="100%"/><br><br>
                <?php echo $kebunterbaru->informasi_tambahan;?>
                <br><br><br>
                <div class="sec-title medium">        
		            <h2><span class="black-color-text"><span class="base-color-text">Maps</span></h2>
		        </div><!-- /.sec-title-->                
                <div id="mapke2"></div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

</section><!-- /.news-wrapper -->

<script>

navigator.geolocation.getCurrentPosition(function(location) {
  var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

  var mapke2 = L.map('mapke2').setView([1.3234339197073528, 124.84063540933153], 14);;

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mapke2);

    L.Routing.control({
			waypoints: [
				L.latLng(latlng), //titik utama
				L.latLng({{ $kebunterbaru->lokasi_gps }},) //titik tujuan
			],
			routeWhileDragging: false
		}).addTo(mapke2);	

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
            polygon = L.polygon(layer,{color:zoneColor}).addTo(mapke2);
            // polygon.on('click',function(){
            //     map.fitBounds(this.getBounds());
            // });
        @endforeach
    }
    @if(count($zonasi)>0)
        drawZone();
    @endif
});
</script>

@include('layouts.component.footerhomepage')