<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?=APP_ROOT?>/content/styles.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?=APP_ROOT?>/content/style.css" />
    <title><?php if (isset($this->title)) echo htmlspecialchars($this->title) ?></title>
</head>

<body>
<header>
  <nav class="navbar" style="background-color: lightblue" >
    <div class="container" style="background-color: lightblue">
        <div class="navbar-header" style="background-image: url('<?=APP_ROOT?>/content/images/logo_0.png');  height:105px; width:205px; position:absolute;">
            <div style="float: left;">
                <p class="header">Hello World Team </p>
            </div>
        </div>
        <ul class="navigation" style="float:right;">
			<li class="active"><a href="<?=APP_ROOT?>/">Home</a></li>
			<?php if ($this->isLoggedIn) : ?>
            <li><a href="<?=APP_ROOT?>/posts">Posts</a></li>
            <li><a href="<?=APP_ROOT?>/posts/create">Create Post</a></li>
			<li><a href="<?=APP_ROOT?>/users">Users</a></li>
			<?php else: ?>
			<li><a href="<?=APP_ROOT?>/users/login">Login</a></li>
            <li><a href="<?=APP_ROOT?>/users/register">Register</a></li>
			 <?php endif; ?>
			 <?php if ($this->isLoggedIn) : ?>
			  <li>
				<div id="logged-in-info">
					<span>Hello, <b><?=htmlspecialchars($_SESSION['username'])?></b></span>
					<form method="post" action="<?=APP_ROOT?>/users/logout">
					<input type="submit" value="Logout"/>
				</form>
				</div>
            </li>
        </ul>
    </div>
</nav>
    <?php endif; ?>
</header>

<?php require_once('show-notify-messages.php'); ?>
