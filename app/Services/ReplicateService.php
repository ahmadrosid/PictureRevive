<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Class ReplicateService
 *
 * This class handles the interactions with the Replicate API.
 *
 * @package App\Services
 */
class ReplicateService
{
    /**
     * Make a prediction using the image provided.
     *
     * @param string $image The image in base64 format
     * @return \Illuminate\Http\Response
     */
    public function predict($image)
    {
        $modelVersion = '7de2ea26c616d5bf2245ad0d5e24f0ff9a6204578a5c876db53142edd9d2cd56';
        $headers = [
            'Authorization' => 'Token ' . config('app.replicate.api_token')
        ];
        $response = Http::withHeaders($headers)
        ->timeout(60)
        ->post('https://api.replicate.com/v1/predictions', [
            'version' => $modelVersion,
            'input' => [
                "image" => $image,
            ],
        ]);
        return $response;
    }

    /**
     * Get the progress of an AI prediction by id.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function getPrediction($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . config('app.replicate.api_token')
        ])
        ->acceptJson()
        ->timeout(60)
        ->get("https://api.replicate.com/v1/predictions/{$id}");
        return $response;
    }

    /**
     * Convert an image to base64 format.
     *
     * @param string $path
     * @return string
     */
    public function imageToBase64($path)
    {
        $image = Storage::get($path);
        $mimeType = Storage::mimeType($path);
        $base64 = base64_encode($image);
        return "data:" . $mimeType . ";base64," . $base64;
    }
}
