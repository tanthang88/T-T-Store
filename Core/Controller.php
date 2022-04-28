<?php

namespace Core;

use finfo;
use JetBrains\PhpStorm\ArrayShape;
use RuntimeException;

class Controller
{
    public function loadModel($model)
    {
        if (file_exists(__DIR_ROOT.'/App/Model/'.$model.'.php')) {
            require_once sprintf("%s/App/Model/%s.php", __DIR_ROOT, $model);
            if (class_exists($model)) {
                return new $model();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function renderView($view, $data = [])
    {
        extract($data);
        if (file_exists(__DIR_ROOT.'/App/View/'.$view.'.php')) {
            require_once sprintf("%s/App/View/%s.php", __DIR_ROOT, $view);
        } else {
            return false;
        }
    }

    #[ArrayShape(['file_name' => "array|string", 'error' => "array|string"])] public function uploadFile($folder, $files): array
    {
    /* $name_done = '';
     $error = array();
     $src = $folder;
     $extension = array("jpeg", "jpg", "png", "gif");
     if (empty($files)) {
         return false;
     } else {
         //GET FILE
         $filename = $files["name"];
         //GET FILE NAME
         $filename_md5 = md5(explode('.', $filename)[0]);
         //File name virtual
         $filename_tmp = $files["tmp_name"];
         //Get type file
         $type = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
         //Name file change
         $file_name_change = time()."_".$filename_md5."_".rand(1, 999).".".$type;
         $file_patch = $src.$file_name_change;
         //Check file type [png, jpeg, gif]
         if (in_array($type, $extension)) {
             if (move_uploaded_file($filename_tmp, $file_patch)) {
                 $name_done = $file_name_change;
             } else {
                 $error[] = "Can't upload file to directory!";
             }
         } else {
             $error[] = "$filename - Incorrect image format, accept [JPEG, PNG, GIF] please re-upload image!";
         }
     }
     return ["image_main" => $name_done, "failed" => $error];*/
        $fileName = [];
        $error = [];
            try {
                if (
                    !isset($files['error']) ||
                    is_array($files['error'])
                ) {
                    throw new RuntimeException('Invalid parameters.');
                }

                switch ($files['error']) {
                    case UPLOAD_ERR_OK:
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        throw new RuntimeException('No file sent.');
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException($files['name'].'-Exceeded filesize limit.');
                    default:
                        throw new RuntimeException('Unknown errors.');
                }


                if ($files['size'] > 1500000) {
                    throw new RuntimeException($files['name'].'-Exceeded filesize limit.');
                }

                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                        $finfo->file($files['tmp_name']),
                        array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                        ),
                        true
                    )) {
                    throw new RuntimeException($files['name'].'-Invalid file format.');
                }

                $fileName = sha1_file($files['tmp_name']).'.'.$ext;
                if (!move_uploaded_file($files['tmp_name'],
                    sprintf($folder.'%s.%s', sha1_file($files['tmp_name']), $ext))) {
                    throw new RuntimeException('Failed to move uploaded file.');
                }
            } catch (RuntimeException $e) {
                $error = $e->getMessage();
            }
        return array('file_name' => $fileName, 'error' => $error);
    }


   #[ArrayShape(['file_name' => "array", 'error' => "array"])] public function uploadMultipleFiles($path, $files): array
    {
//        $dataReturn = array();
//        $error = array();
//        $nameImage = array();
//        $extension = array("jpeg", "jpg", "png", "gif");
//        foreach ($files['tmp_name'] as $key => $tmp_name) {
//            $file_name = $files["name"][$key];
//            $file_tmp = $files["tmp_name"][$key];
//            $type = pathinfo($file_name, PATHINFO_EXTENSION);
//            $file_name_md5 = md5(explode('.', $file_name)[0]);
//            $file_name_done = time()."_$file_name_md5"."_".rand(1, 9999).".$type";
//            $file_patch = "$path/$file_name_done";
//            if (in_array($type, $extension)) {
//                if (move_uploaded_file($file_tmp, $file_patch)) {
//                    $nameImage[] = $file_name_done;
//                } else {
//                    $error[] = "$file_name - Upload failed!";
//                }
//            } else {
//                $error[] = "$file_name - This file is not in an allowed format, only accepted JPEG, JPG, PNG, GIF, please check again!";
//            }
//            $dataReturn = ["image_related" => $nameImage, "error" => $error];
//        }
//        return $dataReturn;
        $fileName = [];
        $error = [];
        foreach ($files['tmp_name'] as $key => $tmp_name){
            try {
                if (
                    !isset($files['error'][$key]) ||
                    is_array($files['error'][$key])
                ) {
                    throw new RuntimeException('Invalid parameters.');
                }

                switch ($files['error'][$key]) {
                    case UPLOAD_ERR_OK:
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        throw new RuntimeException('No file sent.');
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException($files['name'].'-Exceeded filesize limit.');
                    default:
                        throw new RuntimeException('Unknown errors.');
                }


                if ($files['size'][$key] > 1500000) {
                    throw new RuntimeException($files['name'].'-Exceeded filesize limit.');
                }

                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                        $finfo->file($files['tmp_name'][$key]),
                        array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                        ),
                        true
                    )) {
                    throw new RuntimeException($files['name'][$key].'-Invalid file format.');
                }

                $fileName[] = sha1_file($files['tmp_name'][$key]).'.'.$ext;
                if (!move_uploaded_file($files['tmp_name'][$key],
                    sprintf($path.'%s.%s', sha1_file($files['tmp_name'][$key]), $ext))) {
                    throw new RuntimeException('Failed to move uploaded file.');
                }
            } catch (RuntimeException $e) {
                $error[] = $e->getMessage();
            }
        }
        return array('file_name' => $fileName, 'error' => $error);
    }
}