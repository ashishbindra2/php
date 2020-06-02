<?php
class Editor
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function notication()
    {
        $this->db->query("SELECT * FROM temp_data 
            JOIN
            journal_names ON temp_data.JOURNAL_ID = journal_names.JOURNAL_ID
            JOIN
            stream ON temp_data.STREAM_ID = stream.STREAM_ID
            JOIN 
            author_details ON temp_data.AUTH_ID =  author_details.AUTH_ID
            WHERE sn = 1 

        ");
        $results = $this->db->resultSet();
        return $results;
    }
    //Get Associate Editor
    public function getAsEditorByID($id)
    {
        $this->db->query(" SELECT editors.STREAM_ID AS esid,
        stream.STREAM_ID AS jsid,
        editors.EIC_ID AS eid,
        editors.NAME AS editorName,
        editors.EMAIL AS editorEmail,
        editors.MOBILE AS editorMobile,
        editors.WEBLINK AS editorWeb,
        editors.DETAIL AS editorDetail,
        editors.College_name AS editorCollege,
        editors.STATUS AS editorStatus,
        stream.STREAM_NAME AS sName  FROM  
        editors
        JOIN
        stream  On editors.STREAM_ID = stream.STREAM_ID
        WHERE (ROLE ='Associate-Editor' 
             OR editors.ROLE ='Associate Director'
             OR editors.ROLE ='Associate Editor')
             AND (stream.STATUS=1) AND editors.EIC_ID=:eid");
        $this->db->bind(':eid', $id);
        $results = $this->db->single();
        return $results;
    }
    public function getReviweDetial($rid)
    {
        $this->db->query("SELECT 
        reviewer.REVIEWER_ID As rid,
        reviewer.FNAME AS rName,
        journal_names.JOURNAL_NAME AS jName,
        j_issues.VOLUME_NO AS vno,
        paper_status_after_review.SATUS AS rstatus,
        paper_status_after_review.DATE AS  dates,
        paper_status_after_review.REVIEWER_COMMENTS_TO_EDITOR AS rAsEditor,
        paper_status_after_review.REVIEWER_COMMENTS_TO_AUTHOR AS rAuthor,
        paper_submission_detail.TITLE AS detail,
        stream.STREAM_NAME as stream
         FROM assignment 
          JOIN reviewer ON reviewer.REVIEWER_ID = assignment.REVIEWER_ID
          JOIN j_issues ON j_issues.J_ISSUES_ID = assignment.ISSUE_ID
          JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID=assignment.PAPER_SUB_ID
          JOIN journal_names ON journal_names.JOURNAL_ID = assignment.JOURNAL_ID
          JOIN paper_status_after_review ON paper_status_after_review.PAPER_SUB_ID = assignment.PAPER_SUB_ID
          JOIN stream ON stream.STREAM_ID =paper_submission_detail.STREAM_ID  WHERE assignment.REVIEWER_ID =:rid");
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getReviwe()
    {
        $this->db->query("SELECT 
        reviewer.REVIEWER_ID As rid,
        reviewer.FNAME AS rName,
        journal_names.JOURNAL_NAME AS jName,
        j_issues.VOLUME_NO AS vno,
        paper_status_after_review.SATUS AS rstatus,
        stream.STREAM_NAME as stream
         FROM assignment 
          JOIN reviewer ON reviewer.REVIEWER_ID = assignment.REVIEWER_ID
          JOIN j_issues ON j_issues.J_ISSUES_ID = assignment.ISSUE_ID
          JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID=assignment.PAPER_SUB_ID
          JOIN journal_names ON journal_names.JOURNAL_ID = assignment.JOURNAL_ID
          JOIN paper_status_after_review ON paper_status_after_review.PAPER_SUB_ID = assignment.PAPER_SUB_ID
          JOIN stream ON stream.STREAM_ID =paper_submission_detail.STREAM_ID 
          ");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getReviwer()
    {
        $this->db->query("SELECT * FROM reviewer");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPaperDetail($aid)
    {
        $this->db->query("SELECT
         assignment.ISSUE_ID AS aIssue,
        assignment.PAPER_SUB_ID AS apid,
        -- assignment.AUTH_ID AS aaid,
        j_issues.VOLUME_NO AS iVolume,
        j_issues.ISSUE_MONTH AS iMonth,
        j_issues.IS_SPECIAL_ISSUE AS iIssue,
        j_issues.ISSUE_YEAR AS iYear,
        paper_submission_detail.TITLE AS pTitle,
        paper_submission_detail.ABSTRACT AS pAbstraction,
        paper_submission_detail.ACTIVE AS pActive,
        paper_status_after_review.PAPER_SUB_ID AS prID,
        paper_status_after_review.STATUS_ID AS prsid,
        paper_status_after_review.SATUS AS prStatus,
        paper_status_after_review.STATUS_ID AS prs
    FROM 
        assignment
    JOIN 
        j_issues ON  j_issues.J_ISSUES_ID = assignment.ISSUE_ID
    JOIN 
        paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID =  assignment.PAPER_SUB_ID
    JOIN
        paper_status_after_review  ON paper_status_after_review.PAPER_SUB_ID =  paper_submission_detail.PAPER_SUB_ID
    WHERE paper_submission_detail.AUTH_ID = :aid");
        $this->db->bind(':aid', $aid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getAuthPaper($aid)
    {
        $this->db->query("SELECT paper_submission_detail.PAPER_PATH AS paper,
        paper_submission_detail.KEYWORDS AS keywords,
        paper_submission_detail.STREAM_ID AS aid,
        paper_submission_detail.ABSTRACT AS abstract,
        paper_submission_detail.TITLE AS title,
        paper_submission_detail.D_O_SUBMISSION AS sub,
        paper_submission_detail.D_O_UPLOADING AS up,
        paper_submission_detail.ACTIVE AS active,
        paper_submission_detail.editor_view AS view,
        stream.STREAM_NAME AS strea
        FROM paper_submission_detail 
        JOIN stream ON paper_submission_detail.STREAM_ID = stream.STREAM_ID
        -- JOIN author_details ON author_details.AUTH_ID =paper_submission_detail.AUTH_ID
        WHERE paper_submission_detail.AUTH_ID =:aid");
        $this->db->bind(':aid', $aid);
        $results = $this->db->resultSet();
        return $results;
    }
    //Display Author
    public function getAuthor()
    {
        $this->db->query("SELECT * FROM  author_details");
        $results = $this->db->resultSet();
        return $results;
    }
    //Add AssociateEditor
    public function addAssociate($data)
    {
        $this->db->query("INSERT INTO editors( STREAM_ID, NAME,
         EMAIL, MOBILE, WEBLINK, ROLE,College_name, STATUS,DETAIL,PASSWORD ) 
         VALUES (:sid,:name,:email,:mobile,:web,:role,:college,:status,:detail,:password)");
        $this->db->bind(':sid', $data['sid']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':web', $data['web']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':college', $data['college']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':password', $data['password']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // get steams
    public function getStream()
    {
        $this->db->query("SELECT * FROM stream");
        $results = $this->db->resultSet();
        return $results;
    }
    //Get Associate Editor
    public function getAsEditor()
    {
        $this->db->query(" SELECT editors.STREAM_ID AS esid,
        stream.STREAM_ID AS jsid,
        editors.EIC_ID AS eid,
        editors.NAME AS editorName,
        editors.EMAIL AS editorEmail,
        editors.MOBILE AS editorMobile,
        editors.WEBLINK AS editorWeb,
        editors.DETAIL AS editorDetail,
        editors.College_name AS editorCollege,
        editors.STATUS AS editorStatus,
        stream.STREAM_NAME AS sName  FROM  
        editors
        JOIN
        stream  On editors.STREAM_ID = stream.STREAM_ID
        WHERE (ROLE ='Associate-Editor' 
             OR editors.ROLE ='Associate Director'
             OR editors.ROLE ='Associate Editor')
             AND (stream.STATUS=1)");
        $results = $this->db->resultSet();
        return $results;
    }
    //add date
    public function addNextDate($data)
    {
        $this->db->query("INSERT INTO call_for_papers (Next_issue_Date,
        next_month ) VALUES (:date,:date2)");
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':date2', $data['date2']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //Journal Status
    public function journalStatus()
    {
        $this->db->query("SELECT * FROM journal_status");
        $results = $this->db->resultSet();
        return $results;
    }
    //Journals Fields
    public function getJournals()
    {
        $this->db->query('SELECT * FROM journal_names ');
        $results = $this->db->resultSet();
        return $results;
    }
    public function addIssue($data)
    {
        $this->db->query("INSERT INTO j_issues ( JOURNAL_ID,
        ISSUE_MONTH,VOLUME_NO,IS_SPECIAL_ISSUE,
        ISSUE_YEAR,D_O_UPLOADING,JOURNAL_STATUS_ID,SPECIAL_ISSUE_NAME )
         VALUES (:jid,:month,:volume,:isSpecial,:year,:date,:jStatus,:specialIssue)");
        $this->db->bind(':jid', $data['jName']);
        $this->db->bind(':month', $data['month']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':isSpecial', $data['isSpecialIssue']);
        $this->db->bind(':year', $data['year']);
        $this->db->bind(':jStatus', $data['jid']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':specialIssue', $data['issueName']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function issue()
    {
        $this->db->query("SELECT J_ISSUES_ID,JOURNAL_NAME,ISSUE_MONTH,
        VOLUME_NO,IS_SPECIAL_ISSUE,ISSUE_YEAR,D_O_UPLOADING, SPECIAL_ISSUE_NAME 
        FROM journal_names,j_issues 
        WHERE journal_names.JOURNAL_ID=j_issues.JOURNAL_ID  ORDER BY J_ISSUES_ID DESC");
        $results = $this->db->resultSet();
        return $results;
    }
    public function addJournal($data)
    {
        $this->db->query("INSERT INTO  journal_names (JOURNAL_NAME,
         JOURNAL_N_ABB, J_ISSN_E, J_ISSN_P, FREQUENCY, STATUS,STREAM_ID) 
         VALUES (:jName,:jAbb,:jE,:jP,:frequency,:status,:sid)");
        $this->db->bind(':jName', $data['name']);
        $this->db->bind(':jAbb', $data['jAbb']);
        $this->db->bind(':jE', $data['jE']);
        $this->db->bind(':jP', $data['jP']);
        $this->db->bind(':frequency', $data['frequency']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':sid', $data['sid']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateJournal($data)
    {
        $this->db->query("UPDATE journal_names  SET JOURNAL_NAME = :jName,
         JOURNAL_N_ABB = :jAbb, J_ISSN_E = :jE, J_ISSN_P = :jP, FREQUENCY = :frequency, STATUS = :status,STREAM_ID = :sid
         WHERE JOURNAL_ID = :jid");
        $this->db->bind(':jid', $data['id']);
        $this->db->bind(':jName', $data['name']);
        $this->db->bind(':jAbb', $data['jAbb']);
        $this->db->bind(':jE', $data['jE']);
        $this->db->bind(':jP', $data['jP']);
        $this->db->bind(':frequency', $data['frequency']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':sid', $data['sid']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateAssoc($data)
    {
        $this->db->query("UPDATE editors 
        SET STREAM_ID = :stream, NAME = :Name, EMAIL = :email, MOBILE = :mobile,
          WEBLINK = :web,ROLE = :role, College_name = :college,STATUS = :status, DETAIL = :detail
         WHERE EIC_ID = :eid");
        $this->db->bind(':eid', $data['bid']);
        $this->db->bind(':Name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':web', $data['web']);
        $this->db->bind(':detail', $data['detail']);
        $this->db->bind(':college', $data['college']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':stream', $data['sid']);
        $this->db->bind(':role', 'Associate Editor');
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAssociate($data)
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
    public function deleteJournal($data)
    {
        $this->db->query("DELETE  FROM journal_names WHERE JOURNAL_ID = :jid");
        $this->db->bind(':jid', $data['bid']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteReviewer($data)
    {
        $this->db->query('DELETE FROM reviewer WHERE REVIEWER_ID = :id');
        //Bind data
        $this->db->bind(':id', $data['bid']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteAuth($data)
    {
        $this->db->query('DELETE FROM author_details WHERE AUTH_ID = :id');
        //Bind data
        $this->db->bind(':id', $data['bid']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteIssue($id)
    {
        $this->db->query('DELETE FROM j_issues WHERE J_ISSUES_ID = :id');
        //Bind data
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateIssues($data)
    {
        $this->db->query("UPDATE j_issues 
        SET  ISSUE_MONTH=:months, 
        VOLUME_NO=:vol, IS_SPECIAL_ISSUE=:isIssue,
        D_O_UPLOADING=Now(), ISSUE_YEAR=:years,
        SPECIAL_ISSUE_NAME=:sins 
        WHERE J_ISSUES_ID=:id");
        //bind the data
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':months', $data['month']);
        $this->db->bind(':vol', $data['volume']);
        $this->db->bind(':isIssue', $data['special']);
        $this->db->bind(':years', $data['year']);
        $this->db->bind(':sins', $data['specialName']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function editIssues($id)
    {
        $this->db->query("SELECT * FROM j_issues WHERE J_ISSUES_ID=:JID");
        //bind the data
        $this->db->bind(':JID', $id);
        //result
        $row = $this->db->single();
        return $row;
    }
    //list of fields in associate editor
    public function getJournalByStream()
    {
        $this->db->query('SELECT stream.STREAM_ID AS esid,
               journal_names.STREAM_ID AS jsid,
               stream.STREAM_NAME AS sName,
               journal_names.JOURNAL_NAME AS jName,
               journal_names.JOURNAL_ID AS jid,
               journal_names.JOURNAL_N_ABB AS jAbb,
               journal_names.J_ISSN_E AS jO,
               journal_names.J_ISSN_P AS jP,
               journal_names.FREQUENCY AS jF
               FROM stream JOIN journal_names
               ON stream.STREAM_ID = journal_names.STREAM_ID ORDER BY journal_names.JOURNAL_ID DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    //list of fields of journal by id
    public function getJournalById($id)
    {
        $this->db->query('SELECT stream.STREAM_ID AS esid,
               journal_names.STREAM_ID AS jsid,
               stream.STREAM_NAME AS sName,
               journal_names.JOURNAL_NAME AS jName,
               journal_names.JOURNAL_ID AS jid,
               journal_names.JOURNAL_N_ABB AS jAbb,
               journal_names.J_ISSN_E AS jO,
               journal_names.J_ISSN_P AS jP,
               journal_names.FREQUENCY AS jF,
               journal_names.STATUS AS sta
               FROM stream 
               JOIN journal_names
               ON stream.STREAM_ID = journal_names.STREAM_ID
               WHERE journal_names.JOURNAL_ID = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }
    public function streamSearch($sid)
    {
        $this->db->query("SELECT *  FROM stream WHERE STREAM_ID=:sid");
        $this->db->bind(':sid', $sid);
        $row = $this->db->single();
        return $row;
    }
    public function  countJournals()
    {
        $this->db->query("SELECT count(*) AS j FROM journal_names");
        $row = $this->db->single();
        return $row;
    }
    public function countIssue()
    {
        $this->db->query("SELECT count(*) AS noIssue FROM j_issues");
        $row = $this->db->single();
        return $row;
    }
    public function  countReviewer()
    {
        $this->db->query("SELECT count(*) as REVIEWER FROM reviewer");
        $row = $this->db->single();
        return $row;
    }
    function  countAuthors()
    {
        $this->db->query("SELECT count(*) AS AUTH FROM author_details");
        $row = $this->db->single();
        return $row;
    }
}
