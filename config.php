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
$config['site_title'] = '...alloc] init];';
$config['banner_image'] = 'banner';
$config['pages_order'] = 'meta.date:desc';


/**
 * default theme
 */
$config['theme'] = 'alloc';
$config['page_compress_level'] = 1;


$config['plugins']['infostreams\\snippets'] = ['active' => true];
$config['plugins']['kronusdark\\pageCount'] = ['active' => true];
$config['plugins']['softr\\pageCompressor'] = ['active' => true];
$config['plugins']['phile\\phpFastCache'] = ['active' => true];
$config['plugins']['phile\\simpleFileDataPersistence'] = ['active' => true];

return $config;
