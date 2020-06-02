<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function deleteEditor($data)
    {
        $this->db->query("DELETE  FROM editors WHERE EIC_ID = :jid");
        $this->db->bind(':jid', $data['bid']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //Get Associate Editor
    public function getEditor()
    {
        $this->db->query(
            " SELECT editors.STREAM_ID AS esid,
     editors.EIC_ID AS eid,
     stream.STREAM_ID AS jsid,
     editors.NAME AS editorName,
     editors.EMAIL AS editorEmail,
     editors.MOBILE AS editorMobile,
     editors.WEBLINK AS editorWeb,
     editors.DETAIL AS editorDetail,
     editors.College_name AS editorCollege,
     editors.STATUS AS editorStatus,
     stream.STREAM_NAME AS sName  
     FROM  editors 
      JOIN stream  ON editors.STREAM_ID = stream.STREAM_ID
      WHERE(editors.ROLE ='Editor-in-chief' 
          OR editors.ROLE ='Editor-in-Chief'
          OR editors.ROLE ='Editor')
          AND (stream.STATUS=1)"
        );
        $results = $this->db->resultSet();
        return $results;
    }

    public function  updateEditor($data)
    {
        $this->db->query("UPDATE editors 
        SET STREAM_ID = :stream, NAME = :Name, EMAIL = :email, MOBILE = :mobile,
          WEBLINK = :web,ROLE = :role, College_name = :college,STATUS = :status, DETAIL = :detail
         WHERE EIC_ID = :eid");
        $this->db->bind(':eid', $data['id']);
        $this->db->bind(':Name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':web', $data['web']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':college', $data['college']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':stream', $data['sid']);
        $this->db->bind(':role', 'Editor-in-chief');
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Get Associate Editor
    public function editEditor($id)
    {
        $this->db->query(" SELECT editors.STREAM_ID AS esid,
     editors.EIC_ID AS eid,
     stream.STREAM_ID AS jsid,
     editors.NAME AS editorName,
     editors.EMAIL AS editorEmail,
     editors.MOBILE AS editorMobile,
     editors.WEBLINK AS editorWeb,
     editors.DETAIL AS editorDetail,
     editors.College_name AS editorCollege,
     editors.STATUS AS editorStatus,
     stream.STREAM_NAME AS sName  
     FROM  editors 
      JOIN stream  ON editors.STREAM_ID = stream.STREAM_ID
      WHERE(editors.ROLE ='Editor-in-chief' 
          OR editors.ROLE ='Editor-in-Chief'
          OR editors.ROLE ='Editor')
          AND (stream.STATUS=1) AND editors.EIC_ID = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }
    // Find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM  signin WHERE email = :email');
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
    public function findEditorByEmail($email)
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

    // Login User
    public function login($email, $PASSWORD)
    {
        $this->db->query('SELECT * FROM  signin WHERE email = :email AND pass = :pass');
        $this->db->bind(':email', $email);
        $this->db->bind(':pass', $PASSWORD);
        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}
