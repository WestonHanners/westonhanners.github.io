<?php
namespace Phile\Plugin\Softr\PageCompressor;


// Phile Libraries
use \Phile\Exception;
use \Phile\Event;


/**
 * Page Compressor
 *
 * @author   Agência Softr <Aldo Anizio Lugão Camacho>
 * @link     http://www.softr.com.br
 * @link     https://github.com/softr/philePageCompressor
 * @license  http://opensource.org/licenses/MIT
 * @package  Phile\Plugin\Softr\PageCompressor
 */
class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface
{
    /**
     * Compress Level
     *
     * @var int
     */
    protected $compressLevel;

    /**
     * Class contructor
     *
     * @return void
     */
    public function __construct()
    {
        Event::registerEvent('config_loaded', $this);

        Event::registerEvent('after_render_template', $this);
    }

    /**
     * Event method
     *
     * @param string  $eventKey
     * @param mixed   $data
     *
     * @return mixed
     */
    public function on($eventKey, $data = null)
    {
        // Load configs
        if($eventKey == 'config_loaded')
        {
            if(isset($data['config']['page_compress_level']))
            {
                $this->compressLevel = min(4, $data['config']['page_compress_level']);
            }
            elseif(isset($data['config']['softr\pageCompressor']['compress_level']))
            {
                $this->compressLevel = min(4, $data['config']['softr\pageCompressor']['compress_level']);
            }
            else
            {
                $this->compressLevel = 2;
            }
        }

        // Compress
        if($eventKey == 'after_render_template')
        {
            // Minify page

            $data['output'] = $this->minify($data['output']);
        }
    }

    /**
     * Compress html string
     *
     * @access  private
     * @param   string  $html   HTML Output
     * @param   int     $level  (optional) Compress level
     *
     * @return string
     */
    private function minify($html)
    {
        switch((int)$this->compressLevel)
        {
            // Don't minify
            case 0: break;

            // Safe Minify
            case 1:

                // Replace all whitespace characters between tags with a single space
                $html = preg_replace("`>\s+<`", "> <", $html);

            break;

            // Extreme. Minify all
            case 2:

                // Placeholder to save conditional comment hack, <pre> and <code> tags
                $place_holders = array('<!-->' => '_!--_');

                // Set placeholders
                $html = strtr($html, $place_holders);

                // Remove all normal comments - save conditionals
                $html = preg_replace('/<!--[^(\[|(<!))](.*)-->/Uis', '', $html);

                // Replace all whitespace characters with a single space
                $html = preg_replace("`\s+`", " ", $html);

                // Remove the spaces between adjacent html tags
                $html = preg_replace("`> <`", "><", $html);

                // Replace space between adjacent a tags for readability
                $html = str_replace("</a><a", "</a> <a", $html);

                // Restore placeholders
                $html = strtr($html, array_flip($place_holders));

            break;

            // Heavy. Save pre and code tags
            case 3:

                // Placeholder to save conditional comment hack, <pre> and <code> tags
                $place_holders = array
                (
                    '<!-->' => '_!--_',
                    '<pre>' => '_pre_',
                    '</pre>' => '_/pre_',
                    '<code>' => '_code_',
                    '</code>' => '_/code_'
                );

                //Set placeholders
                $html = strtr($html, $place_holders);

                // Remove all normal comments - save conditionals
                $html = preg_replace('/<!--[^(\[|(<!))](.*)-->/Uis', '', $html);

                // Replace all whitespace characters with a single space
                $html = preg_replace("`\s+`", " ", $html);

                // Remove the spaces between adjacent html tags
                $html = preg_replace("`> <`", "><", $html);

                // Replace space between adjacent a tags for readability
                $html = str_replace("</a><a", "</a> <a", $html);

                // Restore placeholders
                $html = strtr($html, array_flip($place_holders));

            break;

            // Light. Minify and keep comments
            case 4:

                // Replace all whitespace characters with a single space
                $html = preg_replace("`\s+`", " ", $html);

                // Remove spaces between adjacent html tags
                $html = preg_replace("`> <`", "><", $html);

                // Restore space between ajacent a tags
                $html = str_replace("</a><a", "</a> <a", $html);

            break;
        }

        // Return minified html
        return $html;
    }
}
