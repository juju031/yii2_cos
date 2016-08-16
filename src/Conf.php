<?php
namespace juju\cos;

use yii;

class Conf
{
    const PKG_VERSION = 'v3.3'; 

    const API_IMAGE_END_POINT   = 'http://web.image.myqcloud.com/photos/v1/';
    const API_VIDEO_END_POINT   = 'http://web.video.myqcloud.com/videos/v1/';
    const API_COSAPI_END_POINT  = 'http://web.file.myqcloud.com/files/v1/';
    //请到http://console.qcloud.com/cos去获取你的appid、sid、skey
    public $appid ;
    public $secret_id ;
    public $secret_key ;

    public function __construct() {
        $this->appid            = Yii::$app->params['COS_APPID'];
        $this->secret_id        = Yii::$app->params['COS_SECRET_ID'];
        $this->secret_key       = Yii::$app->params['COS_SECRET_KEY'];
    }
    public static function getUA() {
        return 'cos-php-sdk-'.self::PKG_VERSION;
    }
}

//end of script
