import {FPHelper} from "./FPHelper.js"
import {Error} from "./Error.js"
import {Eof} from "./Eof.js"
import {BytesBuffer} from "./BytesBuffer.js"
import {Bytes} from "./Bytes.js"
import {NativeStackTrace} from "../NativeStackTrace.js"
import {Exception} from "../Exception.js"
import {Register} from "../../genes/Register.js"
import {HxOverrides} from "../../HxOverrides.js"

/**
An Input is an abstract reader. See other classes in the `haxe.io` package
for several possible implementations.

All functions which read data throw `Eof` when the end of the stream
is reached.
*/
export const Input = Register.global("$hxClasses")["haxe.io.Input"] = 
class Input {
	
	/**
	Read and return one byte.
	*/
	readByte() {
		throw Exception.thrown("Not implemented");
	}
	
	/**
	Read `len` bytes and write them into `s` to the position specified by `pos`.
	
	Returns the actual length of read data that can be smaller than `len`.
	
	See `readFullBytes` that tries to read the exact amount of specified bytes.
	*/
	readBytes(s, pos, len) {
		let k = len;
		let b = s.b;
		if (pos < 0 || len < 0 || pos + len > s.length) {
			throw Exception.thrown(Error.OutsideBounds);
		};
		try {
			while (k > 0) {
				b[pos] = this.readByte();
				++pos;
				--k;
			};
		}catch (_g) {
			NativeStackTrace.lastError = _g;
			if (!((Exception.caught(_g).unwrap()) instanceof Eof)) {
				throw _g;
			};
		};
		return len - k;
	}
	
	/**
	Close the input source.
	
	Behaviour while reading after calling this method is unspecified.
	*/
	close() {
	}
	set_bigEndian(b) {
		this.bigEndian = b;
		return b;
	}
	
	/**
	Read and return all available data.
	
	The `bufsize` optional argument specifies the size of chunks by
	which data is read. Its default value is target-specific.
	*/
	readAll(bufsize = null) {
		if (bufsize == null) {
			bufsize = 16384;
		};
		let buf = new Bytes(new ArrayBuffer(bufsize));
		let total = new BytesBuffer();
		try {
			while (true) {
				let len = this.readBytes(buf, 0, bufsize);
				if (len == 0) {
					throw Exception.thrown(Error.Blocked);
				};
				total.addBytes(buf, 0, len);
			};
		}catch (_g) {
			NativeStackTrace.lastError = _g;
			if (!((Exception.caught(_g).unwrap()) instanceof Eof)) {
				throw _g;
			};
		};
		return total.getBytes();
	}
	
	/**
	Read `len` bytes and write them into `s` to the position specified by `pos`.
	
	Unlike `readBytes`, this method tries to read the exact `len` amount of bytes.
	*/
	readFullBytes(s, pos, len) {
		while (len > 0) {
			let k = this.readBytes(s, pos, len);
			if (k == 0) {
				throw Exception.thrown(Error.Blocked);
			};
			pos += k;
			len -= k;
		};
	}
	
	/**
	Read and return `nbytes` bytes.
	*/
	read(nbytes) {
		let s = new Bytes(new ArrayBuffer(nbytes));
		let p = 0;
		while (nbytes > 0) {
			let k = this.readBytes(s, p, nbytes);
			if (k == 0) {
				throw Exception.thrown(Error.Blocked);
			};
			p += k;
			nbytes -= k;
		};
		return s;
	}
	
	/**
	Read a string until a character code specified by `end` is occurred.
	
	The final character is not included in the resulting string.
	*/
	readUntil(end) {
		let buf = new BytesBuffer();
		let last;
		while (true) {
			last = this.readByte();
			if (!(last != end)) {
				break;
			};
			buf.addByte(last);
		};
		return buf.getBytes().toString();
	}
	
