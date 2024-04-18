<?php

$connection = mysqli_connect("localhost", "root", "", "divesea");
if (!$connection) {
    die("Server not responsing");
}
$result = $connection->query("SELECT * FROM nft");
if (!$result) {
    die("Connection not detected");
}
$items = [];
while ($item = $result->fetch_assoc()) {
    $items[] = $item;
}

$query = "
SELECT users.*, users.email as title, users.email as holder, sum(nft.bid) as volume, 100 as percent, min(nft.bid) as floor, COUNT(nft.id) as items, users.imagePath as holderImage
from users
join collection on users.id = collection.holderId
join nft on nft.id = collection.nftId
group by users.id
";
if (isset($_GET['coll'])) $query .= " ORDER BY users.id";
if (isset($_GET['volume'])) $query .= " ORDER BY volume";
if (isset($_GET['floor'])) $query .= " ORDER BY floor";
if (!$result) {
    die("Connection not detected");
}
$result = $connection->query($query);

$collections = [];

while ($row = $result->fetch_assoc()) {
    $collections[] = $row;
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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./media.css">
    <link href="https://fonts.cdnfonts.com/css/inter" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="./js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <header class="container">
        <nav class="nav" id="nav">
            <ul class="nav-left" id="nav-left">
                <a href="/" class="s-none" id="s-none"><img src="./images/Nav-Logo.svg" alt="" class="icon"></a>
            </ul>
            <div class="nav-right" id="nav-right">
                <div class="input nav-input">
                    <img src="./images/search.svg" alt="search">
                    <input type="text" placeholder="Search Art Work / Creator" class="input-in">
                </div>
                <? if (isset($_COOKIE['login'])) { ?>
                    <a href="./html/profile.php" class="btn wallet">PROFILE<img src="" alt=""></a>
                <? } else { ?>
                    <a href="./html/login.php" class="btn wallet">login<img src="" alt=""></a>
                <? } ?>
            </div>
            <img src="./images/burger-menu-svgrepo-com.svg" alt="" class="menu" id="menu">
            <div class="cover" id="cover"><img src="./images/back.svg" alt="back" class="back" id="back"></div>
        </nav>
    </header>

    <section class="landing-page pad">
        <div class="left-landing">
            <p class="big-text">Discover And Create NFTs</p>
            <p class="small-text">Discover, Create and Sell NFTs On Our NFT Marketplace With Over Thousands Of NFTs And Get a <strong>$20 bonus.</strong></p>
            <div class="two-buttons">
                <a href="#join__us" class="ggg">EXPLORE MORE</a>
            </div>
            <div class="data">
                <div class="data-item">
                    <p class="bigger-text-data">430K+</p>
                    <p class="smaller-text-data">Art Works</p>
                </div>
                <div class="data-item">
                    <p class="bigger-text-data">159K+</p>
                    <p class="smaller-text-data">Creators</p>
                </div>
                <div class="data-item">
                    <p class="bigger-text-data">87K+</p>
                    <p class="smaller-text-data">Collections</p>
                </div>
            </div>
        </div>
        <div class="right-landing">
            <img src="./images/landing_left.svg" alt="" class="right-left">
            <img src="./images/landing_right.svg" alt="" class="right-right">
            <img src="./images/arrow.svg" alt="" class="right-arrow">
            <img src="./images/dots.svg" alt="" class="right-dots">
        </div>
    </section>

    <section class="page-1 pad">
        <div class="page-1-wrapper">
            <p class="page-1-top">Weekly - Top NFT</p>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    $i = 0;
                    foreach ($items as $item) {
                        if ($i == 7) break; ?>
                        <div class="swiper-slide">
                            <a href="html/detail.php?id=<? echo $item['id'] ?>">
                                <img src="./images/<?php echo $item['imagePath'] ?>.png" alt="image">
                            </a>
                            <div class="l">
                                <div class="in">
                                    <p class="darker"><?php echo explode("@", $item['title'])[0] ?></p>
                                    <p class="greyer">Current bid</p>
                                    <p class="nums"><img src="./images/ethereum.svg" alt="ethereum" class="m-w-15"><? echo $item['bid'] ?></p>
                                </div>
                                <a href='application/try_bid.php?item=<? echo $item['id'] ?>&cost=<? echo $item['bid'] ?>'>
                                    <div class="left-btn">PLACE BID</div>
                                </a>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="top-collection pad">
        <div data-wow-delay="0.3s" class="recent wow animate__animated animate__fadeInRight">
            <div class="recent-text-up">
                <p>Recent Viewed</p>
                <h3>...</h3>
            </div>
            <div class="recent-block">
                <div style="display: flex; flex-direction: row; gap: 10px">
                    <img src="./images/nft4.png" alt="image">
                    <div class="recent-block-name">
                        <h4>Alex Ca.</h4>
                        <p>Alexy</p>
                    </div>
                </div>
                <div class="recent-block-price">
                    <h4>9898</h4>
                    <h4>+10000%</h4>
                </div>
            </div>
            <div class="recent-block">
                <div style="display: flex; flex-direction: row; gap: 10px">
                    <img src="./images/nft2.png" alt="image">
                    <div class="recent-block-name">
                        <h4>Alex Ca.</h4>
                        <p>Alexy</p>
                    </div>
                </div>
                <div class="recent-block-price">
                    <h4>9898</h4>
                    <h4>+10000%</h4>
                </div>
            </div>
        </div>

        <h1 class="h1">Top Collection</h1>

        <div class="top-collection-names" id="stats">
            <div class="head">
                <div class="cell" id="collection">Collection 
                <a href="index.php?coll=true#stats"><img src="./images/arrows-down-up.svg" alt="."></a>
                </div>
                <div class="cell" id="volume">Volume
                <a href="index.php?volume=true#stats"><img src="./images/arrows-down-up.svg" alt="."></a>
                </div>
                <div class="cell soon-none" id="h24">24H
                    
                </div>
                <div class="cell soon-none" id="price">Floor Price
                    <a href="index.php?floor=true#stats"><img src="./images/arrows-down-up.svg" alt="."></a>
                </div>
                <div class="cell soon-none" id="items">Items</div>
            </div>
            <br>
            <div class="stats">
                <? foreach ($collections as $item) { ?>
                    <div data-wow-delay="0.6s" class="stat wow animate__animated animate__fadeInLeft">
                        <div class="profile">
                                <img src="./images/<? echo $item['holderImage'] ?>.png" alt="">
    
                            <div class="name">
                                <h5><? echo $item['title'] ?></h5>
                                <p>By <? echo $item['holder'] ?></p>
                            </div>
                        </div>
                        <div class="eth">
                            <img src="./images/ethereum.svg" alt=""> 
                            <p><? echo $item['volume'] ?></p>
                        </div>
                        <div class="green-text soon-none">
                            <? echo $item['percent'] ?>%
                        </div>
                        <div class="floor-price soon-none">
                            <img src="./images/ethereum.svg" alt="">
                            <p> <? echo $item['floor'] ?> </p>
                        </div>
                        <div class="items soon-none">
                            <p><? echo $item['items'] ?></p>
                        </div>
                    </div>
                    <br>
                    <div class="line"></div>
                    <br>
                <? } ?>
            </div>

        </div>
    </section>

    <section class="explore pad">
        <div class="h1">Explore Marketplace</div>
        <div class="row">
            <?php foreach ($items as $item) { ?>
                <div data-wow-delay="0.2s" class="card wow animate__animated animate__fadeInRight">
                <a href="html/detail.php?id=<? echo $item['id'] ?>">
                    <img src="./images/<? echo $item['imagePath'] ?>.png" alt="image">
                </a>
                    <br>
                    <div class="discription">
                        <h3><? echo $item['title'] ?></h3>
                        <h4>Current bid</h4>
                        <div class="card-price">
                            <img src="./images/ethereum.svg" alt="btc" style="width: 15px; height: 16px;">
                            <p><? echo $item['bid'] ?></p>
                            <a href="application/try_bid.php?item=<? echo $item['id'] ?>&cost=<? echo $item['bid'] ?>">PLACE BID</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="all-padding just-unleash pad">
        <div class="text-ul">
            <div style="text-align: center;">
                <p class="join-community-text-top">Just Unleash -</p>
                <p class="join-community-text-bottom">Your Inner Collector</p>
            </div>

            <ul class="just-unleash-ul">
                <li><img src="./images/checked.svg" alt="deffinetly not x">Best Seller All Around World</li>
                <li><img src="./images/checked.svg" alt="deffinetly not x">$2M+ Transections Every Day</li>
                <li><img src="./images/checked.svg" alt="deffinetly not x">Secure Transactions</li>
                <li><img src="./images/checked.svg" alt="deffinetly not x">Exclusive Collections From Sellers</li>
                <li><img src="./images/checked.svg" alt="deffinetly not x">Easy Buying and Selling</li>
                <li><img src="./images/checked.svg" alt="deffinetly not x">Join Our Community</li>
            </ul>
        </div>

        <div class="recent-best">
            <div data-wow-delay="0.4s" class="recent wow animate__animated animate__fadeInRight recent-position">
                <div class="recent-text-up">
                    <p>Recent Viewed</p>
                    <h3>...</h3>
                </div>
                <div class="recent-block">
                    <img src="./images/nft2.png" alt="image">
                    <div class="recent-block-name">
                        <h4>Alex Ca.</h4>
                        <p>Alexy</p>
                    </div>
                    <div class="recent-block-price">
                        <h4>9898</h4>
                        <h4>+10000%</h4>
                    </div>
                </div>
                <div class="recent-block">
                    <img src="./images/nft4.png" alt="image">
                    <div class="recent-block-name">
                        <h4>Alex Ca.</h4>
                        <p>Alexy</p>
                    </div>
                    <div class="recent-block-price">
                        <h4>9898</h4>
                        <h4>+10000%</h4>
                    </div>
                </div>
            </div>

            <div data-wow-delay="0.3s" class="recent wow animate__animated animate__fadeInRight recent-position-2">
                <div class="recent-text-up">
                    <p>Best-sellers</p>
                    <h3>...</h3>
                </div>

                <div class="recent-block">
                    <div class="recent-block-name-wrapper">
                        <img src="./images/nft2.png" alt="image">
                        <div class="recent-block-name">
                            <h4>Alex Ca.</h4>
                            <p>@Alexy</p>
                        </div>
                    </div>
                    <div class="recent-block-button">Follow</div>
                </div>
                <div class="recent-block">
                    <div class="recent-block-name-wrapper">
                        <img src="./images/nft3.png" alt="image">
                        <div class="recent-block-name">
                            <h4>Alex Ca.</h4>
                            <p>@Alexy</p>
                        </div>
                    </div>
                    <div class="recent-block-button">Follow</div>
                </div>
                <div class="recent-block">
                    <div class="recent-block-name-wrapper">
                        <img src="./images/nft4.png" alt="image">
                        <div class="recent-block-name">
                            <h4>Alex Ca.</h4>
                            <p>@Alexy</p>
                        </div>
                    </div>
                    <div class="recent-block-button">Follow</div>
                </div>
                <div class="recent-block">
                    <div class="recent-block-name-wrapper">
                        <img src="./images/nft1.png" alt="image">
                        <div class="recent-block-name">
                            <h4>Alex Ca.</h4>
                            <p>@Alexy</p>
                        </div>
                    </div>
                    <div class="recent-block-button">Follow</div>
                </div>
                <div class="recent-block">
                    <div class="recent-block-name-wrapper">
                        <img src="./images/nft2.png" alt="image">
                        <div class="recent-block-name">
                            <h4>Alex Ca.</h4>
                            <p>@Alexy</p>
                        </div>
                    </div>
                    <div class="recent-block-button">Follow</div>
                </div>
                <div class="recent-block">
                    <div class="recent-block-name-wrapper">
                        <img src="./images/nft3.png" alt="image">
                        <div class="recent-block-name">
                            <h4>Alex Ca.</h4>
                            <p>@Alexy</p>
                        </div>
                    </div>
                    <div class="recent-block-button">Follow</div>
                </div>
            </div>

            <div data-wow-delay="0.5s" class="recent new-bid wow animate__animated animate__fadeInRight recent-position-3">
                <div class="recent-text-up new-bid-fec">
                    <p>o</p>
                    <img src="./images/landing_left.svg" alt="image" class="recent-left">
                </div>

                <div class="recent-block">
                    <div class="recent-block-name">
                        <h4><span>New bid </span> Rotation</h4>
                        <h3>0.002 ETH</h3>
                        <span>06 Oct 2022, 11:44 PM</span>
                    </div>
                </div>
                <img src="./images/landing_left.svg" alt="image" class="recent-right">
            </div>
        </div>
    </section>


    <section data-wow-delay="0.5s" class="join-community wow animate__animated animate__fadeInUp pad" id="join__us">
        <img src="./images/Join Community.svg" alt="join the Community" style="max-width: 1000px; width: 100%;">
        <div class="join-community-text">
            <div>
                <p class="join-community-text-top">Join The</p>
                <p class="join-community-text-bottom">Community</p>
            </div>
            <p class="join-community-text-mid">
                Our vibrant community is full of collectors, artists, and enthusiasts <br> who share a passion for one-of-a-kind digital.
            </p>
            <div class="jjj">Join Our Community</div>
        </div>
    </section>


    <section class="m-w pad">
        <div class="center">
            <p class="join-community-text-top">Frequently Asked</p>
            <p class="join-community-text-bottom">Questions</p>
        </div>
        <ul class="flex-ul">
            <li data-wow-delay="0.3s" class="g wow animate__animated animate__fadeInRight">
                <p>What is an NFT?</p><img src="./images/plus.svg" alt="" class="plus">
            </li>
            <li data-wow-delay="0.4s" class="g wow animate__animated animate__fadeInLeft">
                <p>What can I use NFTs for?</p><img src="./images/plus.svg" alt="" class="plus">
            </li>
            <li data-wow-delay="0.5s" class="g wow animate__animated animate__fadeInRight">
                <p>What is the difference between an NFT and cryptocurrency?</p><img src="./images/plus.svg" alt="" class="plus">
            </li>
            <li data-wow-delay="0.6s" class="g wow animate__animated animate__fadeInLeft">
                <p>How much is an NFT worth?</p><img src="./images/plus.svg" alt="" class="plus">
            </li>
            <li data-wow-delay="0.7s" class="g wow animate__animated animate__fadeInRight">
                <p>How do I purchase an NFT on your platform?</p><img src="./images/plus.svg" alt="" class="plus">
            </li>
        </ul>
    </section>

    <section class="m-w wrapped-d pad">
        <div class="left-d">
            <div class="left-d-text">
                <h1>Create and Sell NFTs</h1> <br>
                <p>World's Largest NFT Place</p>
            </div>
            <div class="two-buttons left-d-b">
                <a href="#" class="ppp">Explore More</a>
                <a href="html/create.php" class="ppp">Sell Artwork</a>
            </div>
        </div>
        <img src="./images/landing_left_wide.svg" class="right-d"></img>
        <!-- <img src="./images/Rectangle 2.png" class="right-d-b"></img> -->
    </section>

    <footer class="m-w">
        <div class="unit">
            <a href="./index.html">
                <div id="logo">
                    <img src="./images/footer-logo.svg" alt="logo">
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