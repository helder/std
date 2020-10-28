<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\haxe;

use \helder\std\php\Boot;

/**
 * Since not all platforms guarantee that `String` always uses UTF-8 encoding, you
 * can use this cross-platform API to perform operations on such strings.
 */
class Utf8 {
	/**
	 * @var string
	 */
	const enc = "UTF-8";

	/**
	 * @var string
	 */
	public $__b;

	/**
	 * Similar to `String.charCodeAt` but uses the UTF8 character position.
	 * 
	 * @param string $s
	 * @param int $index
	 * 
	 * @return int
	 */
	public static function charCodeAt ($s, $index) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:60: characters 3-32
		return Utf8::uord(Utf8::sub($s, $index, 1));
	}

	/**
	 * Compare two UTF8 strings, character by character.
	 * 
	 * @param string $a
	 * @param string $b
	 * 
	 * @return int
	 */
	public static function compare ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:81: characters 3-29
		return \strcmp($a, $b);
	}

	/**
	 * Decode an UTF8 string back to an ISO string.
	 * Throw an exception if a given UTF8 character is not supported by the decoder.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function decode ($s) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:49: characters 3-31
		return \utf8_decode($s);
	}

	/**
	 * Encode the input ISO string into the corresponding UTF8 one.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function encode ($s) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:45: characters 3-31
		return \utf8_encode($s);
	}

	/**
	 * Call the `chars` function for each UTF8 char of the string.
	 * 
	 * @param string $s
	 * @param \Closure $chars
	 * 
	 * @return void
	 */
	public static function iter ($s, $chars) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:53: characters 3-23
		$len = Utf8::length($s);
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:54: characters 13-17
		$_g = 0;
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:54: characters 17-20
		$_g1 = $len;
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:54: lines 54-56
		while ($_g < $_g1) {
			#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:54: characters 13-20
			$i = $_g++;
			#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:55: characters 4-27
			$chars(Utf8::charCodeAt($s, $i));
		}
	}

	/**
	 * Returns the number of UTF8 chars of the String.
	 * 
	 * @param string $s
	 * 
	 * @return int
	 */
	public static function length ($s) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:77: characters 3-34
		return \mb_strlen($s, "UTF-8");
	}

	/**
	 * This is similar to `String.substr` but the `pos` and `len` parts are considering UTF8 characters.
	 * 
	 * @param string $s
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return string
	 */
	public static function sub ($s, $pos, $len) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:85: characters 3-44
		return \mb_substr($s, $pos, $len, "UTF-8");
	}

	/**
	 * @param int $i
	 * 
	 * @return string
	 */
	public static function uchr ($i) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:64: characters 3-77
		return \mb_convert_encoding(\pack("N", $i), "UTF-8", "UCS-4BE");
	}

	/**
	 * @param string $s
	 * 
	 * @return int
	 */
	public static function uord ($s) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:68: characters 3-81
		$c = \unpack("N", \mb_convert_encoding($s, "UCS-4BE", "UTF-8"));
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:69: characters 3-14
		return $c[1];
	}

	/**
	 * Tells if the String is correctly encoded as UTF8.
	 * 
	 * @param string $s
	 * 
	 * @return bool
	 */
	public static function validate ($s) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:73: characters 3-42
		return \mb_check_encoding($s, "UTF-8");
	}

	/**
	 * Allocate a new Utf8 buffer using an optional bytes size.
	 * 
	 * @param int $size
	 * 
	 * @return void
	 */
	public function __construct ($size = null) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:33: characters 3-11
		$this->__b = "";
	}

	/**
	 * Add the given UTF8 character code to the buffer.
	 * 
	 * @param int $c
	 * 
	 * @return void
	 */
	public function addChar ($c) {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:37: characters 3-6
		$tmp = $this;
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:37: characters 3-17
		$tmp->__b = ($tmp->__b??'null') . (Utf8::uchr($c)??'null');
	}

	/**
	 * Returns the buffer converted to a String.
	 * 
	 * @return string
	 */
	public function toString () {
		#/home/runner/haxe/versions/4.1.3/std/php/_std/haxe/Utf8.hx:41: characters 3-13
		return $this->__b;
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(Utf8::class, 'haxe.Utf8');
