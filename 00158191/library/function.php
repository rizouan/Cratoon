<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['device'])){
    $_SESSION['device']=time().rand(10,99);
}
$deviceid=$_SESSION['device'];
$ipa = $_SERVER['REMOTE_ADDR'];
define('BASE_URL','http://localhost/00158191/');
//please change the directory if you have the file in a differtent directory 
define('VALIDATE_URL', BASE_URL.'validate.php');


define('SITE_NAME','Computer Mart');
define('SITE_TITLE', '- Shop Here');
define('DESCR', 'description goes here');
define('KEYWORDS', 'Keywords');
$dbhost   = 'localhost';
$dbuser   = 'root';
$dbname   = 'cmart';
$dbpass   = '';

$db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$db->set_charset("utf8");
if ($db->connect_error) {
die("<b>Database Connection failed:</b> " .
$db->connect_error);
exit;
}
function CreateFile($name, $data){
    $fh = fopen($name, "w");
    fwrite($fh, $data);
    fclose($fh);    
}
function FileRead($name, $len){
    $fh = fopen($name, "r");
    $fd = fread($fh, filesize($name));
    fclose($fh);
    if($len == "All"){
        return $fd; 
    }
    else{
        $fd = strip_tags($fd);
        return substr($fd, 0, $len);
    }   
}
function MS($data){
    global $db;
    return trim($db->real_escape_string($data));
}
function timeAgo($ptime){
        $estimate_time = time() - $ptime;
        if( $estimate_time < 1 ){
            return 'Just now';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );
        foreach( $condition as $secs => $str ){
            $d = $estimate_time / $secs;
            if( $d >= 1 ){
                $r = round( $d );
                return $r.' '.$str.($r>1 ? 's' : '').' ago';
            }
        }
    }
