<?php

namespace App\Http\Controllers;

use App\Services\ReplicateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected ReplicateService $replicateService;
 
    /**
     * HomeController constructor.
     *
     * @param ReplicateService $replicateService
     */
    public function __construct(ReplicateService $replicateService)
    {
        $this->replicateService = $replicateService;
    }

    /**
     * Display the UI client for user uploading the photos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("welcome");
    }
 
    /**
     * Upload a photo to Replicate API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $image = $this->replicateService->imageToBase64($originalPath);
    
        try {
            $response = $this->replicateService->predict($image);
        } catch (\Exception $e) {
            return response([
                "error" => true,
                "message" => $e->getMessage()
            ], 500);
        }
    
        if ($response->getStatusCode() != 201) {
            return response([
                "error" => true,
                "message" => "Failed!"
            ], 400);
        }
    
        $resp = $response->json();
        return [
            'original' => asset('/storage/photos/' . $name),
            'result' => [
                "id" => $resp['id']
            ]
        ];
    }

    /**
     * Get the status of the AI prediction for a specific image.
     *
     * @param string $id - The ID of the image prediction
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        try {
            $response = $this->replicateService->getPrediction($id);
        } catch (\Exception $e) {
            return response([
                "error" => true,
                "message" => $e->getMessage()
            ], 500);
        }
    
        if ($response->getStatusCode() != 200) {
            return response([
                "error" => true,
                "message" => "Failed!"
            ], 400);
        }
    
        return $response->json();
    }
}
