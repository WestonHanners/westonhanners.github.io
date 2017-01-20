PhileLastModified
=================

A simple [PhileCMS](https://github.com/PhileCMS/Phile) plugin that returns the 
Unix timestamp of the page (file). This can be used in combination with your 
templating engine to format the last modificationdate of your page. Useful for 
blog posts and wiki entries. For example:

```
Last Updated on Mon 19th May 2014 at 7:49pm
```

This can be output by using the 
[date](http://twig.sensiolabs.org/doc/filters/date.html) function in Twig.
For example:

```html
<h1>{{ meta.title }}</h1>

<p><small>Last Updated {{ modified|date("D jS M Y \\a\\t g:ia") }}</small></p>

{{ content }}
```

## 1. Installation

**Install via composer**

```bash
composer require "gibbs/phile-last-modified:1.*"
```

**Install via git**

Clone this repository from the ```phile``` directory into 
```plugins/gibbs/phileLastModified```. E.g:

```bash
git clone git@github.com:Gibbs/phileLastModified.git plugins/gibbs/phileLastModified
```

**Manual Install**

Download and extract the contents into: ```plugins/gibbs/phileLastModified```

## 2. Plugin Activation

Activate the plugin in your ```config.php``` file:

```php
$config['plugins']['gibbs\\phileLastModified'] = array('active' => true);
```
