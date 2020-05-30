<?php
/**
 *
 */
class Signup
{

  protected $id;
  protected $fname;
  protected $lname;
  protected $email;
  protected $mobile;
  protected $hobby;
  protected $dob;
  protected $gender;
  protected $status;
  private $tableName = 'signup';
  private $dbConn;

  function setId($id) { $this->id = $id; }
  function getId() { return $this->id; }
  function setFname($fname) { $this->fname = $fname; }
  function getFname() { return $this->fname; }
  function setLname($lname) { $this->lname = $lname; }
  function getLname() { return $this->lname; }
  function setEmail($email) { $this->email = $email; }
  function getEmail() { return $this->email; }
  function setMobile($mobile) { $this->mobile = $mobile; }
  function getMobile() { return $this->mobile; }
  function setHobby($hobby) { $this->hobby = $hobby; }
  function getHobby() { return $this->hobby; }
  function setDob($dob) { $this->dob = $dob; }
  function getDob() { return $this->dob; }
  function setGender($gender) { $this->gender = $gender; }
  function getGender() { return $this->gender; }
  function setStatus($status) { $this->status = $status; }
  function getStatus() { return $this->status; }

  public function __construct()
  {
    require_once('DbConnect.php');
    // create connection using constructor
    $db = new DbConnect();
    $this->dbConn = $db->connect();
  }
  public function insert()
  {
    // insert dbx_query
    $sql = "INSERT INTO $this->tableName(fname,lname,email,mobile,hobby,dob,	gender) VALUES(:fname,:lname,:email,:mobile,:hobby,:dob,:gender)";
    $stmt = $this->dbConn->prepare($sql);
    $stmt->bindParam(':fname',$this->fname);
    $stmt->bindParam(':lname',$this->lname);
    $stmt->bindParam(':email',$this->email);
    $stmt->bindParam(':mobile',$this->mobile);
    $stmt->bindParam(':hobby',$this->hobby);
    $stmt->bindParam(':dob',$this->dob);
    $stmt->bindParam(':gender',$this->gender);
    if ($stmt->execute()) {
        return true;
    }else {
      return false;
    }
  }
  public function getAllSignup()
  {
    // code...
    $stmt = $this->dbConn->prepare("SELECT * FROM $this->tableName");
    $stmt->execute();
    $signup = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($signup);exit;
    return $signup;
  }


public function update()
{
  // insert dbx_query
  $sql = "update  $this->tableName set fname = :fname,lname = :lname,email =:email,
  mobile =:mobile,hobby =:hobby,dob =:dob,	gender =:gender WHERE id=:id";
  $stmt = $this->dbConn->prepare($sql);
  $stmt->bindParam(':fname',$this->fname);
  $stmt->bindParam(':lname',$this->lname);
  $stmt->bindParam(':email',$this->email);
  $stmt->bindParam(':mobile',$this->mobile);
  $stmt->bindParam(':hobby',$this->hobby);
  $stmt->bindParam(':dob',$this->dob);
  $stmt->bindParam(':gender',$this->gender);
    $stmt->bindParam(':id',$this->id);
  if ($stmt->execute()) {
      return true;
  }else {
    return false;
  }
}
public function delete()
{
  // insert dbx_quer
  $stmt = $this->dbConn->prepare("DELETE FROM $this->tableName WHERE id=:id");
    $stmt->bindParam(':id',$this->id);
  if ($stmt->execute()) {
      return true;
  }else {
    return false;
  }
}




}
 ?>
