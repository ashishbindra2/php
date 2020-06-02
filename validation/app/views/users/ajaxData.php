

<?php
if (isset($_POST["JOURNAL_ID"]) && !empty($_POST["JOURNAL_ID"])) {
    //Get all state data

    //Count total number of rows


    //Display states list
    if (isset($data['issue'])) {
        echo '<option value="">Select Issue</option>';
        foreach ($data['issue'] as $row) {
            echo '<option value="' . $row->J_ISSUES_ID . '">' . $row->VOLUME_NO . '</option>';
        }
    } else {
        echo '<option value="">issue not available</option>';
    }
} else
    echo 'issue not available'


?>