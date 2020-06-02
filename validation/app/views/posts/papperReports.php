<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo STYLE . '/paper.css'; ?>">
<div id="main">
  <div class="container">
    <?php echo "<a class='btn btn-light'  href=" . POSTS . "&id=" . $data['journalId']->JOURNAL_ID . " class='das' ><i class='fa fa-backward'></i>Back</a>"; ?>

    <div id="contents">
      <h3> Your Uploaded Papers </h3>
      <hr>
      <section>
        <table class="table">
          <tr>
            <th>HISTORY</th>
          </tr>

          <?php
          if ($data['date']) {
            foreach ($data['date'] as $date) :
          ?>
              <tr>
                <td><?php echo "<b>Name of Paper: </b>" . $date->TITLE; ?></td>
                <td><?php echo "<b>Date Of Uploading </b>" . $date->D_O_UPLOADING; ?></td>
                <td><?php echo "<b> Date Of Submission </b>" . $date->D_O_SUBMISSION; ?></td>
              </tr>

              <?php if ($date->editor_view) : ?>
                <tr>
                  <td><?php echo "<b>Notification read by editior : </b>" . $date->editor_view; ?></td>
                  <td><?php echo ""; ?></td>
                </tr>
              <?php endif;
            endforeach;
            //deitor assiged assocaiate editior
            if (isset($data['ass'])) {

              foreach ($data['ass'] as $date) :
              ?>
                <tr>
                  <td><?php echo "<b>Action Taken By Editor : </b>" . $date->DATE;
                      ?></td>
                  <!-- <td><?php //echo "<b>Action taken by associate Editor </b>" . $date->DATE; //chage it to assiged by editor in editor panel -->
                            ?></td>
                  <- <td><?php //echo "<b>Assied Date  assciate editor </b>" . $date->DATE; 
                          ?></td> -->
                  <!-- / </tr> -->
                <?php endforeach;
            }
            //assied reviwer by assocate editior

            foreach ($data['reviwer'] as $reviwerer) :
                ?>
                <tr>
                  <td><?php echo "<b>Assigned to Reviwer 1 </b>" . $reviwerer->FNAME; //chage it to assiged by editor in editor panel
                      ?></td>
                  <td><?php echo "<b>Assigned to Reviwer 2 </b>" . $reviwerer->FNAME; ?></td>
                  <td><?php echo "<b>Assigned to Reviwer 3 </b>" . $reviwerer->FNAME; ?></td>
                </tr>
                <?php endforeach;
              if (!empty($data['reviwer'])) {
                foreach ($data['reviwer'] as $reviwerer) :
                ?> <tr>
                    <td><?php echo "<b>Request sent  to Reviwer 1 </b>" . $reviwerer->Reviwer_Acceptance_Request_Sent_Date; //chage it to assiged by editor in editor panel
                        ?></td>
                    <td><?php echo "<b>Request sent  to Reviwer 2 </b>" . $reviwerer->Reviwer_Acceptance_Request_Sent_Date; ?></td>
                    <td><?php echo "<b>Request sent  to Reviwer 3 </b>" . $reviwerer->Reviwer_Acceptance_Request_Sent_Date; ?></td>
                  </tr>
                  <tr>
                    <td><?php echo "<b>Request Recive By Reviwer 1 </b>" . $reviwerer->Reviwer_Acceptance_Receiver_Date; //chage it to assiged by editor in editor panel
                        ?></td>
                    <td><?php echo "<b>Request Recive By Reviwer 2 </b>" . $reviwerer->Reviwer_Acceptance_Receiver_Date; ?></td>
                    <td><?php echo "<b>Request Recive By Reviwer 3 </b>" . $reviwerer->Reviwer_Acceptance_Receiver_Date; ?></td>
                  </tr>
                <?php endforeach;
              } else {
                echo "No Respose by reviwers";
              }


              if ($data['editor']) {
                foreach ($data['editor'] as $editor) :
                ?> <tr>
                    <td><?php echo "<b>Dession by Reviwers : </b>" . $editor->STATUS_NAME; ?></td>
                    <td><?php echo "<b>Dession by Reviwers :</b>" . $editor->REVIEWER_COMMENTS_TO_AUTHOR; //chage it to assiged by editor in editor panel
                        ?></td>
                    <td><?php echo "<b>Assiged Date  assciate editor :</b>" . $editor->DATE; ?></td>
                  </tr>
              <?php endforeach;
              } else {
                echo "0 results LARGE";
              }
            } else {
              ?>
              <tr>
                <td>
                  No submission by the User
                </td>
              </tr>
            <?php
            }
            ?></tr>


        </table>

        <div>
        </div>
      </section>

    </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>