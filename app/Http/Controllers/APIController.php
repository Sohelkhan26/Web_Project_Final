<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //
    public function searchGoogle(Request $request)
    {
        $apiKey = env('SERPER_API_KEY'); // Get key from .env
        $searchTerm = $request->get('search');
//        $client = new Client();
//        $headers = [
//            'X-API-KEY' => '9a047c9c16ee2a565f0fe5310c7a0edc9c252af9',
//            'Content-Type' => 'application/json'
//        ];
//        $body = '{
//          "q": "apple"
//        }';
//        $request = new Request('POST', 'https://google.serper.dev/search', $headers, $body);
//        $res = $client->sendAsync($request)->wait();
//        dd($res->getBody());
//        dd($searchTerm);
        $client = new Client();
        $response= null;
        try {
            $response = $client->get('https://google.serper.dev/search', [
                'query' => [
                    'api_key' => $apiKey,
                    'q' => $searchTerm,
                    "type" => "search",
                    "engine" => "google",
                    "num" => 20,
                    "gl" => "us",
                    "hl" => "en"
                ]
            ]);
        } catch (GuzzleException $e) {
            echo "Something went wrong" . $e->getMessage()."<br>";
        }
//        dd($response);

        $searchResults = json_decode($response->getBody(), true);
//        dd($searchResults);
        // Process and display search results in your Laravel view
        return view('searchAnything', compact('searchResults'));
    }
}
