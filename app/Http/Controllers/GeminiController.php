<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GeminiController extends Controller
{
    public function send()
    {
        $message = 'What is Laravel used for?';
        $api_key = config('services.gemini.api_key');

        $url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key={$api_key}";

        $data = array(
            "contents" => array(
                array(
                    "role" => "user",
                    "parts" => array(

                        array(
                            "text" => $message
                        )
                    )
                )
            )
        );
        $json_data = json_encode($data);

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
        dd($response);
    }
}
