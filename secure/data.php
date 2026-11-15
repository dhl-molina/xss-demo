<?php
// Cookie hardening: JavaScript cannot read the session cookie
session_set_cookie_params(['httponly' => true, 'samesite' => 'Strict']);
session_start();
// Block inline/external scripts from running even if one gets through
header("Content-Security-Policy: default-src 'self'; script-src 'self'");
header('X-Content-Type-Options: nosniff');

function load($f){ return file_exists($f) ? json_decode(file_get_contents($f), true) : []; }
function save($f,$d){ file_put_contents($f, json_encode($d)); }
// Output escaping helper: turns < > " ' & into harmless text
function e($s){ return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
// Password rule: 8+ chars with a number, an uppercase and a lowercase letter
function strong_password($p){
    return strlen($p) >= 8 && preg_match('/[0-9]/', $p) && preg_match('/[A-Z]/', $p) && preg_match('/[a-z]/', $p);
}
$USERS = __DIR__.'/users.json';
$POSTS = __DIR__.'/posts.json';
