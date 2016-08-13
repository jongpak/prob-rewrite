<?php

namespace Prob\Rewrite;

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testGetMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $req = new Request();
        $this->assertEquals('GET', $req->getMethod());
    }

    public function testPOSTMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $req = new Request();
        $this->assertEquals('POST', $req->getMethod());
    }

    public function testMethodWithoutRequestMethod()
    {
        $req = new Request();
        $this->assertEquals('GET', $req->getMethod());
    }

    public function testNullPathInfo()
    {
        $req = new Request();
        $this->assertEquals('/', $req->getPath());
    }

    public function testRootPathInfo()
    {
        $_SERVER['PATH_INFO'] = '/';

        $req = new Request();
        $this->assertEquals('/', $req->getPath());
    }

    public function testOneDeepPathInfo()
    {
        $_SERVER['PATH_INFO'] = '/some';

        $req = new Request();
        $this->assertEquals('/some', $req->getPath());
    }

    public function testTwoDeepPathInfo()
    {
        $_SERVER['PATH_INFO'] = '/some/other';

        $req = new Request();
        $this->assertEquals('/some/other', $req->getPath());
    }

    public function testValidParam()
    {
        $_REQUEST['some'] = 'ok';

        $req = new Request();
        $this->assertEquals('ok', $req->getParam('some'));
    }

    public function testInvalidParam()
    {
        $req = new Request();
        $this->assertEquals(null, $req->getParam('invalid'));
    }

    public function testInvalidParamDefault()
    {
        $req = new Request();
        $this->assertEquals('ok', $req->getParam('invalid', 'ok'));
    }
}
