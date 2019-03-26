<?php

!defined('DEBUG') AND exit('Access Denied.');

if ($method == 'GET'){

    $config = include(APP_PATH.'plugin/adam_qiniu/config.php');

    include _include(APP_PATH.'plugin/adam_qiniu/setting.htm');

}elseif ($method == 'POST'){

    $post_data = $_POST;
    if (empty($post_data['accessKey'])) message(-1, 'AK必填！');
    if (empty($post_data['secretKey'])) message(-1, 'SK必填！');
    if (empty($post_data['bucket'])) message(-1, 'bucket必填！');
    if (empty($post_data['cdnurl'])) message(-1, '域名必填！');

    $file = fopen(APP_PATH."plugin/adam_qiniu/config.php", "w");
    $config_data = "<?php

return array(
    'accessKey' => '{$post_data['accessKey']}',
    'secretKey' => '{$post_data['secretKey']}',
    'bucket' => '{$post_data['bucket']}',
    'cdnurl' => '{$post_data['cdnurl']}',
);";

    try{
        $res = fwrite($file, $config_data);
        fclose($file);
        if ($res){
            message(1, '保存成功');
        }else{
            message(-1, '保存失败');
        }
    }catch (Exception $e){
        message(-1, $e->getMessage());
    }

}
