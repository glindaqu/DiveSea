<?php
$query = "select users.bio, users.email, users.imagePath, count(collection.nftId) as nfts, sum(nft.bid) as totalPay, users.aka, users.money as money
from users
join collection 
on collection.holderId = users.id
join nft
on collection.nftId = nft.id
GROUP by users.id having users.id = ".$_COOKIE['login'];
$user = mysqli_connect("localhost", "root", "", "divesea")->query($query)->fetch_assoc();

if (!$user) {
    $query = "select users.bio, users.email, users.imagePath, 0 as nfts, 0 as totalPay, users.aka, users.money as money
    from users where id = ".$_COOKIE['login'];
    $user =  mysqli_connect("localhost", "root", "", "divesea")->query($query)->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiveSea / collection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/global.css">

    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <header>
        <div class="container">
            <nav class="nav" id="nav">
                <ul class="header__list">
                    <a href="../"><img src="../images/Nav-Logo.svg" alt="" class="logo"></a>
                    <a href="discover.php">
                        <li class="header__link">Discover</li> 
                    </a>
                </ul>
                <div class="input-bx">
                    <form class="nav-form nav-input">
                        <a href="#"><img src="../images/search.svg" alt="" class="img"></a>
                        <input type="text" placeholder="Search Art Work / Creator" class="input ch">
                    </form>
                    <a href="game.php" class="btn wallet">game<img src="" alt=""></a>
                </div>
                <img src="../images/burger-menu-svgrepo-com.svg" alt="" class="menu" id="menu">
                <div class="cover" id="cover"><img src="../images/back.svg" alt="back" class="back" id="back"></div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="header-content">
                <img src="../images/space.png" alt="space" class="space wow animate__animated animate__fadeInRight">
            </div>
            <div class="collection">
                <div class="person">
                    <img src="../images/<? echo $user['imagePath'] ?>.png" alt="chel" class="chel">
                    <div class="infos">
                        <h1 class="name"><? echo $user['email'] ?></h1>
                    </div>
                    <span class="email"><? echo $user['aka'] ?></span>
                    <div class="line"></div>
                    <div data-wow-delay="0.2s" class="nums wow animate__animated animate__fadeInUpBig">
                        <div class="num">
                            <span class="number"><? echo $user['totalPay'] ?></span>
                            <p class="t">Total Sales</p>
                        </div>
                        <div class="num">
                            <span class="number"><? echo $user['nfts'] ?></span>
                            <p class="t">Items</p>
                        </div>
                        <div class="num">
                            <span class="number"><? echo $user['money'] ?></span>
                            <p class="t">On Wallet</p>
                        </div>
                    </div>
                    <h1 class="bios">Bio</h1>
                    <p data-wow-delay="0.3s" class="bio wow animate__animated animate__fadeInUp"><? echo $user['bio'] ?></p>
                    <div class="linee"></div>
                    <img data-wow-delay="0.3s" src="../images/Socials.png" alt="" class="socials wow animate__animated animate__fadeInUp">
                </div>
                <div class="persons">
                    <div class="lin">
                        <div class="coll">
                            <img src="../images/collections.svg" alt="">
                            <h1 class="col">Collection</h1>
                        </div>
                        <div class="liniya"></div>
                        <div class="options">
                            <?
                            $conn = mysqli_connect("localhost", "root", "", "divesea");
                            $arr = $conn->query("
                            SELECT nft.*
                            FROM nft 
                            JOIN collection 
                            on nft.id = collection.nftId 
                            JOIN users 
                            on collection.holderId = users.id 
                            where users.id = " . $_COOKIE['login']
                        );
                            while ($item = $arr->fetch_assoc()) { ?>
                                <div data-wow-delay="0.7s" class="option wow animate__animated animate__fadeInRight">
                                    <div class="w">
                                        <img src="../images/<? echo $item['imagePath'] ?>.png" alt="" class="q">
                                    </div>
                                    <h1 class="r"><? echo $item['title'] ?></h1>
                                    <div class="y">
                                        <div class="z" style="display: flex; align-items: center">
                                        <img src="../images/ethereum.svg" alt="btc" style="width: 15px; height: 16px;">
                                        <p><? echo $item['bid'] ?></p>
                                        </div>
                                        <button class="bid">BID PLACED</button>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container footer-content">
            <br><br><br><br><br><br>
            <div class="unit">
                <div id="logo">
                    <img src="../images/footer-logo.svg" alt="logo" class="siu">
                    <h3 class="pups">DiveSea</h3>
                </div>
                <div id="footer-menu">
                    <ul id="footer-links">
                        <li><a href="#footer-links">Privacy police</a></li>
                        <li><a href="#footer-links">Term & Conditions</a></li>
                        <li><a href="#footer-links">About Us</a></li>
                        <li><a href="#footer-links">Contact</a></li>
                    </ul>
                </div>
            </div>
            <br>
            <hr>
            <br><br><br><br>
            <div class="lower">
                <h3>© 2023 made by team AAA.</h3>
                <img src="../images/footer-icons.svg" alt="icons">
            </div>
        </div>
    </footer>

    <script src="../js/media.js"></script>
</body>

</html>