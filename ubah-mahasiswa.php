<?php
session_start();

//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Mohon Login Terlebih dahulu');
            document.location.href= 'login.php';
          </script>";
    exit;
}

$title = 'ubah Mahasiswa';
include 'layout/header.php';

//check apakah tombol ubah berhasil
if (isset($_POST['ubah'])) {
    if (update_mahasiswa($_POST) > 0){
        echo "<script>
                alert('Data mahasiswa berhasil diubah');
                document.location.href = 'mahasiswa.php';
             </script>";
    } else {
        echo "<script>
                alert('Data barang gagal diubah');
                document.location.href = 'mahasiswa.php';
             </script>";
    }
}

//AMBIL ID MAHASISWA DARI URL
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

//query ambil data mahasiswa 
$mahasiswa = select ("SELECT * FROM mahasiswa WHERE id_mahasiswa=$id_mahasiswa ")[0];
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-edit"></i> Ubah Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            <li class="breadcrumb-item"><a href="mahasiswa.php">Data Mahasiswa</a></li>
              <li class="breadcrumb-item active">Ubah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="" method="post" enctype ="multipart/form-data">
    <input type="hidden" name="id_mahasiswa" value="<?=$mahasiswa['id_mahasiswa']; ?>">
    <input type="hidden" name="fotoLama" value="<?= $mahasiswa['foto']; ?>">
<div class="mb-3">
    <label for="nama" class="form-label">Nama Mahasiswa</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa..."
    required value = " <?= $mahasiswa['nama']; ?>">
</div>

<div class="row">
<div class="mb-3 col-6">
    <label for="prodi" class="form-label">Program Studi</label>
    <select name="prodi" id="prodi" class="form-control" required >
        <option value="">-- pilih prodi -- </option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Teknik Nuklir">Teknik Nukli</option>
        <option value="Teknik Industri">Teknik Industri</option>
        <option value="Teknik Kimia">Teknik Kimia</option>
        <option value="Teknik Mesin">Teknik Mesin</option>
        <option value="Teknik Sipil">Teknik Sipil</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Farmasi">Farmasi</option>
        <option value="Bahasa dan Sastra Indonesia">Bahasa dan Sastra Indonesia</option>
        <option value="Sastra Jepang ">Sastra Jepang </option>
        <option value="Sastra Arab ">Sastra Arab </option>
        <option value="Sastra Inggris ">Sastra Inggris </option>
        <option value="Hukum ">Hukum </option>
        <option value="Kedokteran ">Kedokteran </option>
        <option value="Akuntansi ">Akuntansi </option>
        <option value=" Ilmu Ekonomi  "> Ilmu Ekonomi  </option>
        <option value="Manajemen ">Manajemen </option>
        <option value="Kimia ">Kimia </option>
        <option value=" Ilmu Komputer  "> Ilmu Komputer  </option>
        <option value="Matematika ">Matematika </option>
        <option value=" Ilmu Komunikasi "> Ilmu Komunikasi </option>
        <option value="Sosiologi ">Sosiologi </option>
        <option value="Politik dan Pemerintahan ">Politik dan Pemerintahan </option>
        <option value="Teknik Pertanian ">Teknik Pertanian </option>
        <option value="Sejarah ">Sejarah </option>
        <option value="Teknologi Pangan dan Hasil Pertanian ">Teknologi Pangan dan Hasil Pertanian </option>
        <option value=" Ilmu Hubungan Internasional "> Ilmu Hubungan Internasional </option>
    </select>
</div>

<div class="mb-3 col-6" >
    <label for="jk" class="form-label">Jenis Kelamin</label>
    <select name="jk" id="jk" class="form-control" required >
        <?php $jk =$mahasiswa['jk']; ?>
        <option value="Laki-laki" <?= $jk == 'Laki-laki' ? 'selected'  : null ?> >Laki-laki</option>
        <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected'  : null ?> >Perempuan</option>
        </select>
    </div>
</div>

<div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM..." required value="<?= $mahasiswa['nim']; ?>">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email..."
    required value = " <?= $mahasiswa['email']; ?>">
</div>

<div class="mb-3">
        <label class="form-label" for="customFile">Foto</label>
        <input type="file" class="form-control"  id="customFile" name="foto" required/>
        <p>
            <small>Gambar Sebelumnya</smal>
        </p>
        <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="100px">
</div>

<button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>

</form>
</div>
</section>
<!-- /.content -->
</div>
  
<?php include 'layout/footer.php' ?>