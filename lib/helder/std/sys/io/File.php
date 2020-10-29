<?php
/**
 * Generated by Haxe 4.0.0+ef18b627e
 */

namespace helder\std\sys\io;

use \helder\std\haxe\io\_BytesData\Container;
use \helder\std\php\Boot;
use \helder\std\haxe\io\Bytes;

/**
 * API for reading and writing files.
 * See `sys.FileSystem` for the complementary file system API.
 */
class File {
	/**
	 * Similar to `sys.io.File.write`, but appends to the file if it exists
	 * instead of overwriting its contents.
	 * 
	 * @param string $path
	 * @param bool $binary
	 * 
	 * @return FileOutput
	 */
	static public function append ($path, $binary = true) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:56: characters 3-66
		if ($binary === null) {
			$binary = true;
		}
		return new FileOutput(fopen($path, ($binary ? "ab" : "a")));
	}

	/**
	 * Copies the contents of the file specified by `srcPath` to the file
	 * specified by `dstPath`.
	 * If the `srcPath` does not exist or cannot be read, or if the `dstPath`
	 * file cannot be written to, an exception is thrown.
	 * If the file at `dstPath` exists, its contents are overwritten.
	 * If `srcPath` or `dstPath` are null, the result is unspecified.
	 * 
	 * @param string $srcPath
	 * @param string $dstPath
	 * 
	 * @return void
	 */
	static public function copy ($srcPath, $dstPath) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:67: characters 3-32
		copy($srcPath, $dstPath);
	}

	/**
	 * Retrieves the binary content of the file specified by `path`.
	 * If the file does not exist or can not be read, an exception is thrown.
	 * `sys.FileSystem.exists` can be used to check for existence.
	 * If `path` is null, the result is unspecified.
	 * 
	 * @param string $path
	 * 
	 * @return Bytes
	 */
	static public function getBytes ($path) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:34: characters 10-57
		$s = file_get_contents($path);
		$tmp = strlen($s);
		return new Bytes($tmp, new Container($s));
	}

	/**
	 * Retrieves the content of the file specified by `path` as a String.
	 * If the file does not exist or can not be read, an exception is thrown.
	 * `sys.FileSystem.exists` can be used to check for existence.
	 * If `path` is null, the result is unspecified.
	 * 
	 * @param string $path
	 * 
	 * @return string
	 */
	static public function getContent ($path) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:30: characters 3-33
		return file_get_contents($path);
	}

	/**
	 * Returns an `FileInput` handle to the file specified by `path`.
	 * If `binary` is true, the file is opened in binary mode. Otherwise it is
	 * opened in non-binary mode.
	 * If the file does not exist or can not be read, an exception is thrown.
	 * Operations on the returned `FileInput` handle read on the opened file.
	 * File handles should be closed via `FileInput.close` once the operation
	 * is complete.
	 * If `path` is null, the result is unspecified.
	 * 
	 * @param string $path
	 * @param bool $binary
	 * 
	 * @return FileInput
	 */
	static public function read ($path, $binary = true) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:48: characters 3-73
		if ($binary === null) {
			$binary = true;
		}
		return new FileInput(fopen($path, ($binary ? "rb" : "r")));
	}

	/**
	 * Stores `bytes` in the file specified by `path` in binary mode.
	 * If the file cannot be written to, an exception is thrown.
	 * If `path` or `bytes` are null, the result is unspecified.
	 * 
	 * @param string $path
	 * @param Bytes $bytes
	 * 
	 * @return void
	 */
	static public function saveBytes ($path, $bytes) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:42: characters 3-23
		$f = File::write($path);
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:43: characters 3-17
		$f->write($bytes);
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:44: characters 3-12
		$f->close();
	}

	/**
	 * Stores `content` in the file specified by `path`.
	 * If the file cannot be written to, an exception is thrown.
	 * If `path` or `content` are null, the result is unspecified.
	 * 
	 * @param string $path
	 * @param string $content
	 * 
	 * @return void
	 */
	static public function saveContent ($path, $content) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:38: characters 3-35
		file_put_contents($path, $content);
	}

	/**
	 * Similar to `sys.io.File.append`. While `append` can only seek or write
	 * starting from the end of the file's previous contents, `update` can
	 * seek to any position, so the file's previous contents can be
	 * selectively overwritten.
	 * 
	 * @param string $path
	 * @param bool $binary
	 * 
	 * @return FileOutput
	 */
	static public function update ($path, $binary = true) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:59: lines 59-64
		if ($binary === null) {
			$binary = true;
		}
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:60: characters 8-31
		clearstatcache(true, $path);
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:60: lines 60-62
		if (!file_exists($path)) {
			#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:61: characters 4-23
			File::write($path)->close();
		}
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:63: characters 3-68
		return new FileOutput(fopen($path, ($binary ? "rb+" : "r+")));
	}

	/**
	 * Returns an `FileOutput` handle to the file specified by `path`.
	 * If `binary` is true, the file is opened in binary mode. Otherwise it is
	 * opened in non-binary mode.
	 * If the file cannot be written to, an exception is thrown.
	 * Operations on the returned `FileOutput` handle write to the opened file.
	 * If the file existed, its previous content is overwritten.
	 * File handles should be closed via `FileOutput.close` once the operation
	 * is complete.
	 * If `path` is null, the result is unspecified.
	 * 
	 * @param string $path
	 * @param bool $binary
	 * 
	 * @return FileOutput
	 */
	static public function write ($path, $binary = true) {
		#/home/runner/haxe/versions/4.0.0/std/php/_std/sys/io/File.hx:52: characters 3-66
		if ($binary === null) {
			$binary = true;
		}
		return new FileOutput(fopen($path, ($binary ? "wb" : "w")));
	}
}

Boot::registerClass(File::class, 'sys.io.File');
