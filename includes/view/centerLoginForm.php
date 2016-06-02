<?php
$sql = "select PROVINCE_ID, PROVINCE_NAME from province order by PROVINCE_NAME";
$mQuery = new MainQuery();
$result = $mQuery->getResultAll($sql);
?>
		<div class="row">
			<div class="col-md-9 col-md-offset-1" style="padding-top:30px;padding-bottom:30px;">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="includes/control/loginUser_Ctl.php" method="post" role="form" style="display: block;">

									<?php if(isset($_REQUEST['errLog'])){?>
                                    	<div class="alert alert-danger" role="alert">
	                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	                                        <span class="sr-only">Error:</span>
	                                            <label>Email or Password not match in system. Plaese Try Again !!!</label>
                                        </div>
                                    <?php } ?>

									<div class="form-group">
										<input type="email" name="loginName" id="loginName" maxlength="50" tabindex="1" class="form-control" placeholder="Your Email" value="" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
									</div>
									<div class="form-group">
										<input type="password" name="loginPass" id="loginPass" maxlength="20" tabindex="2" class="form-control" placeholder="Your Password" required>
									</div>
									<!-- <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div> -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<!-- <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div> -->
								</form>
								<form id="register-form" action="includes/control/signupMember_Ctl.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="email" name="signEmail" id="signEmail" maxlength="50" tabindex="1" class="form-control" placeholder="Your E-Mail" value="" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
									</div>
									<div class="form-group">
										<select name="signProvince" id="signProvince" class="form-control" tabindex="2">
						                	<?php foreach($result as $r){ ?>
						                		<option value="<?php echo $r['PROVINCE_ID'] ?>"><?php echo $r['PROVINCE_NAME'] ?></option>
						                   	<?php } ?>
						                </select>
									</div>
									<div class="form-group">
										<input type="password" name="signPassword" id="signPassword" maxlength="20" tabindex="2" class="form-control" placeholder="Password" tabindex="3" required>
									</div>
									<div class="form-group">
										<input type="password" name="signPassword2" id="signPassword2" maxlength="20" tabindex="2" class="form-control" placeholder="Confirm Password" tabindex="4" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php unset($mQuery); ?>