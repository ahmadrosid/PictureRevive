<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response([
                "error" => true,
                "errors" => $validator->errors(),
            ], 400);
        }

        $photo = $request->file('photo');
        $name = Str::random(40) . "." . $photo->getClientOriginalExtension();
        $originalPath = Storage::putFileAs('public/photos', $photo, $name);
        $image = $this->getBase64Image($originalPath);

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . config('app.replicate.api_token')
        ])
        ->timeout(60)
        ->post('https://api.replicate.com/v1/predictions', [
            'version' => '7de2ea26c616d5bf2245ad0d5e24f0ff9a6204578a5c876db53142edd9d2cd56',
            'input' => [
                "image" => $image,
            ],
        ]);

        if ($response->getStatusCode() != 201) {
            return [
                "error" => true,
                "message" => "Failed!"
            ];
        }

        $resp = json_decode($response);
        return [
            'original' => asset("/storage/photos/" . $name),
            'result' => [
                "id" => $resp->id
            ]
        ];
    }

    public function status($id)
    {
        $response = Http::withHeaders([
                'Authorization' => 'Token ' . config('app.replicate.api_token')
            ])
            ->acceptJson()
            ->timeout(60)
            ->get("https://api.replicate.com/v1/predictions/{$id}");

        $resp = json_decode($response);
        return $resp;
    }

    private function getBase64Image($path) {
        $image = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        $base64 = base64_encode($image);
        return "data:" . $mimeType . ";base64," . $base64;
    }
}
