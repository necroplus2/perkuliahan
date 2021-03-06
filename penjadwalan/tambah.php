<title>Tambah Jadwal</title>

<?php
require '../fungsi.php';
require '../template.php';

$matkul = query("SELECT * FROM tb_matkul");
$dosen = query("SELECT * FROM tb_dosen");

if( isset($_POST["submit"])) {

  if( tambah_jadwal($_POST) > 0 ) {
    echo "
      <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php';
      </script>
    ";
  } else {
      echo "
        <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'index.php';
        </script>
      ";
  }


  }
  

?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">Tambah Jadwal</h1>
  </div>
  <div class="kembali">
    <a href="../penjadwalan.php" class="btn btn-danger mb-4">Kembali</a>
  </div>
  <div class="col-md-6">
    <form action="" method="post">
      <div class="mb-3">
        <label for="kode_jadwal" class="form-label">Kode Jadwal</label>
        <input type="text" class="form-control" id="kode_jadwal" name="kode_jadwal">
      </div>
      <div class="mb-3">
        <label for="kode_matkul" class="form-label">Kode Matkul</label>
        <!-- <input type="text" class="form-control" id="kode_matkul" name="kode_matkul"> -->
        <select name="kode_matkul" id="kode_matkul" class="form-select">
          <option selected disabled>-- Pilih Matkul --</option>
          <?php foreach($matkul as $mk) { ?>
          <option value="<?php echo $mk["kode_matkul"]; ?>"><?php echo $mk["kode_matkul"]; ?> | <?php echo $mk["mata_kuliah"]; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="kode_dosen" class="form-label">Kode Dosen</label>
        <!-- <input type="text" class="form-control" id="kode_dosen" name="kode_dosen"> -->
        <select name="kode_dosen" id="kode_dosen" class="form-select">
          <option selected disabled>-- Pilih Dosen --</option>
          <?php foreach($dosen as $ds) { ?>
          <option value="<?php echo $ds["kode_dosen"]; ?>"><?php echo $ds["kode_dosen"]; ?> | <?php echo $ds["nama_dosen"]; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="ruangan" class="form-label">Ruangan</label>
        <input type="text" class="form-control" id="ruangan" name="ruangan">
      </div>
      <div class="mb-3">
        <label for="jam_jadwal" class="form-label">Jam Jadwal</label>
        <input type="datetime-local" class="form-control" id="jam_jadwal" name="jam_jadwal">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</main>


<script>
  aktif('../../perkuliahan/penjadwalan.php');
</script>