<!DOCTYPE html>
<html>
<head>
	<title>Hot Deals</title>
</head>
<body>


<?php

$url = "http://webservices.amazon.co.uk/onca/xml?AWSAccessKeyId=AKIAJ5VVZLDBRBUEW6VQ&AssociateTag=expertslance-21&Keywords=argos%20products&Operation=ItemSearch&ResponseGroup=Images%2CItemAttributes%2COfferFull%2COffers%2COfferSummary%2CPromotionSummary%2CSalesRank&SearchIndex=All&Service=AWSECommerceService&Timestamp=2016-02-12T19%3A23%3A17.000Z&Signature=29cGTivusq1bT%2FP985hK%2FgTtkpz%2F3WCVIn%2B4g0yS7Vc%3D";

if (($response_xml_data = file_get_contents($url))===false){
    echo "Error fetching XML\n";
} else {
   libxml_use_internal_errors(true);
   $data = simplexml_load_string($response_xml_data);
   if (!$data) {
       echo "Error loading XML\n";
       foreach(libxml_get_errors() as $error) {
           echo "\t", $error->message;
       }
   } else {
      //print_r($data);
   //	var_dump($data);


for($i=0; $i<10; $i++){

echo "Deal " . ($i+1) . "<br>";
echo "Hot Deal Image  : " . $data->Items[0]->Item[$i]->MediumImage->URL . "<br>";
echo "Hot Deal Binding: " . $data->Items[0]->Item[$i]->ItemAttributes->Binding . "<br>";
echo "Hot Deal Price  : " . $data->Items[0]->Item[$i]->OfferSummary->LowestNewPrice->FormattedPrice . "<br>";
echo "Hot Deal Title  : " . $data->Items[0]->Item[$i]->ItemAttributes->Title . "<br>";
//echo "Hot Deal Time : " . $data->Items[0]->Item[$i]->hot_time . "<br>";
//echo "Hot Deal Price: " . $data->Items[0]->Item[$i]->price . "<br>";
echo "<br> <br>";

}





   }
}



?>


<!-- <iframe width="350" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://api.hotukdeals.com/rest_api/v2/?key=14f23f77a632f87135d3a30e02bdfc21&merchant=argos&online_offline=offline&order=hot&forum=deals&results_per_page=10">

</iframe>
 -->



</body>
</html>