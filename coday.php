<?php
//random all voc tada 0.2 by @riyancoday 
error_reporting(0);
$ch = curl_init();
$c = 'https://e.gift.id/C'.rand(11082016,99999999); //v2
	curl_setopt($ch, CURLOPT_URL, $c);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$shnt = array();
$shnt[] = "Authority: e.gift.id";
$shnt[] = "Cache-Control: max-age=0";
$shnt[] = "Upgrade-Insecure-Requests: 1";
$shnt[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
$shnt[] = "Accept-Encoding: gzip, deflate, br";
$shnt[] = "Accept-Language: en-US,en;q=0.9";
$shnt[] = "Cookie: __cfduid=df03bfe788da63fa206083665c94d7e4b1543120489; ms-ga-sess=HNB67xXUwa0DeofNmhY8rkI8MBnOIRcWDaRCN2i34GSZGnyzNgt1urO4qqUJVCJCKaa7l59Vm3PUOsDWJnQIVdmwUV1Z4CYYJnlleUEMXx4gUhiYUTpQuD7C1pBGarZrFwxsK8LStfp8dC4734OkPa5OEB16uSXsjHAigWg9Ry9jmnhQlvtfrd2c0vFdxWYe8rBYapigSxpZLPDRBPqDaPNQ1oq33L5yB2A7gbaEW4pxsYOrlfKSau6qsRPoEsDi; AWSELB=B7757D8D14F451F1784944891DCB77883AA4290BBB81B9A30F6D4EADA20BC2E7230480FD89B6AAAFB27A532CD02F29BA03B5F00C98A56E2D70A8FDF058F8157C9C3637D988";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $shnt);
$result = curl_exec($ch);
	curl_close ($ch);
		preg_match_all('/code:"(.*?)",usedAt/', $result, $code);
		preg_match_all('/status:"(.*?)",programId/', $result, $status);
		preg_match_all('/programName:"(.*?)",EmailTemplateId/', $result, $programName);
		preg_match_all('/,"TADA(.*?)"2019-/', $result, $tada);
print_r($tada);
function getStr($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
$tada = getStr($result,',"TADA','","2019-');
$code = $code[1][0];
$status = $status[1][0];
$programName = $programName[1][0];

echo "<center><h2>$status - if($tada)$tada - <a href=https://e.gift.id/u/".$code.">$code</a> - $programName [c0dayTeam]</h2></center>";