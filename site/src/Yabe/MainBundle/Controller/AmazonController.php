<?php

namespace Yabe\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

define("Access_Key_ID", "AKIAI23C6KZGCUPMLMAQ");
define("Associate_tag", "AKIAI23C6KZGCUPMLMAQ");
define("Secret_Access_Key_ID", "wNm8jnTM2lS9E9VW3kttSyS4xLvb/4GYzx7JDUOh");
define("Request_Signature", "UcGJgxTvNi%2BKJ0Wy34ZT5XUnV35ZqqsnRKXhr8Tryww%3D");

class AmazonController extends Controller
{

	function signAmazonUrl($url, $secret_key) {
	    $original_url = $url;

	    // Decode anything already encoded
	    $url = urldecode($url);

	    // Parse the URL into $urlparts
	    $urlparts       = parse_url($url);

	    // Build $params with each name/value pair
	    foreach (split('&', $urlparts['query']) as $part) {
	        if (strpos($part, '=')) {
	            list($name, $value) = split('=', $part, 2);
	        } else {
	            $name = $part;
	            $value = '';
	        }
	        $params[$name] = $value;
	    }

	    // Include a timestamp if none was provided
	    if (empty($params['Timestamp'])) {
	        $params['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
	    }

	    // Sort the array by key
	    ksort($params);

	    // Build the canonical query string
	    $canonical       = '';
	    foreach ($params as $key => $val) {
	        $canonical  .= "$key=".rawurlencode(utf8_encode($val))."&";
	    }
	    // Remove the trailing ampersand
	    $canonical       = preg_replace("/&$/", '', $canonical);

	    // Some common replacements and ones that Amazon specifically mentions
	    $canonical       = str_replace(array(' ', '+', ',', ';'), array('%20', '%20', urlencode(','), urlencode(':')), $canonical);

	    // Build the sign
	    $string_to_sign             = "GET\n{$urlparts['host']}\n{$urlparts['path']}\n$canonical";
	    // Calculate our actual signature and base64 encode it
	    $signature            = base64_encode(hash_hmac('sha256', $string_to_sign, $secret_key, true));

	    // Finally re-build the URL with the proper string and include the Signature
	    $url = "{$urlparts['scheme']}://{$urlparts['host']}{$urlparts['path']}?$canonical&Signature=".rawurlencode($signature);
	    return $url;
	}


	//Set up the operation in the request
	function ItemSearch($SearchIndex, $Keywords) {

		//Set the values for some of the parameters

		$Timestamp = new \DateTime();
		$Timestamp = htmlspecialchars($Timestamp->format('c'));
		$Timestamp = substr($Timestamp, 0, strlen($Timestamp) - 6);
		$Operation = "ItemSearch";
		$Version = "2011-08-01";
		$ResponseGroup = "ItemAttributes,Images";
		//User interface provides values
		//for $SearchIndex and $Keywords

		//Define the request
		$request=
		     "http://webservices.amazon.fr/onca/xml"
		   . "?AWSAccessKeyId=" . Access_Key_ID
		   . "&AssociateTag=" . Associate_tag
		   . "&Keywords=" . $Keywords
		   . "&Operation=" . $Operation
		   . "&SearchIndex=" . $SearchIndex
		   . "&Service=AWSECommerceService"
		   . "&Timestamp=" . $Timestamp
		   . "&Version=" . $Version
		   . "&ResponseGroup=" . $ResponseGroup;

		$request = $this->signAmazonUrl($request, Secret_Access_Key_ID);
		$response = file_get_contents($request);
		$parsed_xml = simplexml_load_string($response);
		$this->printSearchResults($parsed_xml, $SearchIndex);
	}

	function printSearchResults($parsed_xml, $SearchIndex) {
		print("<table>");
		$em = $this->getDoctrine()->getManager();
		$numOfItems = $parsed_xml->Items->TotalResults;
		if ($numOfItems > 0) {
			foreach ($parsed_xml->Items->Item as $current) {
				// TODO get Product from URL
				$product = $em->getRepository("YabeMainBundle:Product")->findByUrl($current->DetailPageURL);
				if (!$product)
				{
				    $product = new Product();
				    $product->setUrl($current->DetailPageURL);
				    $product->setClicks(0);
				    $em->persist($product);
				}

			}
		}
		print("</table>");
		$em->flush();
	}

    public function indexAction() {
	$request =$this->get("request"); 
		if ($request->getMethod() == 'GET') {
	echo $this->get("request")->request->get("query");
    	$products = $this->ItemSearch("Books", $this->get("request")->request->get("query"));
		}
        return $this->render('YabeMainBundle:Home:index.html.twig');
    }


    public function fbAction() {
		if ($request->getMethod() == 'GET') {
			echo $this->get("request")->request->get("query");
		}
        return $this->render('YabeMainBundle:Home:index.html.twig');
    }
}
