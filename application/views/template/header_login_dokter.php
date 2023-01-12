<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= site_url('Dashboard') ?>"> <img src="<?= base_url(); ?>/Asset/D-removebg-preview.png" alt="" width="50" height="50" /> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mt-2">
                <li class="nav-item me-3">
                    <a class="nav-link" href="<?= site_url('Dashboard') ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Services </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= site_url('Appointment') ?>">Appointment</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('Medpre') ?>">Medical Prescription</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('MedicalRecords') ?>">Medical Records</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('Diagnosis') ?>">Diagnosis</a></li>
                    </ul>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="<?= site_url('Dashboard/about'); ?>">About</a>
                </li>
                <li class="nav-item me-2">
                    <a class="nav-link" href="<?= site_url('Dashboard/FAQ'); ?>">FAQ</a>
                </li>
                <li class="nav-item">
                    <!-- BUTTON Logut -->
                    <div class="btn-group">
                        <button class="btn dropdown-toggle ms-2 font-monospace" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class=" rounded-circle m-auto" src="<?= base_url('uploads/' . $user['photo_profile']) ?>" alt="" style="height: 34px; width: 34px">
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-item"><?= $user['first_name'] . " " . $user['last_name'] ?></div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= site_url('dashboard/logout') ?>">Sign Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END OF NAV BAR -->