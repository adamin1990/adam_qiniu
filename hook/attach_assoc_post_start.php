
include APP_PATH.'plugin/adam_qiniu/Qiniu/autoload.php';
$config = include(APP_PATH.'plugin/adam_qiniu/config.php');

$ak = $config['accessKey'];
$sk = $config['secretKey'];
$bucket = $config['bucket'];

try {
    $upManager = new Qiniu\Storage\UploadManager();
    $auth = new Qiniu\Auth($ak, $sk);
    $token = $auth->uploadToken($bucket);

} catch (Exception $e) {
    message(-1, $e->getMessage());
}