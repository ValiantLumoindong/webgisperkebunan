@include('layouts.component.headerpengguna')


<!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="javascript:void(0)">Kebun</a>
            <span class="breadcrumb-item active">Edit Kebun</span>
          </nav>

          <!-- Dynamic Table Responsive -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                Form Edit Produksi {{ $kebun->nama }}
              </h3>
            </div>
            <div class="block-content block-content-full">
            <form action="{{ route('kebun.prosesupdate', $kebun->id)}}" method="post" enctype="multipart/form-data">
			@csrf		              
			   @method('PUT') 		
              <div class="row">
				  <label class="col-sm-3 col-form-label">Kecamatan</label>
				  <div class="col-sm-9">
					<select class="form-control" required name="id_kecamatan">
							<option selected disabled>Pilih Kecamatan</option>
						@foreach ($kecamatan as $tampilkecamatan)  
							<option value="{{ $tampilkecamatan->id }}">{{$tampilkecamatan->nama_kecamatan}}</option>
						@endforeach
					</select>
				  </div>
				</div>
                <br> 
				<div class="row">
				  <label class="col-sm-3 col-form-label">Jenis Kebun</label>
				  <div class="col-sm-9">
					<select class="form-control" required name="jenis_kebun">
							<option selected id="{{ $kebun->foreign_jeniskebun->id }}">{{ $kebun->foreign_jeniskebun->jenis_kebun }}</option>
					    	@foreach ($jenis_kebun as $tampilkebun)  
							<option value="{{ $tampilkebun->id }}">{{$tampilkebun->jenis_kebun}}</option>
						    @endforeach
					</select>
				  </div>
				</div>
                <br> 	
                <div class="row">
				  <label class="col-sm-3 col-form-label">Nama</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control" value="{{ $kebun->nama }}" required name="nama">
				  </div>
				</div>
				<br>
                <div class="row">
				  <label class="col-sm-3 col-form-label">Tanggal</label>
				  <div class="col-sm-9">
					<input type="date" class="form-control" value="{{ $kebun->tanggal }}" required name="tanggal">
				  </div>
				</div>
				<br>	
                <div class="row">
				  <label class="col-sm-3 col-form-label">Kordinat GPS</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control" value="{{ $kebun->lokasi_gps }}" required name="lokasi_gps">
				  </div>
				</div>
				<div class="row">
					<label class="col-sm-3 col-form-label">Warna Zonasi</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" value="{{ $kebun->warna_zone }}" required name="warna_zone">
					</div>
				  </div>
				<br>
				<div class="row">
				  <label class="col-sm-3 col-form-label">Gambar</label>
				  <div class="col-sm-9">
					<input type="file" class="form-control" name="gambar">
					<strong class="text-info"><a href="{{ url ('gambarkebun/') }}/{{ $kebun->gambar }}" target="_blank">Gambar Sekarang: {{ $kebun->gambar }}</a></strong>
                                    @error('gambar')
									<span class="badge badge-danger" role="alert"> <strong class="text-danger">{{ $message }}</strong></span>
                                     @enderror    					
				  </div>
				</div>
				<br>					                	                                
				<div class="row">
				  <label class="col-sm-3 col-form-label">Informasi Tambahan</label>
				  <div class="col-sm-9">
					<textarea name="informasi_tambahan">{{ $kebun->informasi_tambahan }}</textarea>
				  </div>
				</div>
				<br>				
				<div class="row">
				  <label class="col-sm-3 col-form-label"></label>
				  <div class="col-sm-9">
					<button class="btn btn-primary" type="submit">Update</button>
				  </div>
				</div>				
            </form>					   
            </div>
          </div>
          <!-- Dynamic Table Responsive -->

        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

@include('layouts.component.footerpengguna')