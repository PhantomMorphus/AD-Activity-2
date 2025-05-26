<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquebus Pilots - Armored Core 6</title>
    <link rel="stylesheet" href="assets/css/pilotAC.css">
    <style>
    body::after {
        content: "";
        position:fixed;
        top: 50px; left: 50%; transform: translateX(-50%);
        width: 1920px; height: 1080px;
        background: url('assets/img/BalamLogo.webp') center center/contain no-repeat;
        opacity: 0.08;
        z-index: 0;
        pointer-events: none;
    }
    </style>
</head>
<body>
    <?php
    // Faction navigation dictionary
    $factions = [
        "Balam" => "balam.php",
        "Arquebus" => "arquebus.php",
        "Rubicon Liberation Front" => "rubicon.php",
        "RaD" => "rad.php",
    ];


    $pilots = [
    [
        "name" => "G1 Michigan",
        "ac" => "G1 Michigan",
        "img" => "assets/img/G1_Michigan.webp",
        "desc" => "The leader of the Redguns, G1 Michigan is a brash and aggressive commander. His AC is heavily armored and specializes in overwhelming firepower, embodying the brute force tactics of Balam."
    ],
    [
        "name" => "G2 Nile",
        "ac" => "G2 Nile",
        "img" => "assets/img/G2_Nile.webp",
        "desc" => "Nile is a skilled Redguns pilot known for his relentless pursuit of targets. His AC is balanced, favoring both mobility and firepower, making him a formidable opponent on the battlefield."
    ],
    [
        "name" => "G3 Wu Huahai",
        "ac" => "G3 Wu Huahai",
        "img" => "assets/img/G3_WuHuahai.webp",
        "desc" => "Wu Huahai is a tactical pilot who prefers calculated strikes. His AC is equipped for both ranged and close combat, allowing him to adapt to changing battle conditions."
    ],
    [
        "name" => "G4 Volta",
        "ac" => "G4 Volta",
        "img" => "assets/img/G4_Volta.webp",
        "desc" => "Volta is known for his aggressive, close-range fighting style. His AC is built for heavy melee combat, utilizing powerful weapons to break enemy defenses."
    ],
    [
        "name" => "G5 Iguazu",
        "ac" => "G5 Iguazu",
        "img" => "assets/img/G5_Iguazu.webp",
        "desc" => "Iguazu is a tenacious Redguns pilot with a grudge against the player. His AC is highly mobile and specializes in hit-and-run tactics, making him a persistent threat."
    ],
    [
        "name" => "G6 Red",
        "ac" => "G6 Red",
        "img" => "assets/img/G6_Red.webp",
        "desc" => "G6 Red is a mysterious and silent member of the Redguns. His AC is optimized for stealth and precision, striking enemies before they can react."
    ]
];

    // Function to render the faction navigation
    function renderFactionNav($factions, $current) {
        echo '<nav class="faction-nav">';
        foreach ($factions as $name => $link) {
            $active = (strtolower($name) === strtolower($current)) ? ' style="background:#00eaff;color:#181c20;border:2px solid #fff;"' : '';
            echo "<a href=\"$link\"$active>$name</a>";
        }
        echo '</nav>';
    }

    function renderACShowcase($pilot) {
        ?>
        <div class="ac-container" id="acContainer">
            <button class="cycle-btn prev" onclick="cycleAC(-1)" title="Previous">&#8592;</button>
            <div class="ac-image" id="acImage">
                <img src="<?php echo $pilot['img']; ?>" alt="AC Image" id="acImgTag">
            </div>
            <div class="ac-info" id="acInfo">
                <h2 id="pilotName"><?php echo $pilot['name']; ?></h2>
                <h3 id="acName"><?php echo $pilot['ac']; ?></h3>
                <p id="acDesc"><?php echo $pilot['desc']; ?></p>
            </div>
            <button class="cycle-btn next" onclick="cycleAC(1)" title="Next">&#8594;</button>
        </div>
        <?php
    }

    function getPilot($pilots, $index) {
        return $pilots[$index % count($pilots)];
    }

    renderFactionNav($factions, "Balam");
    ?>
    <main>
        <?php renderACShowcase($pilots[0]); ?>
    </main>
    <footer>
        <a href="../index.php" class="home-btn">Back to Home</a>
    </footer>
    <script>
    const pilots = <?php echo json_encode($pilots); ?>;
    </script>
    <script src="assets/js/cyclePilot.js"></script>
</body>
</html>