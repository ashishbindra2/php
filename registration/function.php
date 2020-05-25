
<?php
// list of  id 
function selectID($email){
  global $conn;
  $statement = $conn->prepare("SELECT * FROM registration WHERE email = '$email'");        
  $statement->execute();
$ro =$statement->fetch();
   if (isset($ro)) {
            return $ro;
        } else {
            return false;
        }
}
function findUserByPhone($mobile){
    global $conn;
    $statement = $conn->prepare('SELECT * FROM registration WHERE mobile = "'.$mobile .'"');        
       $statement->execute();
       $ro =$statement->fetchAll();
       return $ro ;
   if (isset($ro)) {
            return $ro;
        } else {
            return false;
        }
  }
  function findByPhone($mobile,$phone){
    global $conn;
    $statement = $conn->prepare("SELECT * FROM registration WHERE mobile = :mobile AND mobile != :phone");        
           $statement->bindParam(':mobile',$mobile);
    $statement->bindParam(':phone',$phone);
       $statement->execute();
       $ro =$statement->fetchAll();
       return $ro ;
   if (isset($ro)) {
            return $ro;
        } else {
            return false;
        }
  }
  // Find user by email
   function findUserByEmail($email)
    {
        global $conn;
    $statement = $conn->prepare('SELECT * FROM registration WHERE email = "'.$email.'"');        
       $statement->execute();
       $ro =$statement->fetchAll();
       return $ro ;
   if (isset($ro)) {
            return $ro;
        } else {
            return false;
        }
    }
      // Find user by email
   function findByEmail($email,$id)
    {
        global $conn;
    $statement = $conn->prepare("SELECT * FROM  registration WHERE email = :email AND email != :id"); 
    $statement->bindParam(':email',$email);
    $statement->bindParam(':id',$id);
       $statement->execute();
       $ro =$statement->fetch();
       return $ro ;
   if (isset($ro)) {
            return $ro;
        } else {
            return false;
        }
    }

// to edit the register user
function editUser($id){
   global $conn;
  $statement = $conn->prepare("SELECT * FROM registration WHERE rid = '$id'");        
  $statement->execute();
  $ro = $statement->fetch();
  return $ro;
}
// list of registered user
function selectAll(){
  global $conn;
  $statement = $conn->prepare("SELECT * FROM registration order by rid DESC ");
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
}

// helps to delete user
function deleteUser($id){
   global $conn;
 $sql= "DELETE FROM registration WHERE rid = '$id'";        
 $s=$conn->exec($sql);
 if ($s) {
  header('location:home.php');
}
}
// help to update details
function updateData($data)
{
   global $conn;
  $statement = $conn->prepare('UPDATE registration SET name = :name,email = :email,mobile = :mobile,choose = :choose,comment =  :comment,university = :uni,details = :detail,password = :pass,status = :statu Where rid = :rid' );

  return $statement->execute([
      'rid' => $data['rid'],
    'name' => $data['name'],
    'email' => $data['email'],
    'mobile' => $data["mobile"],
    'choose' => $data['chosse'],
    'comment' => $data['comment'],
    'uni' => $data['uni'],
    'detail' => $data['details'],
    'pass' => $data['password'],
    'statu'=>$data['statu']
  ]);

}
// registration function
function insertData($data)
{
   global $conn;
  $statement = $conn->prepare('INSERT INTO registration (name,email,mobile,choose,comment,university,details,password)
    VALUES (:name, :email, :mobile, :choose, :comment, :uni, :detail, :pass)');

  return $statement->execute([
    'name' => $data['name'],
    'email' => $data['email'],
    'mobile' => $data['mobile'],
    'choose' => $data['chosse'],
    'comment' => $data['comment'],
    'uni' => $data['uni'],
    'detail' => $data['details'],
    'pass' => $data['password']
  ]);

}
// trim function

function rim($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 // Load view
function view($view, $data = [])
{
    // Check for view file
  if (file_exists('./' . $view . '.php')) {
    require_once './' . $view . '.php';
  } else {
      // View does not exist
     die('View does not exist');
  }
}
?>