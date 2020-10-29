<?php
/**
 * Generated by Haxe 4.0.5
 */

namespace helder\std\php;

use \helder\std\haxe\io\_BytesData\Container;
use \helder\std\StringTools;
use \helder\std\php\_Boot\HxAnon;
use \helder\std\Array_hx;
use \helder\std\Date;
use \helder\std\Std;
use \helder\std\php\_Boot\HxString;
use \helder\std\haxe\ds\List_hx;
use \helder\std\haxe\ds\StringMap;
use \helder\std\php\_Boot\HxException;
use \helder\std\haxe\io\Bytes;
use \helder\std\php\_NativeIndexedArray\NativeIndexedArrayIterator;
use \helder\std\EReg;
use \helder\std\StringBuf;

/**
 * This class is used for accessing the local Web server and the current
 * client request and information.
 */
class Web {
	/**
	 * @var StringMap
	 */
	static public $_clientHeaders;
	/**
	 * @var bool
	 */
	static public $isModNeko;

	/**
	 * Flush the data sent to the client. By default on Apache, outgoing data is buffered so
	 * this can be useful for displaying some long operation progress.
	 * 
	 * @return void
	 */
	public static function flush () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:463: characters 3-17
		flush();
	}

	/**
	 * Returns an object with the authorization sent by the client (Basic scheme only).
	 * 
	 * @return object
	 */
	public static function getAuthorization () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:360: lines 360-361
		if (!isset($_SERVER["PHP_AUTH_USER"])) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:361: characters 4-15
			return null;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:362: characters 17-41
		$tmp = $_SERVER["PHP_AUTH_USER"];
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:362: characters 3-72
		return new HxAnon([
			"user" => $tmp,
			"pass" => $_SERVER["PHP_AUTH_PW"],
		]);
	}

	/**
	 * Retrieve a client header value sent with the request.
	 * 
	 * @param string $k
	 * 
	 * @return string
	 */
	public static function getClientHeader ($k) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:230: characters 10-71
		$this1 = Web::loadClientHeaders();
		$key = str_replace("-", "_", strtoupper($k));
		return ($this1->data[$key] ?? null);
	}

	/**
	 * Retrieve all the client headers.
	 * 
	 * @return List_hx
	 */
	public static function getClientHeaders () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:284: characters 3-37
		$headers = Web::loadClientHeaders();
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:285: characters 3-27
		$result = new List_hx();
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:286: characters 15-29
		$key = new NativeIndexedArrayIterator(array_values(array_map("strval", array_keys($headers->data))));
		while ($key->hasNext()) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:286: lines 286-288
			$key1 = $key->next();
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:287: characters 4-55
			$result->push(new HxAnon([
				"value" => ($headers->data[$key1] ?? null),
				"header" => $key1,
			]));
		}

		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:289: characters 3-16
		return $result;
	}

	/**
	 * Retrieve all the client headers as `haxe.ds.Map`.
	 * 
	 * @return StringMap
	 */
	public static function getClientHeadersMap () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:296: characters 10-36
		return (clone Web::loadClientHeaders());
	}

	/**
	 * Surprisingly returns the client IP address.
	 * 
	 * @return string
	 */
	public static function getClientIP () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:107: characters 10-32
		return $_SERVER["REMOTE_ADDR"];
	}

	/**
	 * Returns an hashtable of all Cookies sent by the client.
	 * Modifying the hashtable will not modify the cookie, use `php.Web.setCookie()`
	 * instead.
	 * 
	 * @return StringMap
	 */
	public static function getCookies () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:337: characters 3-45
		return Lib::hashOfAssociativeArray($_COOKIE);
	}

	/**
	 * Get the current script directory in the local filesystem.
	 * 
	 * @return string
	 */
	public static function getCwd () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:369: characters 3-51
		return (dirname($_SERVER["SCRIPT_FILENAME"])??'null') . "/";
	}

	/**
	 * Returns the local server host name.
	 * 
	 * @return string
	 */
	public static function getHostName () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:100: characters 10-32
		return $_SERVER["SERVER_NAME"];
	}

	/**
	 * Get the HTTP method used by the client.
	 * 
	 * @return string
	 */
	public static function getMethod () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:470: lines 470-473
		if (isset($_SERVER["REQUEST_METHOD"])) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:471: characters 11-36
			return $_SERVER["REQUEST_METHOD"];
		} else {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:473: characters 4-15
			return null;
		}
	}

	/**
	 * Get the multipart parameters as an hashtable. The data
	 * cannot exceed the maximum size specified.
	 * 
	 * @param int $maxSize
	 * 
	 * @return StringMap
	 */
	public static function getMultipart ($maxSize) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:377: characters 3-35
		$h = new StringMap();
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:378: characters 3-28
		$buf = null;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:379: characters 3-22
		$curname = null;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:380: lines 380-393
		Web::parseMultipart(function ($p, $_)  use (&$buf, &$maxSize, &$curname, &$h) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:381: lines 381-382
			if ($curname !== null) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:382: characters 5-35
				$h->data[$curname] = $buf->b;
			}
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:383: characters 4-15
			$curname = $p;
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:384: characters 4-25
			$buf = new StringBuf();
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:385: characters 4-31
			$maxSize -= strlen($p);
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:386: lines 386-387
			if ($maxSize < 0) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:387: characters 5-10
				throw new HxException("Maximum size reached");
			}
		}, function ($str, $pos, $len)  use (&$buf, &$maxSize) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:389: characters 4-18
			$maxSize -= $len;
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:390: lines 390-391
			if ($maxSize < 0) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:391: characters 5-10
				throw new HxException("Maximum size reached");
			}
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:392: characters 4-40
			$s = $str->toString();
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:392: characters 4-7
			$buf1 = $buf;
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:392: characters 4-40
			$buf1->b = ($buf1->b??'null') . (mb_substr($s, $pos, $len)??'null');

		});
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:394: lines 394-395
		if ($curname !== null) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:395: characters 4-34
			$h->data[$curname] = $buf->b;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:396: characters 3-11
		return $h;
	}

	/**
	 * Returns an Array of Strings built using GET / POST values.
	 * If you have in your URL the parameters `a[]=foo;a[]=hello;a[5]=bar;a[3]=baz` then
	 * `php.Web.getParamValues("a")` will return `["foo","hello",null,"baz",null,"bar"]`.
	 * 
	 * @param string $param
	 * 
	 * @return Array_hx
	 */
	public static function getParamValues ($param) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:62: characters 3-78
		$reg = new EReg("^" . ($param??'null') . "(\\[|%5B)([0-9]*?)(\\]|%5D)=(.*?)\$", "");
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:63: characters 3-33
		$res = new Array_hx();
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:64: lines 64-77
		$explore = function ($data)  use (&$reg, &$res) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:65: lines 65-66
			if (($data === null) || (strlen($data) === 0)) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:66: characters 5-11
				return;
			}
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:67: lines 67-76
			$_g = 0;
			$_g1 = HxString::split($data, "&");
			while ($_g < $_g1->length) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:67: characters 9-13
				$part = ($_g1->arr[$_g] ?? null);
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:67: lines 67-76
				++$_g;
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:68: lines 68-75
				if ($reg->match($part)) {
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:69: characters 6-31
					$idx = $reg->matched(2);
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:70: characters 6-54
					$val = urldecode($reg->matched(4));
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:71: lines 71-74
					if ($idx === "") {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:72: characters 7-20
						$res->arr[$res->length] = $val;
						++$res->length;
					} else {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:74: characters 11-28
						$explore1 = Std::parseInt($idx);
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:74: characters 7-35
						$res->offsetSet($explore1, $val);
					}
				}
			}

		};
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:78: characters 3-60
		$explore(StringTools::replace(Web::getParamsString(), ";", "&"));
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:79: characters 3-25
		$explore(Web::getPostData());
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:81: lines 81-89
		if ($res->length === 0) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:82: characters 4-76
			$post = Lib::hashOfAssociativeArray($_POST);
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:83: characters 4-31
			$data1 = ($post->data[$param] ?? null);
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:84: lines 84-88
			if (is_array($data1)) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:85: lines 85-87
				$collection = $data1;
				foreach ($collection as $key => $value) {
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:86: characters 6-22
					$res->offsetSet($key, $value);
				}
			}
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:91: lines 91-92
		if ($res->length === 0) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:92: characters 4-15
			return null;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:93: characters 3-13
		return $res;
	}

	/**
	 * Returns the GET and POST parameters.
	 * 
	 * @return StringMap
	 */
	public static function getParams () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:52: characters 3-62
		return Lib::hashOfAssociativeArray(array_merge($_GET, $_POST));
	}

	/**
	 * Returns all the GET parameters `String`
	 * 
	 * @return string
	 */
	public static function getParamsString () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:303: lines 303-306
		if (isset($_SERVER["QUERY_STRING"])) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:304: characters 11-34
			return $_SERVER["QUERY_STRING"];
		} else {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:306: characters 4-13
			return "";
		}
	}

	/**
	 * Returns all the POST data. POST Data is always parsed as
	 * being application/x-www-form-urlencoded and is stored into
	 * the getParams hashtable. POST Data is maximimized to 256K
	 * unless the content type is multipart/form-data. In that
	 * case, you will have to use `php.Web.getMultipart()` or
	 * `php.Web.parseMultipart()` methods.
	 * 
	 * @return string
	 */
	public static function getPostData () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:318: characters 3-37
		$h = fopen("php://input", "r");
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:319: characters 3-20
		$bsize = 8192;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:320: characters 3-16
		$max = 32;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:321: characters 3-26
		$data = null;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:322: characters 3-19
		$counter = 0;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:323: lines 323-326
		while (!feof($h) && ($counter < $max)) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:324: characters 11-47
			$data = ($data . fread($h, $bsize));
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:325: characters 4-13
			++$counter;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:327: characters 3-12
		fclose($h);
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:328: characters 3-14
		return $data;
	}

	/**
	 * Returns the original request URL (before any server internal redirections).
	 * 
	 * @return string
	 */
	public static function getURI () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:114: characters 3-41
		$s = $_SERVER["REQUEST_URI"];
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:115: characters 3-25
		return (HxString::split($s, "?")->arr[0] ?? null);
	}

	/**
	 * Based on https://github.com/ralouphie/getallheaders
	 * 
	 * @return StringMap
	 */
	public static function loadClientHeaders () {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:239: lines 239-240
		if (Web::$_clientHeaders !== null) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:240: characters 4-25
			return Web::$_clientHeaders;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:242: characters 3-29
		Web::$_clientHeaders = new StringMap();
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:244: lines 244-249
		if (function_exists("getallheaders")) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:245: lines 245-247
			$collection = getallheaders();
			foreach ($collection as $key => $value) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:246: characters 5-82
				$this1 = Web::$_clientHeaders;
				$key1 = str_replace("-", "_", strtoupper($key));
				$value1 = Std::string($value);
				$this1->data[$key1] = $value1;

			}

			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:248: characters 4-25
			return Web::$_clientHeaders;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:251: lines 251-255
		$copyServer = [
			"CONTENT_TYPE" => "Content-Type",
			"CONTENT_LENGTH" => "Content-Length",
			"CONTENT_MD5" => "Content-Md5",
		];
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:256: lines 256-265
		$collection1 = $_SERVER;
		foreach ($collection1 as $key2 => $value2) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:257: lines 257-264
			$key3 = $key2;
			$value3 = $value2;
			if (substr($key3, 0, 5) === "HTTP_") {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:258: characters 5-25
				$key3 = substr($key3, 5);
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:259: lines 259-261
				if (!isset($copyServer[$key3]) || !isset($_SERVER[$key3])) {
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:260: characters 6-45
					$this2 = Web::$_clientHeaders;
					$v = Std::string($value3);
					$this2->data[$key3] = $v;
				}
			} else if (isset($copyServer[$key3])) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:263: characters 5-44
				$this3 = Web::$_clientHeaders;
				$v1 = Std::string($value3);
				$this3->data[$key3] = $v1;
			}

		}

		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:266: lines 266-275
		if (!array_key_exists("AUTHORIZATION", Web::$_clientHeaders->data)) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:267: lines 267-274
			if (isset($_SERVER["REDIRECT_HTTP_AUTHORIZATION"])) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:268: characters 5-89
				$this4 = Web::$_clientHeaders;
				$v2 = Std::string($_SERVER["REDIRECT_HTTP_AUTHORIZATION"]);
				$this4->data["AUTHORIZATION"] = $v2;
			} else if (isset($_SERVER["PHP_AUTH_USER"])) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:270: characters 5-94
				$basic_pass = (isset($_SERVER["PHP_AUTH_PW"]) ? Std::string($_SERVER["PHP_AUTH_PW"]) : "");
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:271: characters 5-108
				$this5 = Web::$_clientHeaders;
				$v3 = "Basic " . (base64_encode((Std::string($_SERVER["PHP_AUTH_USER"])??'null') . ":" . ($basic_pass??'null'))??'null');
				$this5->data["AUTHORIZATION"] = $v3;

			} else if (isset($_SERVER["PHP_AUTH_DIGEST"])) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:273: characters 5-77
				$this6 = Web::$_clientHeaders;
				$v4 = Std::string($_SERVER["PHP_AUTH_DIGEST"]);
				$this6->data["AUTHORIZATION"] = $v4;
			}
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:277: characters 3-24
		return Web::$_clientHeaders;
	}

	/**
	 * Parse the multipart data. Call `onPart` when a new part is found
	 * with the part name and the filename if present
	 * and `onData` when some part data is readed. You can this way
	 * directly save the data on hard drive in the case of a file upload.
	 * 
	 * @param \Closure $onPart
	 * @param \Closure $onData
	 * 
	 * @return void
	 */
	public static function parseMultipart ($onPart, $onData) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:406: lines 406-409
		$collection = $_POST;
		foreach ($collection as $key => $value) {
			$value1 = $value;
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:407: characters 4-19
			$onPart($key, "");
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:408: characters 11-32
			$s = $value1;
			$tmp = strlen($s);
			$tmp1 = new Bytes($tmp, new Container($s));
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:408: characters 37-50
			$tmp2 = strlen($value1);
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:408: characters 4-51
			$onData($tmp1, 0, $tmp2);

		}

		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:411: lines 411-412
		if (!isset($_FILES)) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:412: characters 4-10
			return;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:413: lines 413-455
		$collection1 = $_FILES;
		foreach ($collection1 as $key1 => $value2) {
			unset($part);
			$part = $key1;
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:414: lines 414-447
			$handleFile = function ($tmp3, $file, $err)  use (&$onData, &$part, &$onPart) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:415: characters 5-29
				$fileUploaded = true;
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:416: lines 416-433
				if ($err > 0) {
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:417: lines 417-432
					if ($err === 1) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:419: characters 8-13
						throw new HxException("The uploaded file exceeds the max size of " . (ini_get("upload_max_filesize")??'null'));
					} else if ($err === 2) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:421: characters 8-13
						throw new HxException("The uploaded file exceeds the max file size directive specified in the HTML form (max is" . (ini_get("post_max_size")??'null') . ")");
					} else if ($err === 3) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:423: characters 8-13
						throw new HxException("The uploaded file was only partially uploaded");
					} else if ($err === 4) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:425: characters 8-20
						$fileUploaded = false;
					} else if ($err === 6) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:427: characters 8-13
						throw new HxException("Missing a temporary folder");
					} else if ($err === 7) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:429: characters 8-13
						throw new HxException("Failed to write file to disk");
					} else if ($err === 8) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:431: characters 8-13
						throw new HxException("File upload stopped by extension");
					}
				}
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:434: lines 434-446
				if ($fileUploaded) {
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:435: characters 6-24
					$onPart($part, $file);
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:436: lines 436-445
					if ("" !== $file) {
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:437: characters 7-31
						$h = fopen($tmp3, "r");
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:438: characters 7-24
						$bsize = 8192;
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:439: lines 439-443
						while (!feof($h)) {
							#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:440: characters 8-41
							$buf = fread($h, $bsize);
							#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:441: characters 8-35
							$size = strlen($buf);
							#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:442: characters 15-34
							$handleFile1 = strlen($buf);
							#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:442: characters 8-44
							$onData(new Bytes($handleFile1, new Container($buf)), 0, $size);
						}
						#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:444: characters 7-16
						fclose($h);
					}
				}
			};
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:448: lines 448-454
			if (is_array($value2["name"])) {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:449: characters 19-43
				$data = array_keys($value2["name"]);
				$_g_current = 0;
				$_g_length = count($data);
				$_g_data = $data;
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:449: lines 449-451
				while ($_g_current < $_g_length) {
					$index = $_g_data[$_g_current++];
					#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:450: characters 6-84
					$handleFile($value2["tmp_name"][$index], $value2["name"][$index], $value2["error"][$index]);
				}
			} else {
				#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:453: characters 5-62
				$handleFile($value2["tmp_name"], $value2["name"], $value2["error"]);
			}

		}

	}

	/**
	 * Tell the client to redirect to the given url ("Location" header).
	 * 
	 * @param string $url
	 * 
	 * @return void
	 */
	public static function redirect ($url) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:122: characters 3-29
		header("Location: " . ($url??'null'));
	}

	/**
	 * Set a Cookie value in the HTTP headers. Same remark as `php.Web.setHeader()`.
	 * 
	 * @param string $key
	 * @param string $value
	 * @param Date $expire
	 * @param string $domain
	 * @param string $path
	 * @param bool $secure
	 * @param bool $httpOnly
	 * 
	 * @return void
	 */
	public static function setCookie ($key, $value, $expire = null, $domain = null, $path = null, $secure = null, $httpOnly = null) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:344: characters 3-67
		$t = ($expire === null ? 0 : (int)(($expire->getTime() / 1000.0)));
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:345: lines 345-346
		if ($path === null) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:346: characters 4-14
			$path = "/";
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:347: lines 347-348
		if ($domain === null) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:348: characters 4-15
			$domain = "";
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:349: lines 349-350
		if ($secure === null) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:350: characters 4-18
			$secure = false;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:351: lines 351-352
		if ($httpOnly === null) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:352: characters 4-20
			$httpOnly = false;
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:353: characters 3-59
		setcookie($key, $value, $t, $path, $domain, $secure, $httpOnly);
	}

	/**
	 * Set an output header value. If some data have been printed, the headers have
	 * already been sent so this will raise an exception.
	 * 
	 * @param string $h
	 * @param string $v
	 * 
	 * @return void
	 */
	public static function setHeader ($h, $v) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:130: characters 3-19
		header("" . ($h??'null') . ": " . ($v??'null'));
	}

	/**
	 * Set the HTTP return code. Same remark as `php.Web.setHeader()`.
	 * See status code explanation here: http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
	 * 
	 * @param int $r
	 * 
	 * @return void
	 */
	public static function setReturnCode ($r) {
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:138: characters 3-19
		$code = null;
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:139: lines 139-222
		if ($r === 100) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:141: characters 5-26
			$code = "100 Continue";
		} else if ($r === 101) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:143: characters 5-37
			$code = "101 Switching Protocols";
		} else if ($r === 200) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:145: characters 5-20
			$code = "200 OK";
		} else if ($r === 201) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:147: characters 5-25
			$code = "201 Created";
		} else if ($r === 202) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:149: characters 5-26
			$code = "202 Accepted";
		} else if ($r === 203) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:151: characters 5-47
			$code = "203 Non-Authoritative Information";
		} else if ($r === 204) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:153: characters 5-28
			$code = "204 No Content";
		} else if ($r === 205) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:155: characters 5-31
			$code = "205 Reset Content";
		} else if ($r === 206) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:157: characters 5-33
			$code = "206 Partial Content";
		} else if ($r === 300) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:159: characters 5-34
			$code = "300 Multiple Choices";
		} else if ($r === 301) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:161: characters 5-35
			$code = "301 Moved Permanently";
		} else if ($r === 302) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:163: characters 5-23
			$code = "302 Found";
		} else if ($r === 303) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:165: characters 5-27
			$code = "303 See Other";
		} else if ($r === 304) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:167: characters 5-30
			$code = "304 Not Modified";
		} else if ($r === 305) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:169: characters 5-27
			$code = "305 Use Proxy";
		} else if ($r === 307) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:171: characters 5-36
			$code = "307 Temporary Redirect";
		} else if ($r === 400) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:173: characters 5-29
			$code = "400 Bad Request";
		} else if ($r === 401) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:175: characters 5-30
			$code = "401 Unauthorized";
		} else if ($r === 402) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:177: characters 5-34
			$code = "402 Payment Required";
		} else if ($r === 403) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:179: characters 5-27
			$code = "403 Forbidden";
		} else if ($r === 404) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:181: characters 5-27
			$code = "404 Not Found";
		} else if ($r === 405) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:183: characters 5-36
			$code = "405 Method Not Allowed";
		} else if ($r === 406) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:185: characters 5-32
			$code = "406 Not Acceptable";
		} else if ($r === 407) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:187: characters 5-47
			$code = "407 Proxy Authentication Required";
		} else if ($r === 408) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:189: characters 5-33
			$code = "408 Request Timeout";
		} else if ($r === 409) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:191: characters 5-26
			$code = "409 Conflict";
		} else if ($r === 410) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:193: characters 5-22
			$code = "410 Gone";
		} else if ($r === 411) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:195: characters 5-33
			$code = "411 Length Required";
		} else if ($r === 412) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:197: characters 5-37
			$code = "412 Precondition Failed";
		} else if ($r === 413) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:199: characters 5-42
			$code = "413 Request Entity Too Large";
		} else if ($r === 414) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:201: characters 5-38
			$code = "414 Request-URI Too Long";
		} else if ($r === 415) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:203: characters 5-40
			$code = "415 Unsupported Media Type";
		} else if ($r === 416) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:205: characters 5-49
			$code = "416 Requested Range Not Satisfiable";
		} else if ($r === 417) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:207: characters 5-36
			$code = "417 Expectation Failed";
		} else if ($r === 500) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:209: characters 5-39
			$code = "500 Internal Server Error";
		} else if ($r === 501) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:211: characters 5-33
			$code = "501 Not Implemented";
		} else if ($r === 502) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:213: characters 5-29
			$code = "502 Bad Gateway";
		} else if ($r === 503) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:215: characters 5-37
			$code = "503 Service Unavailable";
		} else if ($r === 504) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:217: characters 5-33
			$code = "504 Gateway Timeout";
		} else if ($r === 505) {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:219: characters 5-44
			$code = "505 HTTP Version Not Supported";
		} else {
			#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:221: characters 5-25
			$code = Std::string($r);
		}
		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:223: characters 3-38
		header("HTTP/1.1 " . ($code??'null'), true, $r);
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

		#/home/runner/haxe/versions/4.0.5/std/php/Web.hx:479: characters 3-27
		Web::$isModNeko = 0 !== strncasecmp(PHP_SAPI, "cli", 3);

	}
}

Boot::registerClass(Web::class, 'php.Web');
Web::__hx__init();
