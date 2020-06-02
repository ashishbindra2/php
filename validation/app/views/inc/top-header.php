<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link rel="icon" href="<?php echo IMG; ?>/logo_icon-min.png">
  <link rel="stylesheet" href="<?php echo STYLE; ?>/home.css">
  <title><?php echo SITENAME; ?></title>
</head>

<body>

  <div class="container">
    <header id='menu-header'>
      <div class="row">
        <div class="col-sm-4 text-center">
          <a href="index.php">
            <img src='<?php echo IMG; ?>/logo_s.png'></a>
        </div>
        <div class="col-sm-8 text-center">
          <p class="h2 mx-auto text-center" style="margin-top: 50px;"><strong> <?php echo $data['header-title']; ?> </strong></p>
        </div>

      </div>
    </header>