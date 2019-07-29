
<?php 
	$adm = new Admin();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$adminData = $adm->getAdminData($_POST);
	}
?>

<div class="main">
	<h1>Admin Login</h1>

	<?php 
		if(isset($adminData)){
			echo $adminData;
		}
	?>
	<div class="adminlogin">

		<form action="" method="post">
			<table>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pasword"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="login" value="Login"/></td>
				</tr>
				
			</table>
		</form>
	</div>
</div>

