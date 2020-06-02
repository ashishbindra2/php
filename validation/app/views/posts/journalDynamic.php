<?php
//Include database configuration file
if (isset($_POST["JOURNAL_ID"]) && !empty($_POST["JOURNAL_ID"])) {
    //Get all state data
    $query = $db->query("SELECT * FROM  journal_names JOIN stream ON stream.STREAM_ID = journal_names.STREAM_ID WHERE JOURNAL_ID=" . $_POST['JOURNAL_ID']);

    //Count total number of rows
    $rowCount = $query->num_rows;

    //Display states list
    if ($rowCount > 0) {
        echo '<option value="">Select stream</option>';
        while ($row = $query->fetch_assoc()) {
            echo '<option value="' . $row['STREAM_ID'] . '">' . $row['STREAM_NAME'] . '</option>';
        }
    } else {
        echo '<option value="">State not available</option>';
    }
} ?>

?>