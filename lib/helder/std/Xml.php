<?php
/**
 * Generated by Haxe 4.1.3
 */

namespace helder\std;

use \helder\std\haxe\iterators\ArrayIterator as IteratorsArrayIterator;
use \helder\std\php\Boot;
use \helder\std\haxe\xml\Parser;
use \helder\std\_Xml\XmlType_Impl_;
use \helder\std\haxe\Exception as HaxeException;
use \helder\std\haxe\ds\StringMap;
use \helder\std\haxe\xml\Printer;
use \helder\std\php\_NativeIndexedArray\NativeIndexedArrayIterator;

/**
 * Cross-platform Xml API.
 * @see https://haxe.org/manual/std-Xml.html
 */
class Xml {
	/**
	 * @var int
	 * XML character data type.
	 */
	static public $CData;
	/**
	 * @var int
	 * XML comment type.
	 */
	static public $Comment;
	/**
	 * @var int
	 * XML doctype element type.
	 */
	static public $DocType;
	/**
	 * @var int
	 * XML document type.
	 */
	static public $Document;
	/**
	 * @var int
	 * XML element type.
	 */
	static public $Element;
	/**
	 * @var int
	 * XML parsed character data type.
	 */
	static public $PCData;
	/**
	 * @var int
	 * XML processing instruction type.
	 */
	static public $ProcessingInstruction;

	/**
	 * @var StringMap
	 */
	public $attributeMap;
	/**
	 * @var Array_hx
	 */
	public $children;
	/**
	 * @var string
	 * Returns the node name of an Element.
	 */
	public $nodeName;
	/**
	 * @var int
	 * Returns the type of the Xml Node. This should be used before
	 * accessing other functions since some might raise an exception
	 * if the node type is not correct.
	 */
	public $nodeType;
	/**
	 * @var string
	 * Returns the node value. Only works if the Xml node is not an Element or a Document.
	 */
	public $nodeValue;
	/**
	 * @var Xml
	 * Returns the parent object in the Xml hierarchy.
	 * The parent can be `null`, an Element or a Document.
	 */
	public $parent;

	/**
	 * Creates a node of the given type.
	 * 
	 * @param string $data
	 * 
	 * @return Xml
	 */
	public static function createCData ($data) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:201: characters 3-28
		$xml = new Xml(Xml::$CData);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:202: characters 3-23
		if (($xml->nodeType === Xml::$Document) || ($xml->nodeType === Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, unexpected " . ((($xml->nodeType === null ? "null" : XmlType_Impl_::toString($xml->nodeType)))??'null'));
		}
		$xml->nodeValue = $data;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:203: characters 3-13
		return $xml;
	}

	/**
	 * Creates a node of the given type.
	 * 
	 * @param string $data
	 * 
	 * @return Xml
	 */
	public static function createComment ($data) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:210: characters 3-30
		$xml = new Xml(Xml::$Comment);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:211: characters 3-23
		if (($xml->nodeType === Xml::$Document) || ($xml->nodeType === Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, unexpected " . ((($xml->nodeType === null ? "null" : XmlType_Impl_::toString($xml->nodeType)))??'null'));
		}
		$xml->nodeValue = $data;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:212: characters 3-13
		return $xml;
	}

	/**
	 * Creates a node of the given type.
	 * 
	 * @param string $data
	 * 
	 * @return Xml
	 */
	public static function createDocType ($data) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:219: characters 3-30
		$xml = new Xml(Xml::$DocType);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:220: characters 3-23
		if (($xml->nodeType === Xml::$Document) || ($xml->nodeType === Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, unexpected " . ((($xml->nodeType === null ? "null" : XmlType_Impl_::toString($xml->nodeType)))??'null'));
		}
		$xml->nodeValue = $data;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:221: characters 3-13
		return $xml;
	}

