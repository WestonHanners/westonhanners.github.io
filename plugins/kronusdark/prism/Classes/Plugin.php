<?php
/**
 * Plugin class
 */
namespace Phile\Plugin\Kronusdark\Prism;

class Plugin extends \Phile\Plugin\AbstractPlugin implements \Phile\Gateway\EventObserverInterface {

    protected $settings = [
        'queryDefaults' => []
    ];

    /**
     * the constructor
     */
    public function __construct() {
        \Phile\Core\Event::registerEvent('after_parse_content', $this);
    }

    public function getPrismHtml($string) {
        $code = strip_tags($string[2]);
        return "<pre><code class='language-$string[1]'>{$code}</code></pre>";
    }

    public function on($eventKey, $data = null) {
        if ($eventKey === 'after_parse_content') {
            // store the starting content
            $content = $data['content'];
            $regex = "/code=(\w+)\n(.*?)\n==\!/s";
            // add the modified content back in the data
            $data['content'] = preg_replace_callback($regex, function ($matches) {
                return $this->getPrismHtml($matches);
            }, $content);
        }
    }
}
