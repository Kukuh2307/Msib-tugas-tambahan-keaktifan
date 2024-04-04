<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/3a91c7de73.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Login</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form action="proses.php?aksi=login" method="POST">
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                        <button name="login" type="submit">Login</button>
                        <p class="credit">Belum mempunyai akun?? <a href="regist.php">Daftar</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>