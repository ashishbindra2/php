<?php
class Login
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // streams
    public function stream()
    {
        $this->db->query("SELECT * FROM stream WHERE STATUS=1");
        $result = $this->db->resultSet();
        return $result;
    }
    // Regsiter user
    public function register($data)
    {
        $this->db->query('INSERT INTO  editors 
             (STREAM_ID,NAME,EMAIL,MOBILE,WEBLINK,ROLE,College_name,STATUS,DETAIL,PASSWORD)  
        VALUES (:sid,:name,:email,:mobile,:webpage,:role,:collegename,:satus,:detail,:password)');
        // Bind values

        $this->db->bind(':sid', $data['sid']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':webpage', $data['web']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':collegename', $data['college']);
        $this->db->bind(':satus', $data['status']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':password', $data['password']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Login User
    public function login($email, $PASSWORD)
    {
        $this->db->query('SELECT * FROM editors WHERE EMAIL = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->PASSWORD;
        if (password_verify($PASSWORD, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    // Login User
    public function loginReviwer($email, $PASSWORD)
    {
        $this->db->query('SELECT * FROM reviewer WHERE EMAIL = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->PASSWORD;
        if (password_verify($PASSWORD, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    // Login User
    public function loginAssociate($email, $PASSWORD)
    {
        $sid = "Associate Editor";
        $this->db->query('SELECT * FROM editors WHERE EMAIL = :email AND editors.ROLE = :sid');
        $this->db->bind(':email', $email);
        $this->db->bind(':sid', $sid);

        $row = $this->db->single();

        $hashed_password = $row->PASSWORD;
        if (password_verify($PASSWORD, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
    //Journals Fields
    public function getJournalsById($id)
    {
        $this->db->query('SELECT * FROM journal_names WHERE JOURNAL_ID = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    //Journals Fields
    public function getJournals()
    {
        $this->db->query('SELECT * FROM journal_names');
        $result = $this->db->resultSet();
        return $result;
    }
    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM editors WHERE EMAIL = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findAssociateByEmail($email)
    {
        $sid = "Associate Editor";
        $this->db->query('SELECT * FROM editors WHERE EMAIL = :email AND editors.ROLE = :sid');
        // Bind value
        $this->db->bind(':email', $email);
        $this->db->bind(':sid', $sid);
        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findReviwerByEmail($email)
    {
        $this->db->query('SELECT * FROM reviewer WHERE EMAIL = :email ');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
