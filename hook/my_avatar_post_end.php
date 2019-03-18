
include APP_PATH.'plugin/adam_qiniu/Qiniu/autoload.php';
$config = include(APP_PATH.'plugin/adam_qiniu/config.php');

$ak = $config['accessKey'];
$sk = $config['secretKey'];
$bucket = $config['bucket'];

try {
    $upManager = new Qiniu\Storage\UploadManager();
    $auth = new Qiniu\Auth($ak, $sk);
    $token = $auth->uploadToken($bucket,$url);

} catch (Exception $e) {
    message(-1, $e->getMessage());
}

try {
    $upManager->putFile($token, $url, $path.$filename);
    $url=$config['cdnurl']."/".$url;
    @unlink($path.$filename);
} catch (Exception $e) {
    message(-1, $e->getMessage());
}