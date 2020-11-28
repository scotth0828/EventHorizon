<?php include 'header.php';

if ($acc->isLoggedIn())
	header('Location: index.php');

function getValue($key) {
	$url = $_SERVER['QUERY_STRING'];
	$decoded = urldecode($url);
	if (strpos($decoded, 'enc=true') !== false) {
		$ar = explode('&', $decoded);
		foreach ($ar as $a) {
			$ex = explode('=', $a);
			if ($ex[1] != NULL && $ex[0] === $key)
				return $ex[1];
		}
	}
	return '';
}

 ?>

<content class="container text-center">

<div class="col-md-4 col-md-offset-4 loginform">
	<form action="loginaccount.php" method="POST">
		<label id="signinlabel">Sign In</label>
		<div class="loginErrorMessage"><p><?php echo getValue('errormessage'); ?></p></div>
		<div class="form-group">
			<input name="username" type="text" class="form-control" id="username" placeholder="Username">
		</div>
		<div class="form-group">
			<input name="password" type="password" class="form-control" id="password" placeholder="Password">
		</div>
		<div class="fplink">
			<a href="#">Forgot Password?</a>
		</div>
		<button name="submit" type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

</content>

<?php 

if (getValue('errormessage') === '') {
	?>
	<script>
		$('.loginErrorMessage').remove();
	</script>
	<?php
}
include 'footer.php'; ?>