<?php

$item = mysqli_connect("localhost", "root", "", "divesea")->query("SELECT nft.*, users.email as creator, users.imagePath as creatorImage FROM nft join users on nft.creatorId = users.id WHERE nft.id = ".$_GET['id'])->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiveSea / detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/detail.css">
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
                    <form class="nav-form">
                        <a href="#"><img src="../images/search.svg" alt="" class="img"></a>
                        <input type="text" placeholder="Search Art Work / Creator" class="input ch">
                    </form>
                    <? if (isset($_COOKIE['login'])) { ?>
                        <a href="./html/profile.php" class="btn wallet">PROFILE<img src="" alt=""></a>
                    <? } else { ?>
                        <a href="./html/login.php" class="btn wallet">login<img src="" alt=""></a>
                    <? } ?>
                </div>
                <img src="../images/burger-menu-svgrepo-com.svg" alt="" class="menu" id="menu" width="50">
                <div class="cover" id="cover"><img src="../images/back.svg" alt="back" class="back" id="back"></div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <a href="./discover.html" class="back-box">
                <img src="../images/back.svg" alt="back" class="back">
                <h1 class="back-link">Product Detail</h1>
            </a>
            <div class="main-content">
                <div data-wow-duration="1.5s" class="personal wow animate__animated animate__fadeInLeft">
                    <div class="personal__left">
                        <img src="../images/<?echo $item['imagePath']?>.png" alt="" class="big__one">
                    </div>
                    <div class="personal__right" id="infos">
                        <h1 class="bl-title"><?echo $item['title']?></h1>
                        <p class="bl-text">
                            <?echo $item['descr']?>
                        </p>
                        <div class="r-top">
                            <div class="customers" style="align-items: center;">
                                <img style="width: 10%; border-radius: 90px;" src="../images/<?echo $item['creatorImage']?>.png" alt="women" class="wm">
                                <div class="bx">
                                    <span class="span">Created by</span>
                                    <h1 class="info"><?echo $item['creator']?></h1>
                                </div>
                            </div>
                        
                        </div>
                        <div class="r-median">
                            <h1 class="span">Current Bid</h1>
                        </div>
                        <div class="r-bottom">
                            <p style="font-size: 200%; font-weight: bold;"><?echo $item['bid']?></p>
                        </div>
                        <a href="#infos" class="l-btn">
                            <img src="../images/wallet.svg" alt="">
                            <h1 class="btn-h1">Place Bid</h1>
                        </a>
                    </div>
                </div>
                <div data-wow-duration="2s" class="statistics wow animate__animated animate__fadeInRight">
                    <div class="s-left">
                        <div class="tipo__top">
                            <h1 class="sta-title">Bid History</h1>
                            <div class="ab">
                                <div class="a">
                                    <div class="b"></div>
                                    <h1 class="c">Expenses</h1>
                                </div>
                                <div class="d">
                                    <p class="e">Jun 10 - Jun 16</p>
                                    <a href="#"><img src="../images/down.svg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tipo__bottom">
                            <img src="../images/Statics.png" alt="" class="sat">
                        </div>
                    </div>
                    <div class="s-right">
                        <div class="l">
                            <h1 class="s-title">History of Bid</h1>
                            <span class="s-span">Oct 14, 2022</span>
                            <div class="ic-block">
                                <div class="blo">
                                    <div class="icons">
                                        <img src="../images/repo.svg" alt="" class="retr">
                                        <img src="../images/ok.svg" alt="" class="ok">
                                    </div>
                                    <div class="repo">
                                        <h1 class="r-tit">Repo</h1>
                                        <span class="s-span">May 17, 2022 at 12:08</span>
                                    </div>
                                </div>
                                <img src="../images/1.55.svg" alt="" class="mo">
                            </div>
                            <div class="ic-blockk">
                                <div class="blo">
                                    <div class="icons">
                                        <img src="../images/travo.svg" alt="" class="retr">
                                        <img src="../images/ok.svg" alt="" class="ok">
                                    </div>
                                    <div class="repo">
                                        <h1 class="r-tit">Travo</h1>
                                        <span class="s-span">May 16, 2022 at 12:08</span>
                                    </div>
                                </div>
                                <img src="../images/1.55.svg" alt="" class="mo">
                            </div>
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

    <script src="../js/script.js"></script>
    <script src="../js/media.js"></script>
</body>

</html>