<?php
class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  //addCoAuthor
  public function addCoAuhtor($aid, $value, $email, $number, $city, $state, $gender)
  {
    $this->db->query("INSERT INTO co_authors (FID,clName,email,number,city,STATE,GENDER) 
    VALUES (:aid,:fname, :email,:number, :city,:state,:gender)");
    //Binds
    $this->db->bind(':aid', $aid);
    $this->db->bind(':fname', $value);
    $this->db->bind(':email', $email);
    $this->db->bind(':number',  $number);
    $this->db->bind(':city', $city);
    $this->db->bind(':state', $state);
    $this->db->bind(':gender', $gender);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  //sugstion
  public function suggestion($name, $lname, $email, $institute, $aid)
  {
    $this->db->query("INSERT INTO reviewer_suggestions (fname,lname,email,DEPT_NAME,aeid) 
    VALUES(:fname,:lname,:email,:deptName,:aid)");
    //Binds
    $this->db->bind(':fname', $name);
    $this->db->bind(':lname', $lname);
    $this->db->bind(':email', $email);
    $this->db->bind(':deptName', $institute);
    $this->db->bind(':aid', $aid);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  //
  public function paperUploads($data)
  {
    $this->db->query('INSERT INTO temp_data (JOURNAL_ID,STREAM_ID,AUTH_ID, PAPER_PATH,ABSTRACT, 
     KEYWORDS,TITLE,D_O_Submission,D_O_Updation) 
     VALUES (:journalId, :streamId, :aid,:paperPath,:detail,:keywords,:title,NOW(),NOW())');
    //Binds
    $this->db->bind(':journalId', $data['jid']);
    $this->db->bind(':streamId', $data['stram']);
    $this->db->bind(':aid', $data['aid']);
    $this->db->bind(':paperPath', $data['title']);
    $this->db->bind(':detail', $data['state']);
    $this->db->bind(':keywords', $data['keyword']);
    $this->db->bind(':title', $data['city']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function resultEditor()
  {
    //paper review by reviere with commements  
    $this->db->query(
      "SELECT * FROM paper_status_after_review 
  JOIN
      paper_submission_detail ON paper_status_after_review.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID
  JOIN
      paper_reviewer_record ON paper_status_after_review.PAPER_REVIEW_DETAIL_ID = paper_reviewer_record.P_REVIEWER_DETAILS_ID
  JOIN
       status ON paper_status_after_review.STATUS_ID = status.STATUS_ID order by paper_status_after_review.STATUS_ID limit 1"
    );
    // Bind values

    $results = $this->db->resultSet();

    return $results;
  }
  //
  public function reviwerName($aid)
  {
    $this->db->query('SELECT * FROM paper_submission_detail
            JOIN
                journal_names ON paper_submission_detail.JOURNAL_ID = journal_names.JOURNAL_ID
            JOIN
                paper_reviewer_record ON paper_submission_detail.PAPER_SUB_ID = paper_reviewer_record.PAPER_SUB_ID
            JOIN
                reviewer ON  paper_reviewer_record.REVIEWER_ID = reviewer.REVIEWER_ID
            WHERE paper_submission_detail.AUTH_ID = :aid');
    // Bind values
    $this->db->bind(':aid', $aid);
    $results = $this->db->resultSet();

    return $results;
  }
  //paper review
  public function reviwerDetail()
  {
    $this->db->query('SELECT * FROM assignment
            JOIN
                journal_names ON assignment.JOURNAL_ID = journal_names.JOURNAL_ID
            JOIN
            paper_submission_detail ON assignment.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID');
    // Bind values
    // $this->db->bind(':aid', $aid);
    $results = $this->db->resultSet();

    return $results;
  }
  // check author have records
  public function authorUpload($aid)
  {
    $this->db->query("SELECT * FROM paper_submission_detail
     WHERE AUTH_ID = :aid AND ACTIVE = 0 order by PAPER_SUB_ID DESC limit 1");
    // Bind values
    $this->db->bind(':aid', $aid);
    $results = $this->db->resultSet();

    return $results;
  }
  public function assignment($aid)
  {
    //action taken by associate editor

    $this->db->query("SELECT * FROM assignment  
    JOIN paper_submission_detail ON  assignment.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID 
    WHERE paper_submission_detail.AUTH_ID = :aid 
    ORDER BY paper_submission_detail.AUTH_ID DESC limit 1");
    // Bind values
    $this->db->bind(':aid', $aid);
    $results = $this->db->resultSet();
    return $results;
  }
  public function assined($aid)
  {
    //action taken by associate editor

    $this->db->query("SELECT MAX(DATE) AS dates FROM assignment  
    JOIN paper_submission_detail ON  assignment.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID 
    WHERE paper_submission_detail.AUTH_ID = :aid");
    // Bind values
    $this->db->bind(':aid', $aid);
    $results = $this->db->single();
    return $results;
  }
  // password user
  public function updatePassword($data)
  {
    $this->db->query('UPDATE author_details
     SET PASSWORD = :pass
     WHERE AUTH_ID = :aid');
    // Bind values
    $this->db->bind(':aid', $data['aid']);
    $this->db->bind(':pass', $data['new_password']);
    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  // Regsiter user
  public function updateAuthor($data)
  {
    $this->db->query('UPDATE author_details
     SET FNAME = :fname,  LNAME = :lname,
     A_TITLE = :title, GENDER = :gender,
     EMAIL = :email, MOBILE = :phone,
     DESIGNATION = :designation, INSTITUTE_NAME = :institute,
     CITY = :city, STATE = :stat, COUNTRY = :country 
     WHERE AUTH_ID = :aid');
    // Bind values
    $this->db->bind(':aid', $data['aid']);
    $this->db->bind(':fname', $data['fname']);
    $this->db->bind(':lname', $data['lname']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':designation', $data['designation']);
    $this->db->bind(':institute', $data['institute']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':stat', $data['state']);
    $this->db->bind(':country', $data['country']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function associateAct($aid)
  {
    //action taken by associate editor

    $this->db->query("SELECT * FROM paper_reviewer_record  
    JOIN paper_submission_detail ON paper_reviewer_record.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID
    WHERE paper_submission_detail.AUTH_ID = :aid 
    order by paper_submission_detail.AUTH_ID limit 1");
    // Bind values
    $this->db->bind(':aid', $aid);
    $results = $this->db->resultSet();
    return $results;
  }
  ///
  public function stream($id)
  {
    $this->db->query("SELECT * FROM journal_names 
    JOIN stream ON stream.STREAM_ID = journal_names.STREAM_ID WHERE JOURNAL_ID=:jid");
    $this->db->bind(':jid', $id);
    $results = $this->db->resultSet();

    return $results;
  }
  // auther paper details 
  public function authorPaper($data)
  {
    $this->db->query("INSERT INTO paper_submission_detail (JOURNAL_ID,STREAM_ID,
     AUTH_ID, PAPER_PATH,ABSTRACT, KEYWORDS,TITLE, D_O_SUBMISSION,D_O_UPLOADING) 
     VALUES (:jid, :stream, :author, :paper,:detail,
     :keywords, :title,NOW(),NOW())");
    $this->db->bind(':jid', $data['jid']);
    $this->db->bind(':stream', $data['stram']);
    $this->db->bind(':author', $data['aid']);
    $this->db->bind(':paper', $data['file']);
    $this->db->bind(':detail', $data['description']);
    $this->db->bind(':keywords', $data['keyword']);
    $this->db->bind(':title', $data['title']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function authorPapertemp($data)
  {
    $this->db->query("INSERT INTO temp_data (JOURNAL_ID,STREAM_ID,
     AUTH_ID, PAPER_PATH,ABSTRACT, KEYWORDS,TITLE, D_O_Submission,D_O_Updation) 
     VALUES (:jid, :stream, :author, :paper,:detail,
     :keywords, :title,NOW(),NOW())");
    $this->db->bind(':jid', $data['jid']);
    $this->db->bind(':stream', $data['stram']);
    $this->db->bind(':author', $data['aid']);
    $this->db->bind(':paper', $data['file']);
    $this->db->bind(':detail', $data['description']);
    $this->db->bind(':keywords', $data['keyword']);
    $this->db->bind(':title', $data['title']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  // get steams
  public function  getStreamByJ($jid)
  {
    $this->db->query("SELECT * FROM  journal_names 
    JOIN stream ON stream.STREAM_ID = journal_names.STREAM_ID 
    WHERE JOURNAL_ID=:jid");
    $this->db->bind(':jid', $jid);
    $results = $this->db->resultSet();

    return $results;
  }
  // get steams
  public function getStream()
  {
    $this->db->query("SELECT * FROM stream");
    $results = $this->db->resultSet();

    return $results;
  }
  //all journals
  public function getPages()
  {
    $this->db->query('SELECT * FROM journal_names');

    $results = $this->db->resultSet();

    return $results;
  }
  public function getDetail($aid)
  {
    $this->db->query("SELECT * FROM  author_details  WHERE AUTH_ID=:aid");
    $this->db->bind(':aid', $aid);
    $row = $this->db->single();
    return $row;
  }

  public function getPosts()
  {
    $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');

    $results = $this->db->resultSet();

    return $results;
  }

  public function addPost($data)
  {
    $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
    // Bind values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updatePost($data)
  {
    $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getPostById($id)
  {
    $this->db->query('SELECT * FROM posts WHERE id = :id');
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function deletePost($id)
  {
    $this->db->query('DELETE FROM posts WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
