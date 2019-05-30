<?php
// INIT - GET GAME INFO
$reload = 2000; // AUTO PAGE RELOAD EVERY X MS
$sawyer_blocks = file('files/sawyer_blocks.txt');
$human_blocks = file('files/human_blocks.txt');
$totals = file('files/totals.txt');
$current_round = $totals[0];
$game_rounds = $totals[1];
$player_score = $totals[3];
$sawyer_score = $totals[5];
$rounds = file('files/rounds.txt');
$speech = file('files/Speech.txt');
?>
<!DOCTYPE html>
<html>

<head>
    <title>BYU SAWYER SCOREBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="public/score_board_css.css" rel="stylesheet">
    <script>
    window.addEventListener("load", function() {
        setTimeout(function() {
            window.location.reload(1);
        }, <?=$reload?>);
    });
    </script>
    <div class="w3-container">
        <header>
            <h1>SAWYER SCOREBOARD</h1>
            <header>
    </div>
    <div class="w3-container">
        <div class="w3-half">
            <div class="w3-quarter">
                <div class="w3-card">
                    <h2>Player Pieces</h2>
                    <div class="w3-container"><?php
foreach ($human_blocks as $s) {
    if (($s == "Human\n") || ($s == "\n")) {
        echo "";
    } else {
        echo "<img src=\"shapes/$s.png\" alt=\"$s\" height=\"45\"><br /><br />\n";
    }
}
?></div>

                </div>
            </div>
            <div class="w3-half">
                <div class="w3-card">
</head>

<body>
    <!-- [SCOREBOARD] -->
    <table id="scoreboard">
        <tr id="round">
            <td colspan="2">
                <div class="scoredark">Round: <?=$current_round?> of <?=$game_rounds?></div>
            </td>
        </tr>
        <tr id="scorenumber">
            <td>
                <div class="scoredark"><?=$player_score?></div>
            </td>
            <td>
                <div class="scoredark"><?=$sawyer_score?></div>
            </td>
        </tr>
        <tr id="scorename">
            <td>
                <div class="scoregrey">Player</div>
            </td>
            <td>
                <div class="scoregrey">Sawyer</div>
            </td>
        </tr>
    </table>
    </div>
    </div>
    <div class="w3-quarter">
        <div class="w3-card">
            <h2>Sawyer Pieces</h2>
            <div class="w3-container">
                <?php
foreach ($sawyer_blocks as $s) {
    if (($s == "Sawyer\n") || ($s == "\n")) {
        echo "";
    } else {
        echo "<img src=\"shapes/$s.png\" alt=\"$s\" height=\"45\"><br /><br />\n";
    }
}
?>
            </div>
        </div>
    </div>
    </div>

    <div class="w3-half">
        <div class="w3-card">
            <section>
                <h1>SPEECH</h1>
            </section>
            <div class="w3-container">
                <div id="scorehistory"><?php
foreach ($speech as $s) {
    printf("" . htmlspecialchars($s) . "<br />\n");
}
?></div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- [HISTORY] -->
    <div class="w3-container">
        <footer>
            <h2>GAME HISTORY</h2>
            <div id="scorehistory"><?php
foreach ($rounds as $r) {
    printf("" . htmlspecialchars($r) . "<br />\n");
}
?></div>
</body>
</footer>
</div>

</html>