<?php

namespace Prob\Rewrite;

use PHPUnit_Framework_TestCase;

class UrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var $url Url
     */
    private $url;

    public function setUp()
    {
        $this->url = new Url(
            'http://some_site.com/',
            'index.php',
            '/some/other'
        );
    }

    public function testParseWithoutRewrite()
    {
        $this->assertEquals('http://some_site.com/index.php/some/other', $this->url->parse(false));
    }

    public function testGetSite()
    {
        $this->assertEquals('http://some_site.com/', $this->url->getSite());
    }

    public function testGetDispatcher()
    {
        $this->assertEquals('index.php', $this->url->getDispatcher());
    }

    public function testGetPath()
    {
        $this->assertEquals('/some/other', $this->url->getPath());
    }

    public function testSetSiteWithoutPathSeperator()
    {
        $this->url->setSite('http://other_site.com');
        $this->assertEquals('http://other_site.com/', $this->url->getSite());
    }

    public function testSetSiteWithPathSeperator()
    {
        $this->url->setSite('http://other_site.com/');
        $this->assertEquals('http://other_site.com/', $this->url->getSite());
    }

    public function testSetDispatcher()
    {
        $this->url->setDispatcher('dispatcher.php');
        $this->assertEquals('dispatcher.php', $this->url->getDispatcher());
    }

    public function testSetPathWithoutPathSeperator()
    {
        $this->url->setPath('some/other/etc');
        $this->assertEquals('/some/other/etc', $this->url->getPath());
    }

    public function testSetPathWithPathSeperator()
    {
        $this->url->setPath('/some/other/etc');
        $this->assertEquals('/some/other/etc', $this->url->getPath());
    }
}
