<?php

namespace Prob\Rewrite;

class Url
{
    /**
     * @var string
     */
    private $site = '';

    /**
     * @var string
     */
    private $dispatcher = '';

    /**
     * @var string
     */
    private $path = '';


    /**
     * Url constructor.
     * @param string $site
     * @param string $dispatcher
     * @param string $path
     */
    public function __construct($site = '', $dispatcher = '', $path = '')
    {
        $this->setSite($site);
        $this->setDispatcher($dispatcher);
        $this->setPath($path);
    }

    /**
     * @param bool $rewrite use rewrite format url
     * @return string
     */
    public function parse($rewrite = true)
    {
        return $this->site . ($rewrite ? '' : $this->dispatcher) . $this->path;
    }


    public function setSite($site)
    {
        if ($site[strlen($site) - 1] !== '/')
            $site .= '/';

        $this->site = $site;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setDispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    public function setPath($path)
    {
        if ($path[0] !== '/')
            $path = '/' . $path;

        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }
}
