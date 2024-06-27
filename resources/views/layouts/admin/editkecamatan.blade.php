@include('layouts.component.header')

<!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="content">
          <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="javascript:void(0)">Kecamatan</a>
            <span class="breadcrumb-item active">Edit Kecamatan</span>
          </nav>

          <!-- Dynamic Table Responsive -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                Form Edit Data Kecamatan {{ $kecamatan->nama_kecamatan }}
              </h3>
            </div>
            <div class="block-content block-content-full">
            <form action="{{ route('kecamatan.prosesupdate', $kecamatan->id) }}" method="post">
              @csrf		              
			   @method('PUT') 	              
				<div class="row">
				  <label class="col-sm-3 col-form-label">Nama Kecamatan</label>
				  <div class="col-sm-9">
					<input type="text" class="form-control" required name="nama_kecamatan" value="{{ $kecamatan->nama_kecamatan }}">
				  </div>
				</div>
				<br>	
				<div class="row">
				  <label class="col-sm-3 col-form-label">Informasi Tambahan</label>
				  <div class="col-sm-9">
					<textarea name="informasi_tambahan">{{ $kecamatan->informasi_tambahan }}</textarea>
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

@include('layouts.component.footer')