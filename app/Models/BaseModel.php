<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image;

class BaseModel extends Model
{
    protected $guarded = [];

   

    public function generateQRCode($codeSize, $certificateNo)
    {
        $url = config('app.url').'/certificate/'.$certificateNo.'/verify';

        return QrCode::size($codeSize)->generate($url);
    }
}


