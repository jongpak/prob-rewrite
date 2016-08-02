<?php

namespace Prob\Rewrite;

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testGetMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $req = new Request();
        $this->assertEquals($req->method(), 'GET');
    }

    public function testPOSTMethod()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $req = new Request();
        $this->assertEquals($req->method(), 'POST');
    }

    public function testMethodWithoutRequestMethod()
    {
        $req = new Request();
        $this->assertEquals($req->method(), 'GET');
    }

    public function testNullPathInfo()
    {
        $req = new Request();
        $this->assertEquals($req->path(), '/');
    }

    public function testRootPathInfo()
    {
        $_SERVER['PATH_INFO'] = '/';

        $req = new Request();
        $this->assertEquals($req->path(), '/');
    }

    public function testOneDeepPathInfo()
    {
        $_SERVER['PATH_INFO'] = '/some';

        $req = new Request();
        $this->assertEquals($req->path(), '/some');
    }

    public function testTwoDeepPathInfo()
    {
        $_SERVER['PATH_INFO'] = '/some/other';

        $req = new Request();
        $this->assertEquals($req->path(), '/some/other');
    }

    public function testValidParam()
    {
        $_REQUEST['some'] = 'ok';

        $req = new Request();
        $this->assertEquals($req->param('some'), 'ok');
    }

    public function testInvalidParam()
    {
        $req = new Request();
        $this->assertEquals($req->param('invalid'), null);
    }

    public function testInvalidParamDefault()
    {
        $req = new Request();
        $this->assertEquals($req->param('invalid', 'ok'), 'ok');
    }
}