<?php

namespace Prob\Rewrite;

use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
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
        $this->assertEquals($this->url->parse(false), 'http://some_site.com/index.php/some/other');
    }

    public function testGetSite()
    {
        $this->assertEquals($this->url->getSite(), 'http://some_site.com/');
    }

    public function testGetDispatcher()
    {
        $this->assertEquals($this->url->getDispatcher(), 'index.php');
    }

    public function testGetPath()
    {
        $this->assertEquals($this->url->getPath(), '/some/other');
    }

    public function testSetSiteWithoutPathSeperator()
    {
        $this->url->setSite('http://other_site.com');
        $this->assertEquals($this->url->getSite(), 'http://other_site.com/');
    }

    public function testSetSiteWithPathSeperator()
    {
        $this->url->setSite('http://other_site.com/');
        $this->assertEquals($this->url->getSite(), 'http://other_site.com/');
    }

    public function testSetDispatcher()
    {
        $this->url->setDispatcher('dispatcher.php');
        $this->assertEquals($this->url->getDispatcher(), 'dispatcher.php');
    }

    public function testSetPathWithoutPathSeperator()
    {
        $this->url->setPath('some/other/etc');
        $this->assertEquals($this->url->getPath(), '/some/other/etc');
    }

    public function testSetPathWithPathSeperator()
    {
        $this->url->setPath('/some/other/etc');
        $this->assertEquals($this->url->getPath(), '/some/other/etc');
    }
}
