##FTP for Yii2
##安装

```
composer require "juju/ftp:1.0"

"juju/ftp": "~1.0.0"
```

##控制器
```
use \juju\ftp\FtpClient;
$ftp = new FtpClient();
$ftp->connect($host);
$ftp->login($login, $password);

or

$ftp = new FtpClient();
$ftp->connect($host, true, 22);
$ftp->login($login, $password);

$local_file = dirname(Yii::$app->BasePath)."/LICENSE.md";
$result = $ftp->putFromPath($local_file);

$ftp->putAll($source_directory, $target_directory);

$ftp->putAll($source_directory, $target_directory, FTP_BINARY);

$ftp->putAll($source_directory, $target_directory, FTP_ASCII);

$size = $ftp->dirSize();

$size = $ftp->dirSize('/path/of/directory');

$total = $ftp->count();

$total = $ftp->count('/path/of/directory');

$total_file = $ftp->count('.', 'file');

$total_file = $ftp->count('/path/of/directory', 'file');

$total_dir = $ftp->count('/path/of/directory', 'directory');

$total_link = $ftp->count('/path/of/directory', 'link');

$items = $ftp->scanDir();

var_dump($ftp->scanDir('.', true));

$ftp->exec($command);

$ftp->pasv(true);

$ftp->chmod('0777', 'file.php');

$ftp->rmdir('path/of/directory/to/remove');

$ftp->rmdir('path/of/directory/to/remove', true);

$ftp->mkdir('path/of/directory/to/create');

$ftp->mkdir('path/of/directory/to/create', true);

```
