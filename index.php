<?php 

$host   ="localhost";
$user   ="root";
$pass   ="";
$db     ="practice"; // database

    $koneksi=mysqli_connect($host,$user,$pass,$db);
        if(!$koneksi) {
            die ("database anda belum terkoneksi coy");
        }

$nama       =""; // variable dalam database serta variabel yang akan ditambahkan
$jenkel     ="";
$alamat     ="";
$nohp       ="";
$jurusan    ="";
$email      ="";
$sukses     ="";
$error      ="";

        if(isset($_GET['op'])) {
            $op = $_GET['op'];
        } else {
            $op ="";
          }

    if($op == 'delete') { // delete notif
        $id     = $_GET['id'];
        $sql1   = "delete from data_siswa where id = '$id'";
        $q1     = mysqli_query ($koneksi,$sql1);
            if($q1) {
                $sukses = "data berhasil dihapus lek";
            } else {
                $error  = "gagal masukin datanya cokk";
              }
     }

    if($op == 'edit') { // edit notif
        $id         = $_GET['id'];
        $sql1       = "select * from data_siswa where id = '$id'";
        $q1         = mysqli_query($koneksi,$sql1);
        $r1         = mysqli_fetch_array($q1);
        $nama       = $r1['nama'];
        $jenkel     = $r1['jenkel'];
        $alamat     = $r1['alamat'];
        $nohp       = $r1['nohp'];
        $jurusan    = $r1['jurusan'];
        $email      = $r1['email'];

            if($nama == '') {
                $error = "data mana ada we ngarang ko ya";
            }
     }

    if(isset($_POST['simpan'])) { // create 
        $nama       = $_POST['nama'];
        $jenkel     = $_POST['jenkel'];
        $alamat     = $_POST['alamat'];
        $nohp       = $_POST['nohp'];
        $jurusan    = $_POST['jurusan'];
        $email      = $_POST['email'];

    if($nama && $jenkel && $alamat && $nohp && $jurusan && $email) {
        if($op == 'edit') {
            $sql1   = "update data_siswa set nama='$nama' ,jenkel='$jenkel' ,alamat='$alamat' ,nohp='$nohp' ,jurusan='$jurusan' ,email='$email' where id = '$id'";
            $q1     = mysqli_query($koneksi,$sql1);
                if($q1) {
                    $sukses = "data berhasil diupdate coy";
                } else {
                    $error  = "data gagal diupdate cokkk";
                  }
        } else {
            $sql1   = "insert into data_Siswa(nama,jenkel,alamat,nohp,jurusan,email) values ('$nama','$jenkel','$alamat','$nohp','$jurusan','$email')";
            $q1     = mysqli_query($koneksi,$sql1);
                if($q1) {
                    $sukses ="Berhasil masukin data baru bjirr";
                } else {
                    $error  ="gagal masukin data cook";
                  }
        }
    } else {
        $error  ="masukin semua data dulu coy";
      }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style> 
    .mx-auto {
        width: 1500px;
    }

    .card {
        margin-top: 10px;
    }

    .card-header {
        text-align: center;
        background-color: #0174BE;
        color: white;
    }

    .table {
        text-align: center;
    }

    .mb-3 {
        background-color: gainsboro;
    }

    .badan {
        background-color: slategray;
    }

    .card-headers {
        background-color: #0174BE;
        text-align: center;
        height: 35px;
        color: white;
    }

</style>
</head>
<body class="badan">
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
            Create / Edit data
            </div>

                <div class="card-body">

                <?php // error cooldown serta notif
                if($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>

                <?php header("refresh:5;url=index.php");
                }
                ?>

                <?php // sukses cooldown serta notif
                if($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                header("refresh:5;url=index.php");
                }
                ?>

    <form action="" method="POST"> 
    <!-- tabel nama -->
        <div class="mb-3 row">
            <label for="nama"class="col-sm-2 col-form-label">NAMA </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
        </div>
        </div>

    <!-- tabel jenkel -->
        <div class="mb-3 row">
                <label for="jenkel"class="col-sm-2 col-form-label"> JENIS KELAMIN </label>
            <div class="col-sm-10">
                <select class="form-control" name="jenkel" id="jenkel">
                    <option value=""> PILIH JENIS KELAMIN </option>
                    <option value="laki-laki" <?php if($jenkel == "laki-laki") echo "selected" ?> > LAKI-LAKI </option>
                    <option value="perempuan" <?php if($jenkel == "perempuan") echo "selected" ?> > PEREMPUAN </option>
                </select>
            </div>
            </div>

    <!-- tabel alamat -->
        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="alamat"class="col-sm-2 col-form-label">ALAMAT </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
            </div>
            </div>

    <!-- tabel nohp -->
        <div class="mb-3 row">
            <label for="nohp"class="col-sm-2 col-form-label">nohp? </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $nohp ?>">
        </div>
        </div>

    
    <!-- tabel jurusan -->
        <div class="mb-3 row">
            <label for="jurusan"class="col-sm-2 col-form-label"> JURUSAN </label>
        <div class="col-sm-10">
            <select class="form-control" name="jurusan" id="jurusan">
                <option value=""> PILIH JURUSAN </option>
                <option value="rpl" <?php if($jurusan == "rpl") echo "selected" ?> > RPL </option>
                <option value="tkjt" <?php if($jurusan == "tkjt") echo "selected" ?> > TKJT </option>
                <option value="senitari" <?php if($jurusan == "senitari") echo "selected" ?> > SENI TARI </option>
                <option value="akutansi" <?php if($jurusan == "akutansi") echo "selected" ?> > AKUTANSI </option>
                <option value="dkv" <?php if($jurusan == "dkv") echo "selected" ?> > DKV </option>
            </select>
        </div>
        </div>

        <!-- tabel email -->
        <div class="mb-3 row"> 
            <label for="email"class="col-sm-2 col-form-label">EMAIL </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
        </div>
        </div>
                
    <!-- tombol submit -->
        <div class="col-12">
            <input type="submit" name="simpan" value="simpan data" class="btn btn-primary"/>
        </div>

                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-white bg-primary "> DATA SISWA </div>
                
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">JENIS KELAMIN</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">NOHP</th>
                        <th scope="col">JURUSAN</th>
                        <th scope="col">EMAIL</th>
                    </tr>

                    <tbody>
                        <?php 
                        $sql2   ="select * from data_siswa order by id desc";
                        $q2     = mysqli_query($koneksi,$sql2);
                        $urut   =1;
                    while($r2 = mysqli_fetch_array($q2)) {
                        $id         = $r2['id'];
                        $nama       = $r2['nama'];  
                        $jenkel     = $r2['jenkel'];
                        $alamat     = $r2['alamat'];
                        $nohp       = $r2['nohp'];
                        $jurusan    = $r2['jurusan'];
                        $email      = $r2['email'];

                        ?>
                    <tr>
                        <th scope="row"> <?php echo $urut++ ?> </th>
                        <th scope="row"> <?php echo $nama ?> </th>
                        <th scope="row"> <?php echo $jenkel ?> </th>
                        <th scope="row"> <?php echo $alamat ?> </th>
                        <th scope="row"> <?php echo $nohp ?> </th>
                        <th scope="row"> <?php echo $jurusan ?> </th>
                        <th scope="row"> <?php echo $email ?> </th>
                <!-- button delete edit -->
                    <td scope="row">
                    <!-- button edit -->
                        <a href="index.php?op=edit&id= <?php echo $id?>"> <button type="button" class="btn btn-warning"> edit </button> </a>
                    <!-- button delete  -->
                        <a href="index.php?op=delete&id= <?php echo $id?>"> <button type="button" class="btn btn-danger"> delete </button> </a>

                    </td>
                    </tr>
                        <?php
                    }
                        
                        ?>
                    </tbody>
        </div>
    </div>
</body>
</html>