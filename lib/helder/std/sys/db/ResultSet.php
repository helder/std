<?php
/**
 * Generated by Haxe 4.1.1
 */

namespace helder\std\sys\db;

use \helder\std\php\Boot;
use \helder\std\Array_hx;
use \helder\std\haxe\ds\List_hx;

interface ResultSet {
	/**
	 * @return Array_hx
	 */
	public function getFieldsNames () ;

	/**
	 * @param int $n
	 * 
	 * @return float
	 */
	public function getFloatResult ($n) ;

	/**
	 * @param int $n
	 * 
	 * @return int
	 */
	public function getIntResult ($n) ;

	/**
	 * @param int $n
	 * 
	 * @return string
	 */
	public function getResult ($n) ;

	/**
	 * @return int
	 */
	public function get_length () ;

	/**
	 * @return int
	 */
	public function get_nfields () ;

	/**
	 * @return bool
	 */
	public function hasNext () ;

	/**
	 * @return mixed
	 */
	public function next () ;

	/**
	 * @return List_hx
	 */
	public function results () ;
}

Boot::registerClass(ResultSet::class, 'sys.db.ResultSet');
Boot::registerGetters('helder\\std\\sys\\db\\ResultSet', [
	'nfields' => true,
	'length' => true
]);
