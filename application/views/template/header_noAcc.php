<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('Dashboard') ?>"> <img src="<?= base_url(); ?>/Asset/D-removebg-preview.png" alt="" width="50" height="50" /> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-3">
                    <a class="nav-link" href="<?= site_url('Dashboard') ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Services </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= site_url('Appointment') ?>">Appointment</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('TestDemensia') ?>">Test Demensia</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('Medpre') ?>">Medical Prescription</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('Medical') ?>">Cek Resep Obat</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('MedicalRecords') ?>">Medical Records</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('Diagnosis') ?>">Diagnosis</a></li>
                    </ul>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="<?= site_url('Dashboard/about'); ?>">About</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="<?= site_url('Dashboard/FAQ'); ?>">FAQ</a>
                </li>
                <li class="nav-item" id="sign_in">
                    <!-- BUTTON MODAL -->
                    <button type="button" class="btn btn-danger px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</button>
                    <!-- MODAL -->
                    <div class="modal fade" id="exampleModal" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-light">
                                    <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="<?= site_url('dashboard/login'); ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control" name="username" id="username" placeholder="Masukan Username" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputPassword5" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" aria-describedby="passwordHelpBlock" required />
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-danger" type="submit">Sign In</button>
                                            <p class="text-center fw-light">Don't Have An Account? <a href="<?= site_url('Signup') ?>">Sign Up</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF MODAL -->
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END OF NAV BAR -->