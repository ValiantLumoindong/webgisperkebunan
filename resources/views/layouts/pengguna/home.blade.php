@include('layouts.component.headerpengguna')

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
                    <a class="text-primary-light" href="javascript:void(0)">User</a>
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
            <!-- Status Data -->
            <div class="col-md-6">
                <div class="block block-rounded">
                    <div class="block-content">
                        <h2 class="content-heading">Status Data Anda</h2>
                        <p>Total Kebun: {{ $statusData['kebunall'] }}</p>
                        <p>Kebun Diverifikasi: {{ $statusData['kebunselesai'] }}</p>
                        <p>Kebun Pending: {{ $statusData['kebunpending'] }}</p>
                    </div>
                </div>
            </div>
            <!-- END Status Data -->
        </div>


        <!-- END Main Content -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@include('layouts.component.footerpengguna')
