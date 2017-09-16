<? //2009-09-03 00:07:01
	function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;
	}

	function waktu($tgl)
	{
		list($tg,$wk)=explode(' ',$tgl);
		list($jm,$mn,$dt)=explode(':',$wk);
		return $jm.':'.$mn;
	}
	function tgl_indo2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulanSingkat(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;
	}

	function tbt($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,2,2);
			return $tanggal.'-'.$bulan.'-\''.$tahun;
	}

	function tgl_indo_time($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,2);
			$menit = substr($tgl,14,2);
			$detik = substr($tgl,17,2);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.':'.$menit.':'.$detik.' WIB';
	}	function tgl_indo_time2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulanSingkat(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,2);
			$menit = substr($tgl,14,2);
			$detik = substr($tgl,17,2);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.':'.$menit.':'.$detik.' WIB';
	}
	function tgl_bulan($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulanSingkat(substr($tgl,5,2));
			return $tanggal.' '.$bulan;
	}

	function tanggal($date)
	{
		list($tgl,$bln,$thn)=explode(' ', trim($date));
		$bln=strtolower($bln);

		if($bln=='januari' || $bln=='jan')
			$b='01';
		else if($bln=='februari' || $bln=='feb')
			$b='02';
		else if($bln=='maret' || $bln=='mar')
			$b='03';
		else if($bln=='april' || $bln=='apr')
			$b='04';
		else if($bln=='mei' || $bln=='may')
			$b='05';
		else if($bln=='juni' || $bln=='jun')
			$b='06';
		else if($bln=='juli' || $bln=='jul')
			$b='07';
		else if($bln=='agustus' || $bln=='ags' || $bln=='agust')
			$b='08';
		else if($bln=='september' || $bln=='sept')
			$b='09';
		else if($bln=='oktober' || $bln=='okt')
			$b='10';
		else if($bln=='november' || $bln=='nov')
			$b='11';
		else if($bln=='desember' || $bln=='des')
			$b='12';
		else
			$b='00';

		return $thn.'-'.$b.'-'.$tgl;
	}
	function getBulanSingkat($bln)
	{
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Ags";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Okt";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Des";
						break;
				}

	}
	function getBulanEn($bln)
	{
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Oct";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Dec";
						break;
				}

	}

	function getBulanReverse($bln)
	{
				switch ($bln){
					case "Jan":
						return 1;
						break;
					case "Feb":
						return 2;
						break;
					case "Mar":
						return 3;
						break;
					case "Maret":
						return 3;
						break;
					case "Apr":
						return 4;
						break;
					case "May":
						return 5;
						break;
					case "Apr":
						return 6;
						break;
					case "Jul":
						return 7;
						break;
					case "Aug":
						return 8;
						break;
					case "Agu":
						return 8;
						break;
					case "Agt":
						return 8;
						break;
					case "Sep":
						return 9;
						break;
					case "Sept":
						return 9;
						break;
					case "Oct":
						return 10;
						break;
					case "Okt":
						return 10;
						break;
					case "Nov":
						return 11;
						break;
					case "Dec":
						return 12;
						break;
					case "Des":
						return 12;
						break;
				}

	}
	function getBulan($bln){
				switch ($bln){
					case 1:
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}
			function hari($hari){
				switch ($hari){
					case "Sun":
						return "Minggu";
						break;
					case "Mon":
						return "Senin";
						break;
					case "Tue":
						return "Selasa";
						break;
					case "Wed":
						return "Rabu";
						break;
					case "Thu":
						return "Kamis";
						break;
					case "Fri":
						return "Jumat";
						break;
					case "Sat":
						return "Sabtu";
						break;
				}
			}

		function combotgl($awal, $akhir, $var, $terpilih){
		  echo "<select name=$var>";
		  for ($i=$awal; $i<=$akhir; $i++){
			if ($i==$terpilih)
			  echo "<option value=$i selected>$i</option>";
			else
			  echo "<option value=$i>$i</option>";
		  }
		  echo "</select> ";
		}

		function combothn($awal, $akhir, $var, $terpilih, $event, $nama_fungsi){
		  echo "<select name=$var ".$event."=".$nama_fungsi."(this)>";
		  for ($i=$awal; $i<=$akhir; $i++){
			if ($i==$terpilih)
			  echo "<option value=$i style='padding-left:4px;' selected>$i</option>";
			else
			  echo "<option value=$i style='padding-left:4px;'>$i</option>";
		  }
		  echo "</select> ";
		}
		function combothnnoevent($awal, $akhir, $var, $terpilih){
		  echo "<select name=$var >";
		  for ($i=$awal; $i<=$akhir; $i++){
			if ($i==$terpilih)
			  echo "<option value=$i style='padding-left:4px;' selected>$i</option>";
			else
			  echo "<option value=$i style='padding-left:4px;'>$i</option>";
		  }
		  echo "</select> ";
		}

		function combobln($awal, $akhir, $var, $terpilih){
		  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei",
							  "Juni", "Juli", "Agustus", "September",
							  "Oktober", "November", "Desember");
		  echo "<select name=$var>";
		  for ($bln=$awal; $bln<=$akhir; $bln++){
			  if ($bln==$terpilih)
				 echo "<option value=$bln selected style='padding-left:4px;'>$nama_bln[$bln]</option>";
			  else
				echo "<option value=$bln style='padding-left:4px;'>$nama_bln[$bln]</option>";
		  }
		  echo "</select> ";
		}

		function jlhHari($bln)
		{
			if($bln==1 || $bln==3 || $bln==5|| $bln==7|| $bln==8|| $bln==10|| $bln==12)
				return 31;
			else if ($bln==4 || $bln==6 || $bln==9|| $bln==11)
				return 30;
			else
			{	if(date('Y')%4==0)
					return 29;
				else
					return 28;
			}
		}
		function gettglblnthn($tgl,$bln,$thn)
		{
			if($bln==1)
			{
				if($tgl==1)
				{
					$tgl_now=1;
					$tgl_yes=31;
					$bln_now=1;
					$bln_yes=12;
					$thn=$thn-1;
				}
				else
				{
					$tgl_now=$tgl;
					$tgl_yes=$tgl-1;
					$bln_now=1;
					$bln_yes=12;
					$thn=$thn;
				}
			}
			else if($bln==0)
			{
				$tgl_now=31;
				$tgl_yes=30;
				$bln_now=12;
				$bln_yes=11;
				$thn=$thn-1;
			}
			else if($bln>12)
			{
				$tgl_now=1;
				$tgl_yes=31;
				$bln_now=1;
				$bln_yes=12;
				$thn=$thn;
			}
			else
			{
				if($tgl==1)
				{
					$tgl_now=1;
					$tgl_yes=jlhHari($bln-1);
					$bln_now=$bln;
					$bln_yes=$bln-1;
					$thn=$thn;
				}
				else
				{
					$tgl_now=$tgl;
					$tgl_yes=$tgl-1;
					$bln_now=$bln;
					$bln_yes=$bln-1;
					$thn=$thn;
				}
			}
			$data=array(
				'tgl_now'=>$tgl_now,
				'tgl_yes'=>$tgl_yes,
				'bln_now'=>$bln_now,
				'bln_yes'=>$bln_yes,
				'thn'=>$thn,
			);
			return $data;
		}

		function getint($str)
		{
			$ln=strlen($str);
			$in='';
			for($i=0;$i<$ln;$i++)
			{
				$cr=substr($str,$i,1);
				if(is_numeric($cr))
					$in.=$cr;
			}
			return $in;
		}

		function generate_id($string=NULL)
		{
			if($string==NULL)
			{
				$id='';
				$xx=rand(1,10);
				for($i=1;$i<=$xx;$i++)
				{
					$x=rand();
					$ii=sha1(md5(sha1(rand(0,rand()))).$x);
					$id.=getint($ii);
				}
			}
			else
			{
				$id=getint($string);
			}

			$nid='';
			for($j=0;$j<8;$j++)
			{
				$ln=strlen($id);
				$r=rand(0,$ln);
				$n=substr($id,$r,1);
				$nid.=$n;
			}

			$ckl=strlen($nid);
			if($ckl<8)
				$nid.=rand(0,9);

			return $nid;
		}
		function getHeight($image) {
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}
	function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale)
	{
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		$source = imagecreatefromjpeg($image);
		imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
		imagejpeg($newImage,$thumb_image_name,90);
		chmod($thumb_image_name, 0777);
		return $thumb_image_name;
	}
