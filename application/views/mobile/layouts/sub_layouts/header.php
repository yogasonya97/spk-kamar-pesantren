<header class="header py-2 mx-auto">
	<div class="header-content">
		<div class="left-content">
			<div class="info">
				<p class="text m-b10">
					<?= $title; ?>
				</p>
				<h5 class="title">
					<?= $subtitle; ?>
				</h5>
			</div>
		</div>
		<div class="mid-content"></div>
		<div class="right-content d-flex align-items-center gap-4">
			<!-- <a
								href="notification.html"
								class="notification-badge font-20 badge-active"
							>
								<svg
									width="30"
									height="30"
									viewBox="0 0 24 24"
									class="svg-primary"
									fill="none"
									xmlns="http://www.w3.org/2000/svg"
								>
									<path
										d="M21.7329 21.68C21.8273 21.5791 21.8998 21.4597 21.9457 21.3295C21.9917 21.1992 22.0101 21.0608 21.9999 20.923L20.9999 7.92299C20.9805 7.67134 20.8666 7.43634 20.6811 7.26515C20.4957 7.09396 20.2523 6.99924 19.9999 6.99999H16.9999C16.9999 5.67391 16.4731 4.40214 15.5355 3.46446C14.5978 2.52677 13.326 1.99999 11.9999 1.99999C10.6738 1.99999 9.40207 2.52677 8.46438 3.46446C7.5267 4.40214 6.99992 5.67391 6.99992 6.99999H3.99992C3.74752 6.99924 3.50417 7.09396 3.3187 7.26515C3.13323 7.43634 3.01935 7.67134 2.99992 7.92299L1.99992 20.923C1.98929 21.0606 2.00727 21.199 2.05275 21.3294C2.09822 21.4597 2.17019 21.5792 2.26413 21.6804C2.35807 21.7816 2.47194 21.8622 2.59858 21.9172C2.72521 21.9722 2.86186 22.0004 2.99992 22H20.9999C21.1375 22 21.2737 21.9715 21.3998 21.9165C21.5259 21.8614 21.6393 21.7809 21.7329 21.68ZM11.9999 3.99999C12.7956 3.99999 13.5586 4.31606 14.1212 4.87867C14.6838 5.44128 14.9999 6.20434 14.9999 6.99999H8.99992C8.99992 6.20434 9.31599 5.44128 9.8786 4.87867C10.4412 4.31606 11.2043 3.99999 11.9999 3.99999ZM4.07992 20L4.92592 8.99999H6.99992V11C6.99992 11.2652 7.10527 11.5196 7.29281 11.7071C7.48035 11.8946 7.7347 12 7.99992 12C8.26513 12 8.51949 11.8946 8.70702 11.7071C8.89456 11.5196 8.99992 11.2652 8.99992 11V8.99999H14.9999V11C14.9999 11.2652 15.1053 11.5196 15.2928 11.7071C15.4803 11.8946 15.7347 12 15.9999 12C16.2651 12 16.5195 11.8946 16.707 11.7071C16.8946 11.5196 16.9999 11.2652 16.9999 11V8.99999H19.0739L19.9199 20H4.07992Z"
										fill="#04764E"
									></path>
								</svg>
							</a> -->
			<a href="javascript:void(0);" class="icon dz-floating-toggler">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect y="2" width="20" height="3" rx="1.5" fill="#5F5F5F" />
					<rect y="18" width="20" height="3" rx="1.5" fill="#5F5F5F" />
					<rect x="4" y="10" width="20" height="3" rx="1.5" fill="#5F5F5F" />
				</svg>
			</a>
		</div>
	</div>
</header>
<div id="toastSuccess" class="dzToastArea toast style-1 toast-success dz-toast position-fixed start-50 translate-middle-x" style="z-index: 9999; bottom: 45px;" role="alert" aria-live="polite"
	aria-atomic="true">
	<div class="toast-body">
		<svg xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
			<path fill="#ffffff"
				d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
		</svg>
		<div class="toast-content ms-3 me-2">
			<strong id="toastSuccessMsg"></strong>
			<small class="d-block">Sukses</small>
		</div>
		<button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close">
			<i class="icon feather icon-x"></i>
		</button>
	</div>
</div>
<div id="toastDanger" class="dzToastArea toast style-1 toast-danger dz-toast position-fixed start-50 translate-middle-x" style="z-index: 9999; bottom: 45px;" role="alert" aria-live="polite"
	aria-atomic="true">
	<div class="toast-body">
		<svg xmlns="http://www.w3.org/2000/svg"
			viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
			<path fill="#ffffff"
				d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
		</svg>
		<div class="toast-content ms-3 me-2">
			<strong id="toastDangerMsg"></strong>
			<small class="d-block">Gagal</small>
		</div>
		<button class="btn btn-close position-absolute p-1" type="button" data-bs-dismiss="toast" aria-label="Close">
			<i class="icon feather icon-x"></i>
		</button>
	</div>
</div>
