<?php
session_start();
function load($f){ return file_exists($f) ? json_decode(file_get_contents($f), true) : []; }
function save($f,$d){ file_put_contents($f, json_encode($d)); }
$USERS = __DIR__.'/users.json';
$POSTS = __DIR__.'/posts.json';
