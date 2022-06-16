<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <?php

  $apiKey = "VTHARC";
  $offerGroupID = "18181";
  $url = "http://www.latesttraveloffers.com/xmlout/GetSSXML.asp?site=$apiKey&OfferGroupID=$offerGroupID";

  $xml = file_get_contents($url);
  $xmlout = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
  $json = json_encode($xmlout);
  $array = json_decode($json,TRUE);

  echo $array;

  ?>
</body>
</html>
