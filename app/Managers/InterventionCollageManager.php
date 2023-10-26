<?php

namespace App\Managers;

use App\Interfaces\CollageManagerInterface;
use Intervention\Image\Facades\Image;

class InterventionCollageManager implements CollageManagerInterface
{

    public function generate(string $pathToImageFolder): string
    {
        // Create an empty canvas for the collage, leaving the optional background value empty crates a transparent background
        $collage = Image::canvas(362 * 5 + 40, 544 * 2 + 10);

        // Get the list of png images in the folder
        $imagePaths = glob($pathToImageFolder.'*.png');
        // Sort alphabetically
        natsort($imagePaths);

        // Set initial coordinates
        $x = 0;
        $y = 0;

        // Loop through the images and add them to the collage
        foreach ($imagePaths as $imagePath) {
            $image = Image::make($imagePath);
            $collage->insert($image, 'top-left', $x, $y);
            $x += 362 + 10; // 10 pixel gap
            if ($x >= 362 * 5 + 40) { // the total width of a row
                $x = 0; // reset X coordinate
                $y += 544 + 10; // set Y coordinate of 2nd row with a 10px gap
            }
        }

        $savePath = public_path('images/collage.png');
        // Save the collage as a PNG image
        $collage->save($savePath);

        // Return path to generated collage
        return $savePath;
    }
}
