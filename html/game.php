<head>

    <link rel="stylesheet" href="../css/game.css">
    <title>Divesea \ game</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <header class="container">
        <nav class="nav" id="nav">
            <ul class="nav-left" id="nav-left">
                <a href="/" class="s-none" id="s-none"><img src="../images/Nav-Logo.svg" alt="" class="icon"></a>
            </ul>
            <div class="nav-right" id="nav-right">
                <div class="input nav-input">
                    <img src="../images/search.svg" alt="search">
                    <input type="text" placeholder="Search Art Work / Creator" class="input-in">
                </div>
                <? if (isset($_COOKIE['login'])) { ?>
                    <a href="./html/profile.php" class="btn wallet">PROFILE<img src="" alt=""></a>
                <? } else { ?>
                    <a href="./html/login.php" class="btn wallet">login<img src="" alt=""></a>
                <? } ?> 
            </div>
            <img src="./images/burger-menu-svgrepo-com.svg" alt="" class="menu" id="menu">
            <div class="cover" id="cover"><img src="../images/back.svg" alt="back" class="back" id="back"></div>
        </nav>
    </header>

    <div id="game-board" class="easy"></div>
    <script src="../js/game.js"></script>
  </body>