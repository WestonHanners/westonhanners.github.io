philePageCompressor
===================

A plugin for [Phile](https://github.com/PhileCMS/Phile) to compress the html output and reduce server load.

### 1.1 Installation (composer)
```
php composer.phar require softr/phile-page-compressor:*
```

### 1.2 Installation (Download)

* Install the latest version of [Phile](https://github.com/PhileCMS/Phile)
* Clone this repo into `plugins/softr/pageCompressor`

### 2. Activation

After you have installed the plugin. You need to add the following line to your `config.php` file:

```
$config['plugins']['softr\\pageCompressor'] = array('active' => true);
```

### 3. Configuration

By default the plugin is set to use the maximum level of compress. Anyway you can reduce or disable the compress level. To do so you need to add the following line to your `config.php` file:

```
$config['page_compress_level'] = 0,1,2,3 or 4;
```

### Usage

The different compress level perform the following tasks:

```markdown
0 - No Minify
1 - Safe Minify
2 - Extreme Reduce. Minify all
3 - Heavy Reduce. Save pre and code tags
4 - Light Reduce. Minify and keep comments
```