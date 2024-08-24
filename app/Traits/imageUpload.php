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
    
          // dd([$public_id][0]);
          if($image_url)
          {
            $option = [
              'public_ids' => [$public_id],
              'expires_at' => time() + 30000600, 
              'resource_type' => 'image'
          ];
            $dd = cloudinary()->createZip($option);
            $res = $dd;
            dd($res);
     
           {
            $options = [
              'signature' => '892fae86ba79b751581dd415d540f6632cae193f',
              'public_ids' => 'xdq7efdjygyt4kyzpmac.zip',
              'asset_id' => 'd59e4429383ef48f40b1df20ea5f8990',
              'mode' => 'download', 
              'target_format' => 'zip',
              'timestamp' => '1724361628',
              'signature' =>  $sign,
              'use_original_filename' => 1,
              'api_key' =>  $dd,
            ];
          $ss =  cloudinary()->downloadArchiveUrl($options);
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