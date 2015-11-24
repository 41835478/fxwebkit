<?php
return [
'driver' => env('MAIL_DRIVER'),
'host' => env('MAIL_HOST'),
'port' => env('MAIL_PORT'),
'from' => ['address' =>"maggalya09@gmail.com" , 'name' => "mag"],
'encryption' => 'ssl',
'username' => env('MAIL_USERNAME'),
'password' => env('MAIL_PASSWORD'),
'sendmail' => '/usr/sbin/sendmail -bs',
'pretend' => false,
];