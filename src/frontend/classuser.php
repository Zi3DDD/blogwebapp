<?php


class User {


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
  // beginning query function 

function query($sql, $data=null):void{
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
    }
    // ending query function


    //registration user   


  function filter_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}
    
function register($user_email,$user_password,$role_id ,$user_nickname){
$hash_password =  password_hash($user_password, PASSWORD_DEFAULT);


                    //INSERT INTO blog(titel, text, header_image_id, categorie)
$stmt = $this->pdo->prepare('INSERT INTO gebruiker (user_email, user_password, role_id , user_nickname ) VALUES (?, ?, ? , ?)');
        $stmt->bindParam(1, $user_email);
        $stmt->bindParam(2, $hash_password);
        $stmt->bindParam(3, $role_id);
        $stmt->bindParam(4, $user_nickname);
        $stmt->execute();


  


}
















// begining login function
function login ($email, $password){
    $this->query("SELECT * FROM `users` JOIN `roles` USING (`role_id`) WHERE `user_email`=?", [$email]);
    $user = $this->stmt->fetch();
    $valid = is_array($user);
  if($valid){
          //$valid = $password == $user["user_password"];
     if(password_verify($password, $user["user_password"])){
         $user["permissions"] = [];
         $this->query(
         "SELECT * FROM `roles_permissions` r
         LEFT JOIN `permissions` p USING (`perm_id`)
         WHERE r.`role_id`=?", [$user["role_id"]]
         );

  while( $r = $this->stmt->fetch()){
        if (!isset($user["permissions"][$r["perm_mod"]])){
            $user["permissions"][$r["perm_mod"]]  = [];

        }
        $user["permissions"][$r["perm_mod"]] [] = $r["perm_id"];
      }


  $_SESSION["user"] = $user;
  unset($_SESSION["user"]["user_password"]);
  $this->get();
}else{
      echo "this is not working";
      return false;
     }
    }   


   if (!$valid) {
      $this->error = "Invalid email/password";
      return false ;
    } 


}// end login function

function check ($module, $perm) {
  $valid = isset($_SESSION["user"]);
  if ($valid) { $valid = in_array($perm, $_SESSION["user"]["permissions"][$module]); }
  if ($valid) { return true;
  }
  else { $this->error = "No permission to access."; return false; }
}

  
  
function get () {
if ($this->check("USR", 2) == true) { 
  header('Location: dashboard_admin.php');
}
elseif ($this->check("USR", 1) == true) {
header('Location: dashboard.php');
}  

}
 }

/* end of class */
 


define("DB_HOST", "mysql_db1");
define("DB_NAME", "db_blog");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
$_User = new User();


