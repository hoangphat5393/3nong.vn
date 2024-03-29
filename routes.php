<?php

// $routes['tin-tuc'] = 'post_list';
$routes['danh-sach-tin-tuc/(.+?).html'] = 'post_list/$1';
$routes['tin-tuc/(.+?).html'] = 'post/$1';

// $routes['san-pham'] = 'product_list';
$routes['danh-sach-san-pham/(.+?).html'] = 'product_list/$1';
$routes['san-pham/(.+?).html'] = 'product/$1';

$routes['lien-he.html'] = 'contact';
$routes['dai-ly.html'] = 'agent';

$routes['admin'] = 'admin/index';

$routes['bai-viet/(.+?).html'] = 'article/$1';

$routes['dang-ky-dai-ly-thanh-cong.html'] = 'agent_thanks';

$routes['dat-hang-thanh-cong.html'] = 'order_thanks';

$routes['lien-he-thanh-cong.html'] = 'contact_thanks';
