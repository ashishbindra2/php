<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/home' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/postIssue' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Past Issue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/specialIssue' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Spacial Issue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/callForPaper' . '&id=' . $data['journalId']->JOURNAL_ID; ?>"><abbr title="Call For Paper"> CFP</abbr></a>
        </li>
        <li class="dropdown">
          <a class="btn dropdown-toggle navbar-dark bg-dark" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true" style="color:rgb(148,157,154);">Links</a>
          <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
            <a href="<?php echo URLROOT . 'pages/advisoryboard' . '&id=' . $data['journalId']->JOURNAL_ID; ?>" class="nav-item nav-link">Advisory Board</a>
            <a href="<?php echo URLROOT . 'pages/ethics' . '&id=' . $data['journalId']->JOURNAL_ID; ?>" class="nav-item nav-link">Publication Ethics</a>
            <a href="<?php echo URLROOT . 'pages/editor' . '&id=' . $data['journalId']->JOURNAL_ID; ?>" class="nav-item nav-link">Editor</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/reviewer' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Reviewer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'logins/index' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Admins </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'pages/contactUs' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Contact Us</a>
        </li>

      </ul>

      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT . 'posts/index' . '&id=' . $data['journalId']->JOURNAL_ID; ?>"> <?php echo $_SESSION['user_name']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT . 'users/logout' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT . 'users/register' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT . 'users/signIn' . '&id=' . $data['journalId']->JOURNAL_ID; ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>