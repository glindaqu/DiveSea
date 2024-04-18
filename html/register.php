<!DOCTYPE html>
<html lang="en">

<?php

if (isset($_POST['email']) && isset($_POST['password'])) {
    $conn = mysqli_connect("localhost", "root", "", "divesea");
    if ($user = $conn->query("SELECT * FROM users WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'")->fetch_assoc()) {
        setcookie('login', $user['id'], time() + 12 * 60 * 60, '/');
        header('location: http://divesea/html/profile.php');
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/login.css">
    <title>DiveSea / Wallet</title>

    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body style="background-color: darkgray;">
    <div class="container">
        <section class="v">
            <div class="left">
                <a href="../index.html"><img src="../images/Nav-Logo.svg" alt="Logo" id="Logo"></a>
                <main>
                    <h3>Registration</h3>
                    <br>
                    <div class="links">
                        <form id="stripe-login" method="post" action="../application/try_register.php">
                            <div class="field padding-bottom--24">
                                <label for="email">Email</label>
                                <input type="email" name="email">
                            </div>
                            <div class="field padding-bottom--24">
                                <div class="grid--50-50">
                                    <label for="password">Password</label>
                                </div>
                                <input type="password" name="password">
                            </div>
                            <div class="field padding-bottom--24">
                                <label for="nick">Nickname</label>
                                <input type="text" name="nickname">
                            </div>
                            <div class="field padding-bottom--24">
                                <label for="bio">Bio</label>
                                <textarea type="text" name="bio" style="width: 100%; resize:none"></textarea>
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="submit" name="submit" value="Continue">
                            </div>
                            <a href="login.php">Login now</a>
                        </form>
                        <!-- <a href="#" class="link">
                            <img src="../images/Wallet-metemask.png" alt="Metamask">
                            <p>MetaMask</p>
                            <img src="../images/Wallet-right.png" alt="">
                        </a>
                        <a href="#" class="link">
                            <img src="../images/Wallet-trust.png" alt="Metamask">
                            <p>Trust Wallet</p>
                            <img src="../images/Wallet-right.png" alt="">
                        </a> -->
                        <!-- <a href="#" class="link">
                            <img src="../images/Wallet-link.png" alt="Metamask">
                            <p>Enter email address</p>
                            <img src="../images/Wallet-right.png" alt="">
                        </a> -->
                    </div>
                </main>
            </div>
            <div class="right">
                <img src="../images/Wallet-img.png" alt="img">
                <br>
                <h3>Start Your Own NFT Gallery</h3>
                <br>
                <p>CloseSea Is A Great Platform For Discover Largest NFTs And Other Stuff !!</p>
            </div>
        </section>
    </div>

</body>

</html>