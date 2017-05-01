<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StarwarController extends Controller
{
    private $api = "http://wongklom.dev/api/";

    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $call = "starwar";
        $response = $client->request('GET', "http://swapi.co/api/people/1/", [
            'form_params' => []
        ]);
        $resBody = $response->getBody();
        $res = json_decode($resBody);
        return view('starwar.index', [
            'statusCode' => $response->getStatusCode(),
            'responseHeader' => $response->getHeader('content-type')[0],
            'name' => $res->name,
            'height' => $res->height, 
            'mass' => $res->mass, 
            'hair_color'=> $res->hair_color, 
            'skin_color'=>$res->skin_color, 
            'eye_color'=> $res->eye_color, 
            'birth_year'=> $res->birth_year, 
            'gender'=> $res->gender, 
            'resBody' => $response->getBody()
        ]);
    }

    public function show($id)
    {
        $client = new \GuzzleHttp\Client();
        $call = "starwar/{$id}";
        $response = $client->request('GET', "{$this->api}{$call}", [
            'form_params' => []
        ]);
        $resBody = $response->getBody();
        $res = json_decode($resBody);

        // Todo: request album from /api/singers/$id/albums

        return view('starwar.show', [
            'statusCode' => $response->getStatusCode(),
            'responseHeader' => $response->getHeader('content-type')[0],
            'success' => !is_null($res)? $res->success: false,
            'data' => !is_null($res)?$res->data: null,
            'resBody' => $response->getBody()
        ]);
    }

    public function create() {
        return view('starwar.create');
    }
}
