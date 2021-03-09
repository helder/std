<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\haxe\iterators;

use \helder\std\php\_Boot\HxAnon;
use \helder\std\php\Boot;

class StringKeyValueIteratorUnicode {
	/**
	 * @var int
	 */
	public $byteOffset;
	/**
	 * @var int
	 */
	public $charOffset;
	/**
	 * @var mixed
	 */
	public $s;
	/**
	 * @var int
	 */
	public $totalBytes;

	/**
	 * @param string $s
	 * 
	 * @return StringKeyValueIteratorUnicode
	 */
	public static function unicodeKeyValueIterator ($s) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:65: characters 3-46
		return new StringKeyValueIteratorUnicode($s);
	}

	/**
	 * @param string $s
	 * 
	 * @return void
	 */
	public function __construct ($s) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:30: characters 23-24
		$this->byteOffset = 0;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:29: characters 23-24
		$this->charOffset = 0;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:35: characters 3-13
		$this->s = $s;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:36: characters 3-25
		$this->totalBytes = \strlen($s);
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:40: characters 3-33
		return $this->byteOffset < $this->totalBytes;
	}

	/**
	 * @return object
	 */
	public function next () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:44: characters 3-33
		$code = \ord($this->s[$this->byteOffset]);
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:45: lines 45-60
		if ($code < 192) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:46: characters 4-16
			$this->byteOffset++;
		} else if ($code < 224) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:48: characters 4-63
			$code = (($code - 192) << 6) + \ord($this->s[$this->byteOffset + 1]) - 128;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:49: characters 4-19
			$this->byteOffset += 2;
		} else if ($code < 240) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:51: characters 4-105
			$code = (($code - 224) << 12) + ((\ord($this->s[$this->byteOffset + 1]) - 128) << 6) + \ord($this->s[$this->byteOffset + 2]) - 128;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:52: characters 4-19
			$this->byteOffset += 3;
		} else {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:54: lines 54-58
			$code = (($code - 240) << 18) + ((\ord($this->s[$this->byteOffset + 1]) - 128) << 12) + ((\ord($this->s[$this->byteOffset + 2]) - 128) << 6) + \ord($this->s[$this->byteOffset + 3]) - 128;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:59: characters 4-19
			$this->byteOffset += 4;
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/haxe/iterators/StringKeyValueIteratorUnicode.hx:61: characters 3-42
		return new _HxAnon_StringKeyValueIteratorUnicode0($this->charOffset++, $code);
	}
}

class _HxAnon_StringKeyValueIteratorUnicode0 extends HxAnon {
	function __construct($key, $value) {
		$this->key = $key;
		$this->value = $value;
	}
}

Boot::registerClass(StringKeyValueIteratorUnicode::class, 'haxe.iterators.StringKeyValueIteratorUnicode');
