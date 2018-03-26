<?php 
    function getFileDomain($bucket){
        if(!IS_BAE) return '';
        return 'http://'.HTTP_BAE_ENV_ADDR_BCS.'/'.strtolower($bucket);
    }
    $tempFileName = tempnam(sys_get_temp_dir(),'tp_');
    $sourceFileName = 'http://www.thinkphp.cn/Public/new/img/header_logo.png';
    file_put_contents($tempFileName, file_get_contents($sourceFileName));
    $fileInfo = pathinfo($sourceFileName);
    $srcFile =  $tempFileName;
    $ext = 'png'; //这是要保存的图片后缀 TO DO 写一个方法根据原始图片获得后缀
    $fileExt = '.'.$ext; 
    $bucket='farmer001'; //这里是你刚才创建的bucket
    $savePath = '/'.date('Ymd').'/'. uniqid().$fileExt;
    try{
        $bcs=new BaiduBCS();
        $response=$bcs->create_object($bucket, $savePath,$srcFile,array('acl'=>BaiduBCS::BCS_SDK_ACL_TYPE_PUBLIC_READ));
        if($response->isOK()){
            $srcFile = getFileDomain($bucket) . $savePath;
            echo "<img src='{$srcFile}' /><br/>{$savePath}";
        }
    }catch(Exception $e){
        die('failed');
    }
 
?>