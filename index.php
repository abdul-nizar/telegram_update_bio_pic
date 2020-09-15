<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();


//Image Generator URL here
$logo = ["img.php"];
$logorand=array_rand($logo);
$logopic="$logo[$logorand]";


header('Content-type: image/jpg');
file_put_contents("got.jpg",file_get_contents($logopic));

$info = $MadelineProto->get_full_info('me');
$inputPhoto = ['_' => 'inputPhoto', 'id' => $info['User']['photo']['photo_id'], 'access_hash' => $info['User']['access_hash'], 'file_reference' => 'bytes'];

//Delete Profile photo
$deletePhoto = $MadelineProto->photos->deletePhotos(['id'=>[$inputPhoto]]);

// Add new Photo
$MadelineProto->photos->updateProfilePhoto(['file' => "got.jpg" ]);
?>