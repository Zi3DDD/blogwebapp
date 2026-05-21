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

function readBlog(){

        $stmt = $this->pdo->prepare("SELECT blog.id, blog.titel , blog.text , image.filename , blog.created_at , blog.categorie ,

        image.url FROM blog INNER JOIN image

        ON blog.header_image_id = image.image_id");
        $stmt->execute();
         // $valid = is_array($user);
       
        // print_r($user)."<br />\n";
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        

          
        
}

function updateBlog( $id ,$title,$text,$filename,$file_path,$category){

       $stmt = $this->pdo->prepare("SELECT * FROM image WHERE filename = ?");
       $stmt->bindParam(1, $filename);
       $stmt->execute();
       if($row = $stmt->fetch()){
       $exsisting_image_id = $row['image_id'];

      
      $this->pdo->beginTransaction();
      $stmt2 = $this->pdo->prepare('UPDATE blog 
      SET titel = ?, text = ?, header_image_id = ? , categorie = ?
      WHERE id = ?') ; 
      $stmt2->bindParam(1, $title);
      $stmt2->bindParam(2, $text);
      $stmt2->bindParam(3, $exsisting_image_id);
      $stmt2->bindParam(4, $category);
      $stmt2->bindParam(5, $id);
      $stmt2->execute();
      $this->pdo->commit(); 




}else{
 $stmt1 = $this->pdo->prepare('INSERT INTO image(filename, url )  VALUES( ? ,?) ') ;  
        $stmt1->bindParam(1, $filename);
        $stmt1->bindParam(2, $file_path);
        $stmt1->execute();
        $last_id = $this->pdo->lastInsertId();
        


        $this->pdo->beginTransaction();
        $stmt2 = $this->pdo->prepare('UPDATE blog 
     SET titel = ?, text = ?, header_image_id = ? , categorie = ?
     WHERE id = ?') ; 
        $stmt2->bindParam(1, $title);
        $stmt2->bindParam(2, $text);
        $stmt2->bindParam(3, $last_id);
        $stmt2->bindParam(4, $category);
        $stmt2->bindParam(5, $id);
        $stmt2->execute();
        $this->pdo->commit();  

}

      
    
       


}

function readUpdate($id){
  $stmt = $this->pdo->prepare("SELECT * FROM blog WHERE id = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

}





function deleteBlog($id){
   $this->pdo->beginTransaction();

  $stmt = $this->pdo->prepare("SELECT header_image_id FROM blog WHERE id = ?");
  $stmt->bindParam(1, $id);
  $stmt->execute();
  $header_image_id = $stmt->fetchColumn();

  $stmt2 = $this->pdo->prepare("DELETE FROM blog WHERE id = ?");
  $stmt2->bindParam(1, $id);
  $stmt2->execute();

  $stmt1= $this->pdo->prepare("DELETE FROM image WHERE image_id = ?");
  $stmt1->bindParam(1, $header_image_id);
  $stmt1->execute();
  $this->pdo->commit();

}
       }
//end read */

//end classhi


define("DB_HOST", "mysql_db1");
define("DB_NAME", "db_blog");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
$_Blog = new Blog();













?>