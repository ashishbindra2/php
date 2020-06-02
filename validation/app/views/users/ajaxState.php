<?php
if (isset($_POST["country_id"]) && !empty($_POST["country_id"])) {
    //Get all state data

    //Display states list
    if (isset($data['state'])) {
        echo '<option value="">Select state</option>';
        foreach ($data['state'] as $row) {
            echo '<option value="' . $row->state_id . '">' . $row->state_name . '</option>';
        }
    } else {
        echo '<option value="">State not available</option>';
    }
}

if (isset($_POST["state_id"]) && !empty($_POST["state_id"])) {

    //Display cities list
    if (isset($data['city'])) {
        echo '<option value="">Select city</option>';
        foreach ($data['city'] as $row) {
            echo '<option value="' . $row->city_id . '">' . $row->city_name . '</option>';
        }
    } else {
        echo '<option value="">City not available</option>';
    }
}
