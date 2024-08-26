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
        ])->getSecurePath();
      // $pubId =  $image_url->getPublicId();
      // $image_url = $image_url);
 
        return  $image_url;
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
              'expires_at' => strtotime(Carbon::now()->addDay(31)), 
              // 'resource_type' => 'image'
          ];
          $image =  cloudinary()->createZip($option);
          return [$image['secure_url'], $ext, $public_id];
            
          //   $options = [
          //     'public_ids' => $public_id,
          //     'mode' => 'download', 
          //     'target_format' => 'zip',
          //     'use_original_filename' => 1,
          //   ];
          //   $ss =  cloudinary()->downloadArchiveUrl($options);
          //   dd($ss);
          // //  }

           
          }
      }
  
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