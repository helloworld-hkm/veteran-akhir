<?= $this->extend('siswa/template/index') ?>

<?= $this->section('content') ?>
<section class="section">
    
   
    <form action="<?=base_url()?>/ulangan/hitung/<?=$id->kelas;?>/<?=$id->mapel;?>" method="post">
    <?= csrf_field(); ?>
    <input class="form-check-input" value="<?=$id->kelas;?>"  type="text" hidden name="kelas" >
    <input class="form-check-input" value="<?=$id->mapel;?>"  type="text" hidden name="mapel" >
    <?php $i = 1;foreach ($soal as $key => $s) {
    ?>
        <div class="col-12 ">


            <div class="card">
                <div class="card-header">
                    <p class="d-4"><?= $i++; ?>. </p><?= $s->soal; ?>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" value="a"  type="radio" name="jawaban<?=$s->id_soal?>" id="flexRadioDefault<?=$s->id_soal?>">
                        <label class="form-check-label" for="flexRadioDefault<?=$s->id_soal?>">
                            <?=$s->opsi_a?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="b" type="radio" name="jawaban<?=$s->id_soal?>" id="flexRadioDefault<?=$s->id_soal?>">
                        <label class="form-check-label" for="flexRadioDefault<?=$s->id_soal?>">
                            <?=$s->opsi_b?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="c"  type="radio" name="jawaban<?=$s->id_soal?>" id="flexRadioDefault<?=$s->id_soal?>">
                        <label class="form-check-label" for="flexRadioDefault<?=$s->id_soal?>">
                            <?=$s->opsi_c?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="d"  type="radio" name="jawaban<?=$s->id_soal?>" id="flexRadioDefault<?=$s->id_soal?>">
                        <label class="form-check-label" for="flexRadioDefault<?=$s->id_soal?>">
                            <?=$s->opsi_d?>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="e"  type="radio" name="jawaban<?=$s->id_soal?>" id="flexRadioDefault<?=$s->id_soal?>">
                        <label class="form-check-label" for="flexRadioDefault<?=$s->id_soal?>">
                            <?=$s->opsi_e?>
                        </label>
                    </div>
                    
                </div>

            </div>

        </div>
    <?php } ?>
    <div class="form-group ">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary ">Selesai</button>
                  </div>
                </div>
              </form>
</section>
<?= $this->endSection() ?>