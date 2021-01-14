<!DOCTYPE html>
<html>
<head>
	<title>Daftar Data Barang</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/kit-awesome.js"></script>
	<link rel="stylesheet" href="css/awesome-all.css">
	<link rel="icon" href="img/favicon.png" />
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark">
  		<div class="container-fluid">
    			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      			<span class="navbar-toggler-icon"></span>
    			</button>
	    	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	      			<label class="namatoko">Toko Sinar Jaya Terang Mandiri</label>
	      			<p class="alamat">Jalan. Ahmad Yani No.54 Kec. Kepohbaru Kab. Bojonegoro</p>
	      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        		<li class="nav-item">
                        <a class="nav-link active" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tambahdata.php">Tambah Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="about.php">About</a>
                    </li>
      			</ul>
      			<form class="d-flex">
        			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        			<button class="btn btn-outline-light" type="submit">Search</button>
      			</form>
    		</div>
  		</div>
	</nav>
	<div class="container">
		<!-- Awal Card Form -->
		<div class="card">
			<div class="card-header">Daftar Data Barang</div>
			<div class="btn-tambahdata">
                <a href="tambahdata.php" class="btn btn-success">+ Tambah data</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
                   <tr>
                       <th>No.</th>
                       <th>ID Barang</th>
                       <th>Nama Barang</th>
                       <th>Jenis Barang</th>
                       <th>Unit</th>
                       <th>Kondisi Barang</th>
                       <th>Harga</th>
                       <th>Tanggal Masuk Barang</th>
                       <th>Aksi</th>
                   </tr>
                   <?php
                   		include 'koneksi.php';
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM barang order by tanggal_masuk asc;");
                        while ($data = mysqli_fetch_array($tampil)) :
                   ?>
                   <tr>
                       <td><?=$no++;?></td>
                       <td><?=$data['id_barang']?></td>
                       <td><?=$data['nama_barang']?></td>
                       <td><?=$data['jenis_barang']?></td>
                       <td><?=$data['unit']?></td>
                       <td><?=$data['kondisi_barang']?></td>
                       <td><?=$data['harga_barang']?></td>
                       <td><?=$data['tanggal_masuk']?></td>
                       <td>
                           <a href="editdata.php?id_barang=<?php echo$data["id_barang"] ?>" class="btn btn-success btn-sm"> Edit </a>
                           <a href="aksihapusdata.php?id_barang=<?php echo$data["id_barang"] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm">Hapus</a>
                       </td>
                   </tr>
                   <?php endwhile; //penutup perulangan while?>
               </table>
			</div>
	</div>
	<div class="footer">
        <p class="copyright">Copyright 2021, Sistem Komputer (Semester 3)</p>
    </div>
    <a class="gotopbtn" href="#"> <i class="fas fa-chevron-up"></i> </a>
</body>
</html>
