<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

trait MediaTrait
{
    public function uploadMedia($image, $folderName, $quality =80)
    {
        $manager = new ImageManager(Driver::class);

        // Get the original filename without extension
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        // Convert the original filename to a slug
        $sluggedName = Str::slug($originalName);

        // Append unique identifier (timestamp) to the slugged filename
        $imageName = $sluggedName . '.webp';

        // Define the folder path for the user-specified folder within public (e.g., public/{folderName})
        $folderPath = public_path($folderName);

        // Ensure the folder is created if it doesn't exist
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true); // Create the directory with proper permissions
        }

        // Process the image and convert it to webp
        $img = $manager->read($image->getRealPath());
        $encodedImage = $img->encode(new WebpEncoder(quality: $quality)); // Encode as webp with adjustable quality

        // Store the image directly in the public folder
        $filePath = $folderPath . '/' . $imageName;
        file_put_contents($filePath, (string) $encodedImage); // Save the encoded image as a string

        // Save the image details in the database (optional)
        $uploadedImage = Media::create([
            'name' => $imageName,
            'path' => $folderName . '/' . $imageName,
        ]);

        return $uploadedImage;
    }
}
