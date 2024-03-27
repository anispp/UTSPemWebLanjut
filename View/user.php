<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>

<h2>Edit Pengguna</h2>
<form action="" method="post">
    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="text" name="nama" value="<?php echo $nama; ?>" placeholder="Nama" required><br><br>
    <input type="text" name="alamat" value="<?php echo $alamat; ?>" placeholder="Alamat" required><br><br>
    <input type="text" name="hp" value="<?php echo $hp; ?>" placeholder="Nomor HP" required><br><br>
    <input type="text" name="pos" value="<?php echo $pos; ?>" placeholder="Kode Pos" required><br><br>
    <input type="submit" name="submit_edit" value="Simpan Perubahan">
</form>

</body>
</html>
