@include('layouts.component.header')

      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <!-- User Info -->
        <div class="bg-image bg-image-bottom" style="background-image: url('assets/media/photos/photo13@2x.jpg');">
          <div class="bg-primary-dark-op py-4">
            <div class="content content-full text-center">
              <!-- Avatar -->
              <div class="mb-3">
                <a class="img-link" href="be_pages_generic_profile.html">
                  <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{url('assets/media/avatars/avatar15.jpg')}}" alt="">
                </a>
              </div>
              <!-- END Avatar -->

              <!-- Personal -->
              <h1 class="h3 text-white fw-bold mb-2">
                {{ Auth::user()->name }}
              </h1>
              <h2 class="h5 fw-medium text-white-75">
                <a class="text-primary-light" href="javascript:void(0)">Admin</a>
              </h2>
              <!-- END Personal -->

            </div>
          </div>
        </div>
        <!-- END User Info -->

        <!-- Main Content -->
        <div class="content">
        <br>
        <br>
        <div class="row">
            <!-- Row #1 -->
            <div class="col-6 col-xl-3">
              <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                  <div class="d-none d-sm-block">
                    <i class="fa fa-book fa-2x opacity-25"></i>
                  </div>
                  <div>
                    <div class="fs-3 fw-semibold">{{ $countkecamatan }}</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Kecamatan</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-6 col-xl-3">
              <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                  <div class="d-none d-sm-block">
                    <i class="fa fa-book fa-2x opacity-25"></i>
                  </div>
                  <div>
                    <div class="fs-3 fw-semibold">{{ $countjenis_kebun }}</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Jenis Kebun</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-6 col-xl-3">
              <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                  <div class="d-none d-sm-block">
                    <i class="fa fa-book fa-2x opacity-25"></i>
                  </div>
                  <div>
                    <div class="fs-3 fw-semibold">{{ $countkebun }}</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">Kebun</div>
                  </div>
                </div>
              </a>
            </div>            
            <div class="col-6 col-xl-3">
              <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                <div class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                  <div class="d-none d-sm-block">
                    <i class="fa fa-users fa-2x opacity-25"></i>
                  </div>
                  <div>
                    <div class="fs-3 fw-semibold">User</div>
                    <div class="fs-sm fw-semibold text-uppercase text-muted">1</div>
                  </div>
                </div>
              </a>
            </div>
            <!-- END Row #1 -->
          </div>
                  

          <!-- Articles -->
          <h2 class="content-heading d-flex justify-content-between align-items-center">
            <span class="fw-semibold"><i class="si si-note me-1"></i> Kecamatan</span>
            <a href="{{ route ('kecamatan.home') }}" class="btn btn-sm rounded-pill btn-alt-secondary">View More..</a>
          </h2>
          <div class="push">
          @forelse ($kecamatan as $tampilkecamatan)  
            <a class="block block-rounded block-link-shadow mb-3" href="{{ route ('kecamatan.edit', $tampilkecamatan->id) }}">
              <div class="block-content block-content-full">
                <p class="fs-sm fw-medium text-muted float-sm-end mb-1">{{$tampilkecamatan->created_at}}</p>
                <h4 class="fs-base text-primary mb-0">
                {{$tampilkecamatan->nama_kecamatan}}
                </h4>
              </div>
            </a>
            @empty
              <h5 class="text-center">Tidak ada data</h5>
            @endforelse    
            <!-- END Articles -->
          </div>


<h4>Daftar Kebun yang Perlu Diverifikasi</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kebun</th>
            <th>Jenis Kebun</th>
            <th>Kecamatan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @isset($kebunPending)
            @forelse ($kebunPending as $kebun)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kebun->nama }}</td>
                    <td>{{ $kebun->foreign_jeniskebun->jenis_kebun }}</td>
                    <td>{{ $kebun->foreign_kecamatan->nama_kecamatan }}</td>
                    <td>{{ $kebun->status }}</td>
                    <td>
                        <form action="{{ route('admin.verifikasiKebun', ['id' => $kebun->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Verifikasi</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada kebun yang perlu diverifikasi</td>
                </tr>
            @endforelse
        @else
            <tr>
                <td colspan="6" class="text-center">Data kebun belum tersedia</td>
            </tr>
        @endisset
    </tbody>
</table>





              
          <!-- END Main Content -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

@include('layouts.component.footer')