@include('layouts.component.header')

<!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="javascript:void(0)">Produksi</a>
            <span class="breadcrumb-item active">Tambah Produksi</span>
          </nav>

          <!-- Dynamic Table Responsive -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                Form Tambah Data Produksi
              </h3>
            </div>
            <div class="block-content block-content-full">
            <form action="{{ route('produksi.prosestambah')}}" method="post" enctype="multipart/form-data">
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
				  <label class="col-sm-3 col-form-label">Nama Produksi</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control" required name="nama_produksi">
				  </div>
				</div>
				<br>	                
				<div class="row">
				  <label class="col-sm-3 col-form-label">Luas Tanam</label>
				  <div class="col-sm-9">
					<input type="number" step="0.01"class="form-control" required name="luas_tanam">
				  </div>
				</div>
				<br>	
				<div class="row">
				  <label class="col-sm-3 col-form-label">Luas Panen</label>
				  <div class="col-sm-9">
					<input type="number" step="0.01" class="form-control" required name="luas_panen">
				  </div>
				</div>
				<br>	
				<div class="row">
				  <label class="col-sm-3 col-form-label">Produksi</label>
				  <div class="col-sm-9">
					<input type="number" step="0.01" class="form-control" required name="produksi">
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