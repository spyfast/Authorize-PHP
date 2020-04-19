<?php

		$confirmation_token = 'e6ab65ef';

		function vk_msg_send($peer_id,$text){
			$request_params = array(
				'message' => $text,
				'peer_id' => $peer_id,
				'access_token' => "a388ec2a97bd14f3940366e1fc64723789f4ad6870bde4acacff607120f8d97c7806e627cdbb174000f7b",
				'v' => '5.92',
				'random_id' => rand(0, 1000000)
			);
			$get_params = http_build_query($request_params);
			file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);
		}
		$data = json_decode(file_get_contents('php://input'));

		switch ($data->type) {
			case 'confirmation':
				echo $confirmation_token;
			break;

			case 'message_new':
				$message_text = $data -> object -> text;
				$chat_id = $data -> object -> peer_id;
				$fromId = $data -> object -> from_id;


				if ($fromId !== 515260848)
				{
					vk_msg_send($chat_id, $message_text, $reply);
				}
				if ($message_text == "чат")
				{
					vk_msg_send($chat_id, "Номер чата: $chat_id", $reply);
				}
				echo 'ok';
			break;
		}
?>
