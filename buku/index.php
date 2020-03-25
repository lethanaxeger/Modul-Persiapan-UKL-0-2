<?php
include '../koneksi.php';

$sql = "SELECT * FROM peminjaman INNER JOIN anggota 
        ON peminjaman.id_anggota = anggota.id_anggota 
        INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas 
        ORDER BY peminjaman.tgl_pinjam";

$res = mysqli_query($koneksi, $sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
}

include '../aset/header.php';
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md">
        <div class="card">
  <div class="card-header">
    <h2 class="card-title"><i class="fas fa-edit"></i>Data Peminjaman</h2>
  </div>
  <div class="card-body">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Peminjam</th>
      <th scope="col">Tanggal Pinjam</th>
      <th scope="col">Tanggal Jatuh Tempo</th>
      <th scope="col">Petugas</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
</table>

<?php
    $no = 1;
    foreach ($pinjam as $p) { ?>
    
    <tr>
        <th scope="row"><?= $no ?></th>
        <td><?= $p['nama']?></th>
        <td><?= date('d F Y', strtotime($p['tgl_pinjam'])) ?></th>
        <td><?= date('d F Y', strtotime($p['tgl_jatuh_tempo']))?></th>
        <td><?= $p['nama_petugas']?></td>
        <td>
        <?php
            if($p['status'] == "Dipinjam"){
                echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
            }
            else
            {
                echo '<h5><span class="badge badge-secondary">Kembali</span></h5>';
            }
        ?>
        </td>
        <td>
        <h1>Example heading <span class="badge badge-secondary">New</span></h1>
            <a href="#" class="badge badge-success">Detail</a>
            <a href="#" class="badge badge-warning">Edit</a>
            <a href="#" class="badge badge-danger">Hapus</a>
        </td>
    </tr>

    <?php
        $no++;
    }
    ?>
  </div>
</div>
        </div>
    </div>
</div>
<div class="container">
        <div class="row mt-4">
            <div class="col-md">
                <h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
                <hr class="bg-light">
            </div>
            <div class="container">
        <div class="row">
          <div class="col-md-4">
              <div class="card bg-primary" style="width: 18rem;">
                  <div class="card-body text-white">
                      <h5 class="card-title">Jumlah Buku</h5>
                      <p class="card-text" style="font-size:60px">350</p>
                      <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card bg-danger" style="width: 18rem;">
                  <div class="card-body text-white">
                      <h5 class="card-title">Jumlah Anggota</h5>
                      <p class="card-text" style="font-size:60px">614</p>
                      <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
                <div class="card bg-info" style="width: 18rem;">
                    <div class="card-body text-white">
                        <h5 class="card-title">Jumlah Transaksi</h5>
                        <p class="card-text" style="font-size:60px">279</p>
                        <a href="http://localhost/siperpus/buku/index.php" class="text-white">Lebih detail <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

</div>
        </div>
</div>
<?php
include '../aset/footer.php';
?>