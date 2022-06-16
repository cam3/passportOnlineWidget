<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <?php 
$doc = new DOMDocument();
$xmlStr = file_get_contents('http://www.latesttraveloffers.com/xmlout/GetSSXML.asp?site=VTHARC&OfferGroupID=18181');
libxml_use_internal_errors(true);
$page = $doc->loadHTML($xmlStr);

$offers = $doc->getElementsByTagName('offer');
$length = $offers->length;
for ($i = 0; $i < $length; $i++) {
  $offer = $offers->item($i);
  $title = $offer->getElementsByTagName('title')->item(0)->nodeValue;
  $start = $offer->getElementsByTagName('startdate')->item(0)->nodeValue;
  $end = $offer->getElementsByTagName('enddate')->item(0)->nodeValue;
  $desc = $offer->getElementsByTagName('shortteaser')->item(0)->nodeValue;
  $perNight = $offer->getElementsByTagName('pricepernight')->item(0)->nodeValue;
  $logo = $offer->getElementsByTagName('supplierlogo')->item(0)->nodeValue;
  $img = $offer->getElementsByTagName('offerimage')->item(0)->nodeValue;
  
  echo "<div style='border: 1px dashed black; padding: 1rem;'>";
  echo "<p><img src='http://www.latesttraveloffers.com/{$logo}' /></p>";
  echo "<p><strong>Title: {$title}</strong></p>";
  echo "<p>{$start} - {$end}</p>";
  echo "</div>";
  echo "<div>";
  echo "<p>{$desc}</p>";
  echo "<p style='color: red;'>Only {$perNight} a day!!!</p>";
  if ($img) echo "<img width=300 height=400 src='http://www.latesttraveloffers.com/{$img}' />";
  echo "</div>";
}
  ?> 
</body>
</html>
