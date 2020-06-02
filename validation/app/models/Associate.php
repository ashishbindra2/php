<?php
class Associate
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function jissie($journal)
    {
        $this->db->query("SELECT * FROM j_issues WHERE JOURNAL_ID = :journal");
        $this->db->bind(':journal', $journal);
        $results = $this->db->resultSet();
        return $results;
    }
    public function country()
    {
        $this->db->query("SELECT * FROM countries WHERE  status = 1 ORDER BY country_name ASC");
        $results = $this->db->resultSet();
        return $results;
    }
    // public function country($cid)
    // {
    //     $this->db->query("SELECT * FROM countries WHERE country_id = :cid AND status = 1 ORDER BY country_name ASC");
    //     $this->db->bind(':cid', $cid);
    //     $results = $this->db->resultSet();
    //     return $results;
    // }
    public function  state($cid)
    {
        $this->db->query("SELECT * FROM states WHERE country_id = :cid AND status = 1 ORDER BY state_name ASC");
        $this->db->bind(':cid', $cid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function  city($sid)
    {
        $this->db->query("SELECT * FROM cities WHERE state_id = :sid AND status = 1 ORDER BY city_name ASC");
        $this->db->bind(':sid', $sid);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addReviwer($data)
    {
        $this->db->query("INSERT INTO reviewer(FNAME , GENDER, TITLE, DESIGNATION, STREAM_ID, INST_NAME,
                 INST_ADDRESS, CITY, STATE, COUNTRY, EMAIL,PASSWORD, WEBPAGE ,PHOTOGRAPH ) 
                 VALUES (:name,:gender,:title,:desi,:stream,:institude,:address,:city,:state,:country,:email,:pass,:web,:img)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':desi', $data['des']);
        $this->db->bind(':stream', $data['stream']);
        $this->db->bind(':institude', $data['institude']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':pass', $data['password']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':web', $data['webPage']);
        $this->db->bind(':img', $data['img']);
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
    public function reminderDetail($data)
    {
        $this->db->query("INSERT INTO reviewer_revimder_details(PAPER_REVIEW_DETAIL_ID ,
        REMIDER_NUMBER , REMINDER_DATE , NOTIC ) 
        VALUES (:pid,:rid,:date,:notic)");
        $this->db->bind(':pid', $data['file']);
        $this->db->bind(':rid', $data['rid']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':notic', $data['notic']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function suggestion()
    {
        $this->db->query("SELECT * FROM reviewer_suggestions ");
        // $this->db->bind(':eid', $eid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function assingment($data, $rid)
    {
        $this->db->query('INSERT  INTO assignment (JOURNAL_ID , REVIEWER_ID , ISSUE_ID , PAPER_SUB_ID  , DATE ) 
        VALUES (:jid,:rid,:vid,:file,Now())');
        $this->db->bind(':jid', $data['jid']);
        $this->db->bind(':rid', $rid);
        $this->db->bind(':vid', $data['volume']);
        $this->db->bind(':file', $data['file']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function paper()
    {
        $this->db->query("SELECT * FROM  paper_submission_detail");
        $results = $this->db->resultSet();
        return $results;
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

    public function deleteReviwers($id)
    {
        $this->db->query('DELETE FROM reviewer WHERE REVIEWER_ID = :id');
        //Bind data
        $this->db->bind(':id', $id);
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
    public function issue()
    {
        $this->db->query("SELECT J_ISSUES_ID,JOURNAL_NAME,ISSUE_MONTH,
        VOLUME_NO,IS_SPECIAL_ISSUE,ISSUE_YEAR,D_O_UPLOADING, SPECIAL_ISSUE_NAME 
        FROM journal_names,j_issues 
        WHERE journal_names.JOURNAL_ID=j_issues.JOURNAL_ID");
        $results = $this->db->resultSet();
        return $results;
    }
    function streamSearch($sid)
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
