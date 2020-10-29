<?php
/**
 * Generated by Haxe 4.0.1
 */

namespace helder\std\haxe\ds\_ReadOnlyArray;

use \helder\std\php\Boot;
use \helder\std\Array_hx;

final class ReadOnlyArray_Impl_ {

	/**
	 * @param Array_hx $this
	 * @param int $i
	 * 
	 * @return mixed
	 */
	static public function get ($this1, $i) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/ReadOnlyArray.hx:44: characters 3-17
		return ($this1->arr[$i] ?? null);
	}

	/**
	 * @param Array_hx $this
	 * 
	 * @return int
	 */
	static public function get_length ($this1) {
		#/home/runner/haxe/versions/4.0.1/std/haxe/ds/ReadOnlyArray.hx:41: characters 3-21
		return $this1->length;
	}
}

Boot::registerClass(ReadOnlyArray_Impl_::class, 'haxe.ds._ReadOnlyArray.ReadOnlyArray_Impl_');
Boot::registerGetters('helder\\std\\haxe\\ds\\_ReadOnlyArray\\ReadOnlyArray_Impl_', [
	'length' => true
]);
