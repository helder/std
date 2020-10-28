<?php
/**
 * Generated by Haxe 4.0.5
 */

namespace helder\std\haxe\io;

use \helder\std\haxe\io\_BytesData\Container;
use \helder\std\haxe\_Int64\___Int64;
use \helder\std\php\Boot;
use \helder\std\php\_Boot\HxException;

class BytesBuffer {
	/**
	 * @var mixed
	 */
	public $b;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:33: characters 3-9
		$this->b = "";
	}

	/**
	 * @param Bytes $src
	 * 
	 * @return void
	 */
	public function add ($src) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:41: characters 3-55
		$this->b = ($this->b . $src->b->s);
	}

	/**
	 * @param int $byte
	 * 
	 * @return void
	 */
	public function addByte ($byte) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:37: characters 3-41
		$this->b = ($this->b . chr($byte));
	}

	/**
	 * @param Bytes $src
	 * @param int $pos
	 * @param int $len
	 * 
	 * @return void
	 */
	public function addBytes ($src, $pos, $len) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:69: lines 69-73
		if (($pos < 0) || ($len < 0) || (($pos + $len) > $src->length)) {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:70: characters 4-9
			throw new HxException(Error::OutsideBounds());
		} else {
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:72: characters 8-64
			$left = $this->b;
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:72: characters 25-52
			$this_s = substr($src->b->s, $pos, $len);
			#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:72: characters 4-5
			$this->b = ($left . $this_s);
		}
	}

	/**
	 * @param float $v
	 * 
	 * @return void
	 */
	public function addDouble ($v) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:65: characters 3-36
		$this->addInt64(FPHelper::doubleToI64($v));
	}

	/**
	 * @param float $v
	 * 
	 * @return void
	 */
	public function addFloat ($v) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:61: characters 3-35
		$this->addInt32(unpack("l", pack("f", $v))[1]);
	}

	/**
	 * @param int $v
	 * 
	 * @return void
	 */
	public function addInt32 ($v) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:49: characters 3-20
		$this->b = ($this->b . chr($v & 255));
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:50: characters 3-27
		$this->b = ($this->b . chr(($v >> 8) & 255));
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:51: characters 3-28
		$this->b = ($this->b . chr(($v >> 16) & 255));
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:52: characters 3-20
		$this->b = ($this->b . chr(Boot::shiftRightUnsigned($v, 24)));
	}

	/**
	 * @param ___Int64 $v
	 * 
	 * @return void
	 */
	public function addInt64 ($v) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:56: characters 3-18
		$this->addInt32($v->low);
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:57: characters 3-19
		$this->addInt32($v->high);
	}

	/**
	 * @param string $v
	 * @param Encoding $encoding
	 * 
	 * @return void
	 */
	public function addString ($v, $encoding = null) {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:45: characters 3-26
		$this->b = ($this->b . $v);
	}

	/**
	 * @return Bytes
	 */
	public function getBytes () {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:77: characters 41-47
		$bytes = strlen($this->b);
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:77: characters 3-52
		$bytes1 = new Bytes($bytes, new Container($this->b));
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:78: characters 3-11
		$this->b = null;
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:79: characters 3-15
		return $bytes1;
	}

	/**
	 * @return int
	 */
	public function get_length () {
		#/home/runner/haxe/versions/4.0.5/std/php/_std/haxe/io/BytesBuffer.hx:83: characters 3-26
		return strlen($this->b);
	}
}

Boot::registerClass(BytesBuffer::class, 'haxe.io.BytesBuffer');
Boot::registerGetters('helder\\std\\haxe\\io\\BytesBuffer', [
	'length' => true
]);
