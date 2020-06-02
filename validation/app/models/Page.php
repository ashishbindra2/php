<?php
class Page
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }
   //admin login
   public function admin()
   {
   }
   //assigments
   public function assignment($iss)
   {
      $this->db->query("SELECT TITLE,PAPER_PATH FROM  paper_submission_detail p , paper_reviewer_record r
        WHERE p.PAPER_SUB_ID = r.PAPER_SUB_ID AND
        r.EIC_ID  =:iss");
      $this->db->bind('iss', $iss);
      $result = $this->db->resultSet();
      return $result;
   }
   //advance Search
   public function search($data)
   {
      // $this->db->query("SELECT   
      //              author_details.FNAME AS fname,
      //             --  author_details.MNAME AS mname,
      //             --  author_details.LNAME AS lname,
      //              author_details.INSTITUTE_NAME AS institude,
      //              author_details.EMAIL AS email,
      //              author_details.CITY AS city,
      //              author_details.STATE AS State,
      //              paper_submission_detail.PAPER_PATH AS paper,
      //              author_details.A_TITLE AS title,
      //              paper_submission_detail.TITLE AS ptitle,
      //              j_issues.VOLUME_NO AS volume,
      //              j_issues.ISSUE_YEAR AS issue,
      //              journal_names.JOURNAL_NAME AS journal
      //           FROM 
      //              paper_submission_detail
      //           JOIN 
      //              author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
      //           JOIN 
      //              journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
      //           JOIN 
      //              j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID

      //          WHERE author_details.INSTITUTE_NAME LIKE '% :institute %'  OR
      //                journal_names.JOURNAL_NAME  LIKE '% :jname %' OR
      //             --    author_details.FNAME  LIKE '% :fname %'  OR 
      //             --    author_details.LNAME  LIKE '% :mname %' OR 
      //             --    author_details.MNAME  LIKE '% :lname %' OR 
      //                author_details.EMAIL  LIKE '% :email %' OR
      //                author_details.CITY   LIKE '% :city %' OR
      //                author_details.A_TITLE LIKE '% :title %' OR
      //                j_issues.VOLUME_NO    LIKE '% :volume %' OR
      //                j_issues.ISSUE_YEAR   LIKE '% :issue %'");
      if (!empty($data['name'])) {
         # code...
         $this->db->query("SELECT   
                  FNAME,PAPER_PATH,paper_submission_detail.TITLE,VOLUME_NO,ISSUE_YEAR,journal_names.JOURNAL_NAME 
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
               WHERE  CONCAT(`FNAME`) 
               LIKE '%" . $data['name'] . "%'");
      }
      if (!empty($data['jname'])) {
         $this->db->query("SELECT   
                  FNAME,PAPER_PATH,EMAIL,INSTITUTE_NAME,CITY,STATE,KEYWORDS,     
                  SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,journal_names.JOURNAL_NAME  
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
               WHERE  CONCAT(`JOURNAL_NAME`) 
               LIKE '%" . $data['jname'] . "%'");
      }
      if (!empty($data['keyword'])) {
         $this->db->query(" SELECT   
                  FNAME,EMAIL,PAPER_PATH,INSTITUTE_NAME,CITY,STATE,KEYWORDS,     
                  SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,journal_names.JOURNAL_NAME  
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
               WHERE  CONCAT(`KEYWORDS`) 
               LIKE '%" . $data['keyword'] . "%'");
      }
      if (!empty($data['title'])) {
         $this->db->query("SELECT   
                  FNAME,EMAIL,PAPER_PATH,INSTITUTE_NAME,CITY,KEYWORDS,     
                  SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,STATE,
                  paper_submission_detail.TITLE,journal_names.JOURNAL_NAME  
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
               WHERE  CONCAT(`TITLE`) 
               LIKE '%" .  $data['title'] . "%'");
      }
      if (!empty($data['state'])) {
         $this->db->query("SELECT   
                  FNAME,EMAIL,PAPER_PATH,INSTITUTE_NAME,CITY,STATE,KEYWORDS,     
                  SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,journal_names.JOURNAL_NAME  
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
               WHERE  CONCAT(`STATE`) 
               LIKE '%" . $data['state'] . "%'");
      }
      if (!empty($data['city'])) {
         $this->db->query("SELECT   FNAME,PAPER_PATH,EMAIL,INSTITUTE_NAME,CITY,STATE,KEYWORDS,     SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,
         paper_submission_detail.TITLE,journal_names.JOURNAL_NAME   
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID

               WHERE  CONCAT(`CITY`) 
               LIKE '%" . $data['city'] . "%'");
      }
      if (!empty($data['institude'])) {
         $this->db->query(" SELECT   
                  FNAME,PAPER_PATH,EMAIL,INSTITUTE_NAME,CITY,STATE,KEYWORDS,     
                  SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,journal_names.JOURNAL_NAME  
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID

               WHERE  CONCAT(`INSTITUTE_NAME`) 
               LIKE '%" . $data['institude'] . "%'");
      }
      if (!empty($data['email'])) {
         $this->db->query("    SELECT   
                  FNAME,PAPER_PATH, author_details.EMAIL AS email,INSTITUTE_NAME,CITY,STATE,KEYWORDS,     
                  SPECIAL_ISSUE_NAME,VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,journal_names.JOURNAL_NAME   
               FROM 
                  paper_submission_detail
               JOIN 
                  author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
               JOIN 
                  journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
               JOIN 
                  j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
               WHERE  
                  CONCAT(`email`) 
               LIKE '%" . $data['email'] . "%'");
      }
      if (!empty($data['volume'])) {
         $this->db->query("SELECT   
                  FNAME,PAPER_PATH,EMAIL,INSTITUTE_NAME,
                  CITY,STATE,KEYWORDS,
                  SPECIAL_ISSUE_NAME,
                  VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,
                  journal_names.JOURNAL_NAME   
            FROM 
                  paper_submission_detail
            JOIN author_details ON paper_submission_detail.AUTH_ID   = author_details.AUTH_ID 
            JOIN journal_names  ON paper_submission_detail.JOURNAL_ID= journal_names.JOURNAL_ID
            JOIN j_issues       ON journal_names.JOURNAL_ID   = j_issues.JOURNAL_ID
            WHERE  CONCAT(`VOLUME_NO`) 
            LIKE '%" . $data['volume'] . "%'");
      }
      if (!empty($data['issue'])) {
         $this->db->query(" SELECT   
                  FNAME,PAPER_PATH,EMAIL,INSTITUTE_NAME,
                  CITY,STATE,KEYWORDS,
                  SPECIAL_ISSUE_NAME,
                  VOLUME_NO,ISSUE_YEAR,
                  paper_submission_detail.TITLE,
                  journal_names.JOURNAL_NAME   
               FROM 
                  paper_submission_detail

               JOIN author_details ON paper_submission_detail.AUTH_ID    = author_details.AUTH_ID 
               JOIN journal_names  ON paper_submission_detail.JOURNAL_ID = journal_names.JOURNAL_ID
               JOIN j_issues       ON journal_names.JOURNAL_ID    = j_issues.JOURNAL_ID
               WHERE  CONCAT(`ISSUE_YEAR`) 
               LIKE '%" . $data['issue'] . "%'");
      }
      $result = $this->db->resultSet();
      return $result;
   }
   //Manger of the site
   public function getManger()
   {
      $this->db->query(" SELECT * FROM  editors
          WHERE ROLE ='Managing-Editor' 
          OR ROLE ='Managing Director'");
      $row = $this->db->single();
      return $row;
   }

   //get call for paper
   public function getCallForPaper()
   {
      $this->db->query("SELECT Next_issue_Date,next_month FROM call_for_papers WHERE cid IN ( SELECT MAX(cid) FROM call_for_papers)");
      $row = $this->db->single();
      return $row;
   }
   //get Special Issue
   public function getSpecial($id)
   {
      $this->db->query("SELECT SPECIAL_ISSUE_NAME,ISSUE_YEAR 
        FROM j_issues WHERE JOURNAL_ID=:id AND IS_SPECIAL_ISSUE=1");
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
   }
   //Post Issue
   public function getPost($id)
   {

      $this->db->query("SELECT * FROM j_issues WHERE JOURNAL_ID = :id");
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
   }
   // List of all journals
   public function getPages()
   {
      $this->db->query('SELECT * FROM journal_names');
      $results = $this->db->resultSet();
      return $results;
   }
   //Journals Fields
   public function getJournalsById($id)
   {
      $this->db->query('SELECT * FROM journal_names WHERE JOURNAL_ID = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row;
   }
   //list of fields in specific journals
   public function getEditiorByStream()
   {
      $this->db->query('SELECT editors.STREAM_ID AS esid,
            journal_names.STREAM_ID AS jsid,
            editors.NAME AS editorName,
            editors.EMAIL AS editorEmail,
            editors.MOBILE AS editorMobile,
            editors.WEBLINK AS editorWeb,
            editors.DETAIL AS editorDetail,
            journal_names.JOURNAL_NAME AS jName 
            FROM editors 
            INNER JOIN journal_names
            ON editors.STREAM_ID = journal_names.STREAM_ID  WHERE editors.ROLE ="Editor-in-chief"');
      $row = $this->db->single();
      return $row;
   }
   //list of fields in specific strams of journals
   public function getStream()
   {
      $this->db->query('SELECT stream.STREAM_ID AS sid,
            stream.STREAM_NAME AS Stream,
            journal_names.STREAM_ID AS jisd
            FROM stream 
            INNER JOIN journal_names
            ON stream.STREAM_ID = journal_names.STREAM_ID');
      $row = $this->db->single();
      return $row;
   }
   //list of fields in associate editor
   public function getAssEditiorBy($id)
   {
      $this->db->query('SELECT editors.STREAM_ID AS esid,
            journal_names.STREAM_ID AS jsid,
            editors.NAME AS aseditorName,
            editors.EMAIL AS aseditorEmail,
            editors.College_name AS aseditorCollege
            FROM editors JOIN journal_names
            ON editors.STREAM_ID = journal_names.STREAM_ID  WHERE (editors.ROLE ="Associate Editor" OR editors.ROLE ="Associated Editors")
            AND journal_names.JOURNAL_ID=:id');
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results;
   }
   //News
   public function getNews($id)
   {
      $this->db->query("SELECT * FROM `news_update` WHERE JOURNAL_ID =:id");
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row;
   }
   //Abstract
   public function getAbstract()
   {
      $this->db->query("SELECT LOGOS FROM log");

      $results = $this->db->resultSet();
      return $results;
   }
}
