import {MapKeyValueIterator} from "../iterators/MapKeyValueIterator.js"
import {IMap} from "../Constraints.js"
import {EsMap} from "../../genes/util/EsMap.js"
import {Register} from "../../genes/Register.js"

const $global = Register.$global

export const StringMap = Register.global("$hxClasses")["haxe.ds.StringMap"] = 
class StringMap extends Register.inherits(EsMap) {
	new() {
		super.new();
	}
	copy() {
		var copied = new StringMap();
		copied.inst = new Map(this.inst);
		return copied;
	}
	keyValueIterator() {
		return new MapKeyValueIterator(this);
	}
	static get __name__() {
		return "haxe.ds.StringMap"
	}
	static get __interfaces__() {
		return [IMap]
	}
	static get __super__() {
		return EsMap
	}
	get __class__() {
		return StringMap
	}
}


//# sourceMappingURL=StringMap.js.map