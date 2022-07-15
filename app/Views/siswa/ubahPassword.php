<?= $this->extend('siswa/template/index') ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Pengaturan</h1>
    <div class="section-header-breadcrumb">

      <!-- <div class="breadcrumb-item active"><a href="#"><?= date('d-F-Y H:i:s') ?></a></div> -->

    </div>
  </div>
  <?php if(session()->getFlashdata('eror')):?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
      <button class="close" data-dismiss>x</button>
      <b><i class="fa fa-exclamation-triangle"></i></b>
      <?=session()->getFlashdata('eror')?>
      </div>
    </div>
    <?php endif;?>

  <div class="card">
    <div class="card-header  bg-danger">
      <h4 class="text-white">Ganti Password</h4>
    </div>
    <form action="<?= base_url() ?>/siswa/updatePassword" method="post"  oninput='konfirm.setCustomValidity(konfirm.value != passwordBaru.value ? "Passwords do not match." : "")'>
      <?= csrf_field(); ?>
      <div class="card-body">
        <div class="form-group">
          <label>password Lama</label>
          <input type="text" name="passwordLama" class="form-control">
        </div>
        <div class="form-group">
          <label>Password Baru</label>
          <input type="text"  name="passwordBaru" class="form-control">
        </div>
        <div class="form-group">
          <label>Konfirmasi Password</label>
          <input type="text"  name="konfirm" class="form-control">
        </div>
      </div>

      <div class="card-footer text-right">
        <button class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

</section>
<?= $this->endSection() ?>