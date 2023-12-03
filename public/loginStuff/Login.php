<?php
require_once '../../src/Koneksi.php';
session_start();
$fail = false;
$succes = false;

if (isset($_COOKIE['hanjays']) && isset($_COOKIE['goksas'])) {
    $key = $_COOKIE["goksas"];
    $id = $_COOKIE["hanjays"];

    //ambil user dan id dari db
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = '$id' ");
    $row = mysqli_fetch_assoc($result);

    //cek key
    if ($key === hash("xxh3", $row["username"])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
}

if (isset($_POST['login'])) {
    if (login($_POST) > 0) {
        $succes = true;
        sleep(3);
        header("Location: ../");
    } else {
        $fail = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Der?</title>
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

<body
    style="background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height:90vh;"
    class="bg-cover bg-center bg-no-repeat overflow-hidden">


    <div class="mt-20 mb-0 flex text-center justify-center">
        <?php if($succes): ?>
        <div class="p-4 text-sm text-[rgb(124,252,0)] bg-black rounded-lg"
            role="alert">
            <span class="font-medium">Success Login!</span> Rederecting in 3 Second!
        </div>
        <?php endif; ?>
        <?php if($fail): ?>
        <div class="p-4 text-sm text-[rgb(255,0,0)] bg-black rounded-lg"
            role="alert">
            <span class="font-medium">Login Failed!</span> Username/Password Salah!
        </div>
        <?php endif; ?>
    </div>
    <div
        class="container mt-5 p-5 mx-auto w-96 h-fit bg-white-600 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 shadow-[0_0_40px_rgba(8,7,16,0.6)] border border-[rgba(255,255,255,0.1)]">
        <p class="text-xs font-poppins text-white "><a href="../">
                < Back</a>
        </p>
        <h2 class=" text-center text-white font-poppins text-2xl mt-2 pb-3">Sign In</h2>


        <form class="max-w-md mx-auto" action="" method="post">
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-poppins text-gray-900 dark:text-white">Your
                    username</label>
                <input type="text" id="username" name="username"
                    class="bg-transparent border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] text-gray-900 text-sm rounded-md focus:outline-none focus:ring focus:border-none block w-full p-2.5 placeholder-red-900"
                    placeholder="Agung Merah" required>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-poppins text-gray-900 dark:text-white">Your
                    password</label>
                <input type="password" id="password" name="password"
                    class="bg-transparent border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] text-gray-900 text-sm rounded-md focus:outline-none focus:ring focus:border-none block w-full p-2.5 placeholder-red-900"
                    placeholder="Agung123" required>
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" name="remember"
                        class="w-4 h-4 rounded bg-transparent focus:ring-3 focus:ring-blue-300">
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-white">Remember
                    me</label>
            </div>
            <div class="text-center">
                <button type="submit" name="login"
                    class="text-white border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] bg-transparent hover:bg-[#0000002c] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-80 px-5 py-2.5">Sign
                    In</button>
            </div>
            <p class="text-xs font-poppins mt-2 text-center text-white">Don't have an account? <a class="text-red-600"
                    href="Register.php">Sign Up</a></p>
        </form>

    </div>
</body>

</html>