	/**
	 * Creates a node of the given type.
	 * 
	 * @return Xml
	 */
	public static function createDocument () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:237: characters 3-27
		return new Xml(Xml::$Document);
	}

	/**
	 * Creates a node of the given type.
	 * 
	 * @param string $name
	 * 
	 * @return Xml
	 */
	public static function createElement ($name) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:183: characters 3-30
		$xml = new Xml(Xml::$Element);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:184: characters 3-22
		if ($xml->nodeType !== Xml::$Element) {
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($xml->nodeType === null ? "null" : XmlType_Impl_::toString($xml->nodeType)))??'null'));
		}
		$xml->nodeName = $name;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:185: characters 3-13
		return $xml;
	}

	/**
	 * Creates a node of the given type.
	 * 
	 * @param string $data
	 * 
	 * @return Xml
	 */
	public static function createPCData ($data) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:192: characters 3-29
		$xml = new Xml(Xml::$PCData);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:193: characters 3-23
		if (($xml->nodeType === Xml::$Document) || ($xml->nodeType === Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, unexpected " . ((($xml->nodeType === null ? "null" : XmlType_Impl_::toString($xml->nodeType)))??'null'));
		}
		$xml->nodeValue = $data;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:194: characters 3-13
		return $xml;
	}

	/**
	 * Creates a node of the given type.
	 * 
	 * @param string $data
	 * 
	 * @return Xml
	 */
	public static function createProcessingInstruction ($data) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:228: characters 3-44
		$xml = new Xml(Xml::$ProcessingInstruction);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:229: characters 3-23
		if (($xml->nodeType === Xml::$Document) || ($xml->nodeType === Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, unexpected " . ((($xml->nodeType === null ? "null" : XmlType_Impl_::toString($xml->nodeType)))??'null'));
		}
		$xml->nodeValue = $data;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:230: characters 3-13
		return $xml;
	}

	/**
	 * Parses the String into an Xml document.
	 * 
	 * @param string $str
	 * 
	 * @return Xml
	 */
	public static function parse ($str) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:122: characters 3-36
		return Parser::parse($str);
	}

	/**
	 * @param int $nodeType
	 * 
	 * @return void
	 */
	public function __construct ($nodeType) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:398: characters 3-27
		$this->nodeType = $nodeType;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:399: characters 3-16
		$this->children = new Array_hx();
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:400: characters 3-27
		$this->attributeMap = new StringMap();
	}

	/**
	 * Adds a child node to the Document or Element.
	 * A child node can only be inside one given parent node, which is indicated by the `parent` property.
	 * If the child is already inside this Document or Element, it will be moved to the last position among the Document or Element's children.
	 * If the child node was previously inside a different node, it will be moved to this Document or Element.
	 * 
	 * @param Xml $x
	 * 
	 * @return void
	 */
	public function addChild ($x) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:354: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:355: lines 355-357
		if ($x->parent !== null) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:356: characters 4-27
			$x->parent->removeChild($x);
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:358: characters 3-19
		$_this = $this->children;
		$_this->arr[$_this->length++] = $x;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:359: characters 3-18
		$x->parent = $this;
	}

	/**
	 * Returns an `Iterator` on all the attribute names.
	 * 
	 * @return object
	 */
	public function attributes () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:288: lines 288-290
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:289: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:291: characters 10-29
		return new NativeIndexedArrayIterator(array_values(array_map("strval", array_keys($this->attributeMap->data))));
	}

	/**
	 * Returns an iterator of all child nodes which are Elements.
	 * Only works if the current node is an Element or a Document.
	 * 
	 * @return object
	 */
	public function elements () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:308: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 13-75
		$_g = new Array_hx();
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 14-74
		$_g1 = 0;
		$_g2 = $this->children;
		while ($_g1 < $_g2->length) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 19-24
			$child = ($_g2->arr[$_g1] ?? null);
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 14-74
			++$_g1;
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 38-74
			if ($child->nodeType === Xml::$Element) {
				#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 69-74
				$_g->arr[$_g->length++] = $child;
			}
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:309: characters 3-76
		$ret = $_g;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:310: characters 3-24
		return new IteratorsArrayIterator($ret);
	}

	/**
	 * Returns an iterator of all child nodes which are Elements with the given nodeName.
	 * Only works if the current node is an Element or a Document.
	 * 
	 * @param string $name
	 * 
	 * @return object
	 */
	public function elementsNamed ($name) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:318: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:319: lines 319-322
		$_g = new Array_hx();
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:320: lines 320-321
		$_g1 = 0;
		$_g2 = $this->children;
		while ($_g1 < $_g2->length) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:320: characters 9-14
			$child = ($_g2->arr[$_g1] ?? null);
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:320: lines 320-321
			++$_g1;
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:321: characters 9-60
			$tmp = null;
			if ($child->nodeType === Xml::$Element) {
				#/home/runner/haxe/versions/4.1.3/std/Xml.hx:321: characters 38-52
				if ($child->nodeType !== Xml::$Element) {
					throw HaxeException::thrown("Bad node type, expected Element but found " . ((($child->nodeType === null ? "null" : XmlType_Impl_::toString($child->nodeType)))??'null'));
				}
				#/home/runner/haxe/versions/4.1.3/std/Xml.hx:321: characters 9-60
				$tmp = $child->nodeName === $name;
			} else {
				$tmp = false;
			}
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:321: characters 5-67
			if ($tmp) {
				#/home/runner/haxe/versions/4.1.3/std/Xml.hx:321: characters 62-67
				$_g->arr[$_g->length++] = $child;
			}
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:319: lines 319-322
		$ret = $_g;
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:323: characters 3-24
		return new IteratorsArrayIterator($ret);
	}

	/**
	 * @return void
	 */
	public function ensureElementType () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:404: lines 404-406
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:405: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
	}

	/**
	 * Tells if the Element node has a given attribute.
	 * Attributes are case-sensitive.
	 * 
	 * @param string $att
	 * 
	 * @return bool
	 */
	public function exists ($att) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:278: lines 278-280
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:279: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:281: characters 10-34
		return array_key_exists($att, $this->attributeMap->data);
	}

	/**
	 * Returns the first child node.
	 * 
	 * @return Xml
	 */
	public function firstChild () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:330: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:331: characters 3-21
		return ($this->children->arr[0] ?? null);
	}

	/**
	 * Returns the first child node which is an Element.
	 * 
	 * @return Xml
	 */
	public function firstElement () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:338: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:339: lines 339-343
		$_g = 0;
		$_g1 = $this->children;
		while ($_g < $_g1->length) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:339: characters 8-13
			$child = ($_g1->arr[$_g] ?? null);
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:339: lines 339-343
			++$_g;
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:340: lines 340-342
			if ($child->nodeType === Xml::$Element) {
				#/home/runner/haxe/versions/4.1.3/std/Xml.hx:341: characters 5-17
				return $child;
			}
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:344: characters 3-14
		return null;
	}

	/**
	 * Get the given attribute of an Element node. Returns `null` if not found.
	 * Attributes are case-sensitive.
	 * 
	 * @param string $att
	 * 
	 * @return string
	 */
	public function get ($att) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:245: lines 245-247
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:246: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:248: characters 10-27
		return ($this->attributeMap->data[$att] ?? null);
	}

	/**
	 * @return string
	 */
	public function get_nodeName () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:152: lines 152-154
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:153: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:155: characters 3-18
		return $this->nodeName;
	}

	/**
	 * @return string
	 */
	public function get_nodeValue () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:166: lines 166-168
		if (($this->nodeType === Xml::$Document) || ($this->nodeType === Xml::$Element)) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:167: characters 4-9
			throw HaxeException::thrown("Bad node type, unexpected " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:169: characters 3-19
		return $this->nodeValue;
	}

	/**
	 * Inserts a child at the given position among the other childs.
	 * A child node can only be inside one given parent node, which is indicated by the [parent] property.
	 * If the child is already inside this Document or Element, it will be moved to the new position among the Document or Element's children.
	 * If the child node was previously inside a different node, it will be moved to this Document or Element.
	 * 
	 * @param Xml $x
	 * @param int $pos
	 * 
	 * @return void
	 */
	public function insertChild ($x, $pos) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:382: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:383: lines 383-385
		if ($x->parent !== null) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:384: characters 4-31
			$x->parent->children->remove($x);
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:386: characters 3-26
		$this->children->insert($pos, $x);
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:387: characters 3-18
		$x->parent = $this;
	}

	/**
	 * Returns an iterator of all child nodes.
	 * Only works if the current node is an Element or a Document.
	 * 
	 * @return object
	 */
	public function iterator () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:299: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:300: characters 10-29
		return new IteratorsArrayIterator($this->children);
	}

	/**
	 * Removes an attribute for an Element node.
	 * Attributes are case-sensitive.
	 * 
	 * @param string $att
	 * 
	 * @return void
	 */
	public function remove ($att) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:267: lines 267-269
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:268: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:270: characters 3-27
		$this->attributeMap->remove($att);
	}

	/**
	 * Removes a child from the Document or Element.
	 * Returns true if the child was successfuly removed.
	 * 
	 * @param Xml $x
	 * 
	 * @return bool
	 */
	public function removeChild ($x) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:367: characters 3-22
		if (($this->nodeType !== Xml::$Document) && ($this->nodeType !== Xml::$Element)) {
			throw HaxeException::thrown("Bad node type, expected Element or Document but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:368: lines 368-371
		if ($this->children->remove($x)) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:369: characters 4-19
			$x->parent = null;
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:370: characters 4-15
			return true;
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:372: characters 3-15
		return false;
	}

	/**
	 * Set the given attribute value for an Element node.
	 * Attributes are case-sensitive.
	 * 
	 * @param string $att
	 * @param string $value
	 * 
	 * @return void
	 */
	public function set ($att, $value) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:256: lines 256-258
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:257: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:259: characters 3-31
		$this->attributeMap->data[$att] = $value;
	}

	/**
	 * @param string $v
	 * 
	 * @return string
	 */
	public function set_nodeName ($v) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:159: lines 159-161
		if ($this->nodeType !== Xml::$Element) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:160: characters 4-9
			throw HaxeException::thrown("Bad node type, expected Element but found " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:162: characters 3-27
		return $this->nodeName = $v;
	}

	/**
	 * @param string $v
	 * 
	 * @return string
	 */
	public function set_nodeValue ($v) {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:173: lines 173-175
		if (($this->nodeType === Xml::$Document) || ($this->nodeType === Xml::$Element)) {
			#/home/runner/haxe/versions/4.1.3/std/Xml.hx:174: characters 4-9
			throw HaxeException::thrown("Bad node type, unexpected " . ((($this->nodeType === null ? "null" : XmlType_Impl_::toString($this->nodeType)))??'null'));
		}
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:176: characters 3-28
		return $this->nodeValue = $v;
	}

	/**
	 * Returns a String representation of the Xml node.
	 * 
	 * @return string
	 */
	public function toString () {
		#/home/runner/haxe/versions/4.1.3/std/Xml.hx:394: characters 3-38
		return Printer::print($this);
	}

	public function __toString() {
		return $this->toString();
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


		self::$Element = 0;
		self::$PCData = 1;
		self::$CData = 2;
		self::$Comment = 3;
		self::$DocType = 4;
		self::$ProcessingInstruction = 5;
		self::$Document = 6;
	}
}

Boot::registerClass(Xml::class, 'Xml');
Boot::registerGetters('helder\\std\\Xml', [
	'nodeValue' => true,
	'nodeName' => true
]);
Boot::registerSetters('helder\\std\\Xml', [
	'nodeValue' => true,
	'nodeName' => true
]);
Xml::__hx__init();
