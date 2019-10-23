<?php
 /**
  * 
  */
 class Book 
 {
 	
 	protected $id;
 	protected $type;
    protected $name;
    protected $pages;
    protected $price;
    protected $autho;
    protected $createdDate;
    private $tableName ='book';
    private $dbConn;

    function setId($id){$this->id = $id;}
    function getId(){return $this->id;}

    function setName($name){$this->name = $name;}
    function getName(){return $this->name;}

    function setType($type){$this->type = $type;}
    function getType(){return $this->type;}
    
    function setPages($pages){$this->pages = $pages;}
    function getPages(){return $this->pages;}
    
    function setPrice($price){$this->price = $price;}
    function getPrice(){return $this->price;}
    
    function setAuthor($author){$this->author = $author;}
    function getAuthor(){return $this->author;}
 	
    function setCreatedDate($createdDate){$this->createdDate = $createdDate;}
    function getCreatedDate(){return $this->createdDate;}
 	
 	public function __construct()
 	{
 		# code...
 		require_once('DbConnect.php');
 		$db = new DbConnect();
 		$this->dbConn = $db->connect();
 	}

 	public function insert(){
 		$sql = "INSERT INTO $this->tableName VALUES(null, :name, :type, :pages, :price, :author, :cdate)";
 		$stmt = $this->dbConn->prepare($sql);
 		$stmt->bindParam(':name', $this->name);
 		$stmt->bindParam(':type', $this->type);
 		$stmt->bindParam(':pages', $this->pages);
 		$stmt->bindParam(':price', $this->price);
 		$stmt->bindParam(':author', $this->author);
 		$stmt->bindParam(':cdate', $this->createdDate);
 		if ($stmt->execute()) {
 			# code...
 			return true;

 		}
 		else{
 			return false;
 		}
 	}
 }
?>