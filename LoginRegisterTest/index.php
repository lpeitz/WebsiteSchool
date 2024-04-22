<?php

session_start();

if (isset($_SESSION["user_id"]))
    {
        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/missing.css">
    <title>Home</title>
</head>
<body>
    <div class="head">
        <h1>Home</h1>
            
            <div class="topbar">
                <?php if (isset($user)): ?>
                    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
                    <p><a href="logout.php">Logout</a></p>
                <?php else: ?>
            </div>    
            
            <div class="notlogedin">
                    <p><a href="login.php">Login</a> or <a href="signup.html">Register</a></p>
                <?php endif; ?>
            </div>    
    </div> 


</body>
</html>