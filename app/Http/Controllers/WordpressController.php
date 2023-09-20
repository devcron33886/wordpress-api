<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WordpressController extends Controller
{
    public function __invoke()
    {
        // Make a GET request to the WordPress API to fetch the blog posts
        $client = new Client();
        $response = $client->get('http://mbabazi.pro/wp-json/wp/v2/posts');

        // Decode the JSON response
        $posts = json_decode($response->getBody());

        // Pass the posts to a view for display
        return view('welcome', ['posts' => $posts]);
    }
}
