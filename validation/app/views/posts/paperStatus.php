<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo STYLE . '/paperDetail.css' ?>">
<div id="main">
    <div class="">
        <header id="main-header">
            <div class="container">
                <h1><i class="fas fa-brain"></i> Paper Status</h1>
                <h3><i class="fas fa-user"></i><a href="<?php echo URLROOT . 'posts/papperReports&id=' . $data['journalId']->JOURNAL_ID;; ?>" class="text-white"> Auther paper details</a> </h3>
            </div>
        </header>
        <section id="timeline">
            <ul>
                <li><?php if (isset($data['date'])) :
                    ?>
                        <div>
                            <?php foreach ($data['date'] as $date) : ?>
                                <h3><i class="fas fa-check"></i> File Uploaded</h3>
                                <p> <?php echo "<b>Date Of Uploading </b>" . date("d/m/Y", strtotime($date->D_O_UPLOADING)); ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </li>

                <li> <?php
                        if (isset($data['ass'])) { ?>
                        <div>
                            <?php //foreach ($data['ass'] as $date) {
                            if ($data['ass']->dates) { ?>

                                <h3><i class="fas  fa-check"></i>Action Taken By Editor</h3>
                                <p> <?php echo "<b>On  : </b>" . date("d/m/Y", strtotime($data['ass']->dates)); ?></p>

                        <?php      }
                        }
                        // } 
                        ?>
                        </div>
                </li>
                <li>
                    <?php
                    if (isset($data['associate'])) { ?> <div>
                            <?php foreach ($data['associate'] as $date) {
                                if ($date->Reviwer_Acceptance_Request_Sent_Date) { ?>
                                    <h3><i class="fas  fa-check"></i>Action taken by associate Editor</h3>
                                    <p> <?php echo "<b>At  : </b>" . date("d/m/Y", strtotime($date->Reviwer_Acceptance_Request_Sent_Date)); ?></p>

                            <?php      }
                            } ?>

                        </div><?php  } ?>
                </li>
                <li><?php if (isset($data['reviwer'])) {
                    ?>
                        <?php foreach ($data['reviwer'] as $reviwerer) :
                            if (isset($reviwerer->Reviwer_Acceptance_Receiver_Date)) { ?>
                                <div>
                                    <h3><i class="fas  fa-check "> </i> Request to Reviwer</h3>
                                    <p><?php echo "<b>On Date  </b>" . date("d/m/Y", strtotime($reviwerer->Reviwer_Acceptance_Receiver_Date)); //chage it to assiged by editor in editor panel
                                        ?></p>
                                </div>
                    <?php   }
                        endforeach;
                    } ?>
                </li>
                <li><?php if (isset($data['editor'])) {
                        foreach ($data['editor'] as $editor) : ?>
                            <div>
                                <h3><i class="fas fa-chevron-right"></i> Dession by Reviwers</h3>
                                <p><?php echo $editor->STATUS_NAME; ?></p>
                            </div><?php endforeach;
                            } ?>
                </li>
                <li><?php if (isset($data['editor'])) {
                        foreach ($data['editor'] as $editor) : ?>
                            <div>
                                <h3><i class="fas fa-chevron-right"></i> Comments</h3>
                                <p><?php echo $editor->REVIEWER_COMMENTS_TO_AUTHOR; ?></p>
                            </div><?php endforeach;
                            } ?> </li>
            </ul>
        </section>
    </div>
</div>
<script src="<?php echo JS . '/paperDetail.js'; ?>">
</script>

<?php require(APPROOT . '/views/inc/footer.php'); ?>