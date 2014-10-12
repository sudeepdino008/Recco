<?php
$urlsArray = array(
    "http://ankurpandey.com/1",
    "http://ankurpandey.com/2",
    "http://ankurpandey.com/3",
    "http://ankurpandey.com/4",
    "http://ankurpandey.com/5",
    "http://ankurpandey.com/6",
);

// Calling curl for each element of the urlsArray. each curl runs on its own thread.
$curl_array = array();
$ch = curl_multi_init();
foreach ($urlsArray as $count => $url) {
    $curl_array[$count] = curl_init($url);
    curl_setopt($curl_array[$count], CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
    curl_setopt($curl_array[$count], CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_array[$count], CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl_array[$count], CURLOPT_PROXY, "10.3.100.211:8080");
	curl_setopt($curl_array[$count], CURLOPT_ENCODING, '');
	curl_setopt($curl_array[$count], CURLOPT_HTTPHEADER, array(
		'Content-length: 500000',
		'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
		'Accept-Encoding:gzip,deflate,sdch',
		'Accept-Language:en-US,en;q=0.8,fr;q=0.6,hi;q=0.4,ms;q=0.2',
		'Cache-Control:max-age=0',
		'Cookie:__utma=97865927.1689951289.1397002514.1397014148.1397062322.3; __utmb=97865927.1.10.1397062322; __utmc=97865927; __utmz=97865927.1397002514.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)',
		'Host: www.ankurpandey.com', // use the site name qhich you are calling.
		'Proxy-Connection:keep-alive'
	));
    curl_multi_add_handle($ch, $curl_array[$count]);
}
do {
    curl_multi_exec($ch, $exec);
} while ($exec > 0);

// Looping through the results
$workCount = 0;
foreach ($curl_array as $curl) {
    // code fetched from this curl
    $thisData = curl_multi_getcontent($curl);
    $linkFetched = $urlsArray[$workCount];
    $workCount++;
    // your code here.

    // use this when response is in JSON
    $thisObject = json_decode($thisData);

    // use these when response 
    $thiDom = new DOMDocument;
    $one->loadXml($thisData);
}

?>