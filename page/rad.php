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
        background: url('assets/img/radLogo.webp') center center/contain no-repeat;
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

    // RaD pilots data
    $pilots = [
        [
            "name" => "\"Cinder\" Carla",
            "ac" => "FULL COURSE",
            "img" => "assets/img/CinderCarla.webp",
            "desc" => "The enigmatic leader of RaD, 'Cinder' Carla is known for her cunning and resourcefulness. Her AC, HAL 826, is heavily customized for versatility and survivability, featuring powerful energy weapons and advanced defensive systems."
        ],
        [
            "name" => "\"Chatty\" Stick",
            "ac" => "CIRCUS",
            "img" => "assets/img/ChattyStick.webp",
            "desc" => "Carla's loyal right hand, 'Chatty' Stick, is a skilled pilot and mechanic. His AC, MELANDER C3, is equipped for support and reconnaissance, boasting high mobility and a suite of sensors to assist the RaD team."
        ],
        [
            "name" => "\"Honest\" Brute",
            "ac" => "MILK TOOTH",
            "img" => "assets/img/HonestBrute.webp",
            "desc" => "'Honest' Brute lives up to his name with a direct and aggressive fighting style. His AC, HC-3000: WRECKER, is a heavily armored juggernaut, designed to absorb punishment and deliver devastating close-range attacks."
        ],
        [
            "name" => "\"Invincible\" Rummy",
            "ac" => "MAD STOMP",
            "img" => "assets/img/InvincibleRummy.webp",
            "desc" => "Known for his bravado and resilience, 'Invincible' Rummy pilots a VP-424 AC built for endurance and sustained combat. His machine features reinforced armor and reliable weaponry, making him a tough opponent to bring down."
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
    renderFactionNav($factions, "RaD");
    ?>
    <main>
        <?php renderACShowcase($pilots[0]); ?>
    </main>
    <footer>
        <a href="./index.php" class="home-btn">Back to Home</a>
    </footer>
    <script>
    const pilots = <?php echo json_encode($pilots); ?>;
    </script>
    <script src="assets/js/cyclePilot.js"></script>
</body>
</html>