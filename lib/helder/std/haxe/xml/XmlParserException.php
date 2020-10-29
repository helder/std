<?php
/**
 * Generated by Haxe 4.1.0
 */

namespace helder\std\haxe\xml;

use \helder\std\php\Boot;
use \helder\std\Type;

class XmlParserException {
	/**
	 * @var int
	 */
	public $lineNumber;
	/**
	 * @var string
	 */
	public $message;
	/**
	 * @var int
	 */
	public $position;
	/**
	 * @var int
	 */
	public $positionAtLine;
	/**
	 * @var string
	 */
	public $xml;

	/**
	 * @param string $message
	 * @param string $xml
	 * @param int $position
	 * 
	 * @return void
	 */
	public function __construct ($message, $xml, $position) {
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:65: characters 3-17
		$this->xml = $xml;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:66: characters 3-25
		$this->message = $message;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:67: characters 3-27
		$this->position = $position;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:68: characters 3-17
		$this->lineNumber = 1;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:69: characters 3-21
		$this->positionAtLine = 0;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:71: characters 13-17
		$_g = 0;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:71: characters 17-25
		$_g1 = $position;
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:71: lines 71-80
		while ($_g < $_g1) {
			#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:71: characters 13-25
			$i = $_g++;
			#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:72: characters 12-46
			$s = $xml;
			#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:72: characters 4-47
			$c = ($i >= strlen($s) ? 0 : ord($s[$i]));
			#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:73: lines 73-79
			if ($c === 10) {
				#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:74: characters 5-17
				$this->lineNumber++;
				#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:75: characters 5-23
				$this->positionAtLine = 0;
			} else if ($c !== 13) {
				#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:78: characters 6-22
				$this->positionAtLine++;
			}
		}
	}

	/**
	 * @return string
	 */
	public function toString () {
		#/home/runner/haxe/versions/4.1.0/std/php/_std/haxe/xml/Parser.hx:84: characters 3-120
		return (Type::getClassName(Type::getClass($this))??'null') . ": " . ($this->message??'null') . " at line " . ($this->lineNumber??'null') . " char " . ($this->positionAtLine??'null');
	}

	public function __toString() {
		return $this->toString();
	}
}

Boot::registerClass(XmlParserException::class, 'haxe.xml.XmlParserException');
