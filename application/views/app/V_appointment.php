<!-- CONTENT 1 -->
<div class="container mb-5">
    <div class="d-flex gap-2">
        <div class="flex-grow-1 fs-5 font-monospace">Check Appointment</div>
    </div>
    <hr class="border-bottom border-2 border-dark" />
    <form action="<?= site_url('Appointment/index') ?>" method="get">
        <div class="d-flex flex-wrap gap-3">
            <div class="flex-fill">
                <label for="floatingInput" class="mb-2 form-label">ID Appointment</label>
                <input class="form-control" type="text" id="searchbyid" name="id_app" />
            </div>
            <div class="flex-fill">
                <label for="" class="mb-2 form-label">Nama Pasien</label>
                <input class="form-control" type="text" name="nama_pasien" aria-label="readonly input example" />
            </div>
        </div>
        <div class="flex-fill">
            <label for="" class="mb-2 form-label">Date</label>
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
    <h5 class="font-monospace">List Appointment</h5>
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
            foreach ($appDokter as $app) : ?>
                <tr>
                    <td class=""><?= $i ?></td>
                    <td class=""><?= $app['id_app'] ?></td>
                    <td class=""><?= $app['nama_pasien'] ?></td>
                    <td class=""><?= $app['dokter'] ?></td>
                    <td class=""><?= $app['tanggal'] ?></td>
                    <td class=""><?= $app['jam'] ?></td>
                    <td class="">
                        <a href="" class="btn btn-sm btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#edit<?= $app['id_app'] ?>" ?><i class="fa-solid fa-x"></i></a>
                        <a href="<?= site_url("Appointment/approved/" . $app['id_app']); ?>" class="btn btn-sm btn-success rounded-pill" onclick="return confirm('Approve this Appointment?');" ?><i class="fa-solid fa-thumbs-up"></i></a>
                    </td>
                </tr>
                <!-- Modal Decline Reason -->
                <div class="modal fade" id="edit<?= $app['id_app'] ?>" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-light">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $app['nama_pasien'] ?> Details Appointment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="<?= site_url("Appointment/decline/" . $app['id_app']); ?>">
                                <div class="modal-body">
                                    <div class="row gap-2">
                                        <div class="col">
                                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $app['nama_pasien'] ?>" readonly />
                                        </div>
                                        <div class="col">
                                            <label for="dokter" class="form-label">Doctor</label>
                                            <input type="text" class="form-control" id="dokter" name="dokter" value="<?= $app['dokter'] ?>" readonly />
                                        </div>
                                        <div class="">
                                            <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                            <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $app['tanggal'] ?>" readonly />
                                        </div>
                                        <div class="">
                                            <label for="jam" class="form-label">Jam</label>
                                            <input type="text" class="form-control" id="jam" name="jam" value="<?= $app['jam'] ?>" required />
                                        </div>
                                        <div class="">
                                            <label for="reason" class="form-label">Alasan Decline</label>
                                            <input type="text" class="form-control" id="reason" name="reason" id="reason" required />
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to decline this appointment?');">Submit</button>
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
    <?php if (empty($appDokter)) : ?>
        <div class="alert alert-info" role="alert">
            Data tidak ditemukan
        </div>
    <?php endif; ?>
</div>
<!-- END OF CONTENT 2 -->

<!-- CONTENT 3 -->
<div class="container gap-2 mt-5">
    <div class="row">
        <div class="col">
            <h5 class="font-monospace text-center">Your appointment schedule</h5>
            <hr class="border-bottom border-2 border-dark" />
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pasien Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($provedDokter as $pd) : ?>
                        <tr>
                            <td class=""><?= $pd['id_app'] ?></td>
                            <td class=""><?= $pd['nama_pasien'] ?></td>
                            <td class=""><?= $pd['tanggal'] ?></td>
                            <td class=""><?= $pd['jam'] ?></td>
                            <td class="">
                                <a href="<?= site_url("Appointment/done/" . $pd['id_app']); ?>" class="btn badge bg-success rounded-pill" onclick="return confirm('This appointment has been completed?');" ?>Done</i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (empty($provedDokter)) : ?>
                <div class="alert alert-info" role="alert">
                    Data tidak ditemukan
                </div>
            <?php endif; ?>
        </div>
        <div class="col">
            <h5 class="font-monospace text-center">Appointment history</h5>
            <hr class="border-bottom border-2 border-dark" />
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pasien Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($History as $H) : ?>
                        <tr>
                            <td class=""><?= $H['id_app'] ?></td>
                            <td class=""><?= $H['nama_pasien'] ?></td>
                            <td class=""><?= $H['tanggal'] ?></td>
                            <td class=""><?= $H['jam'] ?></td>
                            <td class=""><?= $H['status'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (empty($History)) : ?>
                <div class="alert alert-info" role="alert">
                    Data tidak ditemukan
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>