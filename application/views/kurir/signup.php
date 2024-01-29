
<style type="text/css">
	#scroll {
		height:400px;
		overflow:scroll;
	}
</style>
<div class="page page--login" data-page="login">

	<!-- HEADER -->
	<header class="header header--fixed">	
		<div class="header__inner">	
			<div class="header__icon"><a onclick="history.back()"><img src="<?php echo base_url(); ?>assets/mobile/assets/images/icons/white/arrow-back.svg" alt="" title=""/></a></div>
			<!-- <a href="<?php echo base_url();?>pelanggan/splash"><img src="https://mobiokit.com/assets/images/icons/white/arrow-back.svg" alt="" title=""/></a>	 -->
		</div>
	</header>

	
	<div class="login">
		<div class="login__content">	


			<!-- <h2 class="login__title">Selamat Datang</h2> -->
			<!-- <p class="login__text"><strong>SISTEM LAYANAN MASYARAKAT KECAMATAN PAYARAMAN</strong><br><br>Silahkan Login Akun Anda</p> -->
			<center><img src="<?php echo base_url()?>assets/logo.png" width="30%"></center><br>
			<p class="login__text"><strong>SISTEM LAYANAN MASYARAKAT KECAMATAN PAYARAMAN</strong></p>
			<div id="scroll">
				<div class="login-form">
					<form id="LoginForm" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>masyarakat/register">
						<div class="login-form__row">
							<label class="login-form__label">NIK</label>
							<input type="number" name="no_ktp" value="" placeholder="Isikan NIK*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Nama Lengkap</label>
							<input type="text" name="nama_lengkap" value="" placeholder="Isikan Nama Lengkap*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Tempat Lahir</label>
							<input type="text" name="tempat_lahir" value="" placeholder="Isikan Tempat Lahir*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Tanggal Lahir</label>
							<input type="date" name="tanggal_lahir" value="" placeholder="Isikan Tanggal Lahir*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Pekerjaan</label>
							<input type="text" name="pekerjaan" value="" placeholder="Isikan Pekerjaan*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Agama</label>
							<select class="login-form__input required" name="agama">
								<option value="">Pilih Agama</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
							</select>
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Alamat</label>
							<!-- <input type="text" name="email" value="" class="login-form__input required email" /> -->
							<textarea name="alamat" class="login-form__input required" placeholder="Isikan Alamat*"></textarea>
						</div>
						<div class="login-form__row">
							<label class="login-form__label">No.Telp</label>
							<input type="number" name="no_telpon" value="" placeholder="Isikan Nomor Telpon*" class="login-form__input required " />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Email</label>
							<input type="email" name="email" value="" placeholder="Isikan Email*" class="login-form__input required email" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Password</label>
							<input type="password" name="password" value="" placeholder="Isikan Password*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<label class="login-form__label">Foto KTP</label>
							<input type="file" name="foto_ktp" value="" accept="image/*" class="login-form__input required" />
						</div>
						<div class="login-form__row">
							<input type="submit" name="submit" class="login-form__submit button button--main button--full" id="submit" value="SIGN UP" />
						</div>
					</form>
					<!-- <div class="login-form__forgot-pass"><a href="forgot-password.html">Forgot Password?</a></div>		 -->
					<div class="login-form__bottom">
						<p>Sudah Punya Akun?</p>
						<a href="<?php echo base_url(); ?>pelanggan/login" class="button button--secondary button--full">Log in</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	



</div>

