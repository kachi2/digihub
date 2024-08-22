<?php 
namespace App\Traits;

use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Intervention\Image\Facades\Image;

trait imageUpload{

    function UploadFile($request, $path, $width = null, $height=null){
          $method = $this->getMime($request->image);
        $image_url = cloudinary()->$method($request->file('image')->getRealPath(), [
            'folder' => $path,
        ]);
      $pubId =  $image_url->getPublicId();
      $image_url = $image_url->getSecurePath();
 
        return  [$image_url, $pubId];
    }

    function UploadFiles($request, $path, $width = null, $height=null)
    {
      $images = [];
        foreach ($request->images as $image) {
            $method = $this->getMime($image);
            $image_url = cloudinary()->$method($image->getRealPath(), [
                'folder' => $path
            ])->getSecurePath();
            $images[] = $image_url;
        }
       return $images;
    }

    function UploadResoucesFiles($request, $path, $width = null, $height=null){
      foreach ($request->docs as $image) {
          $ext = $image->getClientOriginalExtension();
          $image_url = cloudinary()->uploadFile($image->getRealPath(), [
              'folder' => $path
          ]);
          $images[] = $image_url->getSecurePath();
          $public_id = $image_url->getPublicId();
          if($image_url)
          {
            $option = [
              'public_ids' => [$public_id],
              'type' => 'upload', 
              'target_format' => 'zip', 
              'use_original_filename' => true, 
              'flatten_folders' => true,
              'expires_at' => time() + 3600, 
          ];
           $dd = cloudinary()->createArchive($option);
           {
            $options = [
              'use_original_filename' => true,
              'expires_at' => Carbon::now()->addDays(2),
              'public_ids' => [$public_id],
            ];
          $ss =  cloudinary()->downloadZipUrl($options);
          dd($ss);
           }

           
          }
      }
     return [$images, $ext, $public_id];
  }

    function ImagesNoResize($request, $path){
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $FileName = \pathinfo($name, PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $time = time() . $FileName;
        $fileName = $time . '.' . $ext;
        // $file->move('assets/'.$fileName);
         Image::make($request->file('image'))->save($path.$fileName);
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