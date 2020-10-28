import {Bytes} from "../io/Bytes"
import {Register} from "../../genes/Register"
import {StringTools} from "../../StringTools"

/**
Creates a Sha256 of a String.
*/
export const Sha256 = Register.global("$hxClasses")["haxe.crypto.Sha256"] = 
class Sha256 extends Register.inherits() {
	new() {
	}
	doEncode(m, l) {
		var K = [1116352408, 1899447441, -1245643825, -373957723, 961987163, 1508970993, -1841331548, -1424204075, -670586216, 310598401, 607225278, 1426881987, 1925078388, -2132889090, -1680079193, -1046744716, -459576895, -272742522, 264347078, 604807628, 770255983, 1249150122, 1555081692, 1996064986, -1740746414, -1473132947, -1341970488, -1084653625, -958395405, -710438585, 113926993, 338241895, 666307205, 773529912, 1294757372, 1396182291, 1695183700, 1986661051, -2117940946, -1838011259, -1564481375, -1474664885, -1035236496, -949202525, -778901479, -694614492, -200395387, 275423344, 430227734, 506948616, 659060556, 883997877, 958139571, 1322822218, 1537002063, 1747873779, 1955562222, 2024104815, -2067236844, -1933114872, -1866530822, -1538233109, -1090935817, -965641998];
		var HASH = [1779033703, -1150833019, 1013904242, -1521486534, 1359893119, -1694144372, 528734635, 1541459225];
		var W = new Array();
		W[64] = 0;
		var a;
		var b;
		var c;
		var d;
		var e;
		var f;
		var g;
		var h;
		var T1;
		var T2;
		m[l >> 5] |= 128 << 24 - l % 32;
		m[(l + 64 >> 9 << 4) + 15] = l;
		var i = 0;
		while (i < m.length) {
			a = HASH[0];
			b = HASH[1];
			c = HASH[2];
			d = HASH[3];
			e = HASH[4];
			f = HASH[5];
			g = HASH[6];
			h = HASH[7];
			var _g = 0;
			while (_g < 64) {
				var j = _g++;
				if (j < 16) {
					W[j] = m[j + i];
				} else {
					var x = W[j - 2];
					var x1 = (x >>> 17 | x << 15) ^ (x >>> 19 | x << 13) ^ x >>> 10;
					var y = W[j - 7];
					var lsw = (x1 & 65535) + (y & 65535);
					var msw = (x1 >> 16) + (y >> 16) + (lsw >> 16);
					var x2 = msw << 16 | lsw & 65535;
					var x3 = W[j - 15];
					var y1 = (x3 >>> 7 | x3 << 25) ^ (x3 >>> 18 | x3 << 14) ^ x3 >>> 3;
					var lsw1 = (x2 & 65535) + (y1 & 65535);
					var msw1 = (x2 >> 16) + (y1 >> 16) + (lsw1 >> 16);
					var x4 = msw1 << 16 | lsw1 & 65535;
					var y2 = W[j - 16];
					var lsw2 = (x4 & 65535) + (y2 & 65535);
					var msw2 = (x4 >> 16) + (y2 >> 16) + (lsw2 >> 16);
					W[j] = msw2 << 16 | lsw2 & 65535;
				};
				var y3 = (e >>> 6 | e << 26) ^ (e >>> 11 | e << 21) ^ (e >>> 25 | e << 7);
				var lsw3 = (h & 65535) + (y3 & 65535);
				var msw3 = (h >> 16) + (y3 >> 16) + (lsw3 >> 16);
				var x5 = msw3 << 16 | lsw3 & 65535;
				var y4 = e & f ^ ~e & g;
				var lsw4 = (x5 & 65535) + (y4 & 65535);
				var msw4 = (x5 >> 16) + (y4 >> 16) + (lsw4 >> 16);
				var x6 = msw4 << 16 | lsw4 & 65535;
				var y5 = K[j];
				var lsw5 = (x6 & 65535) + (y5 & 65535);
				var msw5 = (x6 >> 16) + (y5 >> 16) + (lsw5 >> 16);
				var x7 = msw5 << 16 | lsw5 & 65535;
				var y6 = W[j];
				var lsw6 = (x7 & 65535) + (y6 & 65535);
				var msw6 = (x7 >> 16) + (y6 >> 16) + (lsw6 >> 16);
				T1 = msw6 << 16 | lsw6 & 65535;
				var x8 = (a >>> 2 | a << 30) ^ (a >>> 13 | a << 19) ^ (a >>> 22 | a << 10);
				var y7 = a & b ^ a & c ^ b & c;
				var lsw7 = (x8 & 65535) + (y7 & 65535);
				var msw7 = (x8 >> 16) + (y7 >> 16) + (lsw7 >> 16);
				T2 = msw7 << 16 | lsw7 & 65535;
				h = g;
				g = f;
				f = e;
				var lsw8 = (d & 65535) + (T1 & 65535);
				var msw8 = (d >> 16) + (T1 >> 16) + (lsw8 >> 16);
				e = msw8 << 16 | lsw8 & 65535;
				d = c;
				c = b;
				b = a;
				var lsw9 = (T1 & 65535) + (T2 & 65535);
				var msw9 = (T1 >> 16) + (T2 >> 16) + (lsw9 >> 16);
				a = msw9 << 16 | lsw9 & 65535;
			};
			var y8 = HASH[0];
			var lsw10 = (a & 65535) + (y8 & 65535);
			var msw10 = (a >> 16) + (y8 >> 16) + (lsw10 >> 16);
			HASH[0] = msw10 << 16 | lsw10 & 65535;
			var y9 = HASH[1];
			var lsw11 = (b & 65535) + (y9 & 65535);
			var msw11 = (b >> 16) + (y9 >> 16) + (lsw11 >> 16);
			HASH[1] = msw11 << 16 | lsw11 & 65535;
			var y10 = HASH[2];
			var lsw12 = (c & 65535) + (y10 & 65535);
			var msw12 = (c >> 16) + (y10 >> 16) + (lsw12 >> 16);
			HASH[2] = msw12 << 16 | lsw12 & 65535;
			var y11 = HASH[3];
			var lsw13 = (d & 65535) + (y11 & 65535);
			var msw13 = (d >> 16) + (y11 >> 16) + (lsw13 >> 16);
			HASH[3] = msw13 << 16 | lsw13 & 65535;
			var y12 = HASH[4];
			var lsw14 = (e & 65535) + (y12 & 65535);
			var msw14 = (e >> 16) + (y12 >> 16) + (lsw14 >> 16);
			HASH[4] = msw14 << 16 | lsw14 & 65535;
			var y13 = HASH[5];
			var lsw15 = (f & 65535) + (y13 & 65535);
			var msw15 = (f >> 16) + (y13 >> 16) + (lsw15 >> 16);
			HASH[5] = msw15 << 16 | lsw15 & 65535;
			var y14 = HASH[6];
			var lsw16 = (g & 65535) + (y14 & 65535);
			var msw16 = (g >> 16) + (y14 >> 16) + (lsw16 >> 16);
			HASH[6] = msw16 << 16 | lsw16 & 65535;
			var y15 = HASH[7];
			var lsw17 = (h & 65535) + (y15 & 65535);
			var msw17 = (h >> 16) + (y15 >> 16) + (lsw17 >> 16);
			HASH[7] = msw17 << 16 | lsw17 & 65535;
			i += 16;
		};
		return HASH;
	}
	hex(a) {
		var str = "";
		var _g = 0;
		while (_g < a.length) {
			var num = a[_g];
			++_g;
			str += StringTools.hex(num, 8);
		};
		return str.toLowerCase();
	}
	static encode(s) {
		var sh = new Sha256();
		var h = sh.doEncode(Sha256.str2blks(s), s.length * 8);
		return sh.hex(h);
	}
	static make(b) {
		var h = new Sha256().doEncode(Sha256.bytes2blks(b), b.length * 8);
		var out = new Bytes(new ArrayBuffer(32));
		var p = 0;
		var _g = 0;
		while (_g < 8) {
			var i = _g++;
			out.b[p++] = h[i] >>> 24;
			out.b[p++] = h[i] >> 16 & 255;
			out.b[p++] = h[i] >> 8 & 255;
			out.b[p++] = h[i] & 255;
		};
		return out;
	}
	
