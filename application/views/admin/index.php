<!DOCTYPE html>
<html>
<head>
  <?=$this->load->view('admin/layout/head','',true)?>
  <script src="<?=base_url()?>assets/plugins/jQuery/jquery-3.1.1.min.js"></script>
  <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?
  $data['user']=$this->session->userdata('user');
  ?>

  <?=$this->load->view('admin/layout/header',$data,true)?>
  <!-- Left side column. contains the logo and sidebar -->

  <?=$this->load->view('admin/layout/sidebar',$data,true)?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?=$this->load->view($konten,'',true)?>
  </div

  <?=$this->load->view('admin/layout/footer','',true)?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url()?>assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>assets/plugins/select2/select2.full.min.js"></script>
<!-- jvectormap -->
<script src="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=base_url()?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
</body>
</html>
<?=$this->load->view('admin/modal','',true)?>
<style>
.loading {
  position: absolute;
  top: 50%;
  left: 50%;

}
.loading-bar {
  display: inline-block;
  width: 4px;
  height: 18px;
  border-radius: 4px;
  animation: loading 1s ease-in-out infinite;
}
.loading-bar:nth-child(1) {
  background-color: #3498db;
  animation-delay: 0;
}
.loading-bar:nth-child(2) {
  background-color: #c0392b;
  animation-delay: 0.09s;
}
.loading-bar:nth-child(3) {
  background-color: #f1c40f;
  animation-delay: .18s;
}
.loading-bar:nth-child(4) {
  background-color: #27ae60;
  animation-delay: .27s;
}

@keyframes loading {
  0% {
    transform: scale(1);
  }
  20% {
    transform: scale(1, 2.2);
  }
  40% {
    transform: scale(1);
  }
}
.spinner div {
  width: 20px;
  height: 20px;
  position: absolute;
  left: -20px;
  top: 50px;
  background-color: #333;
  border-radius: 50%;
  animation: move 4s infinite cubic-bezier(.2,.64,.81,.23);
}
.spinner div:nth-child(2) {
  animation-delay: 150ms;
}
.spinner div:nth-child(3) {
  animation-delay: 300ms;
}
.spinner div:nth-child(4) {
  animation-delay: 450ms;
}
@keyframes move {
  0% {left: 0%;}
  75% {left:100%;}
  100% {left:100%;}
}
</style>
