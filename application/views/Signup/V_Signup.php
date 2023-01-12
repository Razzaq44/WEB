<!-- REGISTER FORM -->
<div class="container">
    <form method="POST" action="<?= site_url('Signup/register') ?>" enctype="multipart/form-data">
        <div class="d-flex flex-wrap gap-3 mb-3">
            <div class="flex-fill">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Your FIrst Name" required />
            </div>
            <div class="flex-fill">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Your Last Name" required />
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required />
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" id="email" placeholder="Masukan Email" required />
        </div>
        <div class="d-flex flex-wrap gap-3 mb-3">
            <div class="flex-fill">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required />
            </div>
            <div class="flex-fill">
                <label for="pass" class="form-label">Re Enter Password</label>
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Masukan Password" required />
            </div>
        </div>
        <div class="flex-fill mb-3">
            <label for="file" class="form-label">Photo Profile</label>
            <input class="form-control" type="file" id="file" name="file" accept="image/png, image/jpeg, image/jpg, image/gif" required>
        </div>
        <div class="flex-fill mb-4">
            <label for="pass" class="form-label">Select Your Role</label>
            <select class="form-select form-select mb-4" aria-label=".form-select-lg example" name="role">
                <option value="pasien">Pasien</option>
                <option value="dokter">Dokter</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger" value="upload">Register</button>
    </form>
</div>

<!-- END OF REGISTER FORM -->