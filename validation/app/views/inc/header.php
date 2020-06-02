<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="icon" href="<?php echo IMG; ?>/logo_icon-min.png">
  <link rel="stylesheet" href="<?php echo STYLE; ?>/home.css">
  <link rel="stylesheet" href="<?php echo STYLE; ?>/style.css">
  <title><?php echo SITENAME; ?></title>
</head>
<style>
  abbr[title] {
    border-bottom: none !important;
    cursor: inherit !important;
    text-decoration: none !important;
  }
</style>

<body>
  <div class="container">
    <header id='menu-header'>
      <div class="row">
        <div class="col-sm-4 text-left mx-auto">
          <a href="<?php echo URLROOT; ?>pages/">
            <img src='<?php echo IMG; ?>/logo_s.png' class="mt-2 ml-2"></a>
        </div>
    

      </div>
    </header>
    <?php require APPROOT . '/views/inc/navbar.php'; ?>