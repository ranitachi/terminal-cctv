<div id="schedule-normal">
 <div class="content-wrapper">
    <section class="content" style="padding-top: 0px !important;">
        <div class="row">
            <div class="col-lg-4 col-md-4 bg">
                <div class="row">
                    <div class="col-lg-3 col-md-3 ">&nbsp;</div>
                    <div class="col-lg-9 col-md-9" style="text-align:center;">
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
            					<img src="<?=base_url()?>assets/img/png/<?=$img?>" style="height:110px;text-align:center;margin-top:20px;">
            				</div>
                </div>
                <div class="row"  style="margin-top: 20px;">
                    <?=$this->load->view('front/terminal/menu','',true)?>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 ">&nbsp;</div>
            <div class="col-lg-6 col-md-6 ">
                <div class="row">
                  <div class="col-lg-12" style="margin-top: 10px;text-align: center;">
                    <div style="width:100%;border-bottom:10px solid #ffd800;color:gray;font-size:30px;margin-top:10px;color:#95989a !important;text-shadow: 2px 2px 4px #ddd;">Jadwal Terminal <?=ucwords($terminal)?></div>
                    </div>
                   <div class="col-lg-12" style="margin-top: 15px;width:100%">
                        <!-- <img src="<?=base_url()?>assets/img/png/schdeule.png" style="width: 100%"> -->
                          <!-- <table class="table table-hover table-bordered table-striped" id="" style="width:98% !important">
                              <thead>
                                <tr>
                                <th rowspan="2" style="width:6%">No</th>
                                <th colspan="3">Kedatangan</th>
                                <th colspan="3">Keberangkatan</th>
                              </tr>
                              <tr>
                                <th style="width:20%">Tujuan <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('tujuan_datang')"></div></th>
                                <th style="width:8%">Waktu <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('waktu_datang')"></div></th>
                                <th style="width:20%">Operator <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('operator_datang')"></div></th>
                                <th style="width:20%">Tujuan <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('tujuan_berangkat')"></div></th>
                                <th style="width:8%">Waktu <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('waktu_berangkat')"></div></th>
                                <th style="width:20%">Operator <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('operator_berangkat')"></div></th>
                                <!-- <th>Tujuan</th>
                                <th>Waktu</th>
                                <th>Operator</th>
                                <th>Tujuan</th>
                                <th>Waktu</th>
                                <th>Operator</th>
                              </tr>
                            </thead>
                          </table> -->
                          <div id="table-wrapper">
                            <div id="table-scroll">
                              <table class="table table-hover table-bordered table-striped" id="jadwal-table" style="width:100% !important;margin-bottom:0px !important">
                                <thead>
                                  <tr>
                                  <th rowspan="2" style="width:6%">No</th>
                                  <th colspan="3">Kedatangan</th>
                                  <th colspan="3">Keberangkatan</th>
                                </tr>
                                <tr>
                                  <th style="width:19%">Tujuan <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('tujuan_datang')"></div></th>
                                  <th style="width:10%">Waktu <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('waktu_datang')"></div></th>
                                  <th style="width:19%">Operator <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('operator_datang')"></div></th>
                                  <th style="width:19%">Tujuan <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('tujuan_berangkat')"></div></th>
                                  <th style="width:10%">Waktu <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('waktu_berangkat')"></div></th>
                                  <th style="width:19%">Operator <div style="float:right"><img src="<?=base_url()?>assets/img/sort-up-and-down-arrows-couple.png" style="height:14px;cursor:pointer;" onclick="urutin('operator_berangkat')"></div></th>
                                  <!-- <th>Tujuan</th>
                                  <th>Waktu</th>
                                  <th>Operator</th>
                                  <th>Tujuan</th>
                                  <th>Waktu</th>
                                  <th>Operator</th> -->
                                </tr>
                              </thead>
                              <tbody>
                                <?
                                $no=1;
                                foreach ($d as $k => $v) {
                                  echo '<tr>';
                                  echo '<td style="width:6%">'.$no.'</td>';
                                  echo '<td style="width:19%">'.$v->tujuan_datang.'</td>';
                                  echo '<td style="width:10%">'.$v->waktu_datang.'</td>';
                                  echo '<td style="width:19%">'.$v->operator_datang.'</td>';
                                  echo '<td style="width:19%">'.$v->tujuan_berangkat.'</td>';
                                  echo '<td style="width:10%">'.$v->waktu_berangkat.'</td>';
                                  echo '<td style="width:19%">'.$v->operator_berangkat.'</td>';
                                  echo '</tr>';
                                  $no++;
                                }
                                ?>
                              </tbody>
                              </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 ">&nbsp;</div>
        </div>
    </section>
</div>
<?=$this->load->view('front/layout/footer','',true)?>
</div>
<script>
jQuery(function($){
  //
  if ( $.fn.dataTable.isDataTable( '#jadwal-table' ) ) {
    table = $('#jadwal-table').DataTable();
  }
  else {
      table = $('#jadwal-table').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false,
        'scrollY'    : '330px',
        'scrollCollapse':false
      });
  }
});
function urutin(jenis)
{

}
</script>
<div id="schedule-mobile">
  <?=$this->load->view('mobile/terminal/schedule','',true)?>
</div>
<style type="text/css">
    /*#table-wrapper {
    position:relative;
    top:-20px;
    }
    #table-scroll {
    height:330px;
    overflow:auto;
    /*margin-top:20px;*/
    /*}
    #table-wrapper table {
    width:100%;
    }*/
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
    #schedule-normal
    {
      display: inline;
    }
    #schedule-mobile
    {
      display: none;
    }
    @media screen and (max-width: 1000px) {
      #schedule-normal
      {
        display: none;
      }
      #schedule-mobile
      {
        display: inline;
      }
    }
  </style>
