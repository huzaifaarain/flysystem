<?php

declare(strict_types=1);

$conn = ftp_connect('localhost', 2122);

var_dump($conn);
die();

use League\Flysystem\Config;
use League\Flysystem\FTP\FtpConnectionOptions;
use League\Flysystem\FTP\FtpConnectionProvider;
use League\Flysystem\FTP\FtpFilesystem;

include __DIR__ . '/vendor/autoload.php';

$options = FtpConnectionOptions::fromArray([
    'host' => 'localhost',
    'port' => 2121,
    'recurseManually' => true,
    'root' => '/home/foo/upload',
    'username' => 'foo',
    'password' => 'pass',
]);

$connProvider = new FtpConnectionProvider();

$connection = $connProvider->createConnection($options);

var_dump(ftp_raw($connection, 'NOOP'));

ftp_close($connection);
//$adapter = new FTPFilesystem($options);
//
//$adapter->write('a/b/c/d.txt', 'lol', new Config());
//
//var_dump($adapter->read('a/b/c/d.txt'));
//var_dump($adapter->fileExists('a/b/c/d.txt'));
//var_dump($adapter->visibility('a/b/c/d.txt')->visibility());
//
////$adapter->delete('a/b/c/d.txt');
////
//var_dump($adapter->deleteDirectory('a/'));
//
//var_dump(iterator_to_array($adapter->listContents('/', true)));
