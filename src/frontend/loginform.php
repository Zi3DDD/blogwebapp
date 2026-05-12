<html>
    <head>
        <link rel="stylesheet" href="styles/form.css">
    </head>



<body>
<nav>
    <img src="images/logo.png" alt="logo vacantie blog">

   
        <ul>
        <li><a href="default.asp">Home</a></li>
        <li><a href="news.asp">News</a></li>
        <li><a href="contact.asp">Contact</a></li>
        <li><a href="about.asp">About</a></li>
        </ul>

</nav>

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