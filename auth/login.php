<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Login Administrator</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">
 
    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet"> 
 
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
        <form method="POST" action="" class="form-signin">
            <!-- <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary mt-3 btn-block">
                    Login
                </button>
            <a href="../index.php"><small>Kembali Ke Website</small></a>
            <p class="mt-5 mb-3 text-muted">&copy; <?= date('Y'); ?> </p>
        </form>
        <?php
        session_start();
        include '../config/koneksi.php';

        if (isset($_POST['login'])) {

            $username = mysqli_real_escape_string($koneksi, $_POST['username']);
            $password = md5($_POST['password']);

            $query = mysqli_query($koneksi, 
                "SELECT * FROM tb_admin 
                WHERE username='$username' AND password='$password'"
            );

            $cek = mysqli_num_rows($query);

            if ($cek > 0) {
                $data = mysqli_fetch_assoc($query);

                $_SESSION['login_admin'] = true;
                $_SESSION['username'] = $data['username'];

                echo "<script>
                        alert('Login berhasil');
                        window.location='../admin/index.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Username atau Password salah');
                        window.location='login.php';
                    </script>";
            }
        }
        ?>
 
  </body>
</html>
