
<?php
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
  $statement = $conn->prepare("SELECT * FROM registration ");
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
  $statement = $conn->prepare('UPDATE registration SET name = :name,email = :email,mobile = :mobile,choose = :choose,comment =  :comment,university = :uni,details = :detail,password = :pass');

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