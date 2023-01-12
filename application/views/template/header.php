<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?= base_url(); ?>/Asset/fontawesome-free-6.2.0-web/css/all.css" />

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <!-- JQUERY PLUGINS -->


    <!-- ICON -->
    <link rel="icon" href="<?= base_url(); ?>/Asset/D-removebg-preview.png" />

    <title><?php echo $judul ?></title>
</head>

<body>
    <?php $role = $this->M_Login->getUserRole($this->session->userdata('id_akun'));
    if (!empty($this->session->userdata('is_login') == FALSE)) {
        $this->load->view("template/header_noAcc");
    } else {
        if ($role['role'] == "dokter") {
            $this->load->view("template/header_login_dokter");
        } else {
            $this->load->view("template/header_login_pasien");
        }
    } ?>
    <div class="container">
        <?php if (!empty($this->session->flashdata('failed'))) { ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= $this->session->flashdata('failed'); ?>
            </div>
        <?php }
        if (!empty($this->session->flashdata('success'))) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
    </div>