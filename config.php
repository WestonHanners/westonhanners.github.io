<?php

/**
 * Set configuration of your phile installation.
 *
 * You can also overwrite Phile-defaults here.
 */
$config = [];

/**
 * encryption key
 */
$config['encryptionKey'] = 'bos[}M78eaL)|xaisUU0ukkFdhoYf04TGjEbgKkfcsMVlxWV=CRYE8d1No1DN=[X';

/**
 * page title
 */
$config['site_title'] = 'Alloc-Init';
$config['banner_image'] = 'banner.png';
$config['images_path'] = 'content/images/';

/**
 * default theme
 */
$config['theme'] = 'alloc';

/**
 * demo plugin
 */
// $config['plugins']['kronusdark\\philePaginator'] = ['active' => true];
$config['plugins']['infostreams\\snippets'] = ['active' => true];
$config['plugins']['kronusdark\\prism'] = ['active' => true];
$config['plugins']['gibbs\\phileSubNavigation'] = ['active' => true];


return $config;
