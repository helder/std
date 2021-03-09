<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\haxe\ds;

use \helder\std\php\Boot;
use \helder\std\Array_hx;

/**
 * ArraySort provides a stable implementation of merge sort through its `sort`
 * method. It should be used instead of `Array.sort` in cases where the order
 * of equal elements has to be retained on all targets.
 */
class ArraySort {
	/**
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * @param int $i
	 * @param int $j
	 * 
	 * @return int
	 */
	public static function compare ($a, $cmp, $i, $j) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:160: characters 3-25
		return $cmp(($a->arr[$i] ?? null), ($a->arr[$j] ?? null));
	}

	/**
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * @param int $from
	 * @param int $pivot
	 * @param int $to
	 * @param int $len1
	 * @param int $len2
	 * 
	 * @return void
	 */
	public static function doMerge ($a, $cmp, $from, $pivot, $to, $len1, $len2) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:69: characters 3-52
		$first_cut = null;
		$second_cut = null;
		$len11 = null;
		$len22 = null;
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:70: lines 70-71
		if (($len1 === 0) || ($len2 === 0)) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:71: characters 4-10
			return;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:72: lines 72-76
		if (($len1 + $len2) === 2) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:73: lines 73-74
			if ($cmp(($a->arr[$pivot] ?? null), ($a->arr[$from] ?? null)) < 0) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:74: characters 5-25
				ArraySort::swap($a, $pivot, $from);
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:75: characters 4-10
			return;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:77: lines 77-87
		if ($len1 > $len2) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:78: characters 4-21
			$len11 = $len1 >> 1;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:79: characters 4-28
			$first_cut = $from + $len11;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:80: characters 4-52
			$second_cut = ArraySort::lower($a, $cmp, $pivot, $to, $first_cut);
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:81: characters 4-30
			$len22 = $second_cut - $pivot;
		} else {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:83: characters 4-21
			$len22 = $len2 >> 1;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:84: characters 4-30
			$second_cut = $pivot + $len22;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:85: characters 4-54
			$first_cut = ArraySort::upper($a, $cmp, $from, $pivot, $second_cut);
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:86: characters 4-28
			$len11 = $first_cut - $from;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:88: characters 3-47
		ArraySort::rotate($a, $cmp, $first_cut, $pivot, $second_cut);
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:69: characters 3-52
		$new_mid = $first_cut + $len22;
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:90: characters 3-58
		ArraySort::doMerge($a, $cmp, $from, $first_cut, $new_mid, $len11, $len22);
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:91: characters 3-71
		ArraySort::doMerge($a, $cmp, $new_mid, $second_cut, $to, $len1 - $len11, $len2 - $len22);
	}

	/**
	 * @param int $m
	 * @param int $n
	 * 
	 * @return int
	 */
	public static function gcd ($m, $n) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:116: lines 116-120
		while ($n !== 0) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:117: characters 4-18
			$t = $m % $n;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:118: characters 4-9
			$m = $n;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:119: characters 4-9
			$n = $t;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:121: characters 3-11
		return $m;
	}

	/**
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * @param int $from
	 * @param int $to
	 * @param int $val
	 * 
	 * @return int
	 */
	public static function lower ($a, $cmp, $from, $to, $val) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:140: characters 3-34
		$len = $to - $from;
		$half = null;
		$mid = null;
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:141: lines 141-149
		while ($len > 0) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:142: characters 4-19
			$half = $len >> 1;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:143: characters 4-21
			$mid = $from + $half;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:144: lines 144-148
			if ($cmp(($a->arr[$mid] ?? null), ($a->arr[$val] ?? null)) < 0) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:145: characters 5-19
				$from = $mid + 1;
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:146: characters 5-25
				$len = $len - $half - 1;
			} else {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:148: characters 5-15
				$len = $half;
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:150: characters 3-14
		return $from;
	}

	/**
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * @param int $from
	 * @param int $to
	 * 
	 * @return void
	 */
	public static function rec ($a, $cmp, $from, $to) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:47: characters 3-33
		$middle = ($from + $to) >> 1;
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:48: lines 48-62
		if (($to - $from) < 12) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:49: lines 49-50
			if ($to <= $from) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:50: characters 5-11
				return;
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:51: characters 14-24
			$_g = $from + 1;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:51: characters 27-29
			$_g1 = $to;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:51: lines 51-60
			while ($_g < $_g1) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:51: characters 14-29
				$i = $_g++;
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:52: characters 5-15
				$j = $i;
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:53: lines 53-59
				while ($j > $from) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:54: lines 54-57
					if ($cmp(($a->arr[$j] ?? null), ($a->arr[$j - 1] ?? null)) < 0) {
						#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:55: characters 7-24
						ArraySort::swap($a, $j - 1, $j);
					} else {
						#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:57: characters 7-12
						break;
					}
					#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:58: characters 6-9
					--$j;
				}
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:61: characters 4-10
			return;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:63: characters 3-28
		ArraySort::rec($a, $cmp, $from, $middle);
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:64: characters 3-26
		ArraySort::rec($a, $cmp, $middle, $to);
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:65: characters 3-64
		ArraySort::doMerge($a, $cmp, $from, $middle, $to, $middle - $from, $to - $middle);
	}

	/**
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * @param int $from
	 * @param int $mid
	 * @param int $to
	 * 
	 * @return void
	 */
	public static function rotate ($a, $cmp, $from, $mid, $to) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:96: lines 96-97
		if (($from === $mid) || ($mid === $to)) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:97: characters 4-10
			return;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:95: characters 3-9
		$n = ArraySort::gcd($to - $from, $mid - $from);
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:99: lines 99-112
		while ($n-- !== 0) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:100: characters 4-26
			$val = ($a->arr[$from + $n] ?? null);
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:101: characters 4-27
			$shift = $mid - $from;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:102: characters 4-45
			$p1 = $from + $n;
			$p2 = $from + $n + $shift;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:103: lines 103-110
			while ($p2 !== ($from + $n)) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:104: characters 5-18
				$a->offsetSet($p1, ($a->arr[$p2] ?? null));
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:105: characters 5-12
				$p1 = $p2;
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:106: lines 106-109
				if (($to - $p2) > $shift) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:107: characters 6-17
					$p2 += $shift;
				} else {
					#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:109: characters 6-37
					$p2 = $from + ($shift - ($to - $p2));
				}
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:111: characters 4-15
			$a->offsetSet($p1, $val);
		}
	}

	/**
	 * Sorts Array `a` according to the comparison function `cmp`, where
	 * `cmp(x,y)` returns 0 if `x == y`, a positive Int if `x > y` and a
	 * negative Int if `x < y`.
	 * This operation modifies Array `a` in place.
	 * This operation is stable: The order of equal elements is preserved.
	 * If `a` or `cmp` are null, the result is unspecified.
	 * 
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * 
	 * @return void
	 */
	public static function sort ($a, $cmp) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:43: characters 3-27
		ArraySort::rec($a, $cmp, 0, $a->length);
	}

	/**
	 * @param mixed[]|Array_hx $a
	 * @param int $i
	 * @param int $j
	 * 
	 * @return void
	 */
	public static function swap ($a, $i, $j) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:154: characters 3-18
		$tmp = ($a->arr[$i] ?? null);
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:155: characters 3-14
		$a->offsetSet($i, ($a->arr[$j] ?? null));
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:156: characters 3-13
		$a->offsetSet($j, $tmp);
	}

	/**
	 * @param mixed[]|Array_hx $a
	 * @param \Closure $cmp
	 * @param int $from
	 * @param int $to
	 * @param int $val
	 * 
	 * @return int
	 */
	public static function upper ($a, $cmp, $from, $to, $val) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:125: characters 3-34
		$len = $to - $from;
		$half = null;
		$mid = null;
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:126: lines 126-135
		while ($len > 0) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:127: characters 4-19
			$half = $len >> 1;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:128: characters 4-21
			$mid = $from + $half;
			#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:129: lines 129-134
			if ($cmp(($a->arr[$val] ?? null), ($a->arr[$mid] ?? null)) < 0) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:130: characters 5-15
				$len = $half;
			} else {
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:132: characters 5-19
				$from = $mid + 1;
				#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:133: characters 5-25
				$len = $len - $half - 1;
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/ds/ArraySort.hx:136: characters 3-14
		return $from;
	}
}

Boot::registerClass(ArraySort::class, 'haxe.ds.ArraySort');
