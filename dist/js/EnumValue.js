import {Register} from "./genes/Register"

export const EnumValue_Impl_ = Register.global("$hxClasses")["_EnumValue.EnumValue_Impl_"] = 
class EnumValue_Impl_ {
	
	/**
	Matches enum instance `e` against pattern `pattern`, returning `true` if
	matching succeeded and `false` otherwise.
	
	Example usage:
	
	```haxe
	if (e.match(pattern)) {
	// codeIfTrue
	} else {
	// codeIfFalse
	}
	```
	
	This is equivalent to the following code:
	
	```haxe
	switch (e) {
	case pattern:
	// codeIfTrue
	case _:
	// codeIfFalse
	}
	```
	
	This method is implemented in the compiler. This definition exists only
	for documentation.
	*/
	static match(this1, pattern) {
		return false;
	}
	static get __name__() {
		return "_EnumValue.EnumValue_Impl_"
	}
	get __class__() {
		return EnumValue_Impl_
	}
}


//# sourceMappingURL=EnumValue.js.map