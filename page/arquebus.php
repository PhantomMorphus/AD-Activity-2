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
        background: url('assets/img/ArquebusLogo.webp') center center/contain no-repeat;
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

    // Arquebus pilots data
    $pilots = [
        [
            "name" => "V.I - Freud",
            "ac" => "IB-07: SOL 644",
            "img" => "assets/img/V1_Freud.webp",
            "desc" => "Freud is Arquebus' ace pilot, piloting the powerful IB-07: SOL 644. Known for his aggressive tactics and advanced Coral weaponry."
        ],
        [
            "name" => "V.II - Snail",
            "ac" => "VP-08D: MARVE",
            "img" => "assets/img/V2_Snail.webp",
            "desc" => "Snail commands the VP-08D: MARVE, a versatile AC with strong energy weapons and high mobility, reflecting his cunning and prideful nature."
        ],
        [
            "name" => "V.III - O'Keeffe",
            "ac" => "VP-02: HELIOS",
            "img" => "assets/img/V3_Okeefe.webp",
            "desc" => "O'Keeffe's VP-02: HELIOS specializes in long-range combat and energy attacks, supporting Arquebus' dominance on the battlefield."
        ],
        [
            "name" => "V.IV - Rusty",
            "ac" => "STEEL HAZE",
            "img" => "assets/img/V4_Rusty.webp",
            "desc" => "Rusty, a skilled Arquebus pilot, uses STEEL HAZE, an AC built for speed and precision, making him a formidable duelist."
        ],
        [
            "name" => "V.V - Hawkins",
            "ac" => "VP-05: ENYO",
            "img" => "assets/img/V5_Hawkins.webp",
            "desc" => "Hawkins pilots VP-05: ENYO, a heavy AC with strong defensive capabilities and firepower, ideal for frontline engagements."
        ],
        [
            "name" => "V.VI - Maeterlinck",
            "ac" => "VP-03: ELIMINATOR",
            "img" => "assets/img/V6_Maeterlinck.webp",
            "desc" => "Maeterlinck's VP-03: ELIMINATOR is designed for close-quarters combat, excelling in aggressive assaults."
        ],
        [
            "name" => "V.VII - Swinburne",
            "ac" => "VP-04: LYCORIS",
            "img" => "assets/img/V7_Swinburne.webp",
            "desc" => "Swinburne's VP-04: LYCORIS is a balanced AC, supporting Arquebus operations with adaptability and reliability."
        ],
        [
            "name" => "V.VIII - Pater",
            "ac" => "VP-01: TESTUDO",
            "img" => "assets/img/V8_Pater.webp",
            "desc" => "Pater's VP-01: TESTUDO is a heavily armored AC, built to withstand intense enemy fire and protect allies."
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

    // Function to render the AC showcase for the first pilot (JS will handle cycling)
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

    // Example utility function: get pilot by index (not used here, but useful for expansion)
    function getPilot($pilots, $index) {
        return $pilots[$index % count($pilots)];
    }

    // Render navigation
    renderFactionNav($factions, "Arquebus");
    ?>
    <main>
        <?php renderACShowcase($pilots[0]); ?>
    </main>
    <footer>
        <a href="homePage.html" class="home-btn">Back to Home</a>
    </footer>
    <script>
    const pilots = <?php echo json_encode($pilots); ?>;
    </script>
    <script src="assets/js/cyclePilot.js"></script>
</body>
</html>