	/**
	Convert a string to a sequence of 16-word blocks, stored as an array.
	Append padding bits and the length, as described in the SHA1 standard.
	*/
	static str2blks(s) {
		var s1 = Bytes.ofString(s);
		var nblk = (s1.length + 8 >> 6) + 1;
		var blks = new Array();
		var _g = 0;
		var _g1 = nblk * 16;
		while (_g < _g1) {
			var i = _g++;
			blks[i] = 0;
		};
		var _g2 = 0;
		var _g3 = s1.length;
		while (_g2 < _g3) {
			var i1 = _g2++;
			var p = i1 >> 2;
			blks[p] |= s1.b[i1] << 24 - ((i1 & 3) << 3);
		};
		var i2 = s1.length;
		var p1 = i2 >> 2;
		blks[p1] |= 128 << 24 - ((i2 & 3) << 3);
		blks[nblk * 16 - 1] = s1.length * 8;
		return blks;
	}
	static bytes2blks(b) {
		var nblk = (b.length + 8 >> 6) + 1;
		var blks = new Array();
		var _g = 0;
		var _g1 = nblk * 16;
		while (_g < _g1) {
			var i = _g++;
			blks[i] = 0;
		};
		var _g2 = 0;
		var _g3 = b.length;
		while (_g2 < _g3) {
			var i1 = _g2++;
			var p = i1 >> 2;
			blks[p] |= b.b[i1] << 24 - ((i1 & 3) << 3);
		};
		var i2 = b.length;
		var p1 = i2 >> 2;
		blks[p1] |= 128 << 24 - ((i2 & 3) << 3);
		blks[nblk * 16 - 1] = b.length * 8;
		return blks;
	}
	static get __name__() {
		return "haxe.crypto.Sha256"
	}
	get __class__() {
		return Sha256
	}
}


//# sourceMappingURL=Sha256.js.map