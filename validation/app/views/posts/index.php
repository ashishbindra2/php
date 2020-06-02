<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo STYLE . '/author.css'; ?>">

<div id="main">

  <?php flash('post_message'); ?>
  <section class="blog">
    <div class="conts">
      <h3>Welcome
        <span> <?php echo $data['posts']->FNAME, " ", $data['posts']->MNAME, " ", $data['posts']->LNAME; ?>
        </span> </h3>
      <hr>
    </div>
  </section>
  <section>
    <div id="conts">
      <!-- main -->
      <div class="container">
        <div class="row row-offcanvas row-offcanvas-right mt-3">
          <div class="col-12 col-md-8">
            <!-- table -->
            <!-- <div class="table-box"> -->

            <table class="table">

              <tr>
                <th scope=" row"> Email :</th>
                <td> <?php echo $data['posts']->EMAIL; ?> </td>
              </tr>
              <tr>
                <th scope="row"> Contact Number : </th>
                <td><?php echo $data['posts']->MOBILE; ?> </td>
              </tr>
              <tr>
                <th scope="row"> Institute Name : </th>
                <td><?php echo $data['posts']->INSTITUTE_NAME; ?></td>
              </tr>
              <tr>
                <th scope="row"> Title :</th>
                <td><?php echo $data['posts']->A_TITLE; ?></td>
              </tr>
              <tr>
                <th scope="row"> City :</th>
                <td><?php echo $data['posts']->CITY; ?></td>
              </tr>
              <tr>
                <th scope="row"> State :</th>
                <td><?php echo $data['posts']->STATE; ?></td>
              </tr>
              <tr>
                <th scope="row"> Country :</th>
                <td><?php echo $data['posts']->COUNTRY; ?></td>
              </tr>

            </table>
            <!-- </div> -->
            <!-- X table -->
          </div>
          <!--Xmain  -->

          <!-- right menu -->
          <div class=" col-12 col-md-4 sidebar-offcanvas" id="sidebar">
            <!-- <aside class=" right " id="sidebar""> -->

            <!-- news -->

            <div class=" news_log">
              <?php echo "<a href='" . POSTS . "userUpload&id=" . $data['journalId']->JOURNAL_ID . "'>" . "Paper submission " . "</a>"; ?>
            </div>
            <div class="news_log">
              <?php echo "<a href='" . POSTS . "paperStatus&id=" . $data['journalId']->JOURNAL_ID . "'>" . "Paper Reports " . "</a>"; ?>
            </div>
            <div class="news_log">
              <?php echo "<a href='" . POSTS . "editProfile&id=" . $data['journalId']->JOURNAL_ID . "'>" . "Edit Profile " . "</a>"; ?>
            </div>
            <div class="news_log">
              <?php echo "<a href='" . POSTS . "changePassword&id=" . $data['journalId']->JOURNAL_ID . "'>" . "Change Password " . "</a>"; ?>
            </div>
            <!-- x xnews -->

            <!--x right -->

            <!-- </aside> -->
          </div>
        </div>
      </div>
  </section>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>