<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\sys\db\_Sqlite;

use \helder\std\php\Boot;
use \helder\std\Array_hx;
use \helder\std\sys\db\ResultSet;
use \helder\std\haxe\ds\List_hx;

class SQLiteResultSet implements ResultSet {
	/**
	 * @var object[]
	 */
	public $cache;
	/**
	 * @var array
	 */
	public $fieldsInfo;
	/**
	 * @var int
	 */
	public $length;
	/**
	 * @var int
	 */
	public $nfields;
	/**
	 * @var \SQLite3Result
	 */
	public $result;
	/**
	 * @var bool
	 */
	public $resultIsDepleted;

	/**
	 * @param \SQLite3Result $result
	 * 
	 * @return void
	 */
	public function __construct ($result) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:100: characters 25-30
		$this->resultIsDepleted = false;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:98: characters 14-42
		$this->cache = [];
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:104: characters 3-23
		$this->result = $result;
	}

	/**
	 * @return object[]
	 */
	public function cacheAll () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:135: characters 3-25
		$row = $this->fetchNext();
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:136: lines 136-139
		while ($row !== null) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:137: characters 4-19
			$this->cache[] = $row;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:138: characters 4-21
			$row = $this->fetchNext();
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:140: characters 3-15
		return $this->cache;
	}

	/**
	 * @param array $row
	 * 
	 * @return array
	 */
	public function correctArrayTypes ($row) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:185: lines 185-191
		$_gthis = $this;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:186: characters 20-35
		if ($this->fieldsInfo === null) {
			$this->fieldsInfo = [];
			$_g = 0;
			$_g1 = $this->get_nfields();
			while ($_g < $_g1) {
				$i = $_g++;
				$key = $this->result->columnName($i);
				$val = $this->result->columnType($i);
				$this->fieldsInfo[$key] = $val;
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:186: characters 3-36
		$fieldsInfo = $this->fieldsInfo;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:187: lines 187-189
		foreach ($row as $key => $value) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:188: characters 4-54
			$row[$key] = $_gthis->correctType($value, $fieldsInfo[$key]);
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:190: characters 3-18
		return $row;
	}

	/**
	 * @param string $value
	 * @param int $type
	 * 
	 * @return mixed
	 */
	public function correctType ($value, $type) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:204: lines 204-205
		if ($value === null) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:205: characters 4-15
			return null;
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:206: lines 206-207
		if ($type === \SQLITE3_INTEGER) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:207: characters 4-28
			return (int)($value);
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:208: lines 208-209
		if ($type === \SQLITE3_FLOAT) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:209: characters 4-30
			return (float)($value);
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:210: characters 3-15
		return $value;
	}

	/**
	 * @return object
	 */
	public function current () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:173: characters 17-29
		$_g = \reset($this->cache);
		if ($_g === false) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:175: characters 12-18
			$_g1 = $this->next();
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:176: lines 176-179
			if ($_g1 === null) {
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:176: characters 17-21
				return null;
			} else {
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:177: characters 11-14
				$row = $_g1;
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:178: characters 7-22
				$this->cache[] = $row;
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:179: characters 7-10
				return $row;
			}
		} else {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:181: characters 9-12
			$row = $_g;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:181: characters 14-17
			return $row;
		}
	}

	/**
	 * @return object
	 */
	public function fetchNext () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:124: lines 124-131
		if ($this->resultIsDepleted) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:124: characters 29-33
			return null;
		} else {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:124: characters 43-81
			$_g = $this->result->fetchArray(\SQLITE3_ASSOC);
			if ($_g === false) {
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:126: characters 5-28
				$this->resultIsDepleted = true;
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:127: characters 5-22
				$this->result->finalize();
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:128: characters 5-9
				return null;
			} else {
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:129: characters 9-12
				$row = $_g;
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:130: characters 5-44
				return Boot::createAnon($this->correctArrayTypes($row));
			}
		}
	}

	/**
	 * @param int $n
	 * 
	 * @return mixed
	 */
	public function getColumn ($n) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:152: characters 10-50
		return \array_values(((array)($this->current())))[$n];
	}

	/**
	 * @return array
	 */
	public function getFieldsInfo () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:194: lines 194-199
		if ($this->fieldsInfo === null) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:195: characters 4-40
			$this->fieldsInfo = [];
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:196: characters 14-18
			$_g = 0;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:196: characters 18-25
			$_g1 = $this->get_nfields();
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:196: lines 196-198
			while ($_g < $_g1) {
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:196: characters 14-25
				$i = $_g++;
				#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:197: characters 5-60
				$key = $this->result->columnName($i);
				$val = $this->result->columnType($i);
				$this->fieldsInfo[$key] = $val;
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:200: characters 3-20
		return $this->fieldsInfo;
	}

	/**
	 * @return string[]|Array_hx
	 */
	public function getFieldsNames () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:168: characters 20-35
		if ($this->fieldsInfo === null) {
			$this->fieldsInfo = [];
			$_g = 0;
			$_g1 = $this->get_nfields();
			while ($_g < $_g1) {
				$i = $_g++;
				$key = $this->result->columnName($i);
				$val = $this->result->columnType($i);
				$this->fieldsInfo[$key] = $val;
			}
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:168: characters 3-36
		$fieldsInfo = $this->fieldsInfo;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:169: characters 3-39
		return Array_hx::wrap(\array_keys($fieldsInfo));
	}

	/**
	 * @param int $n
	 * 
	 * @return float
	 */
	public function getFloatResult ($n) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:164: characters 10-36
		return (float)($this->getColumn($n));
	}

	/**
	 * @param int $n
	 * 
	 * @return int
	 */
	public function getIntResult ($n) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:160: characters 10-34
		return (int)($this->getColumn($n));
	}

	/**
	 * @param int $n
	 * 
	 * @return string
	 */
	public function getResult ($n) {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:156: characters 10-37
		return (string)($this->getColumn($n));
	}

	/**
	 * @return int
	 */
	public function get_length () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:214: characters 3-27
		return \count($this->cacheAll());
	}

	/**
	 * @return int
	 */
	public function get_nfields () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:217: characters 3-29
		return $this->result->numColumns();
	}

	/**
	 * @return bool
	 */
	public function hasNext () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:108: characters 17-23
		$_g = $this->next();
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:109: lines 109-112
		if ($_g === null) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:109: characters 15-20
			return false;
		} else {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:110: characters 9-12
			$row = $_g;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:111: characters 5-30
			\array_unshift($this->cache, $row);
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:112: characters 5-8
			return $row;
		}
	}

	/**
	 * @return mixed
	 */
	public function next () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:117: characters 17-35
		$_g = \array_shift($this->cache);
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:118: lines 118-119
		if ($_g === null) {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:118: characters 15-26
			return $this->fetchNext();
		} else {
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:119: characters 9-12
			$row = $_g;
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:119: characters 14-17
			return $row;
		}
	}

	/**
	 * @return List_hx
	 */
	public function results () {
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:144: characters 3-25
		$list = new List_hx();
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:145: characters 14-24
		$data = $this->cacheAll();
		$_g_current = 0;
		$_g_length = \count($data);
		$_g_data = $data;
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:145: lines 145-147
		while ($_g_current < $_g_length) {
			$row = $_g_data[$_g_current++];
			#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:146: characters 4-17
			$list->add($row);
		}
		#/home/runner/haxe/versions/4.2.0/std/php/_std/sys/db/Sqlite.hx:148: characters 3-14
		return $list;
	}
}

Boot::registerClass(SQLiteResultSet::class, 'sys.db._Sqlite.SQLiteResultSet');
Boot::registerGetters('helder\\std\\sys\\db\\_Sqlite\\SQLiteResultSet', [
	'nfields' => true,
	'length' => true
]);
