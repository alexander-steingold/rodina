<?php

namespace App\Services;

use App\Models\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function deleteTempFiles()
    {
        $tmpFiles = TempFile::all();
        if (!$tmpFiles->isEmpty()) {
            foreach ($tmpFiles as $tmpFile) {
                Storage::deleteDirectory('uploads/tmp/' . $tmpFile->folder);
                $tmpFile->delete();
            }
            logger('info', ['temp files deleted']);
        }
    }

    public function upload($tmp_file)
    {
        // $tmp_file = TempFile::where('file', $image)->first();

        if ($tmp_file) {
            $file_path = $tmp_file->folder . '/' . $tmp_file->file;
            $tmp_path = 'uploads/tmp/' . $file_path;
            $dest_path = 'uploads/items/' . $file_path;
            Storage::copy($tmp_path, $dest_path);
            Storage::deleteDirectory('uploads/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return $dest_path;
        }
        return false;
    }
}
