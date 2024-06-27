@include('layouts.component.header')

<!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="javascript:void(0)">Kebun</a>
            <span class="breadcrumb-item active">Tambah Kebun</span>
          </nav>

          <!-- Dynamic Table Responsive -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                Form Tambah Data Kebun
              </h3>
            </div>
            <div class="block-content block-content-full">
            <form action="{{ route('kebun.prosestambah')}}" method="post" enctype="multipart/form-data">
              @csrf		
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
							<option selected disabled>Pilih Jenis Kebun</option>
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
					<input type="text" class="form-control" required name="nama">
				  </div>
				</div>
				<br>							                           
                <div class="row">
				  <label class="col-sm-3 col-form-label">Tanggal</label>
				  <div class="col-sm-9">
					<input type="date" class="form-control" required name="tanggal">
				  </div>
				</div>
				<br>	
                <div class="row">
				  <label class="col-sm-3 col-form-label">Kordinat GPS</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control" required name="lokasi_gps">
				  </div>
				</div>
				<div class="row">
					<label class="col-sm-3 col-form-label">Warna Zonasi</label>
					<div class="col-sm-9">
					  <input type="color" class="form-control" required name="warna_zone">
					</div>
				  </div>
				<br>
				<div class="row">
				  <label class="col-sm-3 col-form-label">Gambar</label>
				  <div class="col-sm-9">
					<input type="file" class="form-control" required name="gambar">
                                    @error('gambar')
									<span class="badge badge-danger" role="alert"> <strong class="text-danger">{{ $message }}</strong></span>
                                     @enderror    					
				  </div>
				</div>
				<br>	                	                                
				<div class="row">
				  <label class="col-sm-3 col-form-label">Informasi Tambahan</label>
				  <div class="col-sm-9">
					<textarea name="informasi_tambahan"></textarea>
				  </div>
				</div>
				<br>				
				<div class="row">
				  <label class="col-sm-3 col-form-label"></label>
				  <div class="col-sm-9">
					<button class="btn btn-primary" type="submit">Submit</button>
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

@include('layouts.component.footer')