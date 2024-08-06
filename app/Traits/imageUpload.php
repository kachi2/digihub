<?php 
namespace App\Traits;
use Intervention\Image\Facades\Image;

trait imageUpload{

    function UploadImage($request, $path, $width = null, $height=null){

       
        $image_url = cloudinary()->upload($request->file('image')->getRealPath(), [
            'folder' => $path,
            'transformation' => [
                'width' => $width,
                'height' => $height
       ]
        ])->getSecurePath();

        $account_details = cloudinary();
          dd($account_details);
        return  $image_url;
    }

    function UploadImages($request, $path, $width = null, $height=null){
        $file = $request->file('images');
        foreach ($file as $image) {
            $image_url = cloudinary()->upload($image->getRealPath(), [
                'folder' => $path,
                'transformation' => [
                    'width' =>$width,
                    'height' => $height
           ]
            ])->getSecurePath();
            $images[] = $image_url;
        }
       return $images;
    }

    function ImagesNoResize($request, $path){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $FileName = \pathinfo($name, PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $time = time() . $FileName;
        $fileName = $time . '.' . $ext;
        Image::make($request->file('image'))->save($path.$fileName);
        return $fileName;
    }
}