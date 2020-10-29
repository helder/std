<?php
/**
 * Generated by Haxe 4.0.0+ef18b627e
 */

namespace helder\std\sys\net;

use \helder\std\php\Boot;

/**
 * An address is used to represent a port on a given host ip.
 * It is used by `sys.net.UdpSocket`.
 */
class Address {
	/**
	 * @var int
	 */
	public $host;
	/**
	 * @var int
	 */
	public $port;

	/**
	 * @return void
	 */
	public function __construct () {
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:34: characters 3-11
		$this->host = 0;
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:35: characters 3-11
		$this->port = 0;
	}

	/**
	 * @return Address
	 */
	public function clone () {
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:55: characters 3-25
		$c = new Address();
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:56: characters 3-16
		$c->host = $this->host;
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:57: characters 3-16
		$c->port = $this->port;
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:58: characters 3-11
		return $c;
	}

	/**
	 * @param Address $a
	 * 
	 * @return int
	 */
	public function compare ($a) {
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:45: characters 3-26
		$dh = $a->host - $this->host;
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:46: lines 46-47
		if ($dh !== 0) {
			#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:47: characters 4-13
			return $dh;
		}
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:48: characters 3-26
		$dp = $a->port - $this->port;
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:49: lines 49-50
		if ($dp !== 0) {
			#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:50: characters 4-13
			return $dp;
		}
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:51: characters 3-11
		return 0;
	}

	/**
	 * @return Host
	 */
	public function getHost () {
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:39: characters 3-33
		$h = new Host("127.0.0.1");
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:40: characters 11-22
		$h->ip = $this->host;
		#/home/runner/haxe/versions/4.0.0/std/sys/net/Address.hx:41: characters 3-11
		return $h;
	}
}

Boot::registerClass(Address::class, 'sys.net.Address');
