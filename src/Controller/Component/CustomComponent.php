<?php

  namespace App\Controller\Component;

  use Cake\Controller\Component;
  use Cake\Mailer\Email;

  class CustomComponent extends Component
   {

   function __construct($prompt = null) {

   }

   function getExtension($str) {
    $i = strrpos($str, ".");
    if (!$i) {
     return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;

   }

   function formatText($value) {
    $value = str_replace("“", "\"", $value);
    $value = str_replace("�?", "\"", $value);
    //$value = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $value);
    $value = stripslashes($value);
    $value = html_entity_decode($value, ENT_QUOTES);
    $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
    $value = strtr($value, $trans);
    $value = stripslashes(trim($value));
    return $value;

   }

   function shortLength($value, $len) {
    $value_format = $this->formatText($value);
    $value_raw = html_entity_decode($value_format, ENT_QUOTES);

    if (strlen($value_raw) > $len) {
     $value_strip = substr($value_raw, 0, $len);
     $value_strip = $this->formatText($value_strip);
     $lengthvalue = "<span title='" . $value_format . "' rel='tooltip'>" . $value_strip . "...</span>";
    } else {
     $lengthvalue = $value_format;
    }
    return $lengthvalue;

   }

   function makeSeoUrl($url) {
    if ($url) {
     $url = trim($url);
     $value = preg_replace("![^a-z0-9]+!i", "-", $url);
     $value = trim($value, "-");
     return strtolower($value);
    }

   }

   function generateUniqNumber($id = NULL) {
    $uniq = uniqid(rand());
    if ($id) {
     return md5($uniq . time() . $id);
    } else {
     return md5($uniq . time());
    }

   }

   function getRealIpAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
     $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
     $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;

   }
   
   function simpleImageUpload($temp_name,$name,$path){
    if ($name) {
        $image = strtolower($name);    
        $extname = $this->getExtension($image);
        $arr_ext = array('jpg', 'jpeg', 'gif','ico','png','PNG','JPG','JPEG');
        if(in_array($extname, $arr_ext)){
            $customname = md5(time().rand()).'.'.$extname;
            move_uploaded_file($temp_name, $path. $customname);
            return $customname;
        }
    }
       
   }
   
    public static function GenerateThumbnail($im_filename,$th_filename,$max_width,$max_height,$quality = 0.75){
        $watermark_png_file =  HTTP_ROOT.WATERMARK.'result.png'; 
        if(is_file($im_filename)){
            $th_path = dirname($th_filename);
            if(!is_dir($th_path))
                mkdir($th_path, 0777, true);

            if(!is_file($th_filename)){        
                list($width_orig, $height_orig, $image_type) = @getimagesize($im_filename);
                    if(!$width_orig)
                        return 2;
                switch($image_type) {
                    case 1: 
                        $src_im = @imagecreatefromgif($im_filename); 
                        $watermark = imagecreatefrompng($watermark_png_file); 
                        imagecopy($src_im, $watermark, 0, 0, 0, 0, 300, 100);   
                        break;
                    case 2: 
                        $src_im = @imagecreatefromjpeg($im_filename);   
                        $watermark = imagecreatefrompng($watermark_png_file); 
                        imagecopy($src_im, $watermark, 0, 0, 0, 0, 300, 100);   
                        break;
                    case 3: 
                        $src_im = @imagecreatefrompng($im_filename);    
                        $watermark = imagecreatefrompng($watermark_png_file); 
                        imagecopy($src_im, $watermark, 0, 0, 0, 0, 300, 100);   
                        break;
                }
                if(!$src_im)
                   return 3;
                $aspect_ratio = (float) $height_orig / $width_orig;

                $thumb_height = $max_height;
                $thumb_width = round($thumb_height / $aspect_ratio);
                if($thumb_width > $max_width){
                    $thumb_width    = $max_width;
                    $thumb_height   = round($thumb_width * $aspect_ratio);
                }
                $width = $thumb_width;
                $height = $thumb_height;

                $dst_img = @imagecreatetruecolor($width, $height);
                    if(!$dst_img)
                        return 4;
                    $success = @imagecopyresampled($dst_img,$src_im,0,0,0,0,$width,$height,$width_orig,$height_orig);
                    if(!$success)
                        return 4;
                switch ($image_type){
                    case 1: $success = @imagegif($dst_img,$th_filename); break;
                    case 2: $success = @imagejpeg($dst_img,$th_filename,intval($quality*100));  break;
                    case 3: $success = @imagepng($dst_img,$th_filename,intval($quality*9)); break;
                }
                if(!$success)
                    return 4;
            }
                return 0;
        }
        return 1;   
    }
    
   function uploadImage($tmp_name, $name, $large, $medium, $thumb) {
    if ($name) {
        $watermark_png_file =  HTTP_ROOT.WATERMARK.'result.png'; 
     $image = strtolower($name);
     //          $extname = substr(strrchr($image, "."), 1);
     $extname = $this->getExtension($image);
     if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
      return false;
     } else {
      if ($extname == "jpg" || $extname == "jpeg") {
       $src = imagecreatefromjpeg($tmp_name);
      } else if ($extname == "png") {
       $src = imagecreatefrompng($tmp_name);
      } else {
       $src = imagecreatefromgif($tmp_name);
      }

      list($width, $height) = getimagesize($tmp_name);
      
       $watermark = imagecreatefrompng($watermark_png_file); //watermark image
      imagecopy($src, $watermark, 0, 0, 0, 0, 300, 100); //merge image

      
      $newwidth = 700;
      $newheight = ($height / $width) * $newwidth;
      $tmp = imagecreatetruecolor($newwidth, $newheight);
     
            
            
      $newwidth1 = 259;
      $newheight1 = ($height / $width) * $newwidth1;
      $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

      $newwidth2 = 100;
      $newheight2 = ($height / $width) * $newwidth2;
      $tmp2 = imagecreatetruecolor($newwidth2, $newheight2);
      imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
      imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
      imagecopyresampled($tmp2, $src, 0, 0, 0, 0, $newwidth2, $newheight2, $width, $height);
      $time = time();
      $filepath = md5($time) . "." . $extname;
      $filename = $large . $filepath;
      $filename1 = $medium . "medium_" . $filepath;
      $filename2 = $thumb . "thumb_" . $filepath;
      imagejpeg($tmp, $filename, 100);

      imagejpeg($tmp1, $filename1, 100);

      imagejpeg($tmp2, $filename2, 100);
      
            
            
      imagedestroy($src);
      imagedestroy($tmp);
      imagedestroy($tmp1);
      imagedestroy($tmp2);

      return $filepath;
     }
    }

   }

   function uploadImageBanner($tmp_name, $name, $path, $imgWidth) {
    if ($name) {
     $image = strtolower($name);
     $extname = $this->getExtension($image); //$extname = substr(strrchr($image, "."), 1);
     if (($extname != 'gif') && ($extname != 'jpg') && ($extname != 'jpeg') && ($extname != 'png') && ($extname != 'bmp')) {
      return false;
     } else {
      if ($extname == "jpg" || $extname == "jpeg") {
       $src = imagecreatefromjpeg($tmp_name);
      } else if ($extname == "png") {
       $src = imagecreatefrompng($tmp_name);
      } else {
       $src = imagecreatefromgif($tmp_name);
      }
      list($width, $height) = getimagesize($tmp_name);

      if ($extname == 'gif' || $width <= $imgWidth) {
       $time = time() . rand(100, 999);
       $filepath = md5($time) . "." . $extname;
       $targetpath = $path . $filepath;
       if (!is_dir($path)) {
        mkdir($path);
       }
       move_uploaded_file($tmp_name, $targetpath);
       return $filepath;
      } else {
       $newwidth = $imgWidth;
       $newheight = ($height / $width) * $newwidth;
       $tmp = imagecreatetruecolor($newwidth, $newheight);
       imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
       $time = time();
       $filepath = md5($time) . "." . $extname;
       $filename = $path . $filepath;
       imagejpeg($tmp, $filename, 100);

       imagedestroy($src);
       imagedestroy($tmp);
       return $filepath;
      }
     }
    }

   }

   function lastValue($string) {
    $explode = explode('-', $string);
    $lastArrayValue = end($explode);
    return $lastArrayValue;

   }

   function number_pad($number, $n = 4) {
    $number = intval($number, 10);
    $number = (string) $number;
    return str_pad((int) $number, $n, "0", STR_PAD_LEFT);

   }

   function emailText($value) {
    $value = stripslashes(trim($value));
    $value = str_replace('"', "\"", $value);
    $value = str_replace('"', "\"", $value);
    $value = preg_replace('/[^(\x20-\x7F)\x0A]*/', '', $value);
    return stripslashes($value);

   }

   function paymentCanceLTemplete($msg, $name, $ticket, $sitename) {
    if (strstr($msg, "[NAME]")) {
     $msg = str_replace("[NAME]", $name, $msg);
    }
    if (strstr($msg, "[TICKET_NO]")) {
     $msg = str_replace("[TICKET_NO]", $ticket, $msg);
    }
    if (strstr($msg, "[SITE_NAME]")) {
     $msg = str_replace("[SITE_NAME]", $sitename, $msg);
    }
    return $msg;

   }

   function paymentSuccessTemplete($msg, $name, $ticket, $sitename) {
    if (strstr($msg, "[NAME]")) {
     $msg = str_replace("[NAME]", $name, $msg);
    }
    if (strstr($msg, "[TICKET_NO]")) {
     $msg = str_replace("[TICKET_NO]", $ticket, $msg);
    }
    if (strstr($msg, "[SITE_NAME]")) {
     $msg = str_replace("[SITE_NAME]", $sitename, $msg);
    }
    return $msg;

   }

   function contactUs($msg, $name, $email, $phone, $subject, $uMessage, $sitename) {
    if (strstr($msg, "[NAME]")) {
     $msg = str_replace("[NAME]", $name, $msg);
    }
    if (strstr($msg, "[EMAIL]")) {
     $msg = str_replace("[EMAIL]", $email, $msg);
    }
    if (strstr($msg, "[PHONE]")) {
     $msg = str_replace("[PHONE]", $phone, $msg);
    }
    if (strstr($msg, "[SUBJECT]")) {
     $msg = str_replace("[SUBJECT]", $subject, $msg);
    }
    if (strstr($msg, "[UMSG]")) {
     $msg = str_replace("[UMSG]", $uMessage, $msg);
    }
    if (strstr($msg, "[SITE_NAME]")) {
     $msg = str_replace("[SITE_NAME]", $sitename, $msg);
    }
    return $msg;

   }

   function sendEmail($to, $from, $subject, $message, $header = 1, $footer = 1) {
    if ($header) {
     $hdr = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <table width="750" style="font-family:arial helvetica sans-serif" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr >
        <td><table width="750" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr style="background: #000;">
                <td style="padding: #10px;"><a href="' . HTTP_ROOT . '"><img alt="" src="' . HTTP_ROOT . 'images/logo.png"/></a> </td>
                <td align="right" valign="bottom" style="font-family:arial;color:#0093dd;font-size:20px;padding:0 10px 10px 0">
                    <table border="0" align="right" cellspacing="0" cellpadding="0">
                    <tbody><tr><td height="25"></td></tr></tbody></table>
                </td>
                <td>&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
        </tr>
        <tr> <td bgcolor="#c93239"><div style="font-size:3px;color:#28a4e2">&nbsp;</div></td></tr>
        <tr> <td bgcolor="#444"><div style="font-size:3px;color:#a6d9f3">&nbsp;</div></td> </tr>
        <tr> <td colspan="3" style="border:1px solid #c6c6c6"><table width="100%" border="0" cellspacing="0" cellpadding="0"> <tbody>
            <tr>
                <td colspan="2" style="padding-left:12px;padding-right:12px;font-family:trebuchet ms,arial;font-size:13px">';
    }
    if ($footer) {

     $ftr = '</td>
            </tr>
            </tbody>
        </table></td>
        </tr>
        <tr>
        <td height="34" bgcolor="#f1f1f1" style="border:solid 1px #c6c6c6;border-top:0px;font-family:arial;font-size:13px;text-align:center"><p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
    <td width="150" style="font:12px Helvetica,sans-serif;color:#7b7b7b">EMAIL:<a target="_blank" style="text-decoration:none" href="mailto:info@maturegapers.com"><font color="#c93239"> info@maturegapers.com </font></a></td>
    <td width="150" style="font:12px Helvetica,sans-serif;color:#7b7b7b">&nbsp;</td>
    
    
    </tr></tbody></table>
        </p></td>
        </tr>
         <tr><td><p>PLEASE DO NOT REPLY TO THIS MAIL. THIS IS AN AUTO GENERATED MAIL AND REPLIES TO THIS EMAIL ID ARE NOT ATTENDED</p></td></tr>
    </tbody>
    </table>
    </body>
    </html>';
    }

    $message = $hdr . $message . $ftr;
    $to = $this->emailText($to);
    $subject = $this->emailText($subject);
    $message = $this->emailText($message);
    $message = str_replace("<script>", "&lt;script&gt;", $message);
    $message = str_replace("</script>", "&lt;/script&gt;", $message);
    $message = str_replace("<SCRIPT>", "&lt;script&gt;", $message);
    $message = str_replace("</SCRIPT>", "&lt;/script&gt;", $message);

    $email = new Email('default');
  // $email = new Email();
    //$email->transport('default');
    $res = $email->from($from)
         ->to($to)
         ->emailFormat('html')
         ->subject($subject)
         ->viewVars(array('msg' => $message))
         ->send($message);

   }

   function sendEmailAttachment($to, $from, $subject, $message, $file, $header = 1, $footer = 1) {
    if ($header) {
     $hdr = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <table width="750" style="font-family:arial helvetica sans-serif" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
        <td><table width="750" border="0" cellspacing="0" cellpadding="0">
            <tbody>
            <tr style="background: #000;">
                <td style="padding:10px;"><a href="' . HTTP_ROOT . '"><img alt="" src="' . HTTP_ROOT . 'images/logo.png"/></a> </td>
                <td align="right" valign="bottom" style="font-family:arial;color:#0093dd;font-size:20px;padding:0 10px 10px 0">
                    <table border="0" align="right" cellspacing="0" cellpadding="0">
                    <tbody><tr><td height="25"></td></tr></tbody></table>
                </td>
                <td>&nbsp;</td>
            </tr>
            </tbody>
        </table></td>
        </tr>
        <tr> <td bgcolor="#c93239"><div style="font-size:3px;color:#28a4e2">&nbsp;</div></td></tr>
        <tr> <td bgcolor="#444"><div style="font-size:3px;color:#a6d9f3">&nbsp;</div></td> </tr>
        <tr> <td colspan="3" style="border:1px solid #c6c6c6"><table width="100%" border="0" cellspacing="0" cellpadding="0"> <tbody>
            <tr>
                <td colspan="2" style="padding-left:12px;padding-right:12px;font-family:trebuchet ms,arial;font-size:13px">';
    }
    if ($footer) {

     $ftr = '</td>
            </tr>
            </tbody>
        </table></td>
        </tr>
        <tr>
        <td height="34" bgcolor="#f1f1f1" style="border:solid 1px #c6c6c6;border-top:0px;font-family:arial;font-size:13px;text-align:center"><p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
    <td width="150" style="font:12px Helvetica,sans-serif;color:#7b7b7b">EMAIL:<a target="_blank" style="text-decoration:none" href="mailto:info@maturegapers.com"><font color="#c93239"> info@maturegapers.com</font></a></td>
    <td width="150" style="font:12px Helvetica,sans-serif;color:#7b7b7b">&nbsp;</td>
    
    
   
    </tr></tbody></table>
        </p></td>
        </tr>
         <tr><td><p>PLEASE DO NOT REPLY TO THIS MAIL. THIS IS AN AUTO GENERATED MAIL AND REPLIES TO THIS EMAIL ID ARE NOT ATTENDED</p></td></tr>
    </tbody>
    </table>
    </body>
    </html>';
    }

    $message = $hdr . $message . $ftr;
    $to = $this->emailText($to);
    $subject = $this->emailText($subject);
    $message = $this->emailText($message);
    $message = str_replace("<script>", "&lt;script&gt;", $message);
    $message = str_replace("</script>", "&lt;/script&gt;", $message);
    $message = str_replace("<SCRIPT>", "&lt;script&gt;", $message);
    $message = str_replace("</SCRIPT>", "&lt;/script&gt;", $message);
    $email = new Email('default');
    //$email = new Email();
    //$email->transport('mailjet');
    $res = $email->from($from)
         ->attachments(TICKET_PDF . $file)
         ->to($to)
         ->emailFormat('html')
         ->subject($subject)
         ->viewVars(array('msg' => $message))
         ->send($message);

   }

   function filterData($data) {
    /* this function is meant for filtering whole data received from the screen */
    $filteredData = array_map(function($v) {
     if (is_array($v)) {
      return $this->filterData($v);
     } else {
      return trim(strip_tags($v));
     }
    }, $data);

    return $filteredData;

   }

   function downloadCustomerReport($payments, $fileName) {
    $objPHPExcel = new \PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);

    $style = [
       'alignment' => [
          'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
       ]
    ];

    $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($style);
    foreach (range('A', 'F') as $columnID) {
     $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
    }
    $head = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S'];
    $count = 0;
    ///SetHeading//
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Ticket id");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Name");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Phone");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Payment Date");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Qty.");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Total");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Mode");
    $objPHPExcel->getActiveSheet()->SetCellValue($head[$count++] . '1', "Status");

    //Set Content
    $rowCount = 2;
    $total = count($payments);
    for ($i = 0; $i < $total; $i++) {
     $count = -1;
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['ticket']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['name']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['phone']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['purchase_date']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['qty']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['total']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['mode']);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['status']);
     $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);
     $objPHPExcel->getActiveSheet()->SetCellValue($head[++$count] . $rowCount, $payments[$i]['payment_date']);
     $objPHPExcel->getActiveSheet()->getStyle($head[$count] . $rowCount)->applyFromArray($style);

     $rowCount++;
    }
    $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
    $filename = 'maturegaper-' . $fileName . ".xlsx";
    $objWriter->save("files/temp_excel/$filename");
    return $filename;

   }

   function createAdminFormat($msg, $name, $email, $password, $site_name) {
    if (strstr($msg, "[NAME]")) {
     $msg = str_replace("[NAME]", $name, $msg);
    }
    if (strstr($msg, "[EMAIL]")) {
     $msg = str_replace("[EMAIL]", $email, $msg);
    }
    if (strstr($msg, "[PASSWORD]")) {
     $msg = str_replace("[PASSWORD]", $password, $msg);
    }
    if (strstr($msg, "[SITE_NAME]")) {
     $msg = str_replace("[SITE_NAME]", "<a href='" . HTTP_ROOT . "'>" . SITE_NAME . "</a>", $msg);
    }
    return $msg;

   }
   
   function uploadFile($tmp_name, $name, $path, $allowedExt) {
    $uploadStatus = ['status' => 'error', 'message' => ''];
    if (empty($tmp_name) || empty($name) || empty($path) || empty($allowedExt)) {
     $uploadStatus['message'] = 'Upload parameter(s) missing';
     return $uploadStatus;
    }
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt)) {
         $uploadStatus['status'] = 'error';
     $uploadStatus['message'] = 'Please upload ' . implode(',', $allowedExt) . ' files only';
     return $uploadStatus;
    }
    $filename = md5(time()) . rand(100, 999) . "." . $ext;
    if (move_uploaded_file($tmp_name, $path . $filename)) {
     $uploadStatus['status'] = 'success';
     $uploadStatus['message'] = $filename;
     return $uploadStatus;
    } else {
     $uploadStatus['message'] = 'Could not move upload file';
    }
    return $uploadStatus;

   }
   
   function zipData($source, $destination) {
        if (extension_loaded('zip')) {
            if (file_exists($source)) {
               
                $zip = new \ZipArchive();
                if ($zip->open($destination, ZIPARCHIVE::CREATE)) {
                    $source = realpath($source);
                    if (is_dir($source)) {
                        $iterator = new \RecursiveDirectoryIterator($source);
                        // skip dot files while iterating 
                        $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
                        $files = new \RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
                        foreach ($files as $file) {
                            $file = realpath($file);
                            if (is_dir($file)) {
                                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                            } else if (is_file($file)) {
                                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                            }
                        }
                    } else if (is_file($source)) {
                        $zip->addFromString(basename($source), file_get_contents($source));
                    }

                    

                }
                return $zip->close();
            }

        }
        return false;
    }

   }
