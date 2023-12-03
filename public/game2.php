<?php

require "../src/Koneksi.php";

session_start();
$emot = ["✌️", "🤜", "🫱"];
$random = $emot[rand(0, 2)];
$tie = false;
$win = false;
$lose = false;
$hide = false;
$salahinput = false;

if (!isset($_SESSION['scbot'])) {
    $_SESSION['scbot'] = 0;
}

if (!isset($_SESSION['scplyr'])) {
    $_SESSION['scplyr'] = 0;
}

if (!isset($_SESSION['ws'])) {
    $_SESSION['ws'] = 0;
}

if(isset($_POST["back"])){
    $_SESSION['scbot'] = 0;
    $_SESSION['scplyr'] = 0;
    header("Location: index.php");
}

if (isset($_POST["gunting"])) {
    $input = "✌️";
} elseif (isset($_POST["batu"])) {
    $input = "🤜";
} elseif (isset($_POST["kertas"])) {
    $input = "🫱";
}

if (isset($input)) {
    if ($input == $random) {
        $tie = true;
    } else if ($input == "✌️" && $random == "🤜") {
        $lose = true;
        $_SESSION['scbot']++;
    } else if ($input == "✌️" && $random == "🫱") {
        $win = true;
        $_SESSION['scplyr']++;
    } else if ($input == "🤜" && $random == "🫱") {
        $lose = true;
        $_SESSION['scbot']++;
    } else if ($input == "🤜" && $random == "✌️") {
        $win = true;
        $_SESSION['scplyr']++;
    } else if ($input == "🫱" && $random == "✌️") {
        $lose = true;
        $_SESSION['scbot']++;
    } else if ($input == "🫱" && $random == "🤜") {
        $win = true;
        $_SESSION['scplyr']++;
    } else if (!in_array($input, $emot)) {
        $salahinput = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaboet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-image: url('./img/BGG.png');" class="bg-cover bg-no-repeat h-full">
    <div class="mt-52">
    <h1 class="text-3xl font-bold text-white text-center mt-3 cursor-grab hover:underline">Gunting Batu Kertas!</h1>

    <div class="container mt-5 mx-auto text-center bg-red-400 w-52 text-white">
        <p>Score </p>
        <p>Bot :
            <?= $_SESSION['scbot'] ?> | You :
            <?= $_SESSION['scplyr'] ?> | WS :
            <?= $_SESSION['ws'] ?> Kali!
        </p>
    </div>

    <?php if($salahinput): ?>
    <div class="container mx-auto mt-5 pt-4 text-center bg-red-800 w-72 h-14 justify-center">
        <p class="text-white"><strong>Hei Kamu!</strong> input yang sesuai dong!</p>
    </div>
    <?php endif; ?>

    <?php if ($win): ?>
        <div class="container mt-5 w-36 mx-auto text-center bg-green-500">
            <p class="font-medium ">
                You:
                <?= $input ?>
                |
                Bot:
                <?= $random ?>
            </p>
            <p class="text-green-900 font-bold text-lg">You Win!!</p>
        </div>
    <?php endif; ?>
    <?php if ($lose): ?>
        <div class="container mt-5 w-36 mx-auto text-center bg-red-500">
            <p class="font-medium ">
                You:
                <?= $input ?>
                |
                Bot:
                <?= $random ?>
            </p>
            <p class="text-red-900 font-bold text-lg">You Lose!!</p>
        </div>
    <?php endif; ?>
    <?php if ($tie): ?>
        <div class="container mt-5 w-36 mx-auto text-center bg-gray-500">
            <p class="font-medium ">
                You:
                <?= $input ?>
                |
                Bot:
                <?= $random ?>
            </p>
            <p class="text-gray-900 font-bold text-lg">You Tie!!</p>
        </div>
    <?php endif; ?>

    <?php if ($_SESSION['scbot'] >= 3): ?>
        <?php $hide = true; ?>
        <div class="container mx-auto justify-center text-center">
            <h1 class="mt-5 text-3xl font-bold text-red-600">KAMU KALAH KIDS!!!</h1>
            <form action="" method="post">
                <button class="w-20 h-10 rounded-3xl mt-3 bg-red-600 text-white font-medium hover:bg-red-800" type="button"
                    onclick="resetGame()">Reset</button>
            </form>
        </div>
        <?php
        $_SESSION['ws'] = 0;
        $_SESSION['scbot'] = 0;
        $_SESSION['scplyr'] = 0;
        ?>
    <?php endif; ?>
    <?php if ($_SESSION['scplyr'] >= 3): ?>
        <?php $hide = true; ?>
        <div class="container mx-auto justify-center text-center">
            <h1 class="mt-5 text-3xl font-bold text-green-600">KAMU MENANG BROOOO!!!</h1>
            <form action="" method="post">
                <button class="w-20 h-10 rounded-3xl mt-3 bg-green-600 text-white font-medium hover:bg-green-800"
                    type="button" onclick="resetGame()">Reset</button>
            </form>
        </div>
        <?php
        $_SESSION['ws']++;
        $_SESSION['scbot'] = 0;
        $_SESSION['scplyr'] = 0;
        ?>
    <?php endif; ?>

    <?php if (!$hide): ?>
        <form class="text-center items-center justify-center" action="" method="post">
            <button class="bg-white w-20 h-20 py-2 px-4 rounded-full mt-3 shadow-[rgba(6,_24,_44,_0.4)_0px_0px_0px_2px,_rgba(6,_24,_44,_0.65)_0px_4px_6px_-1px,_rgba(255,_255,_255,_0.08)_0px_1px_0px_inset] hover:bg-gray-200" name="gunting"><i class="fa-regular fa-hand-scissors fa-flip-horizontal fa-2xl"></i></button>
            <button class="bg-white w-20 h-20 py-2 px-4 rounded-full mt-3 shadow-[rgba(6,_24,_44,_0.4)_0px_0px_0px_2px,_rgba(6,_24,_44,_0.65)_0px_4px_6px_-1px,_rgba(255,_255,_255,_0.08)_0px_1px_0px_inset] hover:bg-gray-200 m-3" name="batu" ><i class="fa-regular fa-hand-back-fist fa-2xl"></i></button>
            <button class="bg-white w-20 h-20 py-2 px-4 rounded-full mt-3 shadow-[rgba(6,_24,_44,_0.4)_0px_0px_0px_2px,_rgba(6,_24,_44,_0.65)_0px_4px_6px_-1px,_rgba(255,_255,_255,_0.08)_0px_1px_0px_inset] hover:bg-gray-200" name="kertas" ><i class="fa-regular fa-hand fa-2xl"></i></button>
            <br>
            <button class="w-20 h-10 rounded-3xl mt-3 bg-red-600 text-white font-medium hover:bg-red-800" type="submit"
                name="back">Exit</button>
        </form>
    <?php endif; ?>
</body>
</div>


<script src="https://kit.fontawesome.com/65fd5af23f.js" crossorigin="anonymous"></script>
<script>
    // JavaScript function to reset the game and reload the page
    function resetGame() {
        // Use window.location to navigate to the same page
        window.location.href = window.location.href;
    }
</script>

</html>