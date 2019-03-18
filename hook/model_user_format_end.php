

$config = include(APP_PATH.'plugin/adam_qiniu/config.php');
$user['avatar_url'] = $user['avatar'] ? $config['cdnurl'].DIRECTORY_SEPARATOR.$conf['upload_url'].DIRECTORY_SEPARATOR."avatar/$dir/$user[uid].png?".$user['avatar'] : 'view/img/avatar.png';