function get_ext($Url){
        $len = strlen($Url);
        $rpos = strrpos($Url, '.');
        $begin = $len - $rpos;
        $end = $rpos + 1;
        $sub = substr($Url, $end, $begin);
        $ext = strtolower($sub);
        return $ext;
}
function upload_image($run, $photo_src, $save_src, $width=0, $height=0, $quality=80){
    $quality=(int)$quality; if ($quality < 0 or $quality > 100){ $quality = 80; } if (file_exists ($photo_src)){if (strrpos($photo_src, '.')){$ext = substr($photo_src, strrpos($photo_src,'.') + 1, strlen($photo_src) - strrpos($photo_src, '.')); $fxt = (in_array($ext, array('jpeg', 'png', 'gif'))) ? $ext : "jpeg"; }else {  $ext = $fxt = 0;} if (preg_match('/(jpg|jpeg|png|gif)/', $ext)){if ($fxt == "gif")  {copy($photo_src, $save_src); return true; } list($photo_width, $photo_height) = getimagesize($photo_src); $create_from = "imagecreatefrom" . $fxt; $photo_source = $create_from($photo_src); if ($run == "crop"){if ($width > 0 && $height > 0){$crop_width = $photo_width; $crop_height = $photo_height; $k_w = 1; $k_h = 1; $dst_x = 0; $dst_y = 0; $src_x = 0; $src_y = 0; if ($width == 0 or $width > $photo_width) {$width = $photo_width; } if ($height == 0 or $height > $photo_height) {$height = $photo_height; } $crop_width = $width; $crop_height = $height; if ($crop_width > $photo_width) {$dst_x = ($crop_width - $photo_width) / 2; } if ($crop_height > $photo_height) {$dst_y = ($crop_height - $photo_height) / 2; } if ($crop_width < $photo_width || $crop_height < $photo_height) {$k_w = $crop_width / $photo_width; $k_h = $crop_height / $photo_height; if ($crop_height > $photo_height) {$src_x  = ($photo_width - $crop_width) / 2; } elseif ($crop_width > $photo_width) {$src_y  = ($photo_height - $crop_height) / 2; } else {if ($k_h > $k_w) {$src_x = round(($photo_width - ($crop_width / $k_h)) / 2); } else {$src_y = round(($photo_height - ($crop_height / $k_w)) / 2); } } } $crop_image = @imagecreatetruecolor($crop_width, $crop_height); if ($ext == "png") {@imagesavealpha($crop_image, true); @imagefill($crop_image, 0, 0, @imagecolorallocatealpha($crop_image, 0, 0, 0, 127)); } @imagecopyresampled($crop_image, $photo_source ,$dst_x, $dst_y, $src_x, $src_y, $crop_width - 2 * $dst_x, $crop_height - 2 * $dst_y, $photo_width - 2 * $src_x, $photo_height - 2 * $src_y); @imageinterlace($crop_image, true); if ($fxt == "jpeg") {@imagejpeg($crop_image, $save_src, $quality); } elseif ($fxt == "png") {@imagepng($crop_image, $save_src); } elseif ($fxt == "gif") {@imagegif($crop_image, $save_src); } @imagedestroy($crop_image); } } elseif ($run == "resize") {if ($width == 0 && $height == 0) {return false; } if ($width > 0 && $height == 0) {$resize_width = $width; $resize_ratio = $resize_width / $photo_width; $resize_height = floor($photo_height * $resize_ratio); } elseif ($width == 0 && $height > 0) {$resize_height = $height; $resize_ratio = $resize_height / $photo_height; $resize_width = floor($photo_width * $resize_ratio); } elseif ($width > 0 && $height > 0) {$resize_width = $width; $resize_height = $height; } if ($resize_width > 0 && $resize_height > 0) {$resize_image = @imagecreatetruecolor($resize_width, $resize_height); if ($ext == "png") {@imagesavealpha($resize_image, true); @imagefill($resize_image, 0, 0, @imagecolorallocatealpha($resize_image, 0, 0, 0, 127)); } @imagecopyresampled($resize_image, $photo_source, 0, 0, 0, 0, $resize_width, $resize_height, $photo_width, $photo_height); @imageinterlace($resize_image, true); if ($fxt == "jpeg") {@imagejpeg($resize_image, $save_src, $quality); } elseif ($fxt == "png") {@imagepng($resize_image, $save_src); } elseif ($fxt == "gif") {@imagegif($resize_image, $save_src); } @imagedestroy($resize_image); } } elseif ($run == "scale") {if ($width == 0) {$width = 100; } if ($height == 0) {$height = 100; } $scale_width = $photo_width * ($width / 100); $scale_height = $photo_height * ($height / 100); $scale_image = @imagecreatetruecolor($scale_width, $scale_height); if ($ext == "png") {@imagesavealpha($scale_image, true); @imagefill($scale_image, 0, 0, imagecolorallocatealpha($scale_image, 0, 0, 0, 127)); } @imagecopyresampled($scale_image, $photo_source, 0, 0, 0, 0, $scale_width, $scale_height, $photo_width, $photo_height); @imageinterlace($scale_image, true); if ($fxt == "jpeg") {@imagejpeg($scale_image, $save_src, $quality); } elseif ($fxt == "png") {@imagepng($scale_image, $save_src); } elseif ($fxt == "gif") {@imagegif($scale_image, $save_src); } @imagedestroy($scale_image); } } }
}
function url_slug($str,$opt=array()) {
        $str = html_entity_decode(trim($str), ENT_QUOTES, 'UTF-8');
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        $sets = array(
            'delimiter' => '-',
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
            );
        $opt = array_merge($sets, $opt);
        $str=str_replace("&"," and ",$str);
        $special=array(' ','\'','"','.','?','_','+','=','`','~',',','^','|','\\','/',';',':','!',
            '@','#','$','%','*','(',')','{','}','[',']','<','>',
            "\r\n","\r","\n","\t",'  ','    ','    '
            );

        $str = str_replace(array_keys($char_map), $char_map, $str);
        $str = preg_replace('/(' . preg_quote('-', '/') . '){2,}/', '$1', $str);
        $str = trim($str, $opt['delimiter']);
        return $opt['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
 }
function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );
    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}
