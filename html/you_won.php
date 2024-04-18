<?php

$connection = mysqli_connect("localhost", "root", "", "divesea");
if (!$connection) {
    die ("Server not responsing");
}
$result = $connection->query("SELECT * FROM nft LIMIT 11");
if (!$result) {
    die ("Connection not detected");
}
$items = [];
while ($item = $result->fetch_assoc()) {
    $items[] = $item;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Discover And Create NFTs" />
    <meta property="og:description" content="SOSISKA V TESTE : SAMSA" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:image" content="./images/image.jpg" />

    <title>DiveSea. Discover And Create NFTs</title>

    <link rel="shortcut icon" href="./images/ethereum-white.svg" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../media.css">
    <link href="https://fonts.cdnfonts.com/css/inter" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="../js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <header class="container">
        <nav class="nav" id="nav">
            <ul class="nav-left" id="nav-left">
                <a href="../" class="s-none" id="s-none"><img src="../images/Nav-Logo.svg" alt="" class="icon"></a>
            </ul>
            <div class="nav-right" id="nav-right">
                <div class="input nav-input">
                    <img src="../images/search.svg" alt="search">
                    <input type="text" placeholder="Search Art Work / Creator" class="input-in">
                </div>
            </div>
            <img src="../images/burger-menu-svgrepo-com.svg" alt="" class="menu" id="menu">
            <div class="cover" id="cover"><img src="../images/back.svg" alt="back" class="back" id="back"></div>
        </nav>
    </header>

    <section class="page-1 pad">
        <div class="page-1-wrapper">
            <p class="page-1-top">You Won! Select NFT for free!</p>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item) { ?>
                        <div class="swiper-slide">
                            <img src="../images/<?php echo $item['imagePath'] ?>.png" alt="image">
                            <div class="l">
                                <div class="in">
                                    <p class="darker"><?php echo explode("@", $item['title'])[0] ?></p>
                                    <p class="greyer">Current bid</p>
                                    <p class="nums"><img src="../images/ethereum.svg" alt="ethereum" class="m-w-15"><? echo $item['bid'] ?></p>
                                </div>
                                <a href='../application/try_bid.php?item=<?echo $item['id']?>&cost=0'><div class="left-btn">PLACE BID</div></a>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>

    <footer class="m-w">
        <div class="unit">
            <a href="../">
                <div id="logo">
                    <img src="../images/footer-logo.svg" alt="logo">
                    <h3>DiveSea</h3>
                </div>
            </a>
            <div id="footer-menu">
                <ul id="footer-links">
                    <li><a href="#footer-links">Privacy policy</a></li>
                    <li><a href="#footer-links">Terms & Conditions</a></li>
                    <li><a href="#footer-links">About Us</a></li>
                    <li><a href="#footer-links">Contact</a></li>
                </ul>
            </div>
        </div>
        <hr class="hr">
        <div class="lower">
            <h3>© 2023 made by team AAA.</h3>
        </div>
    </footer>

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'
        const swiper = new Swiper('.swiper', {
            slidesPerView: 'auto',
            spaceBetween: 0,
            slidesPerView: 1,
            breakpoints: {
                560: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                840: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30
                },
            }
        });
    </script>

    <script src="./js/script.js"></script>
    <script src="./js/media.js"></script>
</body>

</html>