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


 <form action="createblog.php" enctype="multipart/form-data" method="post">
     <br>
     <input placeholder="Title"  class="input" type="text" name="title">
      <br>
     <input type="file"  name="foto" />
     <br>
     
        <select id="categorie" name="categorie" value="categorie">
        <option value="Bergen">Bergen</option>
        <option value="Zee">Zee</option>
        <option value="Stad">Stad</option>
        <option value="Bossen">Bossen</option>
        </select>
        <label for="categorie">Kies een caterogie</label>
    <br>
     <textarea  name="text" rows="10" cols="50">Begin you story here</textarea>
    <br>
     <button type="submit" name="safe">Blog aanmaken</button>
</form>
</body>





<html>
