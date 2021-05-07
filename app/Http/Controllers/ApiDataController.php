<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiDataController extends Controller
{
    public function index(Request $request){
        // Simple validation. Complexed validation can be seperated in special Class.
        $data = $request->validate([
            'page' => 'integer',
        ]);

        if(!isset($data['page'])){
            $data['page'] = 1;
        };

        $response = Http::get('https://jsonplaceholder.typicode.com/posts?_limit=10&_page=' . $data['page']);

        return [
            'data' => $response->json(),
            'page' => $data['page'],
            'length' => $response->header('x-total-count')
        ];
    }
    
    public function bodyData(Request $request){
        // Simple validation. Complexed validation can be seperated in special Class.
        $data = $request->validate([
            'id' => 'integer|required',
        ]);

        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $data['id']);

        return [
            'data' => $response->json()
        ];
    }
}
