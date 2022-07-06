<?= $this->extend('auth/template/index') ?>

<?= $this->section('content') ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-8 mb-n4">


            <div class="card o-hidden border-0 bg-blur shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">

                                    <img src="<?= base_url() ?>/img/icon.ico" class="img-fluid" alt="logoi" width="15%">
                                    <h2 class="h5 text-dark mt-2 mb-n1"> SMK VETERAN PEKALONGAN </h2>
                                    <h2 class="h6 text-gray-900 mb-3">Jl. Maninjau No.14 51129 Pekalongan Jawa Tengah </h2>


                                    <h1 class="h2 text-primary  f-1 mb-4"> <b>login </b></h1>



                                </div>
                                <form class="user" action="<?= base_url('auth/cekLogin') ?>" method="POST">
                                    <div class="form-group">
                                        <?= csrf_field() ?>
                                        <input type="text" name="username" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="InputUsername" aria-describedby="emailHelp" placeholder="NISN">

                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user   <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" "
                                                id=" exampleInputPassword" placeholder="Password" autocomplete="off">

                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Masuk">

                                </form>
                                <hr>
                                <div class="text-center">
                                    <p class=" mb-n4">Dibuat oleh lina &middot; hakim &middot; septiyan &copy; <?= (date("Y")); ?></p>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>