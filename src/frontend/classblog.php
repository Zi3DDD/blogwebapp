<?php
class Blog {


  // (A) CONSTRUCTOR - CONNECT TO THE DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error;

  //  connection 
  function __construct () {
      $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "it worked";
  }


  // beginning connection destruction
function __destruct(){
    if($this->stmt !== null){
        $this->stmt = null;
    }
    if ($this->pdo !== null){
        $this->pdo = null;
    }
}
  //Insert a blog in to the blog table 

function createBlog($title,$text,$filename,$file_path,$category){
        
        $this->pdo->beginTransaction();
        $stmt = $this->pdo->prepare('INSERT INTO image(filename, url )  VALUES( ? ,?) ') ;  
        $stmt->bindParam(1, $filename);
        $stmt->bindParam(2, $file_path);
        $stmt->execute();
        $last_id = $this->pdo->lastInsertId();
        $this->pdo->commit();

        $this->pdo->beginTransaction();
        $stmt1 = $this->pdo->prepare('INSERT INTO blog(titel, text, header_image_id, categorie)  VALUES( ? ,?,?,?)') ; 
        $stmt1->bindParam(1, $title);
        $stmt1->bindParam(2, $text);
        $stmt1->bindParam(3, $last_id);
        $stmt1->bindParam(4, $category);
        $stmt1->execute();
        $this->pdo->commit();
    } // End create
/*
function readBlog(){

/*
        $this->pdo->beginTransaction();
        $stmt3 = $this->pdo->prepare("SELECT blog_content.titel , blog_content.text , header_image.filename , 
        header_image.url FROM blog_content INNER JOIN header_image 
        ON blog_content.header_image_id = header_image.header_id");
        $stmt3->execute();
        $user = $stmt3->fetchAll();
         // $valid = is_array($user);
        $this->pdo->commit();
        // print_r($user)."<br />\n";
         $data = $user;
        
        

        foreach ($data as $row) {
       echo "titel:  ". $row['titel']."text:".$row['text']."Filename: ".$row['filename']."<br />\n";
}
       }
//end read */

//end class
}


define("DB_HOST", "mysql_db1");
define("DB_NAME", "db_blog");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
$_Blog = new Blog();













?>