function jumlah_hari($bulan = 0, $tahun = '')
{
    if ($bulan < 1 OR $bulan > 12)
    {
  return 0;
    }
    if ( ! is_numeric($tahun) OR strlen($tahun) != 4)
    {
  $tahun = date('Y');
    }
    if ($bulan == 2)
    {
  if ($tahun % 400 == 0 OR ($tahun % 4 == 0 AND $tahun % 100 != 0))
  {
  return 29;
  }
    }
    $jumlah_hari    = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    return $jumlah_hari[$bulan - 1];
}
function text_to_array($str) {

        //Initialize arrays
        $keys = array();
        $values = array();
        $output = array();

        //Is it an array?
        if( substr($str, 0, 5) == 'Array' ) {

            //Let's parse it (hopefully it won't clash)
            $array_contents = substr($str, 7, -2);
            $array_contents = str_replace(array('[', ']', '=>'), array('#!#', '#?#', ''), $array_contents);
            $array_fields = explode("#!#", $array_contents);

            //For each array-field, we need to explode on the delimiters I've set and make it look funny.
            for($i = 0; $i < count($array_fields); $i++ ) {

                //First run is glitched, so let's pass on that one.
                if( $i != 0 ) {

                    $bits = explode('#?#', $array_fields[$i]);
                    if( $bits[0] != '' ) $output[$bits[0]] = $bits[1];

                }
            }

            //Return the output.
            return $output;

        } else {

            //Duh, not an array.
            echo 'The given parameter is not an array.';
            return null;
        }

    }
?>
