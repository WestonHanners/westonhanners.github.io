# Blog for Weston Hanners 
<https://alloc-init.com>

## Content
Content is stored in `content/` and is in the [Markdown](2) format.

Please refrain from putting HTML into these Markdown files, they should be pure content.

**Images** should be stored in `content/images`  
**Blog posts** should be stored in `content/blog`  
**Downloadable files** should be stored in `content/downloads`  
**Stand-alone pages** should be stored in `content/pages`  

## Theme

Alloc-Init theme, all logos and icons were designed by [@WestonHanners](3) ©2019

[Hack Font](4) used under the [MIT License](5)

Content Management System by [PhileCMS](1)

## Development

### Build Requirements

- **SASS**
- **PHP 7.1**
- **Apache**

### Build Scripts

- `./prepare` is for cleaning and preparing the website content when deployed to a web-server.
- `./compile` is for compiling the SASS into CSS.
- `./devmode` will compile the SASS in real time for development locally  

### .htaccess for testing locally in Apache (Do Not Commit)  

```
#####################################
# Browser cache for static files
#####################################
<FilesMatch "\.(js|css|jpg|gif|png|jpeg)$">
    <IfModule mod_expires.c>
        ExpiresActive on
        ExpiresDefault "access plus 7 days"
    </IfModule>
    FileETag MTime Size
</FilesMatch>

#####################################
# Redirect stuff
#####################################
<IfModule mod_rewrite.c>
    # Enable URL rewriting
    RewriteEngine On

    # Change this path, if you have installed PhileCMS in a subdirectory of the website root.
    # RewriteBase /

    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-l

    RewriteRule .* index.php [L]
</IfModule>

#####################################
# directory listings are disabled
#####################################
Options -Indexes
```

[1]: https://philecms.github.io
[2]: https://daringfireball.net/projects/markdown/
[3]: https://twitter.com/WestonHanners
[4]: https://sourcefoundry.org/hack/
[5]: https://github.com/source-foundry/Hack/blob/master/LICENSE.md