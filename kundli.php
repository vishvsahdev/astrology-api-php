<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}


if(isset($_SESSION['chart_info']))
$cinfo=$_SESSION['chart_info'];
else
	header("Location: https://demo.astrologyclass.org/local.php");

if($cinfo['info']['lang']=="EN"){	
$lang['rashi'] = ["Aries","Taurus","Gemini","Cancer","Leo","Virgo","Libra","Scorpius","Sagittarius","Capricornus","Aquarius","Pisces"];
$lang['des']=["Planet","Type","Zodiac","Long","Deg.","Nakshatra","Lord","Pada","House"];
$lang['vakri'] = ['','Retro'];
$lang['da']=[0=>"Mercury",1=>"Ketu",2=>"Venus",3=>"Sun",4=>"Moon",5=>"Mars",6=>"Rahu",7=>"Jupiter",8=>"Saturn",9=>"Mercury",10=>"Ketu",11=>"Venus",12=>"Sun",13=>"Moon",14=>"Mangal",15=>"Rahu",16=>"Jupiter",17=>"Saturn",18=>"Mercury",19=>"Ketu",20=>"Venus",21=>"Sun",22=>"Moon",23=>"Mars",24=>"Rahu",25=>"Jupiter",26=>"Saturn",27=>"Mercury",28=>"Ketu"];
$lang['nak'] = ["Ashvini","Bharani","Kritika","Rohini","Mrigashira","Ardra","Punarvasu","Pushya","Ashlesha","Magha","Purva Phalguni","Uttara Phalguni","Hasta","Chitra","Swati","Vishakha","Anuradha","Jyeshtha","Mula","Purva Ashadha","Uttara Ashadha","Shravan","Dhanistha","Shatabhishaj","Purva Bhadrapad","Uttara Bhadrapad","Revati"];
$lang['h2']=array("Lg"=>"Lg","Su"=>"Sun","Mo"=>"Moon","Ma"=>"Mars","Me"=>"Mercury","Ju"=>"Jupiter","Ve"=>"Venus","Sa"=>"Saturn","Ra"=>"Rahu","Ke"=>"Ketu");
}
else{
$lang['rashi'] = ["मेष","वृषभ","मिथुन","कर्क","सिंह","कन्या","तुला","वृश्चिक","धनु ","मकर","कुंभ","मीन"];
$lang['des']=["ग्रह ","गति ","राशि","रेखांश","ग्रह के अंश ","नक्षत्र ","स्वामी","पद ",'भाव '];
$lang['vakri'] = ['','वक्री'];
$lang['da']=[0=>"बुध",1=>"केतु",2=>"शुक्र",3=>"सूर्य",4=>"चन्द्र",5=>"मंगल",6=>"राहु",7=>"बृहस्पति",8=>"शनि",9=>"बुध",10=>"केतु",11=>"शुक्र",12=>"सूर्य",13=>"चन्द्र",14=>"मंगल",15=>"राहु",16=>"बृहस्पति",17=>"शनि",18=>"बुध",19=>"केतु",20=>"शुक्र",21=>"सूर्य",22=>"चन्द्र",23=>"मंगल",24=>"राहु",25=>"बृहस्पति",26=>"शनि",27=>"बुध",28=>"केतु"];
$lang['nak'] = ["अश्विनी","भरणी","कृत्तिका","रोहिणी","मॄगशिरा","आद्रा","पुनर्वसु","पुष्य","अश्लेशा","मघा","पूर्वाफाल्गुनी","उत्तराफाल्गुनी","हस्त","चित्रा","स्वाति","विशाखा","अनुराधा","ज्येष्ठा","मूल","पूर्वाषाढा","उत्तराषाढा","श्रवण","धनिष्ठा","शतभिषा","पूर्वाभाद्रपद","उत्तराभाद्रपद ","रेवती"];
$lang['h2']=array("Lg"=>"लग्न","Su"=>"सूर्य","Mo"=>"चन्द्र","Ma"=>"मंगल","Me"=>"बुध","Ju"=>"बृहस्पति","Ve"=>"शुक्र","Sa"=>"शनि","Ra"=>"राहु","Ke"=>"केतु");
}

?>
<!DOCTYPE html>
<html lang="hi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Birth Details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
</head>
<body>

<?php
echo $cinfo['lagan_kundli'];
echo '<table class="table border">';
echo '<tr>';
foreach($lang['des'] as $k=>$v){
echo '<th>'.$v.'</th>';
}	
echo '</tr>';

$r2=[$lang['h2'],$lang['vakri'],$lang['rashi'],[],[],$lang['nak'],$lang['da'],[],[],];

foreach($cinfo['chart_info'] as $k=>$v){
	echo '<tr>';
	foreach($v as $k1=>$v1){
echo '<td>'. (isset($r2[$k1][$v1]) ? $r2[$k1][$v1] : $v1) .'</td>';
	}
	echo '</tr>';
}	

echo '</table>';


?>
</body>
</html>
