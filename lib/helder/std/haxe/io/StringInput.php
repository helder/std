<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\haxe\io;

use \helder\std\haxe\io\_BytesData\Container;
use \helder\std\php\Boot;

class StringInput extends BytesInput {
	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function __construct ($s) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/io/StringInput.hx:27: characters 9-34
		$tmp = \strlen($s);
		#/home/runner/haxe/versions/4.1.3/std/haxe/io/StringInput.hx:27: characters 3-35
		parent::__construct(new Bytes($tmp, new Container($s)));
	}
}

Boot::registerClass(StringInput::class, 'haxe.io.StringInput');