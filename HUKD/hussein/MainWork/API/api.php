<?php
// This is the API, 2 possibilities: show the app list or show a specific app by id.


function getTop10Deals($id)
{
  $app_info = array();



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
   // var_dump($data);


for($i=0; $i<10; $i++){



  $datasa = array("title" => "{$data->deals[0]->api_item[$i]->title}", "hot_time" => "{$data->deals[0]->api_item[$i]->hot_time}", "price" => "{$data->deals[0]->api_item[$i]->price}" , "deal_image" => "{$data->deals[0]->api_item[$i]->deal_image}"); 


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