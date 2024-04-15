<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/desktop.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-menu-wrapper">
                <div class="header-group">
                    <div class="logo">
                        <img src="../img/Logo.png" alt="logo" />
                    </div>
                </div>
            </div>
        </div>
        <div class="login-wrapper">
            <div class="login-title">Registration</div>
            <form action="../../application/register.php" method="post" class="login-form">
                <input type="text" class="email" placeholder="Email" name="email">
                <input type="password" class="password" placeholder="Password" name="password">
                <input type="password" class="password" placeholder="Password again" name="password_again">
                <button class="connect-wallet" type="submit">registration</button>
            </form>
        </div>
    </div>
</body>
</html>