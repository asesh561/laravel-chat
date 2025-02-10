<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChunkUploadController extends Controller
{
    public function uploadChunk(Request $request)
    {
        $chunkIndex = $request->input('chunkIndex');
        $totalChunks = $request->input('totalChunks');
        $fileName = $request->input('fileName');
        $file = $request->file('file');

        // Temporary directory for chunks
        $tempDir = public_path('products/temp/' . $fileName);
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0777, true);
        }

        // Save the chunk
        $file->move($tempDir, "chunk_{$chunkIndex}");

        // If all chunks are uploaded, combine them
        if ($chunkIndex + 1 == $totalChunks) {
            $finalPath = public_path("products/{$fileName}");
            $outputFile = fopen($finalPath, 'wb');

            for ($i = 0; $i < $totalChunks; $i++) {
                $chunkPath = "{$tempDir}/chunk_{$i}";
                $chunkData = file_get_contents($chunkPath);
                fwrite($outputFile, $chunkData);
                unlink($chunkPath); // Delete the chunk after merging
            }

            fclose($outputFile);
            rmdir($tempDir); // Remove the temporary directory
        }

        return response()->json(['status' => 'success']);
    }
}
