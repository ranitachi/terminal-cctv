<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi CCTV Terminal - Kementerian Perhubungan Republik Indonesia</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/js/login/themes/default/easyui.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/js/login/themes/icon.css' ?>">
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/login/jquery.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/login/jquery.easyui.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/login/main.js' ?>"></script>


</head>
<body class="easyui-layout">

   <div class="panel-body panel-body-noheader panel-body-noborder layout-body" data-options="region:'north',split:true,border:false" style="overflow: hidden; height: 120px; padding: 0px; background: rgb(255, 255, 255) url('../assets/img/login/adminlogo.png') no-repeat scroll 0% 0%; width: 1024px;"></div>

    <div data-options="region:'west',split:true,title:'Menu Aplikasi'" style="width:25%;padding:10px;">
        <ul id="menu" class="easyui-tree">
            <li>
                <span>Terminal Giwangan - Yogyakarta</span>
                <ul>
                    <!-- <li><span>Lihat Jadwal</span></li> -->
                    <li><span>Upload Jadwal Terminal Giwangan</span></li>
                </ul>
            </li>
            <li>
                <span>Terminal Tirtonadi - Solo</span>
                <ul>
                    <!-- <li><span>Lihat Jadwal</span></li> -->
                    <li><span>Upload Jadwal Terminal Tirtonadi</span></li>
                </ul>
            </li>
            <li>
                <span>Terminal Ir. Soekarno - Klaten</span>
                <ul>
                    <!-- <li><span>Lihat Jadwal</span></li> -->
                    <li><span>Upload Jadwal Terminal Ir. Soekarno</span></li>
                </ul>
            </li>
            <li>
                <span>Terminal Purabaya - Sidoarjo</span>
                <ul>
                    <!-- <li><span>Lihat Jadwal</span></li> -->
                    <li><span>Upload Jadwal Terminal Purabaya</span></li>
                </ul>
            </li>
            <li>
                <span>Sistem</span>
                <ul>
                    <li><span>Logout</span></li>
                </ul>
            </li>
        </ul>


    </div>
    <div data-options="region:'south',split:true,border:false" style="height:30px;padding:10px;"><div style="margin-left: auto;margin-right: auto;text-align: center">Copyright 2016 - Subdit Terminal Angkutan Jalan Direktorat Perhubungan Darat - Kementerian Perhubungan Republik Indonesia</div></div>
    <div id="center" data-options="region:'center',title:'Data'">
        <div style="background: transparent url('../assets/img/login/perhubungan_logo_medium.png') no-repeat scroll center center; width: 100%; height: 100%;" class="panel-body panel-body-noheader panel-body-noborder"></div>

    </div>

   <div id="upload-jadwal-giwangan" style="width:30%;height:35%;display: none;padding:30px 30px">
       <form id="form-upload-jadwal-giwangan" method="post" action="<?php echo base_url() . 'jadwal/giwangan' ?>" enctype="multipart/form-data">
           <div style="margin-bottom:5px">
               <input id="upload-giwangan" name="upload-giwangan" style="width:70%" data-options="label:'Upload',required:true">
           </div>
       </form>
   </div>

   <div id="upload-jadwal-tirtonadi" style="width:30%;height:35%;display: none;padding:30px 30px">
       <form id="form-upload-jadwal-tirtonadi" method="post" action="<?php echo base_url() . 'jadwal/tirtonadi' ?>" enctype="multipart/form-data">
           <div style="margin-bottom:5px">
               <input id="upload-tirtonadi" name="upload-tirtonadi" style="width:70%" data-options="label:'Upload',required:true">
           </div>
       </form>
   </div>

   <div id="upload-jadwal-klaten" style="width:30%;height:35%;display: none;padding:30px 30px">
       <form id="form-upload-jadwal-klaten" method="post" action="<?php echo base_url() . 'jadwal/klaten' ?>" enctype="multipart/form-data">
           <div style="margin-bottom:5px">
               <input id="upload-klaten" name="upload-klaten" style="width:70%" data-options="label:'Upload',required:true">
           </div>
       </form>
   </div>

   <div id="upload-jadwal-surabaya" style="width:30%;height:35%;display: none;padding:30px 30px">
       <form id="form-upload-jadwal-surabaya" method="post" action="<?php echo base_url() . 'jadwal/surabaya' ?>" enctype="multipart/form-data">
           <div style="margin-bottom:5px">
               <input id="upload-surabaya" name="upload-surabaya" style="width:70%" data-options="label:'Upload',required:true">
           </div>
       </form>
   </div>

</body>
</html>