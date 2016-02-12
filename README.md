# HUKD Exercise


README:

The project is completed in PHP instead of Javascript. The reason it is being created in PHP is because
I was working on local server (MAMP) and sending a request to API from local server produces a cross domain issue. To overcome this problem PHP is used to send requests to API and parsing the data we get back in response. 

How data is displayed:

Our data is displayed using responsive Boostrap. In my visual page I display data consisting of 10 products from HUKD hot deals using HUKD api for Argos products. Below are the attributes displayed from the data we get  in response.

- Deal Image
- Deal Title
- Deal Description
- Deal Price
- Deal Temperature 
- Deal Hot time

Almost similar is the Amazon API which retrieves data using Amazon Rest API and displays it in its respective web page. Attributes of Amazon API are shown below.

- Title
- Description
- Price
- Binding 

There is no temperature attribute available in the Amazon API so we are unable to get it from their API response.

REST API:

In addition to, I also developed a REST JSON API. Though the data we retrieved was in xml format and I was supposed to make an API which returns data in JSON format, so I did it in my REST API in /api folder. There are 2 files located one of them is the actual API and the other one is the Sample code to understand the running of API.

API connects with Amazon and HUKD servers and retrieve data for from both and after having a comparison of products on the basis of prices price different is also returned by the API. If We pass API id=1 then it will just simply return data  in JSON format but if we send 2 in id parameter it will return a difference of prices between the two API's.

Directory Structure of Project

hussein
-------amazon.php
-------work.php
-------MainWork
	   --------index.php
	   --------index_amazon.php
	   --------ReadMe.txt
	   --------style.css
	   --------bootstrap
	   --------API
	   		   ---api.php
	   		   ---ApiRunning.php



Should you have any queries, please do not hesitate to contact me. Many thanks.
