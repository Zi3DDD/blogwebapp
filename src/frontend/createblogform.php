<?php
?>


<html>


<head>
<link rel="stylesheet" href="styles/createblog.css">
</head>
    
<body>

<nav>
    <img src="images/logo.png" alt="logo vacantie blog">

   
        <ul>
        <li><a href="contact.asp">Username</a></li>
        <li><button type="submit">Loguit</button></li>
        </ul>

</nav>


 <form action="editblog.php" enctype="multipart/form-data" method="post">
     <br>
     <input placeholder="Title"  class="input" type="text" name="title">
      <br>
     <input type="file"  name="foto" />
     <br>
     <textarea  name="text" rows="10" cols="50">Begin you story here</textarea>
    <br>
     <button type="submit">Aanmaken</button>
</form>
</body>





<html>
