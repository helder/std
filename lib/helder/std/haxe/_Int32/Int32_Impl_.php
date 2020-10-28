<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\haxe\_Int32;

use \helder\std\php\Boot;

final class Int32_Impl_ {
	/**
	 * @var int
	 */
	static public $extraBits;

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function add ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:52: characters 3-38
		return (($a + $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function addInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:55: characters 3-38
		return (($a + $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $x
	 * 
	 * @return int
	 */
	public static function clamp ($x) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:272: characters 3-39
		return ($x << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * 
	 * @return int
	 */
	public static function complement ($a) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:173: characters 49-65
		return (~$a << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function intShl ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:238: characters 3-31
		return ($a << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function intShr ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:214: characters 3-31
		return (($a >> $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function intSub ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:66: characters 3-38
		return (($a - $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function mul ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:86: characters 3-95
		return (($a * ($b & 65535) + ((($a * (Boot::shiftRightUnsigned($b, 16))) << 16 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function mulInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:90: characters 3-19
		return Int32_Impl_::mul($a, $b);
	}

	/**
	 * @param int $this
	 * 
	 * @return int
	 */
	public static function negate ($this1) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:31: characters 3-26
		return ((~$this1 + 1) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function or ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:184: characters 3-38
		return (($a | $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function orInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:187: characters 3-30
		return (($a | $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $this
	 * 
	 * @return int
	 */
	public static function postDecrement ($this1) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:46: characters 13-19
		$ret = $this1--;
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:47: characters 3-21
		$this1 = ($this1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:48: characters 3-13
		return $ret;
	}

	/**
	 * @param int $this
	 * 
	 * @return int
	 */
	public static function postIncrement ($this1) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:37: characters 13-19
		$ret = $this1++;
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:38: characters 3-21
		$this1 = ($this1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:39: characters 3-13
		return $ret;
	}

	/**
	 * @param int $this
	 * 
	 * @return int
	 */
	public static function preDecrement ($this1) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:43: characters 17-30
		$this1 = (--$this1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:43: characters 3-30
		return $this1;
	}

	/**
	 * @param int $this
	 * 
	 * @return int
	 */
	public static function preIncrement ($this1) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:34: characters 17-30
		$this1 = (++$this1 << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:34: characters 3-30
		return $this1;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function shl ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:232: characters 3-39
		return ($a << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function shlInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:235: characters 3-31
		return ($a << $b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function shr ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:208: characters 3-39
		return (($a >> $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function shrInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:211: characters 3-31
		return (($a >> $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function sub ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:60: characters 3-38
		return (($a - $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function subInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:63: characters 3-38
		return (($a - $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $this
	 * 
	 * @return float
	 */
	public static function toFloat ($this1) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:248: characters 3-14
		return $this1;
	}

	/**
	 * Compare `a` and `b` in unsigned mode.
	 * 
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function ucompare ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:254: lines 254-255
		if ($a < 0) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:255: characters 11-32
			if ($b < 0) {
				#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:255: characters 19-28
				return ((((~$b << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits) - ((~$a << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits)) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
			} else {
				#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:255: characters 31-32
				return 1;
			}
		}
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:256: characters 10-30
		if ($b < 0) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:256: characters 18-20
			return -1;
		} else {
			#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:256: characters 23-30
			return (($a - $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
		}
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function xor ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:196: characters 3-38
		return (($a ^ $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @param int $a
	 * @param int $b
	 * 
	 * @return int
	 */
	public static function xorInt ($a, $b) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/Int32.hx:199: characters 3-30
		return (($a ^ $b) << Int32_Impl_::$extraBits) >> Int32_Impl_::$extraBits;
	}

	/**
	 * @internal
	 * @access private
	 */
	static public function __hx__init ()
	{
		static $called = false;
		if ($called) return;
		$called = true;


		self::$extraBits = \PHP_INT_SIZE * 8 - 32;
	}
}

Boot::registerClass(Int32_Impl_::class, 'haxe._Int32.Int32_Impl_');
Int32_Impl_::__hx__init();
