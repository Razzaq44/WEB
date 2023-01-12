<!-- end content 1 -->
<div class="container gap-2">
    <div class="row">
        <div class="col">
            <h5 class="font-monospace text-center">Resep Obat</h5>
            <hr class="border-bottom border-2 border-dark" />
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Dosis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $medpre) : ?>
                        <tr>
                            <td class=""><?= $medpre['id_medpre'] ?></td>
                            <td class=""><?= $medpre['nama_pasien'] ?></td>
                            <td class=""><?= $medpre['nama_obat'] ?></td>
                            <td class=""><?= $medpre['dosis'] ?></td>
                            <td class="">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if (empty($medpre)) : ?>
                <div class="alert alert-info" role="alert">
                    Data tidak ditemukan
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>