<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\haxe\crypto;

use \helder\std\StringTools;
use \helder\std\php\Boot;
use \helder\std\haxe\io\Input;
use \helder\std\haxe\io\Bytes;

/**
 * Calculates the Adler32 of the given Bytes.
 */
class Adler32 {
	/**
	 * @var int
	 */
	public $a1;
	/**
	 * @var int
	 */
	public $a2;

	/**
	 * @param Bytes $b
	 * 
	 * @return int
	 */
	public static function make ($b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:72: characters 3-25
		$a = new Adler32();
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:73: characters 3-27
		$a->update($b, 0, $b->length);
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:74: characters 3-17
		return $a->get();
	}

	/**
	 * @param Input $i
	 * 
	 * @return Adler32
	 */
	public static function read ($i) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:61: characters 3-25
		$a = new Adler32();
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:62: characters 3-26
		$a2a = $i->readByte();
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:63: characters 3-26
		$a2b = $i->readByte();
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:64: characters 3-26
		$a1a = $i->readByte();
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:65: characters 3-26
		$a1b = $i->readByte();
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:66: characters 3-26
		$a->a1 = ($a1a << 8) | $a1b;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:67: characters 3-26
		$a->a2 = ($a2a << 8) | $a2b;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:68: characters 3-11
		return $a;
	}

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:33: characters 3-9
		$this->a1 = 1;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:34: characters 3-9
		$this->a2 = 0;
	}

	/**
	 * @param Adler32 $a
	 * 
	 * @return bool
	 */
	public function equals ($a) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:53: characters 10-34
		if ($a->a1 === $this->a1) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:53: characters 24-34
			return $a->a2 === $this->a2;
		} else {
			#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:53: characters 10-34
			return false;
		}
	}

	/**
	 * @return int
	 */
	public function get () {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:38: characters 3-25
		return ($this->a2 << 16) | $this->a1;
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:57: characters 3-57
		return (StringTools::hex($this->a2, 8)??'null') . (StringTools::hex($this->a1, 8)??'null');
	}

	/**
	 * @param Bytes $b
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return void
	 */
	public function update ($b, $pos, $len) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:42: characters 3-24
		$a1 = $this->a1;
		$a2 = $this->a2;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:43: characters 13-16
		$_g = $pos;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:43: characters 19-28
		$_g1 = $pos + $len;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:43: lines 43-47
		while ($_g < $_g1) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:43: characters 13-28
			$p = $_g++;
			#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:44: characters 4-21
			$c = \ord($b->b->s[$p]);
			#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:45: characters 4-25
			$a1 = ($a1 + $c) % 65521;
			#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:46: characters 4-26
			$a2 = ($a2 + $a1) % 65521;
		}
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:48: characters 3-15
		$this->a1 = $a1;
		#/home/runner/haxe/versions/4.1.3/std/haxe/crypto/Adler32.hx:49: characters 3-15
		$this->a2 = $a2;
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(Adler32::class, 'haxe.crypto.Adler32');
