<div id="map_wrapper">
  <div id="map_canvas"></div>
</div>

<script type="text/javascript">

    function allsite()
    {
        var latt=<?=$lat?>;
        var longg=<?=$lng?>;
        var uluru = {lat: latt, lng: longg};
        var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h1 id="firstHeading" class="firstHeading">Terminal <?=ucwords($terminal)?></h1>'+
          '<div id="bodyContent">'+
          '<p>Informasi Terminal <?=ucwords($terminal)?></p>'+
          '</div>'+
          '</div>';
      if(latt!=0)
      {

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

          var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 16,
            center: uluru
          });
          var marker = new google.maps.Marker({
            position: uluru,
            map: map
          });

          infowindow.open(map,marker);
      }
    }
    function allsitestreet()
    {
      var latt=<?=$lat?>;
      var longg=<?=$lng?>;
      var fenway = {lat: latt, lng: longg};
      var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('map_canvas'), {
              position: fenway,
              pov: {
                heading: 165,
                pitch: 0,
                zoom:1
              }
            });
    }
</script>
<style>
#map_wrapper {
  height: 400px;
  }

  #map_canvas {
      width: 100%;
      height: 100%;
  }
</style>
