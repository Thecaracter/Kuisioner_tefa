<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('landingasset/img/Polije.png') }}" alt="Logo 1" width="30" height="30"
                class="d-inline-block align-top">
            <img src="{{ asset('landingasset/img/Sip.png') }}" alt="Logo 2" width="90" height="30"
                class="d-inline-block align-top">
            <img src="{{ asset('landingasset/img/Blu.png') }}" alt="Logo 3" width="30" height="30"
                class="d-inline-block align-top">
            <span class="ml-3">Kuesioner</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="#" onclick="showLogoutConfirmation()">
                            {{ Auth::user()->name }}
                        </a>
                    @else
                        <a class="nav-link" href="/masuk">
                            <i class="fa fa-user" aria-hidden="true">Login</i>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.5/dist/sweetalert2.min.js"></script>


<script>
    function showLogoutConfirmation() {
        Swal.fire({
            title: "Logout",
            text: "Anda yakin ingin logout?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Logout",
            cancelButtonText: "Batal",
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Tambahkan URL logout yang sesuai di bawah ini
                window.location.href = "/keluar";
            }
        });
    }
</script>
