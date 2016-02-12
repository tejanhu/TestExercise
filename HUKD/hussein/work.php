<!DOCTYPE html>
<html>
<head>
	<title>Hot Deals</title>
</head>
<body>


<?php

$url = "http://api.hotukdeals.com/rest_api/v2/?key=14f23f77a632f87135d3a30e02bdfc21&merchant=argos&online_offline=offline&order=hot&forum=deals&results_per_page=10";

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
echo "Hot Deal Title: " . $data->deals[0]->api_item[$i]->title . "<br>";
echo "Hot Deal Time : " . $data->deals[0]->api_item[$i]->hot_time . "<br>";
echo "Hot Deal Price: " . $data->deals[0]->api_item[$i]->price . "<br>";
echo "Hot Deal Image: " . $data->deals[0]->api_item[$i]->deal_image . "<br>";
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