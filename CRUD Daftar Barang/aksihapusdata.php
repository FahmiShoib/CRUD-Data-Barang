<?php 
	include 'koneksi.php';

	$kode=$_GET["id_barang"];

	$hapus = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang=$kode");

header("location:index.php");
/*
	if($hapus)
        {
            echo "<script>
            </script>";
        }
        else
        {
            echo "<script>
                    alert('Hapus data Gagal!')
                    document.location='index.php';
            </script>";
        }
*/
?>