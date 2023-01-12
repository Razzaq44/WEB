<!-- CONTENT 1 -->
<div class="container mt-3">
    <h5 class="font-monospace">Medical Record Patient</h5>
    <!-- MODAL MEDICAL RECORDS -->
    <!-- MODAL -->
    <div class="modal fade" id="medicalrecords" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Make Medical Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= site_url('MedicalRecords/tambah') ?>">
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
                                <label for="dokter" class="form-label">Doctor</label>
                                <input type="text" class="form-control" id="dokter" name="dokter" value="<?= $this->session->userdata('dokter') ?>" readonly />
                            </div>
                            <div class="">
                                <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                <input class="form-control" id="tanggal" name="tanggal" type="date" required />
                            </div>
                            <div class="">
                                <label for="data_medrec" class="form-label">Data Rekam Medis</label>
                                <input type="text" class="form-control" id="data_medrec" name="data_medrec" required />
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Make Medical Records</button>
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
                <th scope="col">Doctor</th>
                <th scope="col">Date</th>
                <th scope="col">Medical Records Data</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($medrecUser as $medrec) : ?>
                <tr>
                    <td class=""><?= $medrec['id_medrec'] ?></td>
                    <td class=""><?= $medrec['nama_pasien'] ?></td>
                    <td class=""><?= $medrec['dokter'] ?></td>
                    <td class=""><?= $medrec['tanggal'] ?></td>
                    <td class=""><?= $medrec['data_medrec'] ?></td>
                    <td class="">
                        <a href="" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#edit<?= $medrec['id_medrec'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                        <a href="<?= site_url("MedicalRecords/hapus/" . $medrec['id_medrec']); ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit<?= $medrec['id_medrec'] ?>" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Your Medical Records</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="<?= site_url('MedicalRecords/ubah') ?>">
                                <div class="modal-body">
                                    <div class="row gap-2">
                                        <div class="col mb-2">
                                            <label for="id_medrec" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="id_medrec" name="id_medrec" value="<?= $medrec['id_medrec'] ?>" readonly />
                                        </div>
                                        <div class="col mb-2">
                                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $medrec['nama_pasien'] ?>" readonly />
                                        </div>
                                        <div class="d-none">
                                            <input type="text" class="form-control" id="dokter" name="dokter" value="<?= $this->session->userdata('dokter') ?>" readonly />
                                        </div>
                                        <div class="mb-2">
                                            <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                            <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $medrec['tanggal'] ?>" required />
                                        </div>
                                        <div class="mb-2">
                                            <label for="data_medrec" class="form-label">Medical Records Data</label>
                                            <input type="text" class="form-control" id="data_medrec" name="data_medrec" value="<?= $medrec['data_medrec'] ?>" required />
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
    <?php if (empty($medrec)) : ?>
        <div class="alert alert-info" role="alert">
            Data tidak ditemukan
        </div>
    <?php endif; ?>
    <!-- BUTTON MODAL -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#medicalrecords">Make Medical Records</button>
    </div>
</div>
<!-- END OF CONTENT 1 -->