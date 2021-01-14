<?php 
	include_once 'koneksi.php';
	$id_barang=$_GET["id_barang"];
	$id_barang=$_POST['tid_barang']; 
	$nama_barang=$_POST['tnama_barang']; 
	$jenis_barang=$_POST['tjenis_barang']; 
	$unit=$_POST['tunit'];
	$kondisi_barang=$_POST['tkondisi_barang'];  
	$harga_barang=$_POST['tharga_barang']; 
	$tanggal_masuk=$_POST['tanggal'];

	$query="UPDATE barang SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', unit='$unit', kondisi_barang='$kondisi_barang', harga_barang='$harga_barang', tanggal_masuk='$tanggal_masuk' WHERE id_barang=$id_barang";

	$hasil=mysqli_query($koneksi, $query);
	if($hasil){
		header('location:index.php');
	}
	else {
		echo "Update Data Gagal!";
	}
?>