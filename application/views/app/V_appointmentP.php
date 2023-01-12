<!-- CONTENT 1 -->
<div class="container mb-5">
    <div class="d-flex gap-2">
        <div class="flex-grow-1 fs-5 font-monospace">Check Your Appointment</div>
    </div>
    <hr class="border-bottom border-2 border-dark" />
    <form action="<?= site_url('Appointment/index') ?>" method="get">
        <div class="d-flex flex-wrap gap-3 mb-2">
            <div class="flex-fill">
                <label for="" class="mb-2 form-label">Nama Pasien</label>
                <input class="form-control" type="text" name="nama_pasien" value="<?= $user['first_name'] . ' ' . $user['last_name'] ?>" readonly />
            </div>
            <div class="flex-fill">
                <label for="" class="mb-2 form-label">Doctor</label>
                <select class="form-select" aria-label="Default select example" name="dokter">
                    <option value="">--Select Doctor--</option>
                    <?php foreach ($dokter as $dk) : ?>
                        <option value="<?= $dk['first_name'] . ' ' . $dk['last_name'] ?>"><?= $dk['first_name'] . ' ' . $dk['last_name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="flex-fill mb-2">
            <label for="" class="mb-2 form-label">Tanggal</label>
            <input class="form-control date" type="date" name="tanggal" />
        </div>
        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
            <button class="btn" id="reset-btn" type="reset" style="border: #198754 solid 1px; color: #198754" value="Reset" onclick="">Reset</button>
            <button class="btn btn-success" type="submit" onclick="">Search</button>
        </div>
    </form>
</div>
<!-- END OF CONTENT 1 -->
<!-- CONTENT 2 -->
<div class="container mt-3">
    <!-- MODAL APPOiNTMENT -->
    <!-- MODAL -->
    <div class="modal fade" id="appointment" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Make Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= site_url('Appointment/tambah') ?>">
                    <div class="modal-body">
                        <div class="row gap-2">
                            <div class="col">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $user['first_name'] . ' ' . $user['last_name'] ?>" readonly />
                            </div>
                            <div class=" col">
                                <label for="dokter" class="form-label">Doctor</label>
                                <select class="form-select" aria-label="Default select example" name="dokter" id="dokter">
                                    <?php foreach ($dokter as $dk) : ?>
                                        <option value="<?= $dk['first_name'] . ' ' . $dk['last_name'] ?>"><?= $dk['first_name'] . ' ' . $dk['last_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="d-none">
                                <label for="id_akun" class="form-label"></label>
                                <input type="text" class="form-control" id="id_akun" name="id_akun" value="<?= $user['id_akun'] ?>" readonly />
                            </div>
                            <div class="">
                                <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                <input class="form-control date" type="date" name="tanggal" required />
                            </div>
                            <div class="">
                                <label for="tanggal" class="mb-2 form-label">Jam</label>
                                <select class="form-select" aria-label="Default select example" name="jam" required>
                                    <option value="08:30">08:30</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:30">11:30</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:30">16:30</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Make Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END OF MODAL APPOINTMENT -->
    <!-- Appointment -->
    <div class="container gap-2">
        <div class="row">
            <div class="col">
                <h5 class="font-monospace text-center">Schedule</h5>
                <hr class="border-bottom border-2 border-dark" />
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pasien Name</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($scheduleU as $schedule) : ?>
                            <tr>
                                <td class=""><?= $schedule['id_app'] ?></td>
                                <td class=""><?= $schedule['nama_pasien'] ?></td>
                                <td class=""><?= $schedule['dokter'] ?></td>
                                <td class=""><?= $schedule['tanggal'] ?></td>
                                <td class=""><?= $schedule['jam'] ?></td>
                                <td class=""><?= $schedule['status'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if (empty($scheduleU)) : ?>
                    <div class="alert alert-info" role="alert">
                        Data tidak ditemukan | Pastikan anda telah memilih dokter dan tanggal
                    </div>
                <?php endif; ?>
            </div>
            <!-- END OF APPOINTMENT -->

            <!-- CONTENT 3 -->
            <div class="col">
                <h5 class="font-monospace text-center">Appointment History</h5>
                <hr class="border-bottom border-2 border-dark" />
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($HistoryU as $History) : ?>
                            <tr>
                                <td class=""><?= $History['id_app'] ?></td>
                                <td class=""><?= $History['tanggal'] ?></td>
                                <td class=""><?= $History['jam'] ?></td>
                                <td class=""><?= $History['status'] ?></td>
                                <td class=""><button type="button" class="btn btn-success rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#details<?= $History['id_app'] ?>">Details</button></td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="details<?= $History['id_app'] ?>" tabindex="-1" aria-labelledby="details" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-light">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row gap-2 mb-2">
                                                <div class="col">
                                                    <label for="nama_pasien" class="form-label">Pasien Name</label>
                                                    <input type="text" class="form-control" value="<?= $History['nama_pasien'] ?>" readonly />
                                                </div>
                                                <div class=" col">
                                                    <label for="dokter" class="form-label">Doctor</label>
                                                    <input type="text" class="form-control" value="<?= $History['dokter'] ?>" readonly />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="tanggal" class="mb-2 form-label">Date</label>
                                                    <input class="form-control date" type="date" value="<?= $History['tanggal'] ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="row gap-2 mb-2">
                                                <div class="col">
                                                    <label for="Time" class="mb-2 form-label">Time</label>
                                                    <input type="text" class="form-control" value="<?= $History['jam'] ?>" readonly />
                                                </div>
                                                <div class="col">
                                                    <label for="Status" class="mb-2 form-label">Status</label>
                                                    <input type="text" class="form-control" value="<?= $History['status'] ?>" readonly />
                                                </div>
                                                <div class="mb-2">
                                                    <label for="Reason" class="mb-2 form-label">Reason</label>
                                                    <input class="form-control date" value="<?= $History['alasan'] ?>" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php if (empty($History)) : ?>
                    <div class="alert alert-info" role="alert">
                        Data tidak ditemukan | Pastikan anda telah memilih dokter dan tanggal
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Appointment -->
    <div class="container gap-2 mt-5 mb-3">
        <h5 class="font-monospace text-center">Your Appointment</h5>
        <hr class="border-bottom border-2 border-dark" />
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Pasien Name</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($appUser as $app) : ?>
                    <tr>
                        <td class=""><?= $i ?></td>
                        <td class=""><?= $app['id_app'] ?></td>
                        <td class=""><?= $app['nama_pasien'] ?></td>
                        <td class=""><?= $app['dokter'] ?></td>
                        <td class=""><?= $app['tanggal'] ?></td>
                        <td class=""><?= $app['jam'] ?></td>
                        <td class="">
                            <a href="" class="btn btn-sm btn-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#edit<?= $app['id_app'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                            <a href="<?= site_url("Appointment/hapus/" . $app['id_app']); ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="edit<?= $app['id_app'] ?>" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-light">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Your Appointment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="<?= site_url('Appointment/ubah') ?>">
                                    <div class="modal-body">
                                        <div class="row gap-2">
                                            <div class="col">
                                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $user['first_name'] . ' ' . $user['last_name'] ?>" readonly />
                                            </div>
                                            <div class=" col">
                                                <label for="dokter" class="form-label">Doctor</label>
                                                <select class="form-select" aria-label="Default select example" name="dokter" id="dokter" required>
                                                    <?php foreach ($dokter as $dk) : ?>
                                                        <option value="<?= $dk['first_name'] . ' ' . $dk['last_name'] ?>"><?= $dk['first_name'] . ' ' . $dk['last_name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="d-none">
                                                <label for="id_akun" class="form-label"></label>
                                                <input type="text" class="form-control" id="id_akun" name="id_akun" value="<?= $user['id_akun'] ?>" readonly />
                                            </div>
                                            <div class="">
                                                <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                                <input class="form-control date" type="date" name="tanggal" required />
                                            </div>
                                            <div class="">
                                                <label for="tanggal" class="mb-2 form-label">Jam</label>
                                                <select class="form-select" aria-label="Default select example" name="jam" required>
                                                    <option value="08:30">08:30</option>
                                                    <option value="09:30">09:30</option>
                                                    <option value="10:30">10:30</option>
                                                    <option value="11:30">11:30</option>
                                                    <option value="13:30">13:30</option>
                                                    <option value="14:30">14:30</option>
                                                    <option value="15:30">15:30</option>
                                                    <option value="16:30">16:30</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                <?php $i++;
                endforeach ?>
            </tbody>
        </table>
        <?php if (empty($appUser)) : ?>
            <div class="alert alert-info" role="alert">
                Data tidak ditemukan | Pastikan anda telah memilih dokter dan tanggal
            </div>
        <?php endif; ?>
    </div>
    <!-- END OF APPOINTMENT -->

    <!-- BUTTON MODAL -->
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#appointment">Make Appointment</button>
        </div>
    </div>
</div>