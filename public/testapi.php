<?php
echo "ciao";

$curl = curl_init();

curl_setopt($curl, CURL_URL, "http://127.0.0.1:8000/api/books/");
curl_setopt($curl, CURLOPT_HEADER, 1);
curl_exec($curl);

curl_close($curl);
?>
