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
$title = 'Daftar Barang';

include 'layout/header.php';
$data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC ");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active">Sosial Media</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h1></h1>

                <p>Instagram</p>
              </div>
              <div class="icon">
              <i class="fab fa-instagram"></i>
              </div>
              <a href="https://instagram.com/its.me_nr.hiii_?igshid=M2RkZGJiMzhjOQ==" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><sup style="font-size: 20px"></sup></h3>

                <p>TikTok</p>
              </div>
              <div class="icon">
              <i class="fab fa-tiktok"></i>
              </div>
              <a href="https://www.tiktok.com/@its.me_nur?_t=8hQEOW9FgLy&_r=1" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3></h3>

                <p>YouTube</p>
              </div>
              <div class="icon">
              <i class="fab fa-youtube"></i>
              </div>
              <a href="https://youtube.com/@Itsme_Nurhiii_?si=cj_yZeqKx7wtFSo-" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3></h3>

                <p>Telegram</p>
              </div>
              <div class="icon">
              <i class="fab fa-telegram"></i>
              </div>
              <a href="https://t.me/Nr_hidayatillah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="tambah-barang.php" class = "btn btn-primary btn-sm mb-2" ><i class = "fas fa-plus"></i> Tambah </a>
                <table id="example2" class="table table-bordered table-hover">
        <!-- /.row -->
        <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
                  <tr>
                      <th>No </th>
                      <th>Nama </th>
                      <th>Jumlah </th>
                      <th>Harga </th>
                      <th>Tanggal </th>
                      <th>Aksi </th>
                  </tr>
              </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_barang as $barang) :?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $barang['nama']; ?></td>
                    <td><?= $barang['jumlah']; ?></td>
                    <td>Rp. <?php echo number_format((float)$barang['harga'], 0, ',', '.'); ?></td>
                    <td><?= date('d/m/y | h:i:s', strtotime($barang['tanggal'])); ?></td>
                    <td width="20%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-barang.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data barang akan dihapus.?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
            </table>
          </div>
        </div>
        </div>
        </div>
      </div>
    </section>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
  
<?php include 'layout/footer.php' ?>