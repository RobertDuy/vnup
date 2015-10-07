<?php var_dump($_SESSION)?>

<div class="container container-top"></div>
	<div id="main-container" class="wrap-container container clearfix">
		<div class="main-content full-width controller-site action-login">
        
			<div class="login-signup-container clearfix">
				<h1 class="gutter-bottom clearfix align-center"> Log In
                    <aside class="clearfix">Don't have an account?
                        <a class="call-to-action" href="user/signup">Sign Up</a>
                    </aside>
				</h1>
				<div class="login-form-container">
					<form action="user" accept-charset="utf-8" method="post" id="loginPostForm">
						<div class="fullPage loginDiv clearfix">
							<div>
								<div class="clearfix" data-hook="partial-social-buttons">
									<div class="col-xs-12">
										<div class="col-xs-12 col-sm-6 social-left clearfix">
											<a class="action-social-login medium button facebook social-button login-fb-link" rel="nofollow" href="<?= $facebookLoginUrl; ?>">
												<i class="fa fa-facebook"></i><span>Log In with Facebook</span>
											</a>
										</div>                
										<div class="col-xs-12 col-sm-6 social-right">
											<a class="action-social-login medium button social-button linkedin last login-li-link" rel="nofollow" href="<?= $loginViaLinkin; ?>">
												<i class="fa fa-linkedin"></i><span>Log In with LinkedIn</span>
											</a>
										</div>                
									</div>
								</div>
								<div class="gutter-top align-center" data-hook="partial-facebook-button" style="display: none;">
									<a class="action-social-login tall button social-button facebook" rel="nofollow" href="#">Sign Up with Facebook</a>                <div class="fb-facepile-container last clearfix">
										<div class="stylish-arrow"></div> <fb:facepile  width="300" max_rows="1"></fb:facepile>
									</div>
								</div>
							</div>
							<div class="or-separator clearfix gutter-top gutter-bottom">or</div>
								<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-4 col-md-offset-4 no-padding">
									<div class=" signin clearfix" >
										<div class="gutter-bottom clearfix">
											<label class="clear" for="LoginForm_email">Email</label>            
											<input tabindex="1" class="medium clear login-signup-email" data-tip-position="bottom" name="LoginForm[email]" id="LoginForm_email" type="email" value="" required/>
										</div>
										<div class="clearfix gutter-bottom">
											<label class="clear" for="LoginForm_password">Password</label>            
											<input tabindex="2" class="medium clear" autocomplete="off" data-tip-position="bottom" name="LoginForm[password]" id="LoginForm_password" type="password" required/>
										</div>
										<div class="clearfix gutter-bottom">
											<div class="col-xs-6 no-padding text-right">
												<input id="ytLoginForm_rememberMe" type="hidden" value="0" name="LoginForm[rememberMe]" />
												<input tabindex="3" checked="checked" class="plain left clear pph-custom-input" name="LoginForm[rememberMe]" id="LoginForm_rememberMe" value="1" type="checkbox" />                
												<label class="left rememberMe" for="LoginForm_rememberMe">Remember me</label>            
											</div>
											<div class="col-xs-6 no-padding text-right">
												<div class="clear clearfix">
													<a class="forgotPassword gutter-bottom clear" rel="nofollow" href="/site/forgot">Forgot password?</a>                
												</div>
											</div>

										</div>

										<div class="clearfix">
											<input tabindex="4" class="call-to-action tall gutter-bottom btn-inverted" type="submit" name="yt0" value="Log In" />                
											<div class="tocLink clear">
												By clicking Log In, Facebook or LinkedIn<br>you agree to our new <a tabindex="7" rel="nofollow" href="#">T&C's</a>                
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </form>
                    <script>
                        $('#loginPostForm').validate();
                    </script>
				</div>
			</div>
		</div>
    </div>
       


