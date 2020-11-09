<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
  $(window).load(function() {
    $("#peran").change(function() {
      console.log($("#peran option:selected").val());
      if ($("#peran option:selected").val() == '3') {
        $('#form_pengadopsi').prop('hidden', false);
      } else {
        $('#form_pengadopsi').prop('hidden', 'true');
      }
    });
  });
</script>
<script type="text/javascript">
  function harga() {
    var tes = document.getElementById("paket_adopsi").value;
    document.getElementById("harga_paket").value = tes;
  }
</script>
<!-- donatur -->
<div class="row">


  <!-- mitra -->
  <div class="col-lg-10 ">
    <div class="col align-self-center">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <center>
            <h3 class="box-title">Form Pendaftaran Mitra</h3>
          </center>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
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
          //pesan validasi berhasil
          if (session()->getflashdata('success')) {
            echo ' <div class="alert alert-success" role="alert">';
            echo session()->getflashdata('success');
            echo '</div>';
          }
          ?>



          <form role="form">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control">
            </div>
            <div class="form-group">
              <label>No Whatsapp/Handphone</label>
              <input type="text" class="form-control" name="no_wa">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" class="form-control" name="tmpt_lhr">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control" name="tgl_lhr">
            </div>
            <div class="form-group">
              <label>Provinsi</label>
              <input type="text" class="form-control" name="prov">
            </div>
            <div class="form-group">
              <label>Kabupaten / Kota</label>
              <input type="text" class="form-control" name="kab_kota">
            </div>
            <div class="form-group">
              <label>Kecamatan</label>
              <input type="text" class="form-control" name="kec">
            </div>
            <div class="form-group">
              <label>Kelurahan</label>
              <input type="text" class="form-control" name="kel	">
            </div>
            <div class="form-group">
              <label>Nama Jalan</label>
              <textarea type="text" class="form-control" name="nma_jln"></textarea>
            </div>


            <!-- select -->
            <div class="form-group">
              <label>Jenis</label>
              <select id="peran" class="form-control" name="jenis_pendaftar">
                <option>Pilih</option>
                <option value="1">Donatur</option>
                <option value="2">Mitra</option>
                <option value="3">Pengadopsi</option>
              </select>
            </div>

            <div id="form_pengadopsi" hidden>
              <div class="form-group">

                <label>Paket</label>
                <select class="form-control" name="paket">
                  <option>Pilih</option>
                  <option>Paket A Rp 250.000</option>
                  <option>Paket B Rp 500.000</option>
                  <option>Paket C Rp 1.000.000</option>
                  <option>Paket D Rp 5.000.000</option>
                  <option>Paket E Rp 10.000.000</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label>Catatan</label>
              <textarea type="text" class="form-control" name="catatan"></textarea>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input id="username" type="text" class="form-control" name="user_name">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>


            <!-- /.box-body -->

        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
        </form>




      </div>
      <!-- /.box -->
    </div>
  </div>
</div>
</div>
<!-- end mitra -->