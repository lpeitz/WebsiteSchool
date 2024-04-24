<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Website/Style/stlye.css">
    <title>Login</title>
</head>
<body>
    
        <div class="container">
            <div class="box form-box">
                <header>Login</header>
                <form action="" method="post">

                    <div class="field input">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="name">Password</label> 
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="links">
                        Don't have an account? <a href="register.html">Sign Up</a>
                    </div>
                 </form>
            </div>
        </div>
</body>
</html>