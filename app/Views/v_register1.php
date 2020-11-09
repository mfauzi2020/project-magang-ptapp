<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Argowisata Porlak Parna | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- logosmall -->
  <link href="<?= base_url() ?>/template/a/assets/img/logo-small.png" rel="icon">
  <link href="<?= base_url() ?>/template/a/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
  <div class="register-box box-tools center">
    <div class="register-logo">
      <a href="../../index2.html"><b>Form Pendaftaran</b><img src="<?= base_url() ?>/template/a/assets/img/logo-app.png" alt="logo" width="300" class="shadow-light rounded-circle"></a>
    </div>

    <div class="register-box-body">
      <?php
      // pesan validasi error
      $errors = session()->getFlashdata('errors');
      if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
          <ul>
            <?php foreach ($errors as $error) : ?>
              <li><?= esc($error) ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php } ?>
      <?php
      if (session()->getflashdata('pesan')) {
        echo ' <div class="alert alert-success" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
      }
      ?>

      <?php
      echo form_open('auth/save_register');
      ?>
      <!-- pengadopsi -->
      <!-- /.box-header -->
      <div class="box-body">
        <form role="form">
          <!-- text input -->
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_pengadosi" class="form-control">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Institusi</label>
            <input type="text" name="institusi" class="form-control">
          </div>
          <!-- select -->
          <div class="form-group">
            <label>Jenis</label>
            <select class="form-control" name="jenis" id="jenis">
              <option value="">Pilih</option>
              <option value="admin">Admin</option>
              <option value="donatur">Donatur</option>
              <option value="mitra">Mitra</option>
              <option value="pengadopsi">Pengadopsi</option>
            </select>
          </div>
          <div class="form-group" id="bantuan">
            <label>Jumlah Bantuan</label>
            <input type="text" name="bantuan" class="form-control">
          </div>
          <div class="form-group" id="paket">
            <label> Nama Paket</label>
            <select class="form-control">
              <option>Pilih</option>
              <option value="1">Paket <b>A</b> Rp. 250.000</option>
              <option value="2">Paket <b>B</b> Rp. 500.000</option>
              <option value="3">Paket <b>C</b> Rp. 1.000.000</option>
              <option value="4">Paket <b>D</b> Rp. 5.000.000</option>
              <option value="5">Paket <b>E</b> Rp. 10.000.000</option>
            </select>
          </div>
          <div class=" form-group" id="harga">
            <label>Harga :</label>
            <input type="text" name="harga" class="form-control">
          </div>
          <div class="form-group" id="jml">
            <label>Jumlah</label>
            <input type="text" name="jml" class="form-control">
          </div>
          <div class="form-group">
            <label>Total</label>
            <input type="text" name="total" class="form-control">
          </div>
          <script src="<?= base_url() ?>/template/script.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              $("#bantuan,#paket,.paket").hide(); //menyembunyikan form baris jumlah dan paket. baris jumlah untuk mitra, donatur, dan pengadopsi. baris paket untuk pengadopsi
              $("#jenis").change(function() {
                var id = $(this).val();
                if (id == 'pengadopsi') { //jika jenis == pengadopsi, maka menampilkan form jumlah dan paket
                  $("#bantuan").hide(2);
                  $("#paket").show(2);
                  $(".paket").show(2);
                  $("#harga").show(2);
                  $("#jml").show(2);
                } else {
                  $("#bantuan").show(2);
                  $("#paket").hide(2);
                  $(".paket").hide(2);
                  $("#harga").hide(2);
                  $("#jml").hide(2);
                }
              });
            });
          </script>
          <div class="form-group">
            <label for="exampleInputFile">Bukti</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Hanya file gambar yang diperbolehkan untuk diunggah di sini.</p>
            <div class="form-group">
              <label>Catatan</label>
              <textarea type="text" class="form-control" name="catatan"></textarea>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="nama_user">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
          </div>
      </div>
      <!--  end pengadopsi -->
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
      <?php echo form_close(); ?>
      <a href="<?= base_url('auth/login') ?>" class="text-center">Kembali ke Login</a><br>
      <a href="<?= base_url('/web') ?>" class="text-center">Kembali ke Halaman Web</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->
  <script src="<?= base_url() ?>/template/script.js"></script>
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000);
  </script>
</body>

</html>