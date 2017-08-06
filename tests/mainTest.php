<?php
require_once(__DIR__.'/testhelper/server_setup.php');
test_helper_server_setup();

/**
 * Test Script
 */
class mainTest extends PHPUnit_Framework_TestCase{

	/**
	 * setup
	 */
	public function setup(){
		mb_internal_encoding('utf-8');

		$this->client = new \GuzzleHttp\Client();
	}

	/**
	 * main test
	 */
	public function testMain(){
		$res = $this->client->request('GET', 'http://'.WEB_SERVER_HOST.':'.WEB_SERVER_PORT.'/index.html');
		// var_dump(trim($res->getBody()));
		$this->assertEquals( preg_match('/^\<\!DOCTYPE html\>/', trim($res->getBody())), 1 );
	}//testMain()

}
