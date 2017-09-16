<div id="contact-normal">
 <div class="content-wrapper">
    <section class="content" style="padding-top: 0px !important;">
        <div class="row">
            <div class="col-lg-4 bg">
                <div class="row">
                    <div class="col-lg-3">&nbsp;</div>
                    <div class="col-lg-9">
                            <?
                            if(strtolower($terminal)=='giwangan')
                                $img='Group 1107.png';
                            else if(strtolower($terminal)=='purabaya')
                                $img='Group 1005.png';
                            else if(strtolower($terminal)=='tirtonadi')
                                $img='Group 1108.png';
                            else if(strtolower($terminal)=='soekarno')
                                $img='Group 1109.png';
                            else if(strtolower($terminal)=='arjosari')
                                $img='Group 1110.png';
                            else if(strtolower($terminal)=='bawen')
                                $img='terminal-bawen.png';
                            else if(strtolower($terminal)=='cilacap')
                                $img='Group 1118.png';
                            else if(strtolower($terminal)=='sukabumi')
                                $img='Group 1119.png';
                            else if(strtolower($terminal)=='wonogiri')
                                $img='terminal-wonogiri_2.png';
                            ?>
            					<img src="<?=base_url()?>assets/img/png/<?=$img?>" style="margin-top: 40px;">
            				</div>
                </div>
                <div class="row"  style="margin-top: 20px;">
                    <?=$this->load->view('front/terminal/menu','',true)?>
                </div>
            </div>
            <div class="col-lg-1">&nbsp;</div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 20px;text-align: center;">
                        <h2><span class="border-warna-bottom">Terminal <?=ucwords($terminal)?> Contact</span></h2>
                    </div>
                   <div class="col-lg-9" style="margin-top: 15px;">
                      <div id="map_wrapper">
                        <div id="map_canvas"></div>
                      </div>
                    </div>
                    <div class="col-lg-3" style="margin-top: 15px;height:400px;">
                      <div style="position: absolute;bottom: 0;">
                        <h3>Contact Detail</h3>
                        <?
                        if(count($term)!=0)
                          echo $term->contact;
                        ?>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1">&nbsp;</div>
        </div>
    </section>
  </div>
</div>

<div id="contact-mobile">
  <?=$this->load->view('mobile/terminal/contact','',true)?>
</div>
<style type="text/css">
    .bg
    {
      background-image: url('<?=base_url()?>assets/img/png/bg-terminal.png');
      background-repeat: no-repeat;
      /*background-size: 100% 100%;*/
      /*width: 100%;*/
      height:436px;
    }
    .menu
    {
        cursor: pointer;
    }
    .menu:hover
    {
        background-color: #eeeddd;
    }
    #map_wrapper,#map_wrapper_mobile {
    	height: 400px;
    	}

    	#map_canvas,#map_canvas_mobile {
    	    width: 100%;
    	    height: 100%;
    	}
      #contact-normal
      {
        display: inline;
      }
      #contact-mobile
      {
        display: none;
      }
      @media screen and (max-width: 1000px) {
        #contact-normal
        {
          display: none;
        }
        #contact-mobile
        {
          display: inline;
        }
      }
  </style>
  <script type="text/javascript">

      function allsite()
			{
          var latt=<?=$lat?>;
          var longg=<?=$long?>;
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
	</script>
