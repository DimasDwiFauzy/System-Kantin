<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id_penjual'];
    $nama=$_POST['nama_penjual'];
    $hp=$_POST['NoHp_penjual'];
    $alamat=$_POST['alamat_penjual'];


    // update user data
    $result = mysqli_query($mysqli, "UPDATE tb_penjual SET nama_penjual='$nama', NoHp_penjual='$hp',alamat_penjual='$alamat' WHERE id_penjual='$id'");
    
    // Redirect to homepage to display updated user in list
    header("Location: penjual.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tb_penjual WHERE id_penjual=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama_penjual'];
    $no_hp = $user_data['NoHp_penjual'];
    $alamat = $user_data['alamat_penjual'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="editpenjual.php">
        <table border="0">
            <tr> 
                <td>Nama Penjual</td>
                <td><input type="text" name="nama_penjual" value="<?php echo $nama;?>"></td>
            </tr>
            <tr> 
                <td>Nomor Handphone</td>
                <td><input type="number" name="NoHp_penjual" value="<?php echo $no_hp;?>"></td>
            </tr>
            <tr> 
                <td>Alamat</td>
                <td><input type="text" name="alamat_penjual" value="<?php echo $alamat;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>