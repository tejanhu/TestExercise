<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.


function getTop10Deals($id)
{
  $app_info = array();
  $data2;

$url = "http://webservices.amazon.co.uk/onca/xml?AWSAccessKeyId=AKIAJ5VVZLDBRBUEW6VQ&AssociateTag=expertslance-21&Keywords=argos%20products&Operation=ItemSearch&ResponseGroup=Images%2CItemAttributes%2COfferFull%2COffers%2COfferSummary%2CPromotionSummary%2CSalesRank&SearchIndex=All&Service=AWSECommerceService&Timestamp=2016-02-13T06%3A53%3A48.000Z&Signature=99qW3PRiLXaakzDYISReq5waqJGLOmrBc%2FDIwyXwN20%3D";

if (($response_xml_data = file_get_contents($url))===false){
    echo "Error fetching XML\n";
} else {
   libxml_use_internal_errors(true);
   $data2 = simplexml_load_string($response_xml_data);
   if (!$data2) {
       echo "Error loading XML\n";
       foreach(libxml_get_errors() as $error) {
           echo "\t", $error->message;
       }
   } else {
      //print_r($data);
   // var_dump($data);


// for($i=0; $i<10; $i++){

// echo "Deal " . ($i+1) . "<br>";
// echo "Hot Deal Image  : " . $data2->Items[0]->Item[$i]->MediumImage->URL . "<br>";
// echo "Hot Deal Binding: " . $data2->Items[0]->Item[$i]->ItemAttributes->Binding . "<br>";
// echo "Hot Deal Price  : " . $data2->Items[0]->Item[$i]->OfferSummary->LowestNewPrice->FormattedPrice . "<br>";
// echo "Hot Deal Title  : " . $data2->Items[0]->Item[$i]->ItemAttributes->Title . "<br>";
// //echo "Hot Deal Time : " . $data2->Items[0]->Item[$i]->hot_time . "<br>";
// //echo "Hot Deal Price: " . $data2->Items[0]->Item[$i]->price . "<br>";
// echo "<br> <br>";

// }





   }
}












$url = "http://api.hotukdeals.com/rest_api/v2/?key=14f23f77a632f87135d3a30e02bdfc21&merchant=argos&online_offline=offline&order=hot&forum=deals&results_per_page=10";
$data;

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
   // var_dump($data);


for($i=0; $i<10; $i++){



  $datasa = array("title" => "{$data->deals[0]->api_item[$i]->title}", "hot_time" => "{$data->deals[0]->api_item[$i]->hot_time}", "price" => "{$data->deals[0]->api_item[$i]->price}" , "deal_image" => "{$data->deals[0]->api_item[$i]->deal_image}" , "image_amazon" => "{$data2->Items[0]->Item[$i]->MediumImage->URL}" , "price_amazon" => "{$data2->Items[0]->Item[$i]->OfferSummary->LowestNewPrice->FormattedPrice}" , "binding_amazon" => "{$data2->Items[0]->Item[$i]->ItemAttributes->Binding}" , "title_amazon" => "{$data2->Items[0]->Item[$i]->ItemAttributes->Title}" , "price_difference" => "( {$data->deals[0]->api_item[$i]->price} - {$data2->Items[0]->Item[$i]->OfferSummary->LowestNewPrice->FormattedPrice} )" ); 


  array_push($app_info,$datasa);  

}





   }
}


  return $app_info;
}

function get_app_list()
{
  //normally this info would be pulled from a database.
  //build JSON array
  $app_list = array(array("id" => 1, "name" => "Web Demo"), array("id" => 2, "name" => "Audio Countdown"), array("id" => 3, "name" => "The Tab Key"), array("id" => 4, "name" => "Music Sleep Timer")); 

  return $app_list;
}

$possible_url = array("get_app_list", "get_app");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_app_list":
        $value = get_app_list();
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = getTop10Deals($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

//return JSON array
exit(json_encode($value));
?>