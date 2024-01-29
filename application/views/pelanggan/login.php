

<div class="page page--login" data-page="login">

	<!-- HEADER -->
	<header class="header header--fixed">	
		<div class="header__inner">	
			<div class="header__icon"><a href="<?php echo base_url();?>pelanggan/splash"><img src="https://mobiokit.com/assets/images/icons/white/arrow-back.svg" alt="" title=""/></a></div>	
		</div>
	</header>

	<div class="login">
		<div class="login__content">	
			
			
			<!-- <h2 class="login__title">Selamat Datang</h2> -->
			<!-- <p class="login__text"><strong>SISTEM LAYANAN MASYARAKAT KECAMATAN PAYARAMAN</strong><br><br>Silahkan Login Akun Anda</p> -->
			<center><img src="<?php echo base_url()?>assets/logo.png" width="30%"></center><br>
			<p class="login__text"><strong>E-Laundry Fifah Laundry</strong></p>
			<div class="login-form">
				<form id="LoginForm" method="post" action="<?php echo base_url();?>auth/sign">
					<div class="login-form__row">
						<label class="login-form__label">Email</label>
						<input type="email" name="email" value="" class="login-form__input required email" />
					</div>
					<div class="login-form__row">
						<label class="login-form__label">Password</label>
						<input type="password" name="password" value="" class="login-form__input required" />
					</div>
					<div class="login-form__row">
						<input type="submit" name="submit" class="login-form__submit button button--main button--full" id="submit" value="SIGN IN" />
					</div>
				</form>
				<!-- <div class="login-form__forgot-pass"><a href="forgot-password.html">Forgot Password?</a></div>		 -->
				<div class="login-form__bottom">
					<p>Belum Punya Akun?</p>
					<a href="<?php echo base_url(); ?>pelanggan/signup" class="button button--secondary button--full">SIGN UP</a>
				</div>
			</div>
		</div>
	</div>



</div>
