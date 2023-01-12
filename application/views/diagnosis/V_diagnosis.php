<!-- CONTENT 1 -->
<div class="container mt-3">
    <!-- MODAL DIAGNOSIS -->
    <!-- BUTTON MODAL -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#diagnosis">Make Diagnosis</button>
    <!-- MODAL -->
    <div class="modal fade" id="diagnosis" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Make Diagnosis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= site_url('Diagnosis/tambah') ?>">
                    <div class="modal-body">
                        <div class="row gap-2">
                            <div class="col">
                                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                <select class="form-select" aria-label="Default select example" name="nama_pasien" id="nama_pasien">
                                    <?php foreach ($pasien as $p) : ?>
                                        <option value="<?= $p['first_name'] . ' ' . $p['last_name'] ?>"><?= $p['first_name'] . ' ' . $p['last_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="dokter" class="form-label">Doctor</label>
                                <select class="form-select" aria-label="Default select example" name="dokter" id="dokter">
                                    <?php foreach ($dokter as $dk) : ?>
                                        <option value="<?= $dk['first_name'] . ' ' . $dk['last_name'] ?>"><?= $dk['first_name'] . ' ' . $dk['last_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="">
                                <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                <input class="form-control" id="tanggal" name="tanggal" type="date" required />
                            </div>
                            <div class="">
                                <label for="data_diagnosis" class="form-label">Data Diagnosis</label>
                                <input type="text" class="form-control" id="data_diagnosis" name="data_diagnosis" required />
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Make Diagnosis</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END OF MODAL DIAGNOSIS -->
    <hr class="border-bottom border-2 border-dark" />
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Doctor</th>
                <th scope="col">Date</th>
                <th scope="col">Diagnosis Data</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $diagnosis) : ?>
                <tr>
                    <td class=""><?= $diagnosis['id_diagnosis'] ?></td>
                    <td class=""><?= $diagnosis['nama_pasien'] ?></td>
                    <td class=""><?= $diagnosis['dokter'] ?></td>
                    <td class=""><?= $diagnosis['tanggal'] ?></td>
                    <td class=""><?= $diagnosis['data_diagnosis'] ?></td>
                    <td class="">
                        <a href="" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#edit<?= $diagnosis['id_diagnosis'] ?>"><i class="fa-sharp fa-solid fa-pencil"></i></a>
                        <a href="<?= site_url("Diagnosis/hapus/" . $diagnosis['id_diagnosis']); ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <!-- Modal Edit -->
                <div class="modal fade" id="edit<?= $diagnosis['id_diagnosis'] ?>" tabhome="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Your Diagnosis</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="<?= site_url('Diagnosis/ubah') ?>">
                                <div class="modal-body">
                                    <div class="row gap-2">
                                        <div class="col">
                                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $diagnosis['nama_pasien'] ?>" readonly />
                                        </div>
                                        <div class="col">
                                            <label for="dokter" class="form-label">Doctor</label>
                                            <input type="text" class="form-control" id="dokter" name="dokter" value="<?= $diagnosis['dokter'] ?>" readonly />
                                        </div>
                                        <div class="">
                                            <label for="tanggal" class="mb-2 form-label">Tanggal</label>
                                            <input class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $diagnosis['tanggal'] ?>" required />
                                        </div>
                                        <div class="d-none">
                                            <label for="id_diagnosis" class="form-label">ID Akun</label>
                                            <input type="text" class="form-control" id="id_diagnosis" name="id_diagnosis" value="<?= $diagnosis['id_diagnosis'] ?>" readonly />
                                        </div>
                                        <div class="">
                                            <label for="data_diagnosis" class="form-label">Diagnosis Data</label>
                                            <input type="text" class="form-control" id="data_diagnosis" name="data_diagnosis" value="<?= $diagnosis['data_diagnosis'] ?>" required />
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
            <?php $i++;
            endforeach ?>
        </tbody>
    </table>
    <?php if (empty($diagnosis)) : ?>
        <div class="alert alert-info" role="alert">
            Data tidak ditemukan
        </div>
    <?php endif; ?>
</div>
<!-- END OF CONTENT 1 -->