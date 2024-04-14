<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DiveSea</title>

    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/desktop.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-menu-wrapper">
                <div class="header-group">
                    <div class="logo">
                        <img src="public/img/Logo.png" alt="logo" />
                    </div>
                    <div class="header-menu">
                        <div class="header-menu-item">discover</div>
                        <div class="header-menu-item">creators</div>
                        <div class="header-menu-item">cell</div>
                        <div class="header-menu-item">stats</div>
                    </div>
                </div>
                <div class="header-group">
                    <input type="text" class="header-search" placeholder="Search Art Work / Creator">
                    <?php if (isset($_COOKIE['isLogin'])) { ?>
                        <a href="public/html/profile.html"><button class="connect-wallet">profile</button></a>
                    <?php } else { ?>
                        <a href="public/html/login.html"><button class="connect-wallet">login</button></a>
                    <?php } ?>
                </div>
            </div>
            <div class="header-content-wrapper">
                <div class="header-text-group">
                    <div class="stick"></div>
                    <div class="header-text-title">Discover And<br>Create NFTs</div>
                    <div class="header-text-desc">Discover, Create and Sell NFTs On Our NFT Marketplace<br>With Over Thousands Of NFTs And Get a <b>$20 bonus.</b></div>
                    <div class="header-content-button-group">
                        <button class="explore-more-header">explore more</button>
                        <button class="create-nft-header">create nft</button>
                    </div>
                    <div class="header-content-stats-group">
                        <div class="header-content-stats-item">
                            <div class="header-content-stats-item-num">430k+</div>
                            <div class="header-content-stats-item-desc">Art Works</div>
                        </div>
                        <div class="header-content-stats-item">
                            <div class="header-content-stats-item-num">159k+</div>
                            <div class="header-content-stats-item-desc">Creators</div>
                        </div>
                        <div class="header-content-stats-item">
                            <div class="header-content-stats-item-num">87k+</div>
                            <div class="header-content-stats-item-desc">Collections</div>
                        </div>
                    </div>
                </div>
                <div class="header-img-group">
                    <img src="public/img/header-bg.png" alt="BG">
                </div>
            </div>
        </div>
        <div class="week-top">
            <div class="week-top-title">Weekly - Top NFT</div>
            <div class="slider">
                <div class="slider-viewport"></div>
                <div class="slider-controls">
                    <button class="slider-control left"><-</button>
                    <div class="stick2"></div>
                    <button class="slider-control right">-></button>
                </div>
            </div>
        </div>
        <div class="top-collection">
            <div class="top-collection-title">Top Collection</div>
            <table class="collection-table">
                <tr class="table-header">
                    <td class="collection-name">Collection</td>
                    <td class="collection-volume table-header-item">Volume</td>
                    <td class="collection-addition table-header-item">24h %</td>
                    <td class="collection-floor-price table-header-item">Floor Price</td>
                    <td class="collection-items-count table-header-item">Items</td>
                </tr>
            </table>
        </div>
        <div class="marketplace">
            <div class="explore-marketplace-title">Explore Marketplace</div>
            <div class="marketplace-button-group">
                <button class="marketplace-filter-button">All</button>
                <button class="marketplace-filter-button">Category</button>
                <button class="marketplace-filter-button">Collection</button>
                <button class="marketplace-filter-button">Price</button>
            </div>
            <div class="marketplace-content"></div>
            <div class="stick4"></div>
        </div>
        <div class="pluses">
            <div class="pluses-text">
                <div class="pluses-text gray">Just Unleash -</div>
                <div class="pluses-text">Your Inner Collector</div>
                <div class="pluses-list">
                    <div class="pluses-list-item">
                        <div class="pluses-list-item-img"><img src="public/img/acceptarrow.png" alt=""></div>
                        <div class="pluses-list-item-text">Best Seller All Around World</div>
                    </div>
                    <div class="pluses-list-item">
                        <div class="pluses-list-item-img"><img src="public/img/acceptarrow.png" alt=""></div>
                        <div class="pluses-list-item-text">$2M+ Transactions Every Day</div>
                    </div>
                    <div class="pluses-list-item">
                        <div class="pluses-list-item-img"><img src="public/img/acceptarrow.png" alt=""></div>
                        <div class="pluses-list-item-text">Secure Transactions</div>
                    </div>
                    <div class="pluses-list-item">
                        <div class="pluses-list-item-img"><img src="public/img/acceptarrow.png" alt=""></div>
                        <div class="pluses-list-item-text">Exclusive Collections From Sellers</div>
                    </div>
                    <div class="pluses-list-item">
                        <div class="pluses-list-item-img"><img src="public/img/acceptarrow.png" alt=""></div>
                        <div class="pluses-list-item-text">Easy Buying and Selling</div>
                    </div>
                    <div class="pluses-list-item">
                        <div class="pluses-list-item-img"><img src="public/img/acceptarrow.png" alt=""></div>
                        <div class="pluses-list-item-text">Join Our Community</div>
                    </div>
                </div>
                <button class="explore-more-header">explore more</button>
            </div>
            <div class="pluses-img">
                <img src="public/img/bg2.png " alt="" >
            </div>
        </div>
        <div class="ads-card">
            <div class="ads-card-info">
                <div class="ads-card-text">
                    <div class="ads-card-title">Create and Sell NFTs</div>
                    <div class="ads-card-subtitle">World's Largest NFT Place</div>
                </div>
                <div class="ads-card-button-group">
                    <button class="ads-button-1">Explore More</button>
                    <button class="ads-button-2">Sell Artworks</button>
                </div>
            </div>
            <div class="ads-card-img">
                <img src="public/img/ads-card-banner.png" alt="" >
            </div>
        </div>
        <div class="footer">
            <div class="section1">
                <div class="footer-logo">
                    <div class="footer-logo-img">
                        <img src="public/img/logo-light.png" alt="" srcset="">
                    </div>
                    <div class="footer-logo-text">DiveSea</div>
                </div>
                <div class="footer-nav">
                    <div class="footer-nav-item">Privacy Policy</div>
                    <div class="footer-nav-item">Term & Conditions</div>
                    <div class="footer-nav-item">About Us</div>
                    <div class="footer-nav-item">Contact</div>
                </div>
            </div>
            <div class="stick5"></div>
            <div class="section2">
                <div class="sction2-text">@ 2024 EATLY All Rights Reserved.</div>
                <div class="footer-ico-group">
                    <img src="public/img/facebook-ico.png" alt="" srcset="">
                    <img src="public/img/in-ico.png" alt="" srcset="">
                    <img src="public/img/inst-ico.png" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
</body>

<script src="public/js/scroll.js"></script>
<script src="public/js/index.js"></script>

</html>