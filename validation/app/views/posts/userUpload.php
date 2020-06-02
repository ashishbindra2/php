<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="main">
    <div class="container">
        <marquee>
            <span class="h2"> *Welcome <?php echo $data['posts']->FNAME; ?>
                Please Fill All the fiels and Upload your Paper.
                Paper status will be shown in Paper Status tab
            </span>
        </marquee>
        <?php if (!empty($data['error'])) {
            foreach ($data['error'] as $da) : ?>
                <div class="">
                    <script>
                        alert('<?php echo $da; ?>');
                    </script>
                </div>
        <?php endforeach;
        } ?>
        <hr>
        <?php echo "<a class='btn btn-light'  href=" . POSTS . "?&id=" . $data['journalId']->JOURNAL_ID . " class='das' ><i class='fa fa-backward'></i>Back</a>"; ?>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-body mt-4">
                    <h2>Add Detail</h2>
                    <p>Please fill out this form to upload the paper </p>
                    <form class="md-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="jjid">Journal</label>
                            <select class="form-control" name="jjid" id="jid">
                                <!-- <option ="" required>Please select a journal</option> -->
                                <?php
                                if ($data['journalName']) {
                                    foreach ($data['journalName'] as $key) {

                                        echo '<option value="' . $key->JOURNAL_ID . '">' . $key->JOURNAL_NAME . '</option>';
                                    }
                                } else {
                                    echo '<option value="">journal not available</option>';
                                }
                                ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $data['journal_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="id">Select a Stream</label>
                            <select class="form-control <?php echo (!empty($data['stram_err'])) ? 'is-invalid' : ''; ?>" name="Sid" id="id">
                                <option value="<?php echo  $data['stram']; ?>">Please select a streams</option>
                                <?php
                                if ($data['sid']) {
                                    foreach ($data['sid'] as $key) {

                                        echo '<option value="' . $key->STREAM_ID . '">' . $key->STREAM_NAME . '</option>';
                                    }
                                } else {
                                    echo '<option value="">journal not available</option>';
                                }
                                ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $data['stram_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="paper_title">Paper Title </label>
                            <input type="Text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" id="paper_title" name="paper_title" value="<?php echo  $data['title']; ?>">
                            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                        </div>
                        <!-- <div class="form-group">
                            <label for="Author_name">Author names</label>
                            <input type="Text" class="form-control <?php echo (!empty($data['author_err'])) ? 'is-invalid' : ''; ?>" id="Author_name" name="Author_name" value="<?php echo  $data['author']; ?>">
                            <span class="invalid-feedback"><?php echo $data['author_err']; ?></span>
                        </div> -->
                        <div class="form-group">
                            <label for="keyword">Enter Keywords</label>
                            <input type="text" class="form-control <?php echo (!empty($data['keyword_err'])) ? 'is-invalid' : ''; ?>" id="keyword" value="<?php echo  $data['keyword']; ?>" name="keyword">
                            <span class="invalid-feedback"><?php echo $data['keyword_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="Description">Enter Paper Description</label>
                            <textarea name="Description" class="form-control <?php echo (!empty($data['issue_err'])) ? 'is-invalid' : ''; ?>" id="Description"><?php echo  $data['description']; ?></textarea>
                            <span class="invalid-feedback"><?php echo $data['issue_err']; ?></span>
                        </div>
                        <div class="form-group">

                            <div class="custom-file">
                                <input type="file" id="fileToUpload" name="fileToUpload" class="custom-file-input <?php echo (!empty($data['file_err'])) ? 'is-invalid' : ''; ?>" value=" <?php echo  $data['file']; ?>" required>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback"><?php echo $data['file_err']; ?></div>
                            </div>

                        </div>

                        <div class="form-group">
                            <p style="color:red;" class="lead">*Press "NEXT" to add co-authors</p>
                            <input type=submit value="NEXT" name="submit" class="btn btn-success mx-auto">
                        </div>

                    </form>
                </div>
                <!-- js here -->
            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        function findStream() {
            var JOURNALID = $(this).val();
            if (JOURNALID) {
                $.ajax({
                    type: ' POST', url: 'journalDynamic.php' , data: 'JOURNAL_ID=' + JOURNALID, success: function(html) { $('#id').html(html); } }); } else { $('#id').html('<option value="">Select journal first</option>');
                            }
                            }
                            $(document).ready(function() {
                            $('input[type="checkbox"]').click(function() {
                            var inputValue = $(this).attr("value");
                            $("." + inputValue).toggle();
                            });
                            findStream.bind($('#jid'))();
                            $('#jid').on('change', findStream);

                            });
                            </script> -->
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>