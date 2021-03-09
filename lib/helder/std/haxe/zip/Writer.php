<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\haxe\zip;

use \helder\std\php\_Boot\HxAnon;
use \helder\std\haxe\io\_BytesData\Container;
use \helder\std\php\Boot;
use \helder\std\haxe\io\BytesOutput;
use \helder\std\haxe\Exception;
use \helder\std\haxe\io\Output;
use \helder\std\haxe\crypto\Crc32;
use \helder\std\Date;
use \helder\std\haxe\ds\List_hx;
use \helder\std\haxe\io\Bytes;

class Writer {
	/**
	 * @var int
	 * The next constant is required for computing the Central
	 * Directory Record(CDR) size. CDR consists of some fields
	 * of constant size and a filename. Constant represents
	 * total length of all fields with constant size for each
	 * file in archive
	 */
	const CENTRAL_DIRECTORY_RECORD_FIELDS_SIZE = 46;
	/**
	 * @var int
	 * The following constant is the total size of all fields
	 * of Local File Header. It's required for calculating
	 * offset of start of central directory record
	 */
	const LOCAL_FILE_HEADER_FIELDS_SIZE = 30;

	/**
	 * @var List_hx
	 */
	public $files;
	/**
	 * @var Output
	 */
	public $o;

	/**
	 * @param Output $o
	 * 
	 * @return void
	 */
	public function __construct ($o) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:56: characters 3-13
		$this->o = $o;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:57: characters 3-21
		$this->files = new List_hx();
	}

	/**
	 * @param List_hx $files
	 * 
	 * @return void
	 */
	public function write ($files) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:142: characters 13-18
		$_g_head = $files->h;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:142: lines 142-145
		while ($_g_head !== null) {
			$val = $_g_head->item;
			$_g_head = $_g_head->next;
			$f = $val;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:143: characters 4-23
			$this->writeEntryHeader($f);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:144: characters 4-46
			$this->o->writeFullBytes($f->data, 0, $f->data->length);
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:146: characters 3-13
		$this->writeCDR();
	}

	/**
	 * @return void
	 */
	public function writeCDR () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:150: characters 3-20
		$cdr_size = 0;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:151: characters 3-22
		$cdr_offset = 0;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:152: characters 13-18
		$_g_head = $this->files->h;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:152: lines 152-175
		while ($_g_head !== null) {
			$val = $_g_head->item;
			$_g_head = $_g_head->next;
			$f = $val;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:153: characters 4-32
			$namelen = mb_strlen($f->name);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:154: characters 4-44
			$extraFieldsLength = $f->fields->length;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:155: characters 4-28
			$this->o->writeInt32(33639248);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:156: characters 4-25
			$this->o->writeUInt16(20);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:157: characters 4-25
			$this->o->writeUInt16(20);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:158: characters 4-20
			$this->o->writeUInt16(0);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:159: characters 4-39
			$this->o->writeUInt16(($f->compressed ? 8 : 0));
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:160: characters 4-24
			$this->writeZipDate($f->date);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:161: characters 4-23
			$this->o->writeInt32($f->crc);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:162: characters 4-24
			$this->o->writeInt32($f->clen);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:163: characters 4-24
			$this->o->writeInt32($f->size);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:164: characters 4-26
			$this->o->writeUInt16($namelen);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:165: characters 4-36
			$this->o->writeUInt16($extraFieldsLength);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:166: characters 4-20
			$this->o->writeUInt16(0);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:167: characters 4-20
			$this->o->writeUInt16(0);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:168: characters 4-20
			$this->o->writeUInt16(0);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:169: characters 4-19
			$this->o->writeInt32(0);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:170: characters 4-28
			$this->o->writeInt32($cdr_offset);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:171: characters 4-25
			$this->o->writeString($f->name);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:172: characters 4-21
			$this->o->write($f->fields);
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:173: characters 4-82
			$cdr_size += 46 + $namelen + $extraFieldsLength;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:174: characters 4-86
			$cdr_offset += 30 + $namelen + $extraFieldsLength + $f->clen;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:177: characters 3-27
		$this->o->writeInt32(101010256);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:179: characters 3-19
		$this->o->writeUInt16(0);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:181: characters 3-19
		$this->o->writeUInt16(0);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:183: characters 3-30
		$this->o->writeUInt16($this->files->length);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:185: characters 3-30
		$this->o->writeUInt16($this->files->length);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:187: characters 3-25
		$this->o->writeInt32($cdr_size);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:189: characters 3-27
		$this->o->writeInt32($cdr_offset);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:191: characters 3-19
		$this->o->writeUInt16(0);
	}

	/**
	 * @param object $f
	 * 
	 * @return void
	 */
	public function writeEntryHeader ($f) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:72: characters 3-18
		$o = $this->o;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:73: characters 3-17
		$flags = 0;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:74: lines 74-81
		if ($f->extraFields !== null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:75: characters 14-27
			$_g_head = $f->extraFields->h;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:75: lines 75-80
			while ($_g_head !== null) {
				$val = $_g_head->item;
				$_g_head = $_g_head->next;
				$e = $val;
				#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:76: lines 76-80
				if ($e->index === 2) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:78: characters 7-21
					$flags |= 2048;
				}
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:82: characters 3-27
		$o->writeInt32(67324752);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:83: characters 3-24
		$o->writeUInt16(20);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:84: characters 3-23
		$o->writeUInt16($flags);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:85: lines 85-100
		if ($f->data === null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:86: characters 4-14
			$f->fileSize = 0;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:87: characters 4-14
			$f->dataSize = 0;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:88: characters 4-11
			$f->crc32 = 0;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:89: characters 4-16
			$f->compressed = false;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:90: characters 4-10
			$f->data = Bytes::alloc(0);
		} else {
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:92: lines 92-96
			if ($f->crc32 === null) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:93: lines 93-94
				if ($f->compressed) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:94: characters 6-11
					throw Exception::thrown("CRC32 must be processed before compression");
				}
				#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:95: characters 5-12
				$f->crc32 = Crc32::make($f->data);
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:97: lines 97-98
			if (!$f->compressed) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:98: characters 5-15
				$f->fileSize = $f->data->length;
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:99: characters 4-14
			$f->dataSize = $f->data->length;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:101: characters 3-38
		$o->writeUInt16(($f->compressed ? 8 : 0));
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:102: characters 3-27
		$this->writeZipDate($f->fileTime);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:103: characters 3-24
		$o->writeInt32($f->crc32);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:104: characters 3-27
		$o->writeInt32($f->dataSize);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:105: characters 3-27
		$o->writeInt32($f->fileSize);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:106: characters 3-35
		$o->writeUInt16(mb_strlen($f->fileName));
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:107: characters 3-37
		$e = new BytesOutput();
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:108: lines 108-125
		if ($f->extraFields !== null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:109: characters 14-27
			$_g_head = $f->extraFields->h;
			#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:109: lines 109-124
			while ($_g_head !== null) {
				$val = $_g_head->item;
				$_g_head = $_g_head->next;
				$f1 = $val;
				#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:110: lines 110-124
				$__hx__switch = ($f1->index);
				if ($__hx__switch === 0) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:118: characters 20-23
					$tag = $f1->params[0];
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:118: characters 25-30
					$bytes = $f1->params[1];
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:119: characters 7-25
					$e->writeUInt16($tag);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:120: characters 7-34
					$e->writeUInt16($bytes->length);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:121: characters 7-21
					$e->write($bytes);
				} else if ($__hx__switch === 1) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:111: characters 31-35
					$name = $f1->params[0];
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:111: characters 37-40
					$crc = $f1->params[1];
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:112: characters 23-51
					$namebytes = \strlen($name);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:112: characters 7-52
					$namebytes1 = new Bytes($namebytes, new Container($name));
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:113: characters 7-28
					$e->writeUInt16(28789);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:114: characters 7-42
					$e->writeUInt16($namebytes1->length + 5);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:115: characters 7-21
					$e->writeByte(1);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:116: characters 7-24
					$e->writeInt32($crc);
					#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:117: characters 7-25
					$e->write($namebytes1);
				} else if ($__hx__switch === 2) {
				}
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:126: characters 3-29
		$ebytes = $e->getBytes();
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:127: characters 3-31
		$o->writeUInt16($ebytes->length);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:128: characters 3-28
		$o->writeString($f->fileName);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:129: characters 3-18
		$o->write($ebytes);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:130: lines 130-138
		$this->files->add(new _HxAnon_Writer0($f->fileName, $f->compressed, $f->data->length, $f->fileSize, $f->crc32, $f->fileTime, $ebytes));
	}

	/**
	 * @param Date $date
	 * 
	 * @return void
	 */
	public function writeZipDate ($date) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:61: characters 3-30
		$hour = $date->getHours();
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:62: characters 3-31
		$min = $date->getMinutes();
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:63: characters 3-36
		$sec = $date->getSeconds() >> 1;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:64: characters 3-49
		$this->o->writeUInt16(($hour << 11) | ($min << 5) | $sec);
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:65: characters 3-40
		$year = $date->getFullYear() - 1980;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:66: characters 3-35
		$month = $date->getMonth() + 1;
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:67: characters 3-28
		$day = $date->getDate();
		#/home/runner/haxe/versions/4.2.0/std/haxe/zip/Writer.hx:68: characters 3-50
		$this->o->writeUInt16(($year << 9) | ($month << 5) | $day);
	}
}

class _HxAnon_Writer0 extends HxAnon {
	function __construct($name, $compressed, $clen, $size, $crc, $date, $fields) {
		$this->name = $name;
		$this->compressed = $compressed;
		$this->clen = $clen;
		$this->size = $size;
		$this->crc = $crc;
		$this->date = $date;
		$this->fields = $fields;
	}
}

Boot::registerClass(Writer::class, 'haxe.zip.Writer');
