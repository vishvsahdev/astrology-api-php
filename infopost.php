<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
$r=unserialize($_POST['geoinfo']);
$r['datetime']=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'].'T'.$_POST['hour'].':'.$_POST['min'].':'.$_POST['sec'];

//-- edit-------------
	$r['lang']="EN"; //HI - hindi EN -- English
	//----optional------
	$r['fillcolor']='skyblue'; // kundli fill color
	$r['line']='blue'; // kundli line color
	$r['linewidth']=1; // 1px
	$r['opecity']=0.3; // fill and line transparent
	$r['textcolor']='black'; // planets name
	$r['housetextcolor']='orange'; // house no
	//----------------------
	$r['url']='https://demo.astrologyclass.org';
//----------------------
$rd = base64_encode(json_encode( $r ) );
$url = "https://astrologyclass.org/xapi/api-pxp-v2.html?{$rd}"; 
$ch = curl_init();  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $url); 
$t = curl_exec($ch); 



$x=json_decode($t,true);
$_SESSION['chart_info']=$x;

if($x['status'] == 200)
	header("Location: https://demo.astrologyclass.org/kundli.php");
else
	header("Location: https://demo.astrologyclass.org/local.php");
