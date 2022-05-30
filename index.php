<?php
$path = "https://api.telegram.org/bot5355398612:AAHtMgc6a-0gGR4U4uByVYU13a3rQqbe03k/setwebhook?url=https://bypassanu.herokuapp.com/index.php;

$update = json_decode(file_get_contents("php://input"), TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if (strpos($message, "/bypass") === 0) {
$link = substr($message, 8);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://unshorten.it/main/get_long_url');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "short-url=".$link."&csrfmiddlewaretoken=X8wPmHNiOVoTkY22cIN0rFFZd05V9jhT6t8nnkMV0Sio0ngYLzh7oTCUz0U7RcnK");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: unshorten.it';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"99\"';
$headers[] = 'Accept: */*';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.94 Safari/537.36';
$headers[] = 'Sec-Ch-Ua-Platform: \"Linux\"';
$headers[] = 'Origin: https://unshorten.it';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Referer: https://unshorten.it/';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Cookie: csrftoken=SAJiZpT2n97WTxsloCMQy1avV25MDgJ21VlQ02SFz61rzWGhXtgXvf7qh2UYl9PT; _ga=GA1.2.1666876052.1650094698; _gid=GA1.2.913836666.1650094699; _gat_UA-24369154-1=1; __gads=ID=a16dcb0591b1c6e7-22154500ffd10032:T=1650094699:RT=1650094699:S=ALNI_MY2f9i_DwvXkOuCdIBWkxQm8crQMw';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$url = json_decode($result)->long_url;
$bypass = strtok($url,'?');
  file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Here's the result ".$link." : ". $bypass);

curl_close($ch);
}
?>
