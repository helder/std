<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std\haxe\xml\_Access;

use \helder\std\php\Boot;
use \helder\std\haxe\Exception;
use \helder\std\Xml;
use \helder\std\_Xml\XmlType_Impl_;

final class AttribAccess_Impl_ {
	/**
	 * @param Xml $this
	 * @param string $name
	 * @param string $value
	 * 
	 * @return string
	 */
	public static function _hx_set ($this1, $name, $value) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:50: lines 50-51
		if ($this1->nodeType === Xml::$Document) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:51: characters 4-9
			throw Exception::thrown("Cannot access document attribute " . ($name??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:52: characters 3-24
		$this1->set($name, $value);
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:53: characters 3-15
		return $value;
	}

	/**
	 * @param Xml $this
	 * @param string $name
	 * 
	 * @return string
	 */
	public static function resolve ($this1, $name) {
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:40: lines 40-41
		if ($this1->nodeType === Xml::$Document) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:41: characters 4-9
			throw Exception::thrown("Cannot access document attribute " . ($name??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:42: characters 3-26
		$v = $this1->get($name);
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:43: lines 43-44
		if ($v === null) {
			#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:44: characters 10-23
			if ($this1->nodeType !== Xml::$Element) {
				throw Exception::thrown("Bad node type, expected Element but found " . ((($this1->nodeType === null ? "null" : XmlType_Impl_::toString($this1->nodeType)))??'null'));
			}
			#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:44: characters 4-9
			throw Exception::thrown(($this1->nodeName??'null') . " is missing attribute " . ($name??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/haxe/xml/Access.hx:45: characters 3-11
		return $v;
	}
}

Boot::registerClass(AttribAccess_Impl_::class, 'haxe.xml._Access.AttribAccess_Impl_');