<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\haxe\io;

use \helder\std\php\Boot;

/**
 * This exception is raised when reading while data is no longer available in the `haxe.io.Input`.
 */
class Eof {
	/**
	 * @return void
	 */
	public function __construct () {
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/io/Eof.hx:33: characters 3-15
		return "Eof";
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(Eof::class, 'haxe.io.Eof');
