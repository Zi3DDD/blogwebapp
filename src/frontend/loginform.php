<html>
    <head>
        <link rel="stylesheet" href="form.css">
    </head>
<body>

<form  class="form"action="register.php" method="post">
    <h1> Register </h1>
 <input placeholder="email"  class="input" type="text" name="email"><br>
 <input placeholder="password"  class="input" type="password" name="password"><br>
<input type="submit">
</form>


<form  class="form" action="login.php" method="post">
        <h1>Login
            </h1>
 <input placeholder="email"  class="input" type="text" name="email"><br>
 <input placeholder="password"  class="input" type="password" name="password"><br>
<input type="submit" name="btn_login" value="login" >
</form>

</body>