	/**
	Read a line of text separated by CR and/or LF bytes.
	
	The CR/LF characters are not included in the resulting string.
	*/
	readLine() {
		let buf = new BytesBuffer();
		let last;
		let s;
		try {
			while (true) {
				last = this.readByte();
				if (!(last != 10)) {
					break;
				};
				buf.addByte(last);
			};
			s = buf.getBytes().toString();
			if (HxOverrides.cca(s, s.length - 1) == 13) {
				s = HxOverrides.substr(s, 0, -1);
			};
		}catch (_g) {
			NativeStackTrace.lastError = _g;
			let _g1 = Exception.caught(_g).unwrap();
			if (((_g1) instanceof Eof)) {
				let e = _g1;
				s = buf.getBytes().toString();
				if (s.length == 0) {
					throw Exception.thrown(e);
				};
			} else {
				throw _g;
			};
		};
		return s;
	}
	
	/**
	Read a 32-bit floating point number.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readFloat() {
		return FPHelper.i32ToFloat(this.readInt32());
	}
	
	/**
	Read a 64-bit double-precision floating point number.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readDouble() {
		let i1 = this.readInt32();
		let i2 = this.readInt32();
		if (this.bigEndian) {
			return FPHelper.i64ToDouble(i2, i1);
		} else {
			return FPHelper.i64ToDouble(i1, i2);
		};
	}
	
	/**
	Read a 8-bit signed integer.
	*/
	readInt8() {
		let n = this.readByte();
		if (n >= 128) {
			return n - 256;
		};
		return n;
	}
	
	/**
	Read a 16-bit signed integer.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readInt16() {
		let ch1 = this.readByte();
		let ch2 = this.readByte();
		let n = (this.bigEndian) ? ch2 | ch1 << 8 : ch1 | ch2 << 8;
		if ((n & 32768) != 0) {
			return n - 65536;
		};
		return n;
	}
	
	/**
	Read a 16-bit unsigned integer.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readUInt16() {
		let ch1 = this.readByte();
		let ch2 = this.readByte();
		if (this.bigEndian) {
			return ch2 | ch1 << 8;
		} else {
			return ch1 | ch2 << 8;
		};
	}
	
	/**
	Read a 24-bit signed integer.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readInt24() {
		let ch1 = this.readByte();
		let ch2 = this.readByte();
		let ch3 = this.readByte();
		let n = (this.bigEndian) ? ch3 | ch2 << 8 | ch1 << 16 : ch1 | ch2 << 8 | ch3 << 16;
		if ((n & 8388608) != 0) {
			return n - 16777216;
		};
		return n;
	}
	
	/**
	Read a 24-bit unsigned integer.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readUInt24() {
		let ch1 = this.readByte();
		let ch2 = this.readByte();
		let ch3 = this.readByte();
		if (this.bigEndian) {
			return ch3 | ch2 << 8 | ch1 << 16;
		} else {
			return ch1 | ch2 << 8 | ch3 << 16;
		};
	}
	
	/**
	Read a 32-bit signed integer.
	
	Endianness is specified by the `bigEndian` property.
	*/
	readInt32() {
		let ch1 = this.readByte();
		let ch2 = this.readByte();
		let ch3 = this.readByte();
		let ch4 = this.readByte();
		if (this.bigEndian) {
			return ch4 | ch3 << 8 | ch2 << 16 | ch1 << 24;
		} else {
			return ch1 | ch2 << 8 | ch3 << 16 | ch4 << 24;
		};
	}
	
	/**
	Read and `len` bytes as a string.
	*/
	readString(len, encoding = null) {
		let b = new Bytes(new ArrayBuffer(len));
		this.readFullBytes(b, 0, len);
		return b.getString(0, len, encoding);
	}
	getDoubleSig(bytes) {
		return ((bytes[1] & 15) << 16 | bytes[2] << 8 | bytes[3]) * 4294967296. + (bytes[4] >> 7) * 2147483648 + ((bytes[4] & 127) << 24 | bytes[5] << 16 | bytes[6] << 8 | bytes[7]);
	}
	static get __name__() {
		return "haxe.io.Input"
	}
	get __class__() {
		return Input
	}
}


//# sourceMappingURL=Input.js.map