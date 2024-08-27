<?php

use App\Models\Review;
use Vinkla\Hashids\Facades\Hashids;

if(!function_exists('trimInput')){

    function trimInput($input){
        return str_replace(['/', ' ','*', '+', '=', '<', '>', '&', '^', '%', '$', '#', '@', '!', '[', ']', ], '', $input);
    }
}

if(!function_exists('moneyFormat')){
    function moneyFormat($currency){
        return '₦'.number_format($currency);
    }

if(!function_exists('auth_user')){

    function auth_user(){
        return auth()->user();
    }
}

if(!function_exists('addHashId')){
    function addHashId($data){
        foreach($data as $dd){
            $dd->hashid = Hashids::connection('products')->encode($dd->id);
            $dd->productUrl = trimInput($dd->name??null);
        }
    return $data;
    }
}

if(!function_exists('shippingBase')){
    function shippingBase($param = null){
        return 'https://api.jand2gidi.com.ng/api/v1/'.$param;
    }


if(!function_exists('moneyFormat')){
    function moneyFormat($data){
        return '₦'.number_format($data,2);
    }
}

if(!function_exists('GenerateRef')){

    function GenerateRef($size){
        return substr(str_replace(['[', ']', '+', '=','!','@','#','%','&','*','(',')','/'], '', base64_encode(random_bytes(16))),0, $size);
    }
}

if(!function_exists('decodeHashid')){
    function decodeHashid($id){
        $id = Hashids::connection('products')->decode($id);
        if(is_array($id)){
            return $id[0];
        }
        return $id;
    }
}

if(!function_exists('convertPercent')){

    function convertPercent($number, $percent){
        return ($number*$percent)/100;
    }
}
if(!function_exists('displayImageOrVideo')){
function displayImageOrVideo($file, $width=null, $height=null)
{

    $files = explode('.', $file);
    // dd($files);
    if($files > 1)
    {
    switch($files[3])
    {
        case 'mp4': 
            // $file = asset('images/'.$file);
        $output = 
        " <video muted  width='$width' height='$height' max-height='$height' autoplay loop>
                <source src='$file' type='video/mp4'>  
            </video>
        ";
        break;
        default:
        $output = "<img src='$file'   alt='$file' />";
    }
 
    return $output;
    }
    return $file;
}
}

if(!function_exists('productRating'))
{
    function productRating($product_id)
    {
        $data['average'] = 0;
        $rate = Review::where('product_id', $product_id)->get();
        $data['sum'] = $rate->sum('rating')??0;
        $data['count'] = $rate->count()??0;
        if($data['count'] > 0) $data['average'] = $data['sum'] / $data['count'];
        return $data;
    }
}

if(!function_exists('RatingCounting'))
{
    function RatingCounting($count)
    {
        $output = '';
        switch($count){
            case 5: 
              $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
              $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
              $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
              $output .=   "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
              $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
              break;

         case $count > 4  && $count < 5: 
                $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=   "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star-half-o' style='color:rgb(175, 92, 14)'> </i>";
            break;
            case 4: 
                $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=   "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
            break;
        case $count > 3  && $count < 4: 
                $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star-half-o' style='color:rgb(175, 92, 14)'> </i>";

            break;
            case 3: 
                $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
            break;
            case $count > 2  && $count < 3: 
                $output  .= "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star-half-o' style='color:rgb(175, 92, 14)'> </i>";

            break;
            case 2: 
                $output  .= "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";

            break;
            case $count > 1  && $count < 2: 
                $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
                $output .=  "<i class='fa fa-star-half-o' style='color:rgb(175, 92, 14)'> </i>";
            break;
            case 1: 
                $output  = "<i class='fa fa-star' style='color:rgb(175, 92, 14)'> </i>";
            break;
        }
        return $output;
    }
}
}

if(!function_exists('getFileType'))
{
    function getFileType($ext)
    {
        switch($ext)
        {
            case 'docx'||'doc' || 'wpd' || 'wps'||'odt'||'pages':
                return "Word Documents";
                break;
            case 'pdf' || 'PDF':
                return 'PDF Documents';
                break;
            case 'XLSX' || 'XLS' || 'ODS':
                return "Spreadsheet Documents";
                break; 
            case 'PPTX' || 'PPT' || 'ODP':
                return "Presentation Document";
                break;
            return "Editable Document";
        }
    }
}














}