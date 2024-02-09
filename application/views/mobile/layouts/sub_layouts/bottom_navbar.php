<div class="menubar-area footer-fixed">
	<div class="toolbar-inner menubar-nav">
		<a href="/" class="nav-link <?php if ($this->uri->segment(3) == null) : ?> active <?php endif; ?>">
			<i class="fi fi-rr-home"></i>
		</a>
		<a href="/client/nilai/daftar" class="nav-link <?php if ($this->uri->segment(3) == 'daftar' || $this->uri->segment(3) == 'entry') : ?> active <?php endif; ?>">
			<i class="fi fi-rr-edit"></i>
		</a>
		<a href="/client/rangking" class="nav-link <?php if ($this->uri->segment(2) == 'rangking') : ?> active <?php endif; ?>">
			<i class="fi fi-rr-chart-simple"></i>
		</a>
		<a href="/client/profile" class="nav-link <?php if ($this->uri->segment(3) == 'profile') : ?> active <?php endif; ?>">
			<i class="fi fi-rr-user"></i>
		</a>
	</div>
</div>
