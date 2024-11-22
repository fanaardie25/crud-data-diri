<?php
include "koneksi.php";
if(isset($_GET['id'])){
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM data WHERE id = $id");
while ($data = mysqli_fetch_array($result)) {
    $nama = $data['nama'];
    $usia = $data['usia'];
    $gender = $data['gender'];
    $hobi = $data['hobi']; 
    $agama = $data['agama'];
    
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>Edit Barang</title>
</head>
<body style="padding: 16px;">
<center>
    <h3>Edit</h3>
    <form action="update.php" method="post" >
    <table width="25%" border="0">
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><input type="number" name="usia" value="<?php echo $usia; ?>"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Laki-laki" <?php if(isset($gender) && $gender == 'Laki-laki') echo 'checked'; ?>> Laki-laki
                <input type="radio" name="gender" value="Perempuan" <?php if(isset($gender) && $gender == 'Perempuan') echo 'checked'; ?>> Perempuan
            </td>
        </tr>
            <td>Hobi</td>
            <td class="d-flex flex-col gap-5">
                <input type="checkbox" name="hobi[]" value="futsal" <?php if(isset($hobi) && in_array('futsal', explode(", ", $hobi))) echo 'checked'; ?>> futsal <br>
                <input type="checkbox" name="hobi[]" value="Sepak bola" <?php if(isset($hobi) && in_array('Sepak bola', explode(", ", $hobi))) echo 'checked'; ?>> Sepak bola <br>
                <input type="checkbox" name="hobi[]" value="Badminton" <?php if(isset($hobi) && in_array('Badminton', explode(", ", $hobi))) echo 'checked'; ?>> badminton
            </td>
        <tr>
            <td>Agama</td>
            <td>
                <select name="agama">
                    <option value="" name="" selected disabled hidden>-- pilih agama --</option>
                    <option value="Islam" <?php if(isset($agama) && $agama == 'Islam') echo 'selected'; ?>>Islam</option>
                    <option value="Kristen" <?php if(isset($agama) && $agama == 'Kristen') echo 'selected'; ?>>Kristen</option>
                    <option value="Hindu" <?php if(isset($agama) && $agama == 'Hindu') echo 'selected'; ?>>Hindu</option>
                    <option value="Buddha" <?php if(isset($agama) && $agama == 'Buddha') echo 'selected'; ?>>Buddha</option>
                    <option value="Konghucu" <?php if(isset($agama) && $agama == 'Konghucu') echo 'selected'; ?>>Konghucu</option>
                </select>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
            <td><button type="submit" name="update" value="edit" class="btn btn-success btn-lg"  data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>
        </tr>
    </table>
</form>
</center>
<?php 
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $gender = $_POST['gender'];
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : ''; 
    $agama = $_POST['agama'];
    
    $result = mysqli_query($koneksi, "UPDATE data SET nama='$nama', usia='$usia',gender='$gender',hobi='$hobi',agama='$agama' WHERE id='$id'");

    if($result) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "Update gagal: " . mysqli_error($koneksi); 
    }
}
?>
