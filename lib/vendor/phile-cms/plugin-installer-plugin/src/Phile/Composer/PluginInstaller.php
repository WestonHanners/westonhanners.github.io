<?php
namespace Phile\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller
{

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        $fullPath = ['plugins'];
        // split vendor and package part
        $pathParts = explode('/', $package->getName());
        foreach ($pathParts as $path) {
            // split name string into single words
            $path = str_replace('-', ' ', $path);
            // uppercase the first character of each word 
            $path = ucwords(trim($path));
            // join words and make the first character lowercase
            $path = lcfirst(str_replace(' ', '', $path));
            $fullPath[] = $path;
        }
        return implode(DIRECTORY_SEPARATOR, $fullPath);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'phile-plugin' === $packageType;
    }
}
