<?php
/**
 * Generated by Haxe 4.2.0
 */

namespace helder\std\haxe;

use \helder\std\php\Boot;

class MainLoop {
	/**
	 * @var MainEvent
	 */
	static public $pending;

	/**
	 * Add a pending event to be run into the main loop.
	 * 
	 * @param \Closure $f
	 * @param int $priority
	 * 
	 * @return MainEvent
	 */
	public static function add ($f, $priority = 0) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:99: lines 99-110
		if ($priority === null) {
			$priority = 0;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:100: lines 100-101
		if ($f === null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:101: characters 4-9
			throw Exception::thrown("Event function is null");
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:102: characters 3-38
		$e = new MainEvent($f, $priority);
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:103: characters 3-22
		$head = MainLoop::$pending;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:104: lines 104-105
		if ($head !== null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:105: characters 4-17
			$head->prev = $e;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:106: characters 3-16
		$e->next = $head;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:107: characters 3-14
		MainLoop::$pending = $e;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:108: characters 3-25
		MainLoop::injectIntoEventLoop(0);
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:109: characters 3-11
		return $e;
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public static function addThread ($f) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:89: characters 3-26
		EntryPoint::addThread($f);
	}

	/**
	 * @return int
	 */
	public static function get_threadCount () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:76: characters 3-32
		return EntryPoint::$threadCount;
	}

	/**
	 * @return bool
	 */
	public static function hasEvents () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:79: characters 3-19
		$p = MainLoop::$pending;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:80: lines 80-84
		while ($p !== null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:81: lines 81-82
			if ($p->isBlocking) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:82: characters 5-16
				return true;
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:83: characters 4-14
			$p = $p->next;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:85: characters 3-15
		return false;
	}

	/**
	 * @param int $waitMs
	 * 
	 * @return void
	 */
	public static function injectIntoEventLoop ($waitMs) {
	}

	/**
	 * @param \Closure $f
	 * 
	 * @return void
	 */
	public static function runInMainThread ($f) {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:93: characters 3-32
		EntryPoint::runInMainThread($f);
	}

	/**
	 * @return void
	 */
	public static function sortEvents () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:135: characters 3-22
		$list = MainLoop::$pending;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:137: lines 137-138
		if ($list === null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:138: characters 4-10
			return;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:140: characters 3-49
		$insize = 1;
		$nmerges = null;
		$psize = 0;
		$qsize = 0;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:141: characters 3-31
		$p = null;
		$q = null;
		$e = null;
		$tail = null;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:143: lines 143-188
		while (true) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:144: characters 4-12
			$p = $list;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:145: characters 4-15
			$list = null;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:146: characters 4-15
			$tail = null;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:147: characters 4-15
			$nmerges = 0;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:148: lines 148-183
			while ($p !== null) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:149: characters 5-14
				++$nmerges;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:150: characters 5-10
				$q = $p;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:151: characters 5-14
				$psize = 0;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:152: characters 15-19
				$_g = 0;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:152: characters 19-25
				$_g1 = $insize;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:152: lines 152-157
				while ($_g < $_g1) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:152: characters 15-25
					$i = $_g++;
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:153: characters 6-13
					++$psize;
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:154: characters 6-16
					$q = $q->next;
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:155: lines 155-156
					if ($q === null) {
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:156: characters 7-12
						break;
					}
				}
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:158: characters 5-19
				$qsize = $insize;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:159: lines 159-181
				while (($psize > 0) || (($qsize > 0) && ($q !== null))) {
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:160: lines 160-174
					if ($psize === 0) {
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:161: characters 7-12
						$e = $q;
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:162: characters 7-17
						$q = $q->next;
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:163: characters 7-14
						--$qsize;
					} else if (($qsize === 0) || ($q === null) || (($p->priority > $q->priority) || (($p->priority === $q->priority) && ($p->nextRun <= $q->nextRun)))) {
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:167: characters 7-12
						$e = $p;
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:168: characters 7-17
						$p = $p->next;
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:169: characters 7-14
						--$psize;
					} else {
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:171: characters 7-12
						$e = $q;
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:172: characters 7-17
						$q = $q->next;
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:173: characters 7-14
						--$qsize;
					}
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:175: lines 175-178
					if ($tail !== null) {
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:176: characters 7-20
						$tail->next = $e;
					} else {
						#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:178: characters 7-15
						$list = $e;
					}
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:179: characters 6-19
					$e->prev = $tail;
					#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:180: characters 6-14
					$tail = $e;
				}
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:182: characters 5-10
				$p = $q;
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:184: characters 4-20
			$tail->next = null;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:185: lines 185-186
			if ($nmerges <= 1) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:186: characters 5-10
				break;
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:187: characters 4-15
			$insize *= 2;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:189: characters 3-19
		$list->prev = null;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:190: characters 3-17
		MainLoop::$pending = $list;
	}

	/**
	 * Run the pending events. Return the time for next event.
	 * 
	 * @return float
	 */
	public static function tick () {
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:197: characters 3-15
		MainLoop::sortEvents();
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:198: characters 3-19
		$e = MainLoop::$pending;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:199: characters 3-32
		$now = \microtime(true);
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:200: characters 3-18
		$wait = 1e9;
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:201: lines 201-210
		while ($e !== null) {
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:202: characters 4-22
			$next = $e->next;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:203: characters 4-29
			$wt = $e->nextRun - $now;
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:204: lines 204-208
			if ($wt <= 0) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:205: characters 5-13
				$wait = 0;
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:206: characters 5-13
				if ($e->f !== null) {
					($e->f)();
				}
			} else if ($wait > $wt) {
				#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:208: characters 5-14
				$wait = $wt;
			}
			#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:209: characters 4-12
			$e = $next;
		}
		#/home/runner/haxe/versions/4.2.0/std/haxe/MainLoop.hx:211: characters 3-14
		return $wait;
	}
}

Boot::registerClass(MainLoop::class, 'haxe.MainLoop');
Boot::registerGetters('helder\\std\\haxe\\MainLoop', [
	'threadCount' => true
]);
