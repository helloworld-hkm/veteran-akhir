<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Veteran CBT - SISWA</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css" >
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css" >
  
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">



  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
    <?=$this->include('siswa/template/topbar')?>


      <!-- Main Content -->
      <div class="main-content">

      <?= $this->renderSection('content') ?>
      </div>
      <footer class="main-footer">
        <div class="footer text-center ">
          Copyright &copy; <?= date('Y')?> <div class="bullet"></div> Made by <a href="https://hakim.in/"></a> lina &middot; hakim &middot; septiyan <div class="bullet"></div> Design by <a href="https://nauval.in/">Stisla</a>
        </div>
        
      </footer>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Yakin Ingin keluar ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Pilih Logout  untuk Keluar dari akun </p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?=base_url('auth/logout')?>" class="btn btn-primary">Logout</a>
              </div>
            </div>
          </div>
        </div>
  <!-- General JS Scripts -->
  <script>
    window.setTimeout(function(){
      $(".alert").fadeTo(500,0).slideUp(500,function(){
        $($this).remove();
      })

    },3000);
  </script>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?=base_url()?>/template/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?=base_url()?>/template/assets/js/scripts.js"></script>
  <script src="<?=base_url()?>/template/assets/js/custom.js"></script>
</body>
</html>
