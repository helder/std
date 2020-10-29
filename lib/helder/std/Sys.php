<?php
/**
 * Generated by Haxe 4.0.3
 */

namespace helder\std;

use \helder\std\sys\io\FileInput;
use \helder\std\php\Boot;
use \helder\std\haxe\io\Output;
use \helder\std\php\Lib;
use \helder\std\sys\io\FileOutput;
use \helder\std\haxe\io\Input;
use \helder\std\php\_Boot\HxString;
use \helder\std\haxe\ds\StringMap;
use \helder\std\haxe\SysTools;

/**
 * This class provides access to various base functions of system platforms.
 * Look in the `sys` package for more system APIs.
 */
class Sys {
	/**
	 * @var string
	 */
	static public $_programPath;
	/**
	 * @var mixed
	 * Environment variables set by `Sys.putEnv()`
	 */
	static public $customEnvVars;

	/**
	 * Returns all the arguments that were passed in the command line.
	 * This does not include the interpreter or the name of the program file.
	 * (java)(eval) On Windows, non-ASCII Unicode arguments will not work correctly.
	 * (cs) Non-ASCII Unicode arguments will not work correctly.
	 * 
	 * @return Array_hx
	 */
	public static function args () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:41: lines 41-45
		if (array_key_exists("argv", $_SERVER)) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:42: characters 4-89
			return Array_hx::wrap(array_slice($_SERVER["argv"], 1));
		} else {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:44: characters 4-13
			return new Array_hx();
		}
	}

	/**
	 * Runs the given command. The command output will be printed to the same output as the current process.
	 * The current process will block until the command terminates.
	 * The return value is the exit code of the command (usually `0` indicates no error).
	 * Command arguments can be passed in two ways:
	 * 1. Using `args` to pass command arguments. Each argument will be automatically quoted and shell meta-characters will be escaped if needed.
	 * `cmd` should be an executable name that can be located in the `PATH` environment variable, or a full path to an executable.
	 * 2. When `args` is not given or is `null`, command arguments can be appended to `cmd`. No automatic quoting/escaping will be performed. `cmd` should be formatted exactly as it would be when typed at the command line.
	 * It can run executables, as well as shell commands that are not executables (e.g. on Windows: `dir`, `cd`, `echo` etc).
	 * Use the `sys.io.Process` API for more complex tasks, such as background processes, or providing input to the command.
	 * 
	 * @param string $cmd
	 * @param Array_hx $args
	 * 
	 * @return int
	 */
	public static function command ($cmd, $args = null) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:85: lines 85-95
		if ($args !== null) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:86: characters 12-24
			if (Sys::systemName() === "Windows") {
				#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:88: lines 88-91
				$_g = new Array_hx();
				#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:89: lines 89-90
				$_g1 = 0;
				$_g2 = (Array_hx::wrap([StringTools::replace($cmd, "/", "\\")]))->concat($args);
				while ($_g1 < $_g2->length) {
					#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:89: characters 12-13
					$a = ($_g2->arr[$_g1] ?? null);
					#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:89: lines 89-90
					++$_g1;
					#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:90: characters 8-37
					$x = SysTools::quoteWinArg($a, true);
					$_g->arr[$_g->length] = $x;
					++$_g->length;

				}

				#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:88: characters 6-9
				$cmd = $_g->join(" ");
			} else {
				#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:93: characters 12-57
				$_this = (Array_hx::wrap([$cmd]))->concat($args);
				$f = Boot::getStaticClosure(SysTools::class, 'quoteUnixArg');
				$result = [];
				$data = $_this->arr;
				$_g_current = 0;
				$_g_length = count($data);
				$_g_data = $data;
				while ($_g_current < $_g_length) {
					$item = $_g_data[$_g_current++];
					$result[] = $f($item);
				}

				#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:93: characters 6-9
				$cmd = Array_hx::wrap($result)->join(" ");
			}
		}
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:96: characters 3-30
		$result1 = Boot::deref(0);
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:97: characters 3-29
		system($cmd, $result1);
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:98: characters 3-16
		return $result1;
	}

	/**
	 * Gives the most precise timestamp value available (in seconds),
	 * but only accounts for the actual time spent running on the CPU for the current thread/process.
	 * 
	 * @return float
	 */
	public static function cpuTime () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:110: characters 3-54
		return microtime(true) - $_SERVER["REQUEST_TIME"];
	}

	/**
	 * Returns all environment variables.
	 * 
	 * @return StringMap
	 */
	public static function environment () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:125: characters 3-33
		$env = $_SERVER;
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:126: lines 126-128
		$collection = Sys::$customEnvVars;
		foreach ($collection as $key => $value) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:127: characters 4-21
			$env[$key] = $value;
		}

		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:129: characters 3-45
		return Lib::hashOfAssociativeArray($env);
	}

	/**
	 * Returns the path to the current executable that we are running.
	 * 
	 * @return string
	 */
	public static function executablePath () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:114: characters 10-48
		return $_SERVER["SCRIPT_FILENAME"];
	}

	/**
	 * Exits the current process with the given exit code.
	 * (macro)(eval) Being invoked in a macro or eval context (e.g. with `-x` or `--run`) immediately terminates
	 * the compilation process, which also prevents the execution of any `--next` sections of compilation arguments.
	 * 
	 * @param int $code
	 * 
	 * @return void
	 */
	public static function exit ($code) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:102: characters 3-20
		exit($code);
	}

	/**
	 * Reads a single input character from the standard input and returns it.
	 * Setting `echo` to `true` will also display the character on the output.
	 * 
	 * @param bool $echo
	 * 
	 * @return int
	 */
	public static function getChar ($echo) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:148: characters 3-37
		$c = fgetc(STDIN);
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:149: lines 149-155
		if ($c === false) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:150: characters 4-12
			return 0;
		} else {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:152: lines 152-153
			if ($echo) {
				#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:153: characters 5-19
				echo($c);
			}
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:154: characters 4-24
			return ord($c);
		}
	}

	/**
	 * Gets the current working directory (usually the one in which the program was started).
	 * 
	 * @return string
	 */
	public static function getCwd () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:67: characters 3-29
		$cwd = getcwd();
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:68: lines 68-69
		if ($cwd === false) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:69: characters 4-15
			return null;
		}
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:70: characters 3-37
		$l = mb_substr($cwd, -1, null);
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:71: characters 3-61
		return ($cwd??'null') . (((($l === "/") || ($l === "\\") ? "" : "/"))??'null');
	}

	/**
	 * Returns the value of the given environment variable, or `null` if it
	 * doesn't exist.
	 * 
	 * @param string $s
	 * 
	 * @return string
	 */
	public static function getEnv ($s) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:49: characters 3-32
		$value = getenv($s);
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:50: characters 10-39
		if ($value === false) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:50: characters 27-31
			return null;
		} else {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:50: characters 34-39
			return $value;
		}
	}

	/**
	 * Prints any value to the standard output.
	 * 
	 * @param mixed $v
	 * 
	 * @return void
	 */
	public static function print ($v) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:33: characters 3-29
		echo(Std::string($v));
	}

	/**
	 * Prints any value to the standard output, followed by a newline.
	 * On Windows, this function outputs a CRLF newline.
	 * LF newlines are printed on all other platforms.
	 * 
	 * @param mixed $v
	 * 
	 * @return void
	 */
	public static function println ($v) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:37: characters 3-45
		echo((Std::string($v)??'null') . PHP_EOL);
	}

	/**
	 * Returns the absolute path to the current program file that we are running.
	 * Concretely, for an executable binary, it returns the path to the binary.
	 * For a script (e.g. a PHP file), it returns the path to the script.
	 * 
	 * @return string
	 */
	public static function programPath () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:121: characters 3-22
		return Sys::$_programPath;
	}

	/**
	 * Sets the value of the given environment variable.
	 * (java) This functionality is not available on Java; calling this function will throw.
	 * 
	 * @param string $s
	 * @param string $v
	 * 
	 * @return void
	 */
	public static function putEnv ($s, $v) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:54: characters 3-26
		Sys::$customEnvVars[$s] = "" . ($v??'null');
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:55: characters 3-25
		putenv("" . ($s??'null') . "=" . ($v??'null'));
	}

	/**
	 * Changes the current working directory.
	 * (java) This functionality is not available on Java; calling this function will throw.
	 * 
	 * @param string $s
	 * 
	 * @return void
	 */
	public static function setCwd ($s) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:75: characters 3-18
		chdir($s);
	}

	/**
	 * Changes the current time locale, which will affect `DateTools.format` date formating.
	 * Returns `true` if the locale was successfully changed.
	 * 
	 * @param string $loc
	 * 
	 * @return bool
	 */
	public static function setTimeLocale ($loc) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:63: characters 3-55
		return setlocale(LC_TIME, $loc) !== false;
	}

	/**
	 * Suspends execution for the given length of time (in seconds).
	 * 
	 * @param float $seconds
	 * 
	 * @return void
	 */
	public static function sleep ($seconds) {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:59: characters 10-51
		usleep((int)(($seconds * 1000000)));
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:59: characters 3-51
		return;
	}

	/**
	 * Returns the standard error of the process, to which program errors can be written.
	 * 
	 * @return Output
	 */
	public static function stderr () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:143: characters 3-87
		$p = (defined("STDERR") ? STDERR : fopen("php://stderr", "w"));
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:144: characters 3-43
		return new FileOutput($p);
	}

	/**
	 * Returns the standard input of the process, from which user input can be read.
	 * Usually it will block until the user sends a full input line.
	 * See `getChar` for an alternative.
	 * 
	 * @return Input
	 */
	public static function stdin () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:133: characters 3-84
		$p = (defined("STDIN") ? STDIN : fopen("php://stdin", "r"));
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:134: characters 3-42
		return new FileInput($p);
	}

	/**
	 * Returns the standard output of the process, to which program output can be written.
	 * 
	 * @return Output
	 */
	public static function stdout () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:138: characters 3-87
		$p = (defined("STDOUT") ? STDOUT : fopen("php://stdout", "w"));
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:139: characters 3-43
		return new FileOutput($p);
	}

	/**
	 * Returns the type of the current system. Possible values are:
	 * - `"Windows"`
	 * - `"Linux"`
	 * - `"BSD"`
	 * - `"Mac"`
	 * 
	 * @return string
	 */
	public static function systemName () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:79: characters 3-33
		$s = php_uname("s");
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:80: characters 3-26
		$p = HxString::indexOf($s, " ");
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:81: characters 10-39
		if ($p >= 0) {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:81: characters 20-34
			return mb_substr($s, 0, $p);
		} else {
			#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:81: characters 37-38
			return $s;
		}
	}

	/**
	 * Gives the most precise timestamp value available (in seconds).
	 * 
	 * @return float
	 */
	public static function time () {
		#/home/runner/haxe/versions/4.0.3/std/php/_std/Sys.hx:106: characters 3-32
		return microtime(true);
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


		$this1 = [];
		self::$customEnvVars = $this1;
		self::$_programPath = (realpath($_SERVER["SCRIPT_FILENAME"]) ?: null);
	}
}

Boot::registerClass(Sys::class, 'Sys');
Sys::__hx__init();
