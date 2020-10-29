import {MapKeyValueIterator} from "../iterators/MapKeyValueIterator"
import {ArrayIterator} from "../iterators/ArrayIterator"
import {NativeStackTrace} from "../NativeStackTrace"
import {Exception} from "../Exception"
import {IMap} from "../Constraints"
import {Register} from "../../genes/Register"
import {Std} from "../../Std"
import {Reflect} from "../../Reflect"

/**
BalancedTree allows key-value mapping with arbitrary keys, as long as they
can be ordered. By default, `Reflect.compare` is used in the `compare`
method, which can be overridden in subclasses.

Operations have a logarithmic average and worst-case cost.

Iteration over keys and values, using `keys` and `iterator` respectively,
are in-order.
*/
export const BalancedTree = Register.global("$hxClasses")["haxe.ds.BalancedTree"] = 
class BalancedTree extends Register.inherits() {
	new() {
	}
	
	/**
	Binds `key` to `value`.
	
	If `key` is already bound to a value, that binding disappears.
	
	If `key` is null, the result is unspecified.
	*/
	set(key, value) {
		this.root = this.setLoop(key, value, this.root);
	}
	
	/**
	Returns the value `key` is bound to.
	
	If `key` is not bound to any value, `null` is returned.
	
	If `key` is null, the result is unspecified.
	*/
	get(key) {
		let node = this.root;
		while (node != null) {
			let c = this.compare(key, node.key);
			if (c == 0) {
				return node.value;
			};
			if (c < 0) {
				node = node.left;
			} else {
				node = node.right;
			};
		};
		return null;
	}
	
	/**
	Removes the current binding of `key`.
	
	If `key` has no binding, `this` BalancedTree is unchanged and false is
	returned.
	
	Otherwise the binding of `key` is removed and true is returned.
	
	If `key` is null, the result is unspecified.
	*/
	remove(key) {
		try {
			this.root = this.removeLoop(key, this.root);
			return true;
		}catch (_g) {
			NativeStackTrace.lastError = _g;
			if (typeof(Exception.caught(_g).unwrap()) == "string") {
				return false;
			} else {
				throw _g;
			};
		};
	}
	
	/**
	Tells if `key` is bound to a value.
	
	This method returns true even if `key` is bound to null.
	
	If `key` is null, the result is unspecified.
	*/
	exists(key) {
		let node = this.root;
		while (node != null) {
			let c = this.compare(key, node.key);
			if (c == 0) {
				return true;
			} else if (c < 0) {
				node = node.left;
			} else {
				node = node.right;
			};
		};
		return false;
	}
	
	/**
	Iterates over the bound values of `this` BalancedTree.
	
	This operation is performed in-order.
	*/
	iterator() {
		let ret = [];
		BalancedTree.iteratorLoop(this.root, ret);
		return new ArrayIterator(ret);
	}
	
	/**
	See `Map.keyValueIterator`
	*/
	keyValueIterator() {
		return new MapKeyValueIterator(this);
	}
	
