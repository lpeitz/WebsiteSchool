<?php

$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user)
    {
        if (password_verify($_POST["password"], $user["password_hash"]))
            {
                session_start();

                session_regenerate_id();
                
                $_SESSION["user_id"] = $user["id"];

                header("Location: index.php");
                exit;
            }
    }
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/missing.css">
    <title>Login</title>
</head>

    <body>
        
   

        <div class="container">
            <div class="form-box login">
            <h2>Login</h2>
            <?php if ($is_invalid): ?>
                <em>Invalid login</em>
            <?php endif; ?>
                <form method="post">
                    <label for="email">E-Mail</label>
                    <input type="email" name="email" id="email"
                           value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">

                    <button> Log in</button>
    
                </form>
            </div>
        </div>
    </body>
</html>
