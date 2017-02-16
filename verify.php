<?php
$access_token = 'jz4rIas7yk+34G0fqp5vk3ZYAxfbLWIorYSkaUlVgBBZefm5QUmocEY2vB+r40D+TbPDygLZdqp7theK2GlMJexM7dGlZ6iEKydgAIZncUqjuk+X6iurbhlNjLDOjohw7MalMYKUToeKlchL63XdEAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
