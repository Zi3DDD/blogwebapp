<?php
require('classblog.php');

  if(isset($_POST["safe"])){    

    
    $filename = $_FILES['foto']['name'];
    $file_path = 'uploads/' . $filename;
    $title =  $_POST["title"];
    $text =  $_POST["text"];
 echo $title. $text;
 move_uploaded_file($_FILES['foto']['tmp_name'], __DIR__ . $file_path);
 /*
$_Blog->createBlog($title,$text,$filename,$file_path) ? "OK" : $_Blog->error;
 $data1 = $_Blog->readBlog()? "OK" : $_Blog->error;



 /*

$host = "mysql_db";
$db   = "mydatabase";
$user = "user";
$pass = "password";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Verbonden! banaan ". " <br />";
} catch (PDOException $e) {
   
    die("❌ Connectie mislukt: " . $e->getMessage());
}


$pdo->beginTransaction();
$stmt = $pdo->prepare('INSERT INTO header_image(filename, url )  VALUES( ? ,?) ') ;  
$stmt->bindParam(1, $filename);
$stmt->bindParam(2, $file_path);
$stmt->execute();
$last_id = $pdo->lastInsertId();
$pdo->commit();
echo $last_id;

$pdo->beginTransaction();
$stmt1 = $pdo->prepare('INSERT INTO blog_content(titel, text,user_id, header_image_id)  VALUES( ? ,?,?,?)') ; 
$stmt1->bindParam(1, $title);
$stmt1->bindParam(2, $text);
$stmt1->bindParam(3, $last_id);
$stmt1->bindParam(4, $last_id);
//$stmt->bindParam(3, $text);
$stmt1->execute();
$pdo->commit();


$pdo->beginTransaction();
$stmt3 = $pdo->prepare("SELECT blog_content.titel , blog_content.text , header_image.filename , 
header_image.url FROM blog_content INNER JOIN header_image 
ON blog_content.header_image_id = header_image.header_id");

$stmt3->execute();
$user = $stmt3->fetchAll();
$valid = is_array($user);
$pdo->commit();
print_r($user)."<br />\n";

$data = $user;
// and somewhere later:

foreach ($data as $row) {
    echo $row['titel'].$row['text'].$row['filename']."<br />\n";
}

/*

 SELECT blog_content.titel , blog_content.text , header_image.filename , header_image.url FROM blog_content INNER JOIN header_image ON blog_content.header_image_id = header_image.header_id
FROM Customers
LEFT JOIN Orders

SELECT blog_content.titel, blog_content.text, 
FROM posts
INNER JOIN categories 
ON posts.category_id = categories.id; */

}












/*
SELECT blog_content.titel , blog_content.text , header_image.id
FROM Customers
LEFT JOIN Orders
ON Customers.CustomerID=Orders.CustomerID
ORDER BY Customers.CustomerName;
127.0.0.



Select p.ProductName, pu.Purchased, s.Sold
From Products p 
INNER JOIN Purchase pu on p.ProductID = pu.ProductID
INNER JOIN Sale s on s.ProductID = p.ProductID

CREATE TABLE blog_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(255) NOT NULL,
    text TEXT NOT NULL,
    user_id INT NOT NULL,
    header_image_id INT,
    categorie VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (header_image_id) REFERENCES header_image(header_id)
);*/