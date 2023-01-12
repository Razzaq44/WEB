<!-- CONTENT 1 -->
<div class="container mt-3">
    <h5 class="font-monospace">Medical Prescription for Doctor</h5>
    <!-- MODAL MEDICAL RECORDS -->
    <!-- MODAL -->
    <div class="modal fade" id="medicalrecords" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Make Medical Prescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= site_url('Medpre/tambah') ?>">
                    <div class="modal-body">
                        <div class="row gap-2">
                            <div class="col">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <select class="form-select" aria-label="Default select example" name="nama_pasien" id="nama_pasien" required>
                                    <?php foreach ($pasien as $p) : ?>
                                        <option value="<?= $p['first_name'] . ' ' . $p['last_name'] ?>"><?= $p['first_name'] . ' ' . $p['last_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="nama_obat" class="form-label">Nama Obat</label>
                                <select class="form-select" aria-label="Default select example" name="nama_obat" id="nama_obat" required>
                                    <?php foreach ($obat as $o) : ?>
                                        <option value="<?= $o['nama_obat']?>"><?= $o['nama_obat'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="">
                                <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                <input class="form-control" id="tanggal" name="tanggal" type="date" required />
                            </div>
                            <div class="">
                                <label for="data_medrec" class="form-label">Dosis</label>
                                <input type="text" class="form-control" id="dosis" name="dosis" required />
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Make Medical Prescription</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END OF MODAL MEDICAL RECORDS -->
    <hr class="border-bottom border-2 border-dark" />
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Date</th>
                <th scope="col">Dosis</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($medpre as $medpre) : ?>
                <tr>
                    <td class=""><?= $medpre['id_medpre'] ?></td>
                    <td class=""><?= $medpre['nama_pasien'] ?></td>
                    <td class=""><?= $medpre['nama_obat'] ?></td>
                    <td class=""><?= $medpre['tanggal'] ?></td>
                    <td class=""><?= $medpre['dosis'] ?></td>
                    <td class="">
                        <a href="" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#edit<?= $medpre['id_medpre'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                        <a href="<?= site_url("Medpre/hapus/" . $medpre['id_medpre']); ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin menghapus obat ini?');" ?><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit<?= $medpre['id_medpre'] ?>" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Your Medical Prescription</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="<?= site_url('Medpre/ubah') ?>">
                                <div class="modal-body">
                                    <div class="row gap-2">
                                        <div class="col mb-2">
                                            <label for="id_medpre" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="id_medpre" name="id_medpre" value="<?= $medpre['id_medpre'] ?>" readonly />
                                        </div>
                                        <div class="col mb-2">
                                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $medpre['nama_pasien'] ?>" readonly />
                                        </div>
                                        <div class="d-none">
                                            <label for="nama_pasien" class="form-label">Nama Obat</label>
                                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $medpre['nama_obat'] ?>" readonly />
                                        </div>
                                        <div class="mb-2">
                                            <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                            <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $medpre['tanggal'] ?>" required />
                                        </div>
                                        <div class="mb-2">
                                            <label for="dosis" class="form-label">Dosis</label>
                                            <input type="text" class="form-control" id="dosis" name="dosis" value="<?= $medpre['dosis'] ?>" required />
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
                <!-- END MODAL -->
            <?php
            endforeach ?>
        </tbody>
    </table>
    <?php if (empty($medpre)) : ?>
        <div class="alert alert-info" role="alert">
            Obat tidak ditemukan
        </div>
    <?php endif; ?>
    <!-- BUTTON MODAL -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#medicalrecords">Make Medical Prescription</button>
    </div>
</div>
<!-- END OF CONTENT 1 -->