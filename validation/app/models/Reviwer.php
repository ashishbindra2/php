<?php
class Reviwer
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getEmail($rid)
    {
        $this->db->query("SELECT
        author_details.EMAIL as email FROM author_details
        JOIN paper_submission_detail ON paper_submission_detail.AUTH_ID =author_details.AUTH_ID
        JOIN assignment ON assignment.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID
        WHERE assignment.REVIEWER_ID=:rid
        ");
        $this->db->bind(':rid', $rid);
        $row = $this->db->single();
        return $row;
    }
    public function setComment($data)
    {
        $this->db->query("INSERT INTO paper_status_after_review  (PAPER_SUB_ID ,
        STATUS_ID ,REVIEWER_COMMENTS_TO_AUTHOR ) 
        VALUES (:file,:status,:comment)");

        $this->db->bind(':file', $data['file']);
        $this->db->bind(':status', $data['statu']);
        $this->db->bind(':comment', $data['comment']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getStatus()
    {
        $this->db->query("SELECT * FROM status ");
        $results = $this->db->resultSet();
        return $results;
    }
    public function report($rid)
    {
        $this->db->query("SELECT * FROM  paper_submission_detail p 
        JOIN assignment a ON p.PAPER_SUB_ID=a.PAPER_SUB_ID 
        WHERE a.REVIEWER_ID=:rid");
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function getNotice($rid)
    {
        $this->db->query('SELECT  j_issues.VOLUME_NO AS volume,
        reviewer_revimder_details.NOTIC AS notic,
        stream.STREAM_NAME AS stream,
        reviewer_revimder_details.REMINDER_DATE AS dates,
        reviewer_revimder_details.STATUS AS statu
        FROM 
        reviewer_revimder_details
        JOIN 
        paper_reviewer_record ON paper_reviewer_record.P_REVIEWER_DETAILS_ID = reviewer_revimder_details.PAPER_REVIEW_DETAIL_ID
        JOIN 
        paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID = paper_reviewer_record.PAPER_SUB_ID
        JOIN
        j_issues ON   j_issues.J_ISSUES_ID=paper_reviewer_record.EIC_ID
        JOIN
        stream   ON stream.STREAM_ID =paper_submission_detail.STREAM_ID
        WHERE paper_reviewer_record.REVIEWER_ID = :rid
        ');
        //bind the data
        $this->db->bind('rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function paperAuthorDownload($rid)
    {
        $this->db->query("SELECT paper_submission_detail.PAPER_PATH AS paper
        FROM assignment  JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID = assignment.PAPER_SUB_ID
          WHERE assignment.REVIEWER_ID = :rid");
        $this->db->bind(':rid', $rid);
        $results = $this->db->single();
        return $results;
    }
    public function download($rid)
    {
        $this->db->query("SELECT 
        paper_submission_detail.KEYWORDS as keywords,
        paper_submission_detail.ABSTRACT as abstract,
        paper_submission_detail.TITLE as title,
        paper_submission_detail.D_O_SUBMISSION as dob,
        stream.STREAM_NAME as stramName,
        j_issues.VOLUME_NO as volume, 
        j_issues.ISSUE_YEAR as issue,
        journal_names.JOURNAL_NAME as journal
        FROM assignment
                            JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID=assignment.PAPER_SUB_ID
                            JOIN j_issues ON j_issues.J_ISSUES_ID=assignment.ISSUE_ID
                            JOIN journal_names ON journal_names.JOURNAL_ID=assignment.JOURNAL_ID
                            -- JOIN author_details ON author_details.AUTH_ID=assignment.AUTH_ID
                            JOIN stream ON stream.STREAM_ID = paper_submission_detail.STREAM_ID
                            WHERE REVIEWER_ID=:rid");
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function paperSubmition($rid)
    {
        $this->db->query(
            "SELECT 
            assignment.PAPER_SUB_ID AS pid,
            paper_submission_detail.TITLE as title,
            j_issues.VOLUME_NO as volume,
            journal_names.JOURNAL_NAME as jname,
            assignment.notification as noti,
            assignment.DATE as dates,
            paper_submission_detail.ACTIVE as active
             FROM assignment
        JOIN j_issues ON j_issues.J_ISSUES_ID = assignment.ISSUE_ID
        JOIN journal_names ON journal_names.JOURNAL_ID = assignment.JOURNAL_ID
        JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID=assignment.PAPER_SUB_ID
        WHERE REVIEWER_ID=:rid"
        );
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function paperIssue($rid)
    {
        $this->db->query("SELECT  DISTINCT
        paper_submission_detail.PAPER_SUB_ID AS pids,
        paper_status_after_review.STATUS_ID AS sids,
        assignment.PAPER_SUB_ID AS pid,
        paper_submission_detail.TITLE  AS title,
        assignment.A_ACTIVE AS active
        FROM assignment
        JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID = assignment.PAPER_SUB_ID
        JOIN paper_status_after_review ON paper_status_after_review.PAPER_SUB_ID = paper_submission_detail.PAPER_SUB_ID
        WHERE assignment.REVIEWER_ID =:rid ORDER BY paper_submission_detail.PAPER_SUB_ID DESC LIMIT 1");
        // -- ;
        $this->db->bind(':rid', $rid);
        $results = $this->db->resultSet();
        return $results;
    }
    public function authorComment($data)
    {
        $this->db->query("INSERT INTO paper_status_after_review (PAPER_SUB_ID, PAPER_REVIEW_DETAIL_ID, STATUS_ID, REVIEWER_COMMENTS_TO_AUTHOR)
       VALUES (:pid, :rid,:sid,:comment)");
        //bind the data
        $this->db->bind(':pid', $data['pid']);
        $this->db->bind(':rid', $data['pid']);
        $this->db->bind(':sid', $data['statu']);
        $this->db->bind(':comment', $data['comment']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
