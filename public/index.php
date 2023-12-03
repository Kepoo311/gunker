<?php
$cr = false;
$login = false;
session_start();

if (isset($_SESSION["login"])) {
    $login = true;
}

if (isset($_POST["main"])) {
    header("Location: game.php");
}

if (isset($_POST["main2"])) {
    header("Location: game2.php");
}

if (isset($_POST["credit"])) {
    $cr = true;
}

if (isset($_POST["back"])) {
    $cr = false;
}

if (isset($_POST["login"])) {
    header("Location: ./loginStuff/Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaboet Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                    nova: ['Nova Square', 'sans-serif']
                },
            }
        }
    }
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap">
</head>

<body style="background-image: url('./img/background.png');" class="bg-cover bg-center bg-no-repeat">
    <div class="grid lg:grid-cols-1 xl:grid-cols-2 gap-4 mt-10">

        <div class="animate-[pulse_1s_linear] hover:animate-bounce justify-center items-center flex">
            <img class="h-auto w-[400px] md:w-[400px] xl:w-[600px]" src="./img/logo.png" alt="">
        </div>

        <div
            class="animate-[pulse_1s_linear] mt-20 p-5 mx-auto h-[400px] w-auto md:h-[500px] rounded-[55%_45%_47%_53%_/_35%_68%_32%_65%] shadow-[0_0_40px_rgba(8,7,16,0.6)] text-center bg-[rgba(255,255,255,0.10)] bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-[rgba(255,255,255,0.1)]">
            <?php if (!$cr): ?>
            <h1 class="text-3xl font-bold font-poppins m-5 mt-[10%] md:mt-[20%] p-5 text-white">Gunting Batu Kertas Games!!</h1>
            <form class="mt-7" action="" method="post">
                <button class="rounded-lg w-44 h-10 text-white bg-[rgba(105,100,252)] hover:bg-[#4842f3]" type="submit"
                    name="main">Main! (V1)</button>
                <button class="rounded-lg w-44 h-10 text-white bg-[rgba(105,100,252)] hover:bg-[#4842f3]" type="submit"
                    name="main2">Main! (V2)</button>
                <br>
                <?php if (!$login): ?>
                <button class="rounded-lg mt-1 w-44 h-10 text-white bg-[rgba(105,100,252)] hover:bg-[#4842f3]" type="submit"
                    name="login">Sign In?</button>
                <?php endif; ?>
                <button class="rounded-lg mt-1 w-44 h-10 text-white bg-[rgba(105,100,252)] hover:bg-[#4842f3]" type="submit"
                    name="credit">Credit</button>
            </form>
            <?php if ($login): ?>
            <a href="./loginStuff/Logout.php"><button
                    class="rounded-lg mt-1 w-44 h-10 text-white bg-[rgba(105,100,252)] hover:bg-[#4842f3]" type="submit"
                    name="credit">Log Out</button></a>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="text-3xl font-bold m-5 p-5 text-white font-poppins">Credit</h1>
            <ul>
                <li>
                    <a class="text-white font-poppins" href="#">Tiktok: trusttactic</a>
                </li>
                <li>
                    <a class="text-white font-poppins" href="#">Youtube: trusttactic</a>
                </li>
                <li>
                    <a class="text-white font-poppins" href="#">Instagram: Andravlz</a>
                </li>
                <li>
                    <a class="text-white font-poppins" href="#">Github; Kepoo311</a>
                </li>
            </ul>
            <form class="mt-14" action="" method="post">
                <button class="rounded-lg w-44 h-10 text-white bg-[rgba(105,100,252)] hover:bg-[#4842f3]" type="submit"
                    name="back">Balik Gasih?</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>