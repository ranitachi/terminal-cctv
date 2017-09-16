<h2>Terminal <?=$d[0]->nama_terminal?> : <?=$d[0]->nama_cctv?></h2>
<?
$old=0;
$ter=strtolower($d[0]->nama_terminal);
if($ter=='purabaya' || $ter=='soekarno' || $ter=='tirtonadi' || $ter=='giwangan')
{
  $old=1;
  $js=$d[0]->ip_cctv.'terminal/getcctvall/'.$ter.'/'.$d[0]->kode;
}
else
  $js=$d[0]->ip_cctv.'terminalku/index.php/terminal/getcctvall/'.$ter.'/'.$d[0]->kode;

$js=@file_get_contents($js);
if($js === FALSE)
{
  $json=array();
}
else
  $json=$js;

$js=str_replace(array('[[',']]','"'), '', $json);
?>
<script type="text/javascript">


    jQuery(function($){

        var old='<?=$old?>';
        var x='<?php echo $js;?>';
        var json = x.split(',');
        // alert(x);
        // for(var i=0;i<json.length;i++)
        // {
           $('#datavideo').val(json);
            var video_index=0;
            var file=json[video_index];
            var ff=file.split('\\');
            var fl=ff[(ff.length) - 3]+'__'+ff[(ff.length) - 1];
                // file=file.replace(/\\/g,'__');
            file=fl.replace(/ /g,'%20');
            $('#playvideo').load('<?php echo site_url(); ?>terminalku/playvideo/<?=$d[0]->kode?>/<?=strtolower($d[0]->nama_terminal)?>/'+video_index+'/'+file);
            // alert(file);
    })

        function onVideoEnded(indexs,folder)
        {
            var json=$('#datavideo').val();
            var dt=json.split(',');
            var index=parseInt(indexs);
            // alert(dt[1]);
            var idx=index;
            if(typeof(dt[index+1]) != 'undefined')
            {
                var idx=index+1;
                if(idx==1)
                {

                }
            }
            var file=dt[idx];
            // alert(index+'--'+idx+'==+'+file);

            var ff=file.split('\\');
            var fl=ff[(ff.length) - 3]+'__'+ff[(ff.length) - 1];
            file=fl.replace(/ /g,'%20');
            $('#playvideo').load('<?php echo site_url(); ?>terminalku/playvideo/<?=$d[0]->kode?>/<?=strtolower($d[0]->nama_terminal)?>/'+idx+'/'+file);
       }
    </script>
    <div id="playvideo" style="padding: 2px 0px;border :1px solid #222;width:100%;height: 315px;background-size: 100% 100%; margin:0 auto;background:#000;"></div>
    <input type="hidden" id="datavideo">
