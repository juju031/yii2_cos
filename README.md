## 说明
基于腾讯云cos接口修改

SDK for [腾讯云对象存储服务](http://wiki.qcloud.com/wiki/COS%E4%BA%A7%E5%93%81%E4%BB%8B%E7%BB%8D)

## 使用方式


``` php

params.php添加

<?php
return [
    'COS_APPID' => '111',
    'COS_SECRET_ID' => '222',
    'COS_SECRET_KEY' => '3331',
];


use \juju\cos\Auth;
use \juju\cos\Cosapi;
use \juju\cos\CosDb;

Cosapi::setTimeout(180);

//创建文件夹
$bucketName = 'test';
$srcPath = './test.log';
$dstPath = '/sdk/test.log';
$dstFolder = '/sdk/';
$createFolderRet = Cosapi::createFolder($bucketName, $dstFolder);
var_dump($createFolderRet);

//上传文件
$bucketName = 'test';
$srcPath = dirname(Yii::$app->BasePath)."/LICENSE.md";
$dstPath = "/temp/LICENSE.md";
$bizAttr = "";
$insertOnly = 0;
$sliceSize = 3 * 1024 * 1024;
$uploadRet = Cosapi::upload($bucketName, $srcPath, $dstPath,$bizAttr,$sliceSize, $insertOnly);
var_dump($uploadRet);

//目录列表
$bucketName = 'test';
$dstFolder = "/temp/";
$listnum = 20;
$pattern = "eListBoth";
$order = 0;
$listRet = Cosapi::listFolder($bucketName, $dstFolder,$listnum,$pattern, $order);
var_dump($listRet);

//更新目录信息
$bucketName = 'test';
$dstFolder = "/temp/";
$bizAttr = "";
$updateRet = Cosapi::updateFolder($bucketName, $dstFolder, $bizAttr);
var_dump($updateRet);

//更新文件信息
$bizAttr = "";
$authority = "eWPrivateRPublic";
$customer_headers_array = array(
    'Cache-Control' => "no",
    'Content-Type' => "application/pdf",
    'Content-Language' => "ch",
);
$updateRet = Cosapi::update($bucketName, $dstPath, $bizAttr,$authority, $customer_headers_array);
var_dump($updateRet);

//查询目录信息
$statRet = Cosapi::statFolder($bucketName, $dstFolder);
var_dump($statRet);

//查询文件信息
$bucketName = 'test';
$dstPath = "/temp/LICENSE.md";
$statRet = Cosapi::stat($bucketName, $dstPath);
var_dump($statRet);

//删除文件
$delRet = Cosapi::delFile($bucketName, $dstPath);
var_dump($delRet);

//删除目录
$delRet = Cosapi::delFolder($bucketName, $dstFolder);
var_dump($delRet);
```