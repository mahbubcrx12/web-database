<div class="col-md-3">
	<div class="list-group">
	  <a href="#" class="list-group-item active main-color-bg">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Student Dashboard
	  </a>
	  <a href="posts.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Update Profile </a>
	  <a href="pages.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Change Password </a>
	  <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Exam Registration </a>
	</div>
	<div class="well">
		<h4>Exam Performance</h4>
		<div class="progress">
		  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
			60%
		  </div>
		</div>
	</div>
	<div class="list-group">
	  <a href="#" class="list-group-item active main-color-bg">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Exam List
	  </a>
	  <a href="<?php echo urlhelper::baseurl();?>/student/index?<?php echo base64_encode('action');?>=<?php echo base64_encode('17');?>" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Select Course <span class="badge">14</span></a>
	  <a href="<?php echo urlhelper::baseurl();?>/student/index?<?php echo base64_encode('action');?>=<?php echo base64_encode('21');?>" class="list-group-item"><span class="glyphicon glyphicon-text-width" aria-hidden="true"></span>  Exam Details <span class="badge">74</span></a>
	  <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Pannding Exam <span class="badge">203</span></a>
	  <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>  JAVASCRIPT <span class="badge">203</span></a>
	  <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>  PHP <span class="badge">203</span></a>
	  <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-random" aria-hidden="true"></span>  LARAVEL <span class="badge">203</span></a>
	</div>
</div>