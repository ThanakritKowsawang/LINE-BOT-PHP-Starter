<?php
$access_token = 'jz4rIas7yk+34G0fqp5vk3ZYAxfbLWIorYSkaUlVgBBZefm5QUmocEY2vB+r40D+TbPDygLZdqp7theK2GlMJexM7dGlZ6iEKydgAIZncUqjuk+X6iurbhlNjLDOjohw7MalMYKUToeKlchL63XdEAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'ดี',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . jz4rIas7yk+34G0fqp5vk3ZYAxfbLWIorYSkaUlVgBBZefm5QUmocEY2vB+r40D+TbPDygLZdqp7theK2GlMJexM7dGlZ6iEKydgAIZncUqjuk+X6iurbhlNjLDOjohw7MalMYKUToeKlchL63XdEAdB04t89/1O/w1cDnyilFU=);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
