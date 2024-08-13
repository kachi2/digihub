<?php 
namespace App\Traits;
use Intervention\Image\Facades\Image;

trait imageUpload{

    function UploadImage($request, $path, $width = null, $height=null){
          $method = $this->getMime($request->file('image'));
        $image_url = cloudinary()->$method($request->file('image')->getRealPath(), [
            'folder' => $path,
        ])->getSecurePath();
        return  $image_url;
    }

    function UploadImages($request, $path, $width = null, $height=null){
        foreach ($request->file('images') as $image) {
            $method = $this->getMime($image);
            $image_url = cloudinary()->$method($image->getRealPath(), [
                'folder' => $path
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
        $file->move('images/'.$fileName);
        // Image::make($request->file('image'))->save($path.$fileName);
        return $fileName;
    }

    function getMime($request)
    {
      $file =  $request->getMimeType();
        if(str_starts_with($file,'video/')) {
          return  'uploadFile' ;
        }else{
          return  'upload';
         }
    }
}