<?php 
require_once '../../src/Koneksi.php';

if(isset($_POST["register"])){
    if(register($_POST) > 0){
        echo "<script>alert('Registrasi Berhasil');location='Login.php'</script>";
    } else {
        echo mysqli_error($conn);
        echo "<script>alert('Registrasi Gagal');</script>";
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
    style="height:90vh; background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
    class="bg-cover bg-center bg-no-repeat overflow-hidden">

    <div
        class="container mt-20 p-5 mx-auto w-96 h-fit bg-white-600 rounded-xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 shadow-[0_0_40px_rgba(8,7,16,0.6)] border border-[rgba(255,255,255,0.1)]">
        <p class="text-xs font-poppins text-white "><a href="../">< Back</a></p>
        <h2 class=" text-center text-white font-poppins text-2xl mt-2 pb-3">Create New Account</h2>


        <form class="max-w-md mx-auto" action="" method="post">
            <div class="mb-5">
                <label for="disname" class="block mb-2 text-sm font-poppins text-white">Your
                    display name</label>
                <input type="text" id="disname" name="disname"
                    class="bg-transparent border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] text-white text-sm rounded-md focus:outline-none focus:ring focus:border-none block w-full p-2.5 placeholder-red-900"
                    placeholder="Agung Merah" required>
            </div>
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-poppins text-white">Your
                    username</label>
                <input type="text" id="username" name="username"
                    class="bg-transparent border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] text-white text-sm rounded-md focus:outline-none focus:ring focus:border-none block w-full p-2.5 placeholder-red-900"
                    placeholder="Agung Anjay" required>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-poppins text-white">Your
                    password</label>
                <input type="password" id="password" name="password"
                    class="bg-transparent border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] text-white text-sm rounded-md focus:outline-none focus:ring focus:border-none block w-full p-2.5 placeholder-red-900"
                    placeholder="Agung123" required>
            </div>
            <div class="mb-5">
                <label for="passwordVer" class="block mb-2 text-sm font-poppins text-white">Confirm your
                    password</label>
                <input type="password" id="passwordVer" name="passwordVer"
                    class="bg-transparent border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] text-white text-sm rounded-md focus:outline-none focus:ring focus:border-none block w-full p-2.5 placeholder-red-900"
                    placeholder="Agung123" required>
            </div>
            <div class="text-center">
                <button type="submit" name="register"
                    class="text-white border border-[rgba(255,255,255,0.1)] shadow-[0_0_5px_rgba(8,7,16,0.6)] bg-transparent hover:bg-[#0000002c] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-80 px-5 py-2.5">Submit</button>
            </div>
            <p class="text-xs font-poppins mt-2 text-center text-white">Already have an account? <a
                    class="text-blue-400" href="Login.php">Sign In</a></p>
        </form>

    </div>
</body>

</html>