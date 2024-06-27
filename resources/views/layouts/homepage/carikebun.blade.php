@include('layouts.component.headerhomepage')
<div class="inner-banner has-base-color-overlay text-center">
	<div class="container">
		<div class="box">
			<h3>Hasil Pencarian <b>{{ $datacari }}</b></h3>
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

<section class="sec-pad service-box-three">
    <div class="container">
        <div class="row">
        @forelse ($kebunterbaru as $tampilkebun)  
            <div class="col-md-4">
                <div class="single-service-box-three">
                    <a href="{{ route ('homepage.detailkebun', $tampilkebun->id) }}">
                    <div class="img-box">
                        <img src="{{ url ('gambarkebun/') }}/{{ $tampilkebun->gambar }}" alt="Awesome Image" height="370" width="370"/>
                        <div class="overlay">
                            <div class="box">
                                <div class="content">
                                    <div class="content-inner">
                                        <h3>{{$tampilkebun->nama }}</h3>
                                        <span class="decor-line"></span>
                                        <p>{{$tampilkebun->created_at }}</p>
                                    </div><!-- /.content-inner -->
                                </div><!-- /.content -->
                            </div><!-- /.box -->
                        </div><!-- /.overlay -->
                    </div><!-- /.img-box -->
                    </a>
                </div><!-- /.single-service-box-three -->
            </div><!-- /.col-md-4 -->

        @empty 
            <h4 class="text-center"> Tidak ada yang berkaitan dengan hasil pencarian <b> {{$datacari}} </b> </h4>
        @endforelse
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.sec-pad service-box-three -->



@include('layouts.component.footerhomepage')