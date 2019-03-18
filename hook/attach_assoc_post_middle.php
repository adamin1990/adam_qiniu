
try {
    $upManager->putFile($token, $desturl, $destfile);
    $desturl=$config['cdnurl']."/".$desturl;
     @unlink($destfile);
} catch (Exception $e) {
    message(-1, $e->getMessage());
}