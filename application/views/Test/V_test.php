<!-- CONTENT 1 -->
<div class="container mb-5">
    <h5 class="font-monospace ">Test Demensia</h5>
    <hr class="border-bottom border-2 border-dark" />
    <div class="container">
        <form method="post" action="<?= site_url('TestDemensia/tambah') ?>">
            <div class="mb-3 mt-3">
                <h4>
                    <label for="text" class="form-label">Ceritakan keluhan anda</label>
                </h4>
            </div>
            <div class="mb-3">
                <label for="hasil" class="form-label">jawaban</label>
                <textarea class="form-control" name="hasil" id="hasil" rows="2" required></textarea>
            </div>
            <div class="d-none">
                <label for="nama_pasien" class="form-label"></label>
                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?= $this->session->userdata('dokter') ?>" readonly />
            </div>
            <div class="d-none">
                <label for="id_akun" class="form-label"></label>
                <input type="text" class="form-control" id="id_akun" name="id_akun" value="<?= $user['id_akun'] ?>" readonly />
            </div>
            <div class=" ">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- end content 1 -->
<div class="container gap-2">
    <div class="row">
        <div class="col">
            <h5 class="font-monospace text-center">Hasil Test</h5>
            <hr class="border-bottom border-2 border-dark" />
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">keluhan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $test) : ?>
                        <tr>
                            <td class=""><?= $test['id_test'] ?></td>
                            <td class=""><?= $test['nama_pasien'] ?></td>
                            <td class=""><?= $test['hasil'] ?></td>
                            <td class="">
                                <a href="<?= site_url("TestDemensia/hapus/" . $test['id_test']); ?>" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin menghapus data ini?');" ?><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (empty($test)) : ?>
                <div class="alert alert-info" role="alert">
                    Data tidak ditemukan
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>