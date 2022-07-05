<?= $this->extend('siswa/template/index') ?>

<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Selamat Datang,!</h1>
    <div class="section-header-breadcrumb">
     
      <div class="breadcrumb-item active"><a href="#"><?= date( 'd-F-Y H:i:s') ?></a></div>

    </div>
  </div>

  <div class="row">
    <div class="col-12 mb-4">
      <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="<?=base_url()?>/template/assets/img/unsplash/header.jpg">
        <div class="hero-inner">
          <h2>SISTEM ULANGAN ONLINE SMK VETERAN</h2>
          <p class="lead">Semoga Kegiatan Pembelajaranmu Menyenyangkan dan kerjakan ulangan dengan jujur </p>
          <div class="mt-4">
            <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Profil</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 mb-4">
    <div class="card">
                  <div class="card-header">
                    <h4>Ulangan Hari Ini</h4>
                    <div class="card-header-action">
                      <a data-collapse="#mycard-collapse" class="btn btn-icon btn-secondary " href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body p-0">
                      <div class="table-responsive">
                      <table class="table table-hover  ">
                      <thead class="">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Ulangan</th>
                        
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                        <?php foreach ($ulangan as $key => $ul) {?>
                          <tr>
                          <th scope="row"><?=$i++;?></th>
                          <td>Teknik Komputer Dan Jaringan</td>
                          <td>Belum DIkerjakan</td>
                                 
                          <td>  <a href="ulangan/kerjakan" class=" d-block btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Kerjakan dengan Jujur"><i class="fas fa-pencil-alt"></i>  Kerjakan</a>
                          </td>
                        </tr>
                        <?php };?>
                        
                    
                      </tbody>
                      
                    </table>
                      </div>
                    
                    </div>
                    <div class="card-footer">
                      Kerjakan Ulangan Dengan Jujur 
                    </div>
                  </div>
                </div>
    </div>
  </div>

</section>
<?= $this->endSection() ?>