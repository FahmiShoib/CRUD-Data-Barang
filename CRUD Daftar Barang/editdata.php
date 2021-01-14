<?php 
    include_once 'koneksi.php';

    $kode=$_GET["id_barang"];

    $hasil = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$kode");
    if(isset($_POST['bsimpan'])){
        $id_barang=$_POST['tid_barang']; 
        $nama_barang=$_POST['tnama_barang']; 
        $jenis_barang=$_POST['tjenis_barang']; 
        $unit=$_POST['tunit'];
        $kondisi_barang=$_POST['tkondisi_barang'];  
        $harga_barang=$_POST['tharga_barang']; 
        $tanggal_masuk=$_POST['tanggal'];

        $query="UPDATE barang SET id_barang='$id_barang', nama_barang='$nama_barang', jenis_barang='$jenis_barang', unit='$unit', kondisi_barang='$kondisi_barang', harga_barang='$harga_barang', tanggal_masuk='$tanggal_masuk' WHERE id_barang=$id_barang";

        $hasil=mysqli_query($koneksi, $query);
        if($hasil){
            header('location:index.php');
        }
        else {
            echo "Update Data Gagal!";
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/kit-awesome.js"></script>
    <link rel="stylesheet" href="css/awesome-all.css">
    <link rel="stylesheet" href="css/style-2.css">
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
                        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
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
    <!-- Awal Card Form -->
        <div class="card">
            <div class="card-header text-white">
                Form Edit Data Barang
            </div>
            <div class="card-body">
                <?php 
                    while($data=mysqli_fetch_array($hasil)) :
                ?>
                <form method="post" action="">
                    <div class="form-group1">
                        <label>ID Barang</label>
                        <input readonly type="text" name="tid_barang" class="form-control"
                        value="<?php echo $data['id_barang'] ?>" placeholder="ID Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="tnama_barang" class="form-control" 
                        value="<?php echo $data['nama_barang'] ?>" placeholder="Nama Barang"required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Barang :</label>
                        <input type="radio" name="tjenis_barang" id="pcs" class="radio" 
                        value="Pcs" <?php if($data['jenis_barang']=='Pcs') echo 'checked'?>>
                            <label for="pcs">Pcs</label>
                        <input type="radio" name="tjenis_barang" id="pack" class="radio" 
                        value="Pack" <?php if($data['jenis_barang']=='Pack') echo 'checked'?>>
                            <label for="pack">Pack</label>
                        <input type="radio" name="tjenis_barang" id="box" class="radio" 
                        value="Box" <?php if($data['jenis_barang']=='Box') echo 'checked'?>>
                            <label for="box">Box</label>
                    </div>
                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" name="tunit" class="form-control" 
                        value="<?php echo $data['unit'] ?>" placeholder="Banyaknya Barang"required>
                    </div>
                    <div class="form-group">
                    <label for="kondisi_barang">Kondisi barang</label>
                        <select id="kondisi_barang" name="tkondisi_barang" class="form-control">
                            <option 
                            value="">- Pilih Jenis Barang</option>
                            <option 
                            value="Baru" <?php if($data['kondisi_barang']=='Baru') echo 'selected'?> name="tkondisi_barang">Baru</option>
                            <option 
                            value="Bekas" <?php if($data['kondisi_barang']=='Bekas') echo 'selected'?> name="tkondisi_barang">Bekas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="tharga_barang" class="form-control" 
                        value="<?php echo $data['harga_barang'] ?>" placeholder="Harga" required>
                    </div>
                    <div class="form-group"> <!-- Date input -->
                        <label class="control-label" for="tanggal">Tanggal Masuk Barang</label>
                        <input class="form-control" id="tanggal" name="tanggal" type="date" 
                        value="<?php echo $data['tanggal_masuk'] ?>" type="text"/>
                    </div>    
                    <!-- Button Simpan, Reset -->
                    <input type="hidden" name="id_barang" value="<?php echo $data['id_barang'] ?>">
                    <button type="submit" class="btn btn-success" name="bsimpan">Perbarui</button>
                </form>
            <?php endwhile; ?>
            </div>
        </div>
        <!-- Akhir Card Form -->
        <div class="footer">
        <p class="copyright">Copyright 2021, Sistem Komputer (Semester 3)</p>
    </div>
    <a class="gotopbtn" href="#"> <i class="fas fa-chevron-up"></i> </a>
</body>
</html>