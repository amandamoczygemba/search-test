<?php namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Routing\Controller;
use Input;
use View;

class SearchController extends Controller {

    public function index()
    {
        return View::make('search/index');
    }

    public function processQuery()
    {
        $client = new Client([
            'base_url' => 'http://54.84.49.193:8080',
            'defaults' => [
                'auth' => ['daniel', 'berryawesome'],
                'headers' => ['Content-Type' => 'application/x-www-form-urlencoded']
            ]
        ]);

        try
        {
            $response = $client->post('alfresco/service/cwlake/search', [
                'body' => [
                    'query' => Input::get('query')
                ]
            ]);

            $results = $response->json()['result']['nodes'];

            $totalResults = count($results);

            return View::make('search/results', compact('totalResults', 'results'));
        }
        catch(RequestException $e)
        {
            echo $e->getRequest() . "\n";

            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }
    }
}