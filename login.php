<?php
session_start();
if(isset($_POST["login"])){
    include_once ("koneksi.php");

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = '$role'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        $_SESSION["id_user"] = $user["id_user"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];

    if($user["role"] == "admin"){
        header("Location: dashboard_admin.php");
    }   else    {
        header("Location: dashboard_kasir.php");
    }
        exit;
    }   else    {
        $error = "Username atau Password salah!";
        echo "<script>alert('$error'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Kasir Mini</h2>
    <form method="post">
        <label>Username :</label>
        <input type="text" id="username" name="username">
        <label>Password</label>
        <input type="password" id="password" name="password">
        <button type="submit" name="login">Login</button>
        <label>Role :</label>
        <select name="role">
        <option value="kasir">Kasir</option>
        <option value="admin">Admin</option>
        </select>
    </form>
</body>
</html>