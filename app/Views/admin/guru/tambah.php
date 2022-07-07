<?= $this->extend('template/index') ?>

<?= $this->section('content') ?>
<section class="section">

    <section class="section">
        <div class="section-header">
            <h1>Guru </h1>
            <div class="section-header-button">

            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin">Dashboard</a></div>
                <div class="breadcrumb-item">Registrasi</a></div>
                <div class="breadcrumb-item">Guru</div>
            </div>
        </div>
        <?php if (session()->getFlashdata('is_unique')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss>x</button>
                    <b><i class="fa fa-exclamation-triangle "></i></b>
                    <?= session()->getFlashdata('is_unique') ?>
                </div>


            </div>
        <?php endif; ?>
        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah data Guru</h4>

                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('/admin/simpanGuru') ?>" method="post" autocomplete="off">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nama_mapel">NIK :</label>
                                        <input type="text" class="form-control" name="username" required autofocus <?php if (session('errors.username')) : ?>is-invalid<?php endif ?> value="<?= old('username') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_mapel">Nama :</label>
                                        <input type="text" class="form-control" name="nama" required autofocus <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?> value="<?= old('nama') ?>">
                                    </div>


                                    <div class="">
                                        <button class="btn btn-success"><i class="fas fa-paper-plane"></i>Simpan</button>
                                        <a href="/admin/guru" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?= $this->endSection() ?>