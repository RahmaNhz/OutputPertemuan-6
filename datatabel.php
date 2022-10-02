<?php
$koneksi=mysqli_connect("localhost","root","","Rahma");

$sql="SELECT * FROM tbl_mhs m, tbl_prodi p
	WHERE m.id_prodi = p.id_prodi";
$hasil=mysqli_query($koneksi,$sql);

if(isset($_POST['nama'])){
	$Id = $_POST['Id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$prodi = $_POST['prodi'];
	$insertSql = "INSERT INTO tbl_mhs (id_mhs,id_prodi, nama_mhs, alamat_mhs) 
                VALUES ($Id, $prodi, '$nama', '$alamat')";
	mysqli_query($koneksi, $insertSql);
	header("Refresh:0 url=datatabel.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3 py-5">
  <h2>DATA MAHASISWA FAKUTAS TEKNIK</h2>
  <a href="formMhs.php">
    <button type="button" class="btn btn-sm btn-success px-3 py-2 my-3">Tambah</button>
  </a>
  
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID MAHASISWA</th>
          <th>NAMA MAHASISWA</th>
          <th>PRODI</th>
          <th>ALAMAT</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($baris=mysqli_fetch_assoc($hasil))
          { 
        ?>
        <tr>
          <td><?php echo $baris['id_mhs'];?></td>
          <td><?php echo $baris['nama_mhs'];?></td>
          <td><?php echo $baris['nama_prodi'];?></td>
          <td><?php echo $baris['alamat_mhs'];?></td>
          <td>
		  <button type="button" class="btn btn-sm btn-warning">Edit</button>
		  <button type="button" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>