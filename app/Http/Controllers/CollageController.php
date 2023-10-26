<?php

namespace App\Http\Controllers;

use App\Interfaces\CollageManagerInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CollageController extends Controller
{
    public function __construct(private CollageManagerInterface $collageManager){}

    public function generate(): BinaryFileResponse
    {
        // Generate collage with the manager, returns path to generated file, takes image folder location
        $path = $this->collageManager->generate(public_path('images/assets/'));

        // Return collage as a download
        return response()->download($path);
    }
}
