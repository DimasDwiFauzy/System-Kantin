<center>

<h1> Mendaftar </h1>

<a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="addpenjual.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Penjual</td>
                <td><input type="text" name="nama_penjual" required></td>
            </tr>
            <tr> 
                <td>No Handphone :</td>
                <td><input type="text" name="nomor_penjual" required></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat_penjual" id="" required></td>
            </tr>
            <tr> 
                <td></td>
                <?php 
                    include "config.php";
                    $query = "select * from tb_penjual";
                    $datapenjual = mysqli_query($mysqli,$query);
              
                ?>
               
             
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama_penjual'];
        $nomor = $_POST['NoHp_penjual'];
        $alamat = $_POST['alamat_penjual'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tb_penjual VALUES(null,'$nama','$nomor','$alamat')");
        
        // Show message when user added
        echo "<script>alert('Berhasil Tambah Data');
        window.location.href = 'penjual.php';
        </script>";
    }
    ?>

</center>