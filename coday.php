<?php
//random all voc tada 0.3 by @riyancoday 
error_reporting(0);
$ch = curl_init();
$c = 'https://e.gift.id/'.rand(8112016,9999999); //v2
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
	curl_setopt($ch, CURLOPT_HTTPHEADER, $shnt);
$result = curl_exec($ch);
	curl_close ($ch);
		preg_match_all('/code:"(.*?)",usedAt/', $result, $code);
		preg_match_all('/status:"(.*?)",programId/', $result, $status);
		preg_match_all('/programName:"(.*?)",EmailTemplateId/', $result, $programName);
function getStr($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
$xx = getStr($result,'EgiftGroupBatchId:',',expiredAt:"');
$mid = getStr($xx,'mId:"','"');
$code1 = getStr($xx,'code:"','"');

$code = $code[1][0];
$status = $status[1][0];
$programName = $programName[1][0];

echo "<center><h2>$status -(<a href=https://tada.gift.id/g/".$mid."/".$code1.">$code1</a>) - <a href=https://tada.gift.id/u/".$code.">$code</a> - $programName [c0dayTeam]</h2></center>";
