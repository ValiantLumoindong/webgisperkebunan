@include('layouts.component.header')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb push bg-body-extra-light rounded-pill px-4 py-2">
            <a class="breadcrumb-item" href="javascript:void(0)">Kebun</a>
            <span class="breadcrumb-item active">Tampil Kebun</span>
        </nav>

        <div class="container">
            <h1>Daftar Kebun yang Perlu Diverifikasi</h1>
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
                    @forelse ($kebunPending as $kebun)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kebun->nama }}</td>
                        <td>{{ $kebun->foreign_jeniskebun->jenis_kebun }}</td>
                        <td>{{ $kebun->foreign_kecamatan->nama_kecamatan }}</td>
                        <td>{{ $kebun->status }}</td>
                        <td>
                            <form action="{{ route('admin.verifikasiKebun', $kebun->id) }}" method="POST">
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
                </tbody>
            </table>
        </div>

    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@include('layouts.component.footer')
