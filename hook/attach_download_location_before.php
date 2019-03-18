attach_update($aid, array('downloads+'=>1));
include APP_PATH.'plugin/adam_qiniu/Qiniu/autoload.php';
$config = include(APP_PATH.'plugin/adam_qiniu/config.php');
$attachurl=($config['cdnurl'].DIRECTORY_SEPARATOR.$attachurl);