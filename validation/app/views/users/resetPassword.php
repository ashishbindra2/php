<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">
	<div class="container">
		<form name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();" class="d-flex justify-content-center">
			<div class="col-sm-6">
				<div class="col-md-6 mx-auto">

					<h1 class="h2 mt-2">Reset Password</h1>
					<?php if (!empty($success_message)) { ?>
						<div class="success_message"><?php echo $success_message; ?></div>
					<?php } ?>
				</div>
				<div id="validation-message">
					<?php if (!empty($error_message)) { ?>
						<?php echo $error_message; ?>
					<?php } ?>
				</div>

				<div class="form-group">
					<div><label for="Password">Password</label></div>
					<div>
						<input type="password" name="member_password" id="member_password" class="form-control"></div>
				</div>

				<div class="form-group">
					<div><label for="email">Confirm Password</label></div>
					<div><input type="password" name="confirm_password" id="confirm_password" class="form-control"></div>
				</div>

				<div class="form-group">
					<input type="submit" name="reset-password" id="reset-password" value="Reset Password" class="btn">
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	function validate_password_reset() {
		if ((document.getElementById("member_password").value == "") && (document.getElementById("confirm_password").value == "")) {
			document.getElementById("validation-message").innerHTML = "Please enter new password!"
			return false;
		}
		if (document.getElementById("member_password").value != document.getElementById("confirm_password").value) {
			document.getElementById("validation-message").innerHTML = "Both password should be same!"
			return false;
		}

		return true;
	}
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>