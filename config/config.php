<?php
/**
 * Local Phile configuration.
 *
 * This configuration allows to customize Phile. It overwrites
 * settings made in defaults.php or plugin-defaults. See those
 * for additional Phile configuration settings.
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
$config['article_count'] = 4;
$config['page_compress_level'] = 1;
/**
 * default theme
 */
$config['theme'] = 'alloc';

/**
 * Activate the persistent cache for better performance.
 */
$config['plugins']['phile\\phpFastCache'] = ['active' => true, 'storage' => 'files'];

/**
 * Use the demo-plugin as a starting point to write your own plugins.
 */
$config['plugins']['softr\\pageCompressor'] = ['active' => true];
$config['plugins']['kronusdark\\pageCount'] = ['active' => true];
$config['plugins']['infostreams\\snippets'] = ['active' => true];
$config['plugins']['phile\\rssFeed'] = ['active' => true];

return $config;
