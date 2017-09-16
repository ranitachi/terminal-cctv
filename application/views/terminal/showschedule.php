<table class="table table-hover table-bordered table-striped" id="jadwal-table" style="width:100% !important;margin-bottom:0px !important">
  <thead style="width:100% !important;">
    <tr>
    <th rowspan="2" style="width:6%">No</th>
    <th colspan="3" style="width:48% !important">Kedatangan</th>
    <th colspan="3" style="width:48% !important">Keberangkatan</th>
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
