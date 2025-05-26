<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubicon Liberation Front - Armored Core 6</title>
    <link rel="stylesheet" href="assets/css/pilotAC.css">
    <style>
    body::after {
        content: "";
        position:fixed;
        top: 50px; left: 50%; transform: translateX(-50%);
        width: 1920px; height: 1080px;
        background: url('assets/img/RubiconianLogo.webp') center center/contain no-repeat;
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

    // Rubicon Liberation Front pilots data
    $pilots = [
        [
            "name" => "Thumb Dolmayan",
            "ac" => "ASTGHIK",
            "img" => "assets/img/ThumbDolmayan.webp",
            "desc" => "The spiritual and strategic leader of the Rubicon Liberation Front, Father Thumb Dolmayan inspires his followers with unwavering conviction and a vision for Rubicon's freedom. His AC is a symbol of hope and resistance."
        ],
        [
            "name" => "Middle Flatwell",
            "ac" => "TSUBASA",
            "img" => "assets/img/MiddleFlatwell.webp",
            "desc" => "Deputy leader of the RLF, Uncle Middle Flatwell is a charismatic and respected commander. His AC is built for frontline combat, supporting his allies with reliable firepower and tactical expertise."
        ],
        [
            "name" => "Index Dunham",
            "ac" => "INDEX DUNHAM",
            "img" => "assets/img/IndexDunham.webp",
            "desc" => "A key strategist and operator for the RLF, Index Dunham is known for her intelligence and resourcefulness. Her AC is optimized for electronic warfare and battlefield support."
        ],
        [
            "name" => "Little Ziyi",
            "ac" => "YUE YU",
            "img" => "assets/img/LittleZiyi.webp",
            "desc" => "Little Ziyi is a passionate and determined RLF pilot. Her AC is agile and suited for hit-and-run tactics, reflecting her resourcefulness and fighting spirit."
        ],
        [
            "name" => "Ring Freddie",
            "ac" => "CANDLE RING",
            "img" => "assets/img/RingFreddie.webp",
            "desc" => "A fearless RLF pilot, Ring Freddie is known for his daring maneuvers and relentless attacks. His AC is built for high-speed assaults and close-quarters combat."
        ],
        [
            "name" => "Rokumonsen",
            "ac" => "SHINOBI",
            "img" => "assets/img/Rokumonsen.webp",
            "desc" => "An honorary member of the RLF, Rokumonsen is a fierce ace who fights for Rubicon's freedom. His AC, SHINOBI, is a well-balanced machine, symbolizing his resolve and the spirit of the resistance."
        ],
        [
            "name" => "Rusty",
            "ac" => "STEEL HAZE ORTUS",
            "img" => "assets/img/Rusty.webp",
            "desc" => "Rusty, piloting the legendary STEEL HAZE ORTUS, is an undercover agent who secretly supports the RLF. His AC is renowned for its speed, Coral weaponry, and precision, making him a respected ally among the Rubiconians."
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
    renderFactionNav($factions, "Rubicon Liberation Front");
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