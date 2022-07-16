<?= $this->extend('siswa/template/index') ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Ulangan Selesai</h1>
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
    <div class=" ">
                <div class="card">
                  <!-- <div class="card-header">
                    <h4>Selamat</h4>
                  </div> -->
                  <div class="card-body">
                    <div class="empty-state" data-height="400">
                      <div class="empty-state-icon bg-success">
                        <i class="fas fa-check"></i>
                      </div>
                      <h2>Ulangan Selesai Dikerjakan!</h2>
                      <p class="lead">
                      Anda telah menyeleseikan Ulangan  dengan nilai <?=$nilai?>
                      </p>
                      <a href="<?=base_url()?>/siswa/index" class="btn btn-primary mt-4">Kembali</a>
                      
                    </div>
                  </div>
                </div>

</section>
<?= $this->endSection() ?>