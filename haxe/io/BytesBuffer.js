import {Error} from "./Error"
import {Bytes} from "./Bytes"
import {Exception} from "../Exception"
import {Register} from "../../genes/Register"

export const BytesBuffer = Register.global("$hxClasses")["haxe.io.BytesBuffer"] = 
class BytesBuffer extends Register.inherits() {
	new() {
		this.pos = 0;
		this.size = 0;
	}
	get length() {
		return this.get_length()
	}
	get_length() {
		return this.pos;
	}
	addByte($byte) {
		if (this.pos == this.size) {
			this.grow(1);
		};
		this.view.setUint8(this.pos++, $byte);
	}
	add(src) {
		if (this.pos + src.length > this.size) {
			this.grow(src.length);
		};
		if (this.size == 0) {
			return;
		};
		let sub = new Uint8Array(src.b.buffer, src.b.byteOffset, src.length);
		this.u8.set(sub, this.pos);
		this.pos += src.length;
	}
	addString(v, encoding = null) {
		this.add(Bytes.ofString(v, encoding));
	}
	addInt32(v) {
		if (this.pos + 4 > this.size) {
			this.grow(4);
		};
		this.view.setInt32(this.pos, v, true);
		this.pos += 4;
	}
	addInt64(v) {
		if (this.pos + 8 > this.size) {
			this.grow(8);
		};
		this.view.setInt32(this.pos, v.low, true);
		this.view.setInt32(this.pos + 4, v.high, true);
		this.pos += 8;
	}
	addFloat(v) {
		if (this.pos + 4 > this.size) {
			this.grow(4);
		};
		this.view.setFloat32(this.pos, v, true);
		this.pos += 4;
	}
	addDouble(v) {
		if (this.pos + 8 > this.size) {
			this.grow(8);
		};
		this.view.setFloat64(this.pos, v, true);
		this.pos += 8;
	}
	addBytes(src, pos, len) {
		if (pos < 0 || len < 0 || pos + len > src.length) {
			throw Exception.thrown(Error.OutsideBounds);
		};
		if (this.pos + len > this.size) {
			this.grow(len);
		};
		if (this.size == 0) {
			return;
		};
		let sub = new Uint8Array(src.b.buffer, src.b.byteOffset + pos, len);
		this.u8.set(sub, this.pos);
		this.pos += len;
	}
	grow(delta) {
		let req = this.pos + delta;
		let nsize = (this.size == 0) ? 16 : this.size;
		while (nsize < req) nsize = nsize * 3 >> 1;
		let nbuf = new ArrayBuffer(nsize);
		let nu8 = new Uint8Array(nbuf);
		if (this.size > 0) {
			nu8.set(this.u8);
		};
		this.size = nsize;
		this.buffer = nbuf;
		this.u8 = nu8;
		this.view = new DataView(this.buffer);
	}
	
	/**
	Returns either a copy or a reference of the current bytes.
	Once called, the buffer should no longer be used.
	*/
	getBytes() {
		if (this.size == 0) {
			return new Bytes(new ArrayBuffer(0));
		};
		let b = new Bytes(this.buffer);
		b.length = this.pos;
		return b;
	}
	static get __name__() {
		return "haxe.io.BytesBuffer"
	}
	get __class__() {
		return BytesBuffer
	}
}


//# sourceMappingURL=BytesBuffer.js.map