	/**
	Iterates over the keys of `this` BalancedTree.
	
	This operation is performed in-order.
	*/
	keys() {
		let ret = [];
		this.keysLoop(this.root, ret);
		return new ArrayIterator(ret);
	}
	copy() {
		let copied = new BalancedTree();
		copied.root = this.root;
		return copied;
	}
	setLoop(k, v, node) {
		if (node == null) {
			return new TreeNode(null, k, v, null);
		};
		let c = this.compare(k, node.key);
		if (c == 0) {
			return new TreeNode(node.left, k, v, node.right, (node == null) ? 0 : node._height);
		} else if (c < 0) {
			let nl = this.setLoop(k, v, node.left);
			return this.balance(nl, node.key, node.value, node.right);
		} else {
			let nr = this.setLoop(k, v, node.right);
			return this.balance(node.left, node.key, node.value, nr);
		};
	}
	removeLoop(k, node) {
		if (node == null) {
			throw Exception.thrown("Not_found");
		};
		let c = this.compare(k, node.key);
		if (c == 0) {
			return this.merge(node.left, node.right);
		} else if (c < 0) {
			return this.balance(this.removeLoop(k, node.left), node.key, node.value, node.right);
		} else {
			return this.balance(node.left, node.key, node.value, this.removeLoop(k, node.right));
		};
	}
	keysLoop(node, acc) {
		if (node != null) {
			this.keysLoop(node.left, acc);
			acc.push(node.key);
			this.keysLoop(node.right, acc);
		};
	}
	merge(t1, t2) {
		if (t1 == null) {
			return t2;
		};
		if (t2 == null) {
			return t1;
		};
		let t = this.minBinding(t2);
		return this.balance(t1, t.key, t.value, this.removeMinBinding(t2));
	}
	minBinding(t) {
		if (t == null) {
			throw Exception.thrown("Not_found");
		} else if (t.left == null) {
			return t;
		} else {
			return this.minBinding(t.left);
		};
	}
	removeMinBinding(t) {
		if (t.left == null) {
			return t.right;
		} else {
			return this.balance(this.removeMinBinding(t.left), t.key, t.value, t.right);
		};
	}
	balance(l, k, v, r) {
		let hl = (l == null) ? 0 : l._height;
		let hr = (r == null) ? 0 : r._height;
		if (hl > hr + 2) {
			let _this = l.left;
			let _this1 = l.right;
			if (((_this == null) ? 0 : _this._height) >= ((_this1 == null) ? 0 : _this1._height)) {
				return new TreeNode(l.left, l.key, l.value, new TreeNode(l.right, k, v, r));
			} else {
				return new TreeNode(new TreeNode(l.left, l.key, l.value, l.right.left), l.right.key, l.right.value, new TreeNode(l.right.right, k, v, r));
			};
		} else if (hr > hl + 2) {
			let _this = r.right;
			let _this1 = r.left;
			if (((_this == null) ? 0 : _this._height) > ((_this1 == null) ? 0 : _this1._height)) {
				return new TreeNode(new TreeNode(l, k, v, r.left), r.key, r.value, r.right);
			} else {
				return new TreeNode(new TreeNode(l, k, v, r.left.left), r.left.key, r.left.value, new TreeNode(r.left.right, r.key, r.value, r.right));
			};
		} else {
			return new TreeNode(l, k, v, r, ((hl > hr) ? hl : hr) + 1);
		};
	}
	compare(k1, k2) {
		return Reflect.compare(k1, k2);
	}
	toString() {
		if (this.root == null) {
			return "{}";
		} else {
			return "{" + this.root.toString() + "}";
		};
	}
	
	/**
	Removes all keys from `this` BalancedTree.
	*/
	clear() {
		this.root = null;
	}
	static iteratorLoop(node, acc) {
		if (node != null) {
			BalancedTree.iteratorLoop(node.left, acc);
			acc.push(node.value);
			BalancedTree.iteratorLoop(node.right, acc);
		};
	}
	static get __name__() {
		return "haxe.ds.BalancedTree"
	}
	static get __interfaces__() {
		return [IMap]
	}
	get __class__() {
		return BalancedTree
	}
}


/**
A tree node of `haxe.ds.BalancedTree`.
*/
export const TreeNode = Register.global("$hxClasses")["haxe.ds.TreeNode"] = 
class TreeNode extends Register.inherits() {
	new(l, k, v, r, h = -1) {
		this.left = l;
		this.key = k;
		this.value = v;
		this.right = r;
		if (h == -1) {
			let tmp;
			let _this = this.left;
			let _this1 = this.right;
			if (((_this == null) ? 0 : _this._height) > ((_this1 == null) ? 0 : _this1._height)) {
				let _this = this.left;
				tmp = (_this == null) ? 0 : _this._height;
			} else {
				let _this = this.right;
				tmp = (_this == null) ? 0 : _this._height;
			};
			this._height = tmp + 1;
		} else {
			this._height = h;
		};
	}
	toString() {
		return ((this.left == null) ? "" : this.left.toString() + ", ") + ("" + Std.string(this.key) + "=" + Std.string(this.value)) + ((this.right == null) ? "" : ", " + this.right.toString());
	}
	static get __name__() {
		return "haxe.ds.TreeNode"
	}
	get __class__() {
		return TreeNode
	}
}


//# sourceMappingURL=BalancedTree.js.map