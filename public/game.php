<?php
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

if(isset($_POST["back"])){
    session_destroy();
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $input = $_POST["input"];
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
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1 class="text-3xl font-bold text-blue-500 text-center mt-3 cursor-grab hover:underline">Gunting Batu Kertas!</h1>

    <div class="container mt-5 mx-auto text-center bg-red-400 w-36 text-white">
        <p>Score </p>
        <p>Bot :
            <?= $_SESSION['scbot'] ?> | You :
            <?= $_SESSION['scplyr'] ?>
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
        $_SESSION['scbot'] = 0;
        $_SESSION['scplyr'] = 0;
        ?>
    <?php endif; ?>

    <?php if (!$hide): ?>
        <form class="flex flex-col items-center justify-center" action="" method="post">
            <input class="h-10 mt-5 bg-white border border-black rounded-2xl focus:border-blue-600 focus:ring-blue-500"
                type="text" name="input" placeholder="Input :🤜/🫱/✌️">
            <button class="w-20 h-10 rounded-3xl mt-3 bg-blue-600 text-white font-medium hover:bg-blue-800" type="submit"
                name="submit">Gasssss</button>
            <button class="w-20 h-10 rounded-3xl mt-3 bg-red-600 text-white font-medium hover:bg-red-800" type="submit"
                name="back">Exit</button>
        </form>
    <?php endif; ?>
</body>

<script>
    // JavaScript function to reset the game and reload the page
    function resetGame() {
        // Use window.location to navigate to the same page
        window.location.href = window.location.href;
    }
</script>

</html>