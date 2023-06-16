<?php include "config.php";
error_reporting(0);
session_start();
if (isset($_SESSION["username"])){
    header("location: LOGIN.php");
}
if (isset($_POST['daftar'])) {
    $email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

    if ($password == $password) {
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (email, username, password)
					VALUES ('$email', '$username', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Selamat! Akun anda sudah didaftarkan.')</script>";
                $email = "";
                $username = "";
				$_POST['password'] = "";
			} else {
				echo "<script>alert('Error! Sepertinya ada yang salah.')</script>";
			}
		} else {
			echo "<script>alert('Error! Username udah digunakan.')</script>";
		}

	} else {
		echo "<script>alert('Error! Password tidak benar.')</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form action="" method="POST" class="login-email">
            <p style="font-size: 2rem; font-weight:850;">Daftar</p>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp" name="email"
                    value="<?php echo $email;?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Username</label>
                    <input type="username" class="form-control" name="username" 
                    value="<?php echo $username;?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"
                    value="<?php echo $_POST["password"];?>" required>
                </div>
                <div>
                <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
                </div>
                <p class="login-register-text mt-2">Sudah mempunyai akun ?
                <a href="LOGIN.php">Masuk.</a></p>
            </form>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>