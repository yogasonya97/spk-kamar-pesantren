<div data-menu-load="<?php echo base_url()?>pelanggan/menu_footer"></div>
<div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="<?php echo base_url()?>pelanggan/menu_main" data-menu-width="280" data-menu-active="nav-welcome"></div>

<div id="menu-share" class="menu menu-box-bottom mx-2 mb-4 rounded-m rounded-0" data-menu-height="300">
	<div class="content text-center">
		<h1 class="font-30 pt-2 font-900">Share the Love</h1>
		<p class="mt-n2 color-highlight mb-3">Just tap, we'll take care of the rest</p>
		<p class="boxed-text-xl pb-3">Share Asterial with th the World. It only takes one tap! This page works best on your Mobile Device.</p>
		<div class="d-flex">
			<div class="mx-auto">
				<a href="#" class="shareToFacebook icon icon-xl rounded-sm shadow-xl bg-facebook"><i class="fab fa-facebook-f"></i></a>
				<p class="font-11 pt-2">Facebook</p>
			</div>
			<div class="mx-auto">
				<a href="#" class="shareToTwitter icon icon-xl rounded-sm shadow-xl bg-twitter"><i class="fab fa-twitter"></i></a>
				<p class="font-11 pt-2">Twitter</p>
			</div>
			<div class="mx-auto">
				<a href="#" class="shareToWhatsApp icon icon-xl rounded-sm shadow-xl bg-whatsapp"><i class="fab fa-whatsapp"></i></a>
				<p class="font-11 pt-2">WhatsApp</p>
			</div>
			<div class="mx-auto">
				<a href="#" class="shareToMail icon icon-xl rounded-sm shadow-xl bg-blue-dark"><i class="fa fa-envelope"></i></a>
				<p class="font-11 pt-2">Email</p>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	// var positionOptions = {
	// 	enableHighAccuracy: true,
	// 	timeout: 10000000,
	// 	maximumAge: 500
	// }

	// function getLocationAuto() {
	// 	if (navigator.geolocation) {
	// 		navigator.geolocation.getCurrentPosition(showPositionAuto, showErrorAuto, positionOptions);
	// 	} else {
	// 		view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
	// 	}
	// }

	// function showPositionAuto(position) {
	// 	lat = position.coords.latitude;
	// 	lon = position.coords.longitude;

	// 	$.post('<?php echo base_url();?>pelanggan/getPositionAuto', {
	// 		lat: `${ JSON.stringify(lat)}`,
	// 		long: `${ JSON.stringify(lon)}`,
	// 	}, function(json, textStatus) {
	// 		console.log("json", json);
	// 	});
	// }

	// function showErrorAuto(error) {
	// 	switch(error.code) {
	// 		case error.PERMISSION_DENIED:
	// 		view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
	// 		break;
	// 		case error.POSITION_UNAVAILABLE:
	// 		view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
	// 		break;
	// 		case error.TIMEOUT:
	// 		view.innerHTML = "Requestnya timeout bro"
	// 		break;
	// 		case error.UNKNOWN_ERROR:
	// 		view.innerHTML = "An unknown error occurred."
	// 		break;
	// 	}
	// }

	$(document).ready(() => {
		// var runGetPositionUser = setInterval("getLocationAuto()", 10000);

		$(".ModalAjax").unbind();
		$(".ModalAjax").submit(function(e) {
			e.preventDefault();
			var form = $(this);
			var formData = new FormData(form[0]);
			var url = form.attr('action');

			var $submit = $(this).find(':submit'); 
			var $oldHtml    = $submit.html();
			var $oldClass = $submit.attr('class');

			$submit.html('<i class="spinner-border spinner-border-sm"></i> Loading');
			$submit.attr('class', 'btn btn-info disabled');
			$submit.attr('disabled',true);

			$.ajax({
				type: "POST",
				url: url,
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				enctype: 'multipart/form-data',
				processData: false,
				dataType:'JSON',
				success: (data) => {
					console.log('data',data.msg);
					if (data.error==false) {
						if (data.trigger!="" && data.trigger!=null) {
							var msg = data.data;
							var newOption = new Option(`${msg.text}`, msg.id);
							$(`[name='${data.trigger}']`).append(newOption).trigger('change');
							$(`[name='${data.trigger}']`).val(msg.id).trigger('change');
						}

						form.trigger("reset").trigger('change');
						form.find('select').val('').trigger('change');
                			// Swal.fire('Sukses', data.msg ,'success').then(function() {window.location.reload();});
                			swal("Berhasil", data.msg, "success").then((result) => {
                				location.reload();
                			});
                			
                			// form.find('.BtnCloseModal').click();
                			
                			// $('.ReloadDataSelling').click();
                		} else {
                			// Swal.fire('Gagal', data.msg ,'error');
                			swal("Gagal", data.msg, "error").then((result) => {
                				location.reload();
                			});
                		} 
                	},
                });
		});
	});
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/mobile/main/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/mobile/main/scripts/custom.js"></script>
<script src="<?php echo base_url()?>assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>assets/mobile/vendor/jquery/jquery-3.5.1.min.js"></script>
</body>
