<?php

use Bkwld\Croppa\Croppa;

/**
 * Test the regex used to capture routes.  Note the tested paths
 * do not contain leading slashes
 */
class TestRouteRegistration extends PHPUnit_Framework_TestCase {

	public function testWithinSrcDir() {
		$croppa = new Croppa([
			'public' => '/var/www/public',
			'src_dirs' => ['/var/www/public/uploads', '/var/www/public/more'],
		]);
		$this->assertRegExp('#'.$croppa->pattern().'#', 'uploads/photo-300x200.png');
	}

	public function testOutsideSrcDir() {
		$croppa = new Croppa([
			'public' => '/var/www/public',
			'src_dirs' => ['/var/www/public/uploads', '/var/www/public/more'],
		]);
		$this->assertNotRegExp('#'.$croppa->pattern().'#', 'apple-touch-icon-152x152-precomposed.png');
	}

}