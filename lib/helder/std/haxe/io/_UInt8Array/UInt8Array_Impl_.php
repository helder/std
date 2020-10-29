<?php
/**
 * Generated by Haxe 4.0.2
 */

namespace helder\std\haxe\io\_UInt8Array;

use \helder\std\php\Boot;
use \helder\std\Array_hx;
use \helder\std\haxe\io\Error;
use \helder\std\haxe\io\_ArrayBufferView\ArrayBufferView_Impl_;
use \helder\std\php\_Boot\HxException;
use \helder\std\haxe\io\Bytes;
use \helder\std\haxe\io\ArrayBufferViewImpl;

final class UInt8Array_Impl_ {
	/**
	 * @var int
	 */
	const BYTES_PER_ELEMENT = 1;


	/**
	 * @param int $elements
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function _new ($elements) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:34: characters 10-59
		$this1 = new ArrayBufferViewImpl(Bytes::alloc($elements), 0, $elements);
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:33: character 2
		$this2 = $this1;
		return $this2;
	}

	/**
	 * @param Array_hx $a
	 * @param int $pos
	 * @param int $length
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function fromArray ($a, $pos = 0, $length = null) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:73: lines 73-82
		if ($pos === null) {
			$pos = 0;
		}
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:74: lines 74-75
		if ($length === null) {
			#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:75: characters 4-27
			$length = $a->length - $pos;
		}
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:76: lines 76-77
		if (($pos < 0) || ($length < 0) || (($pos + $length) > $a->length)) {
			#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:77: characters 4-9
			throw new HxException(Error::OutsideBounds());
		}
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:78: characters 11-35
		$elements = $a->length;
		$this1 = new ArrayBufferViewImpl(Bytes::alloc($elements), 0, $elements);
		$this2 = $this1;
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:78: characters 3-36
		$i = $this2;
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:79: lines 79-80
		$_g = 0;
		$_g1 = $length;
		while ($_g < $_g1) {
			$idx = $_g++;
			#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:80: characters 4-25
			$value = ($a->arr[$idx + $pos] ?? null);
			if (($idx >= 0) && ($idx < $i->byteLength)) {
				$i->bytes->b->s[$idx + $i->byteOffset] = chr($value);
			}

		}

		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:81: characters 3-11
		return $i;
	}

	/**
	 * @param Bytes $bytes
	 * @param int $bytePos
	 * @param int $length
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function fromBytes ($bytes, $bytePos = 0, $length = null) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:85: characters 3-79
		if ($bytePos === null) {
			$bytePos = 0;
		}
		return UInt8Array_Impl_::fromData(ArrayBufferView_Impl_::fromBytes($bytes, $bytePos, $length));
	}

	/**
	 * @param ArrayBufferViewImpl $d
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function fromData ($d) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:70: characters 3-16
		return $d;
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * @param int $index
	 * 
	 * @return int
	 */
	public static function get ($this1, $index) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:46: characters 10-49
		return ord($this1->bytes->b->s[$index + $this1->byteOffset]);
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function getData ($this1) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:66: characters 3-14
		return $this1;
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * 
	 * @return int
	 */
	public static function get_length ($this1) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:38: characters 3-25
		return $this1->byteLength;
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function get_view ($this1) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:42: characters 3-40
		return $this1;
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * @param int $index
	 * @param int $value
	 * 
	 * @return int
	 */
	public static function set ($this1, $index, $value) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:50: lines 50-53
		if (($index >= 0) && ($index < $this1->byteLength)) {
			#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:51: characters 4-50
			$this1->bytes->b->s[$index + $this1->byteOffset] = chr($value);
			#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:52: characters 4-16
			return $value;
		}
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:54: characters 3-11
		return 0;
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * @param int $begin
	 * @param int $length
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function sub ($this1, $begin, $length = null) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:58: characters 3-43
		return UInt8Array_Impl_::fromData($this1->sub($begin, $length));
	}

	/**
	 * @param ArrayBufferViewImpl $this
	 * @param int $begin
	 * @param int $end
	 * 
	 * @return ArrayBufferViewImpl
	 */
	public static function subarray ($this1, $begin = null, $end = null) {
		#/home/runner/haxe/versions/4.0.2/std/haxe/io/UInt8Array.hx:62: characters 3-45
		return UInt8Array_Impl_::fromData($this1->subarray($begin, $end));
	}
}

Boot::registerClass(UInt8Array_Impl_::class, 'haxe.io._UInt8Array.UInt8Array_Impl_');
Boot::registerGetters('helder\\std\\haxe\\io\\_UInt8Array\\UInt8Array_Impl_', [
	'view' => true,
	'length' => true
]);
