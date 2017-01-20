<?php
/**
 * Return the page files last modified time
 *
 * @author   Dan Gibbs <daniel.gibbs@gmail.com>
 * @package  phile-last-modified
 * @link     https://github.com/Gibbs/phileLastModified
 * @license  http://opensource.org/licenses/MIT
 */
namespace Phile\Plugin\Gibbs\phileLastModified;

class Plugin extends \Phile\Plugin\AbstractPlugin implements
    \Phile\Gateway\EventObserverInterface
{
    protected $modified = null;

    /**
     * Register plugin events via the constructor
     *
     * @return void
     */
    public function __construct()
    {
        \Phile\Event::registerEvent('before_load_content', $this);
        \Phile\Event::registerEvent('template_engine_registered', $this);
    }

    /**
     * Listen to event triggers
     *
     * @param  string  $eventKey  Triggered event key
     * @param  array   $data      Array of event data
     * @return void    
     */
    public function on($eventKey, $data = null)
    {
        if($eventKey == 'before_load_content')
        {
            $this->modified = filemtime( realpath($data['filePath']) );
        }

        if($eventKey == 'template_engine_registered')
        {
            if($this->modified !== null)
                $data['data']['modified'] = $this->modified;
        }
    }
}
