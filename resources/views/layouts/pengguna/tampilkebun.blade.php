@include('layouts.component.headerpengguna')

<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="content">
    <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
      <a class="breadcrumb-item" href="javascript:void(0)">Kebun</a>
      <span class="breadcrumb-item active">Tampil Kebun</span>
    </nav>

    <!-- Dynamic Table Responsive -->
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">
          <a href="{{ route('kebun.tambah') }}" class="btn btn-primary btn-sm">Tambah Data</a> 
        </h3>
      </div>
      <div class="block-content block-content-full">
        <!-- DataTables functionality is initialized with .js-dataTable-responsive class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th>Nama</th>
              <th>Jenis Kebun</th>
              <th>Kecamatan</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($kebun as $tampilkebun)  
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td class="fw-semibold">{{ $tampilkebun->nama }}</td>
              <td>{{ $tampilkebun->foreign_jeniskebun->jenis_kebun }}</td>
              <td class="fw-semibold">
                @if($tampilkebun->foreign_kecamatan)
                  {{ $tampilkebun->foreign_kecamatan->nama_kecamatan }}
                @else
                  Data kecamatan tidak ditemukan
                @endif
              </td>        
              <td class="text-center">
                <a href="{{ route('kebun.edit', $tampilkebun->id) }}" target="_blank" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit Kebun">
                  <i class="fa fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalhapus{{ $tampilkebun->id }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus Kebun">
                  <i class="fa fa-trash"></i>
                </a>          
                <form action="{{ route('kebun.hapus', $tampilkebun->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <div class="modal" id="modalhapus{{ $tampilkebun->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="block block-rounded shadow-none mb-0">
                          <div class="block-header block-header-default">
                            <h3 class="block-title">Hapus Data {{ $tampilkebun->nama_produksi }}?</h3>
                            <div class="block-options">
                              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                              </button>
                            </div>
                          </div>
                          <div class="block-content fs-sm">
                            Apa anda yakin ingin menghapus data ini?<br><br>
                          </div>
                          <div class="block-content block-content-full block-content-sm text-end border-top">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                              Close
                            </button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </div>
                        </div>
                      </div>
                    </div>                                                                                     
                  </div>
                </form>                        
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center">Tidak ada data</td>                                                                             
            </tr>                                                
            @endforelse                     
          </tbody>
        </table>
      </div>
    </div>
    <!-- Dynamic Table Responsive -->
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->

@include('layouts.component.footerpengguna')
