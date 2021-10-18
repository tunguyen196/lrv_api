<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

abstract class BaseService
{
    /**
     * @var \Eloquent model
     */
    protected $model;

    public function find($id, $with = null)
    {
        $query = $this->model;

        if ($with) {
            $query = $query->with($with);
        }

        return $query->find($id);
    }

    public function uploadFile(UploadedFile $image)
    {
        return Storage::disk()->putFile(detect_folder_upload_by_model($this->model), $image);
    }

    public function deleteFile($path)
    {
        if (!empty($path)) {
            $oldPath = detect_folder_upload_by_model($this->model) . '/' . $path;
            Storage::delete($oldPath);
        }
    }
}
