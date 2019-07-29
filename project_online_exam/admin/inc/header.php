<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Student | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo urlhelper::baseurl();?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo urlhelper::baseurl();?>/admin/css/style.css" rel="stylesheet">
 <script src="<?php echo urlhelper::baseurl();?>/js/jquery.js"></script>
    <script src="<?php echo urlhelper::baseurl();?>/js/bootstrap.min.js"></script>
	<script src="<?php echo urlhelper::baseurl();?>/js/ckeditor.js"></script>
	<script src="<?php echo urlhelper::baseurl();?>/admin/js/admin.js"></script>
  </head>

  <body>
<!-- Static navbar -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.html">AdminStrap</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home">Dashboard</a></li>
            <li><a href="pages.html">Pages</a></li>
            <li><a href="posts.html">Posts</a></li>
            <li><a href="users.html">Users</a></li>
           </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo session::get('User'); ?></a></li>
            <li><a href="logout.php?action=logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Admin Dashboard <small>Manage Your Account</small></h1>
				</div>
				<div class="col-md-2">
					<div class="dropdown create">
					  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Create Content
						<span class="caret"></span>
					  </button>
						 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
							<li><a href="#">Add Post</a></li>
							<li><a href="#">Add User</a></li>
						 </ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="breadcrumb">
		<div class="container">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</div>
</section>