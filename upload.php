<?php
!defined('DEBUG') AND exit('Access Denied.');


function uploadfile($path){

    require("Qiniu/autoload.php");
//require 'plugin/gmchina_xiuno_editormd/upload/qiniu/Qiniu/src/Qiniu/Auth.php';
    $config = include("config.php");

    $mimetype=explode(",", str_replace(array("，",';','；'," "),",",$config['mimetype']));


    $ext= pathinfo($path, PATHINFO_EXTENSION);
    if(in_array($ext, $mimetype) == false) {
       return false;
    }else{
        $key =md5(date('YmdHis') . rand(0, 9999)) . '.' . $ext;
        $accessKey = $config['accessKey'];
        $secretKey = $config['secretKey'];
        $auth = new Qiniu\Auth($accessKey, $secretKey);
        $bucket = $config['bucket'];
        $domain = $config['cdnurl'];
        $token = $auth->uploadToken($bucket);
        $uploadMgr = new Qiniu\Storage\UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $key, $path);
        if ($err !== null) {
          return false;
        }else {
            return $domain.'/'.$ret['key'];

        }
    }

}

?>