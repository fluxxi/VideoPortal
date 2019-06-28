<?php
    //XML-Ansicht
    $xmlTitel = $_GET['titel'];
    $xmlId = $_GET['id'];
    $xmlDauer = $_GET['dauer'];
    $xmlSchauspieler = $_GET['schauspieler'];
    $xmlFormat = $_GET['mime'];
    

    header('Content-type: text/xml; charset=utf-8');
	
	$xml = new DOMDocument('1.0', 'utf-8');
	$video = $xml->createElement("video");
	$video->setAttribute("videotitel", $xmlTitel);
	$xml->appendChild($video);
	
	$dauer = $xml->createElement("videolaenge",$xmlDauer);
	$video->appendChild($dauer);
	
	$hauptdarsteller = $xml->createElement("hauptdarsteller",$xmlSchauspieler);
	$video->appendChild($hauptdarsteller);

    $videoid = $xml->createElement("videoid",$xmlId);
	$video->appendChild($videoid);

    $videoformat = $xml->createElement("videoformat",$xmlFormat);
	$video->appendChild($videoformat);
	
	echo $xml->saveXML();
?>