<?php

$token = getenv('BOT_TOKEN');

$update = json_decode(file_get_contents("php://input"), true);

if (isset($update["message"])) {

    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"] ?? "";

    if ($text === "/start") {
        $reply = "Salom! 👋 Bot ishlayapti!";
    } else {
        $reply = "Siz yozdingiz: " . $text;
    }

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage";

    $data = http_build_query([
        "chat_id" => $chat_id,
        "text" => $reply
    ]);

    $options = [
        "http" => [
            "method" => "POST",
            "header" => "Content-Type: application/x-www-form-urlencoded",
            "content" => $data
        ]
    ];

    file_get_contents($url, false, stream_context_create($options));
}

http_response_code(200);
echo "OK";
?>
