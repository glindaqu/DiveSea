<?php
if (!isset($_COOKIE['login'])) header("location: http://divesea/html/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiveSea / Sell</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../css/create.css">
    <link rel="stylesheet" href="../css/global.css">

    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <header>
        <div class="container header-content">
            <nav class="nav" id="nav">
                <ul class="header__list">
                    <a href="../index.php"><img src="../images/Nav-Logo.svg" alt="" class="logo"></a>
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
                <img src="../images/burger-menu-svgrepo-com.svg" alt="" class="menu" id="menu">
                <div class="cover" id="cover"><img src="../images/back.svg" alt="back" class="back" id="back"></div>
            </nav>
        </div>
    </header>
    <main>
        <form action="../application/create_nft.php" method="post">
            <div class="container main-content">
                <h1 class="first">Create Your NFT</h1>
                <div class="smth">
                    <div class="main__one">
                        <div class="one__left" style="gap: 20px">
                            <div class="form__group">
                                <input type="text" class="form__input" id="name" placeholder="Title" required="" name="title" />
                            </div>
                            <div class="form__group">
                                <input type="text" class="form__input" id="name" placeholder="Description" required="" name="descr" />
                            </div>
                            <div class="form__group">
                                <input type="text" class="form__input" id="name" placeholder="Tags" required="" />
                            </div>
                            <div data-wow-duration="1s" class="s wow animate__animated animate__fadeInUp">
                                <div class="form__group">
                                    <input type="text" class="form__input" id="name" placeholder="Price" required="" name="bid" />
                                </div>
                                <div class="form__group">
                                    <input type="text" class="form__input" id="name" placeholder="Stock" required="" />
                                </div>
                            </div>
                            <div class="turn-boxx" style="margin-top: 70px;">
                                <div class="words">
                                    <h1 class="sale">Put On Sale</h1>
                                    <p class="in">
                                        People Will Bids On Your NFT Project
                                    </p>
                                </div>
                            </div>
                            <div class="turn-box">
                                <div class="wordss">
                                    <h1 class="sale">Direct Sale</h1>
                                    <p class="in">
                                        No Bids - Only Direct Salling
                                    </p>
                                </div>
                            </div>
                            <div class="cd">
                                <button class="po" type="submit">Create</button>
                            </div>
                        </div>
                        <div class="one__right wow animate__animated animate__fadeInRight">
                            <img style="width: 150%; border-radius: 15px" src="../images/nft<?php echo random_int(1, 3) ?>.png" alt="" class="blured">
                        </div>
                    </div>
                </div>
            </div>
        </form>
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