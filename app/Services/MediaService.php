<?php

namespace App\Services;

class MediaService
{

    const MINE_TYPE = [
        'image/jpeg',
        'image/png',
        'image/jpg',
        'image/webp',
    ];

    const MAX_SIZE = 1024 * 1024 * 2; // 2MB

    public function upload($file, $folder)
    {
        if (!in_array($file->getMimeType(), self::MINE_TYPE)) {
            throw new \Exception('File không đúng định dạng');
        }

        if ($file->getSize() > self::MAX_SIZE) {
            throw new \Exception('File không được vượt quá 2MB');
        }
        return $file->store($folder, 'public');
    }

    public function delete($path)
    {
        return unlink(storage_path('app/public/' . $path));
    }
}
