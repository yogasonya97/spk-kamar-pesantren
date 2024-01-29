<!-- Modal -->
<div class="modal fade" id="viewMapsLaundry" tabindex="-1" role="dialog" aria-labelledby="viewMapsLaundryLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewMapsLaundryLabel">Maps Lokasi Fifah Laundry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- <div id="mapcanvas" style="width:360px;height:300px"></div> -->
      <!-- <iframe src="https://maps.google.com/maps?q=Bangka%20Barat&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe> -->
        <iframe 
          width="100%" 
          height="570" 
          frameborder="0" 
          scrolling="no" 
          marginheight="0" 
          marginwidth="0" 
          src="https://maps.google.com/maps?q=-2.9936828,104.7755866&hl=id&z=16&amp;output=embed"
        >
        </iframe> 
        <br><br>
        <center>
        <a href="http://maps.google.com/maps?daddr=-2.9936828,104.7755866&amp;ll=" class="btn btn-info text-center">Arahkan</a>
      </center>
      <!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://www.google.co.id/maps/place/2%C2%B059'38.7%22S+104%C2%B046'41.1%22E/@-2.9940763,104.7759784,18z/data=!3m1!4b1!4m14!1m7!3m6!1s0x2e3b76205a897a19:0x1562eeac72c96451!2sLrg.+Dua+Saudara,+13+Ulu,+Kec.+Seberang+Ulu+II,+Kota+Palembang,+Sumatera+Selatan!3b1!8m2!3d-2.9936882!4d104.7777753!3m5!1s0x0:0x4e5ea83caaa87dca!7e2!8m2!3d-2.9940793!4d104.7780918?hl=id&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script>
    loadMapLaundry = () => {
        lat = '-2.994079';
        lon = '104.7759784';

        latlog = new google.maps.LatLng(lat, lon);
        // console.log(latlog);
        
        mapOptions = {
            center:latlog,
            zoom:18,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        }
        var maps = new google.maps.Map(document.getElementById("mapcanvas"), mapOptions);
        var imageURL= "<?php echo base_url(); ?>assets/pin/pin.png"; 
        var pinImage = new google.maps.MarkerImage(imageURL,
            new google.maps.Size(30, 30),
            new google.maps.Point(0,0),
            new google.maps.Point(10, 34)); 
        var marker = new google.maps.Marker({
            position:latlog,
            animation: google.maps.Animation.BOUNCE,
            map:maps,
            icon: pinImage,
            title:"Disini!"
        });
    }

    viewMapsLaundry = () => {
        console.log('test');
        google.maps.event.addDomListener(window, 'load', loadMapLaundry);
        $(`#viewMapsLaundry`).modal('show');
    }
</script>