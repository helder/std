<?php
/**
 * Generated by Haxe 4.1.1
 */

namespace helder\std;

use \helder\std\php\Boot;
use \helder\std\php\_Boot\HxString;

/**
 * The Std class provides standard methods for manipulating basic types.
 */
class Std {
	/**
	 * Checks if object `value` is an instance of class or interface `c`.
	 * Compiles only if the type specified by `c` can be assigned to the type
	 * of `value`.
	 * This method checks if a downcast is possible. That is, if the runtime
	 * type of `value` is assignable to the type specified by `c`, `value` is
	 * returned. Otherwise null is returned.
	 * This method is not guaranteed to work with core types such as `String`,
	 * `Array` and `Date`.
	 * If `value` is null, the result is null. If `c` is null, the result is
	 * unspecified.
	 * 
	 * @param mixed $value
	 * @param Class $c
	 * 
	 * @return mixed
	 */
	public static function downcast ($value, $c) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:37: characters 10-58
		if (Boot::isOfType($value, $c)) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:37: characters 41-51
			return $value;
		} else {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:37: characters 54-58
			return null;
		}
	}

	/**
	 * @param mixed $value
	 * @param Class $c
	 * 
	 * @return mixed
	 */
	public static function instance ($value, $c) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:42: characters 10-58
		if (Boot::isOfType($value, $c)) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:42: characters 41-51
			return $value;
		} else {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:42: characters 54-58
			return null;
		}
	}

	/**
	 * Converts a `Float` to an `Int`, rounded towards 0.
	 * If `x` is outside of the signed Int32 range, or is `NaN`, `NEGATIVE_INFINITY` or `POSITIVE_INFINITY`, the result is unspecified.
	 * 
	 * @param float $x
	 * 
	 * @return int
	 */
	public static function int ($x) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:50: characters 3-23
		return (int)($x);
	}

	/**
	 * DEPRECATED. Use `Std.isOfType(v, t)` instead.
	 * Tells if a value `v` is of the type `t`. Returns `false` if `v` or `t` are null.
	 * If `t` is a class or interface with `@:generic` meta, the result is `false`.
	 * 
	 * @param mixed $v
	 * @param mixed $t
	 * 
	 * @return bool
	 */
	public static function is ($v, $t) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:29: characters 3-24
		return Boot::isOfType($v, $t);
	}

	/**
	 * @param int $charCode
	 * 
	 * @return bool
	 */
	public static function isDigitCode ($charCode) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:97: characters 10-74
		if (($charCode !== null) && ($charCode >= 48)) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:97: characters 54-74
			return $charCode <= 57;
		} else {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:97: characters 10-74
			return false;
		}
	}

	/**
	 * Tells if a value `v` is of the type `t`. Returns `false` if `v` or `t` are null.
	 * If `t` is a class or interface with `@:generic` meta, the result is `false`.
	 * 
	 * @param mixed $v
	 * @param mixed $t
	 * 
	 * @return bool
	 */
	public static function isOfType ($v, $t) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:33: characters 3-29
		return Boot::isOfType($v, $t);
	}

	/**
	 * Converts a `String` to a `Float`.
	 * The parsing rules for `parseInt` apply here as well, with the exception of invalid input
	 * resulting in a `NaN` value instead of null.
	 * Additionally, decimal notation may contain a single `.` to denote the start of the fractions.
	 * 
	 * @param string $x
	 * 
	 * @return float
	 */
	public static function parseFloat ($x) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:73: characters 3-35
		$result = floatval($x);
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:74: lines 74-75
		if (!Boot::equal($result, 0)) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:75: characters 4-17
			return $result;
		}
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:77: characters 3-22
		$x = ltrim($x);
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:78: characters 3-53
		$firstCharIndex = (mb_substr($x, 0, 1) === "-" ? 1 : 0);
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:79: characters 3-47
		$charCode = HxString::charCodeAt($x, $firstCharIndex);
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:81: lines 81-83
		if ($charCode === 46) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:82: characters 4-47
			$charCode = HxString::charCodeAt($x, $firstCharIndex + 1);
		}
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:85: lines 85-89
		if (($charCode !== null) && ($charCode >= 48) && ($charCode <= 57)) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:86: characters 4-14
			return 0.0;
		} else {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:88: characters 4-20
			return NAN;
		}
	}

	/**
	 * Converts a `String` to an `Int`.
	 * Leading whitespaces are ignored.
	 * If `x` starts with 0x or 0X, hexadecimal notation is recognized where the following digits may
	 * contain 0-9 and A-F.
	 * Otherwise `x` is read as decimal number with 0-9 being allowed characters. `x` may also start with
	 * a - to denote a negative value.
	 * In decimal mode, parsing continues until an invalid character is detected, in which case the
	 * result up to that point is returned. For hexadecimal notation, the effect of invalid characters
	 * is unspecified.
	 * Leading 0s that are not part of the 0x/0X hexadecimal notation are ignored, which means octal
	 * notation is not supported.
	 * If `x` is null, the result is unspecified.
	 * If `x` cannot be parsed as integer, the result is `null`.
	 * 
	 * @param string $x
	 * 
	 * @return int
	 */
	public static function parseInt ($x) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:54: lines 54-69
		if (is_numeric($x)) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:55: characters 4-31
			return intval($x, 10);
		} else {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:57: characters 4-23
			$x = ltrim($x);
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:58: characters 4-54
			$firstCharIndex = (mb_substr($x, 0, 1) === "-" ? 1 : 0);
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:59: characters 4-53
			$firstCharCode = HxString::charCodeAt($x, $firstCharIndex);
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:60: lines 60-62
			if (!(($firstCharCode !== null) && ($firstCharCode >= 48) && ($firstCharCode <= 57))) {
				#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:61: characters 5-16
				return null;
			}
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:63: characters 21-49
			$index = $firstCharIndex + 1;
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:63: characters 4-50
			$secondChar = ($index < 0 ? "" : mb_substr($x, $index, 1));
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:64: lines 64-68
			if (($secondChar === "x") || ($secondChar === "X")) {
				#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:65: characters 5-31
				return intval($x, 0);
			} else {
				#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:67: characters 5-32
				return intval($x, 10);
			}
		}
	}

	/**
	 * Return a random integer between 0 included and `x` excluded.
	 * If `x <= 1`, the result is always 0.
	 * 
	 * @param int $x
	 * 
	 * @return int
	 */
	public static function random ($x) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:93: characters 10-47
		if ($x <= 1) {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:93: characters 19-20
			return 0;
		} else {
			#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:93: characters 23-47
			return mt_rand(0, $x - 1);
		}
	}

	/**
	 * Converts any value to a String.
	 * If `s` is of `String`, `Int`, `Float` or `Bool`, its value is returned.
	 * If `s` is an instance of a class and that class or one of its parent classes has
	 * a `toString` method, that method is called. If no such method is present, the result
	 * is unspecified.
	 * If `s` is an enum constructor without argument, the constructor's name is returned. If
	 * arguments exists, the constructor's name followed by the String representations of
	 * the arguments is returned.
	 * If `s` is a structure, the field names along with their values are returned. The field order
	 * and the operator separating field names and values are unspecified.
	 * If s is null, "null" is returned.
	 * 
	 * @param mixed $s
	 * 
	 * @return string
	 */
	public static function string ($s) {
		#/home/runner/haxe/versions/4.1.1/std/php/_std/Std.hx:46: characters 3-27
		return Boot::stringify($s);
	}
}

Boot::registerClass(Std::class, 'Std');
