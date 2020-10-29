<?php
/**
 * Generated by Haxe 4.0.1
 */

namespace helder\std\haxe\zip\_InflateImpl;

use \helder\std\php\Boot;
use \helder\std\haxe\io\Error;
use \helder\std\haxe\crypto\Adler32;
use \helder\std\php\_Boot\HxException;
use \helder\std\haxe\io\Bytes;

class Window {
	/**
	 * @var int
	 */
	const BUFSIZE = 65536;
	/**
	 * @var int
	 */
	const SIZE = 32768;

	/**
	 * @var Bytes
	 */
	public $buffer;
	/**
	 * @var Adler32
	 */
	public $crc;
	/**
	 * @var int
	 */
	public $pos;

	/**
	 * @param bool $hasCrc
	 * 
	 * @return void
	 */
	public function __construct ($hasCrc) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:38: characters 3-40
		$this->buffer = Bytes::alloc(65536);
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:39: characters 3-10
		$this->pos = 0;
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:40: lines 40-41
		if ($hasCrc) {
			#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:41: characters 4-23
			$this->crc = new Adler32();
		}
	}

	/**
	 * @param int $c
	 * 
	 * @return void
	 */
	public function addByte ($c) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:61: lines 61-62
		if ($this->pos === 65536) {
			#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:62: characters 4-11
			$this->slide();
		}
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:63: characters 3-21
		$pos = $this->pos;
		$this1 = $this->buffer->b;
		$this1->s = substr_replace($this1->s, chr($c), $pos, 1);


		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:64: characters 3-8
		$this->pos++;
	}

	/**
	 * @param Bytes $b
	 * @param int $p
	 * @param int $len
	 * 
	 * @return void
	 */
	public function addBytes ($b, $p, $len) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:54: lines 54-55
		if (($this->pos + $len) > 65536) {
			#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:55: characters 4-11
			$this->slide();
		}
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:56: characters 3-30
		$_this = $this->buffer;
		$pos = $this->pos;
		if (($pos < 0) || ($p < 0) || ($len < 0) || (($pos + $len) > $_this->length) || (($p + $len) > $b->length)) {
			throw new HxException(Error::OutsideBounds());
		} else {
			$this1 = $_this->b;
			$src = $b->b;
			$this1->s = ((substr($this1->s, 0, $pos) . substr($src->s, $p, $len)) . substr($this1->s, $pos + $len));
		}

		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:57: characters 3-13
		$this->pos += $len;
	}

	/**
	 * @return int
	 */
	public function available () {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:72: characters 3-13
		return $this->pos;
	}

	/**
	 * @return Adler32
	 */
	public function checksum () {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:76: lines 76-77
		if ($this->crc !== null) {
			#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:77: characters 4-30
			$this->crc->update($this->buffer, 0, $this->pos);
		}
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:78: characters 3-13
		return $this->crc;
	}

	/**
	 * @return int
	 */
	public function getLastChar () {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:68: characters 10-29
		return ord($this->buffer->b->s[$this->pos - 1]);
	}

	/**
	 * @return void
	 */
	public function slide () {
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:45: lines 45-46
		if ($this->crc !== null) {
			#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:46: characters 4-31
			$this->crc->update($this->buffer, 0, 32768);
		}
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:47: characters 3-40
		$b = Bytes::alloc(65536);
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:48: characters 3-14
		$this->pos -= 32768;
		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:49: characters 3-31
		$src = $this->buffer;
		$len = $this->pos;
		if (($len < 0) || ($len > $b->length) || ((32768 + $len) > $src->length)) {
			throw new HxException(Error::OutsideBounds());
		} else {
			$this1 = $b->b;
			$src1 = $src->b;
			$this1->s = ((substr($this1->s, 0, 0) . substr($src1->s, 32768, $len)) . substr($this1->s, $len));
		}

		#/home/runner/haxe/versions/4.0.1/std/haxe/zip/InflateImpl.hx:50: characters 3-13
		$this->buffer = $b;
	}
}

Boot::registerClass(Window::class, 'haxe.zip._InflateImpl.Window');
