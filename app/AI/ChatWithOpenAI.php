<?php

namespace App\AI;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;


class ChatWithOpenAI
{
    protected array $messages = [];

    public function systemMessage(string $message):static
    {
        $this -> messages = [
            'role' => 'system',
            'content' => $message
        ];
        return $this;
    }

    public function messages()
    {
        return $this->messages;
    }

    public function send(string $message) : ?string
    {
        $this -> messages[] = [
            'role' => 'user',
            'content' => $message
        ];
        $api_key = config('services.gemini.api_key');

        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key={$api_key}";

        $data = array(
            "contents" => array(
                array(
                    "role" => "user",
                    "parts" => array(array("text" => $message))
                )
            )
        );
//        $this -> messages[] = array(
//            "contents" => array(
//                array(
//                    "role" => "user",
//                    "parts" => array(array("text" => $this -> messages))
//                )
//            )
//        );
        $json_data = json_encode($data);
//        $json_data = json_encode($this -> messages);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }
        if($response)
        {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => $response
            ];
        }
        $response_array = json_decode($response , true);
//        dd($response_array['candidates']);
        if($response == null)
        {
            return "Server a Somossa Hoiche. Kichu Jani Na Ei Somporke!";
        }
        return $response_array['candidates'][0]['content']['parts'][0]['text'] ?? "Nothing Fund";
    }

    public function reply(string $message): ?string
{
        return $this -> send($message);
    }
}
