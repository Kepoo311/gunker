<?php
$cr = false;

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaboet Project</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container mt-20 p-5 mx-auto w-fit h-96 border border-black rounded-3xl shadow-[5px_5px_0px_0px_rgba(109,40,217)] text-center">
        <?php if (!$cr): ?>
            <h1 class="text-3xl font-bold m-5 p-5">Gunting Batu Kertas Games!!</h1>
            <form class="mt-14" action="" method="post">
                <button class="rounded-lg w-44 h-10 text-white bg-emerald-600 hover:bg-emerald-700" type="submit"
                    name="main">Main! (V1)</button>
                <button class="rounded-lg w-44 h-10 text-white bg-emerald-600 hover:bg-emerald-700" type="submit"
                    name="main2">Main! (V2)</button>
                <br>
                <button class="rounded-lg mt-1 w-44 h-10 text-white bg-emerald-600 hover:bg-emerald-700" type="submit"
                    name="credit">Credit</button>
            </form>
        <?php else: ?>
            <h1 class="text-3xl font-bold m-5 p-5">Credit</h1>
            <ul>
                <li>
                    <a href="#">Tiktok: trusttactic</a>
                </li>
                <li>
                    <a href="#">Youtube: trusttactic</a>
                </li>
                <li>
                    <a href="#">Instagram: Andravlz</a>
                </li>
                <li>
                    <a href="#">Github; Kepoo311</a>
                </li>
            </ul>
            <form class="mt-14" action="" method="post">
                <button class="rounded-lg w-44 h-10 text-white bg-emerald-600 hover:bg-emerald-700" type="submit"
                    name="back">Balik Gasih?</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>