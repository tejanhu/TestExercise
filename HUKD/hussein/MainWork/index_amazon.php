<!DOCTYPE html>
<html>
<head>
	<title>Hussein Work</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Amazon API's Data</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h3>About Project</h3>
        <p>This project uses two famous API's (HUKD and Amazon) to retreive product details and show them in a proper manner.</p>
         </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      



<ul class="media-list">

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

   	?>


                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="<?php echo $data->Items[0]->Item[$i]->MediumImage->URL; ?>" alt="profile">
                        </a>
 						<div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews"><?php echo $data->Items[0]->Item[$i]->ItemAttributes->Title; ?> </h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd">22</li>
                                <li class="mm">09</li>
                                <li class="aaaa">2014</li>
                              </ul>
                              <p class="media-comment">
                                <?php  echo $data->Items[0]->Item[$i]->ItemAttributes->Feature; ?>
                              </p>
                              <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> <?php echo $data->Items[0]->Item[$i]->OfferSummary->LowestNewPrice->FormattedPrice; ?></a>
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> <?php echo $data->Items[0]->Item[$i]->ItemAttributes->Binding; ?></a>
                          </div>              
                        </div>
                        </li>




<?php


}





   }
}



?>



                        </ul>













      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->





</body>


</html>