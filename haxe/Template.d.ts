import {ArrayIterator} from "./iterators/ArrayIterator"
import {List} from "./ds/List"
import {StringBuf} from "../StringBuf"
import {EReg} from "../EReg"

export declare namespace TemplateExpr {
	export type OpVar = {_hx_index: 0, v: string, __enum__: "haxe._Template.TemplateExpr"}
	export const OpVar: (v: string) => TemplateExpr
	export type OpStr = {_hx_index: 3, str: string, __enum__: "haxe._Template.TemplateExpr"}
	export const OpStr: (str: string) => TemplateExpr
	export type OpMacro = {_hx_index: 6, name: string, params: List<TemplateExpr>, __enum__: "haxe._Template.TemplateExpr"}
	export const OpMacro: (name: string, params: List<TemplateExpr>) => TemplateExpr
	export type OpIf = {_hx_index: 2, expr: (() => any), eif: TemplateExpr, eelse: TemplateExpr, __enum__: "haxe._Template.TemplateExpr"}
	export const OpIf: (expr: (() => any), eif: TemplateExpr, eelse: TemplateExpr) => TemplateExpr
	export type OpForeach = {_hx_index: 5, expr: (() => any), loop: TemplateExpr, __enum__: "haxe._Template.TemplateExpr"}
	export const OpForeach: (expr: (() => any), loop: TemplateExpr) => TemplateExpr
	export type OpExpr = {_hx_index: 1, expr: (() => any), __enum__: "haxe._Template.TemplateExpr"}
	export const OpExpr: (expr: (() => any)) => TemplateExpr
	export type OpBlock = {_hx_index: 4, l: List<TemplateExpr>, __enum__: "haxe._Template.TemplateExpr"}
	export const OpBlock: (l: List<TemplateExpr>) => TemplateExpr
}

export declare type TemplateExpr = 
	| TemplateExpr.OpVar
	| TemplateExpr.OpStr
	| TemplateExpr.OpMacro
	| TemplateExpr.OpIf
	| TemplateExpr.OpForeach
	| TemplateExpr.OpExpr
	| TemplateExpr.OpBlock

export type Token = {l: string[], p: string, s: boolean}

export type ExprToken = {p: string, s: boolean}

/**
`Template` provides a basic templating mechanism to replace values in a source
String, and to have some basic logic.

A complete documentation of the supported syntax is available at:
<https://haxe.org/manual/std-template.html>
*/
export declare class Template {
	constructor(str: string)
	protected expr: TemplateExpr
	protected context: any
	protected macros: any
	protected stack: List<any>
	protected buf: StringBuf
	
	/**
	Executes `this` `Template`, taking into account `context` for
	replacements and `macros` for callback functions.
	
	If `context` has a field `name`, its value replaces all occurrences of
	`::name::` in the `Template`. Otherwise `Template.globals` is checked instead,
	If `name` is not a field of that either, `::name::` is replaced with `null`.
	
	If `macros` has a field `name`, all occurrences of `$$name(args)` are
	replaced with the result of calling that field. The first argument is
	always the `resolve()` method, followed by the given arguments.
	If `macros` has no such field, the result is unspecified.
	
	If `context` is `null`, the result is unspecified. If `macros` is `null`,
	no macros are used.
	*/
	execute(context: any, macros?: null | any): string
	protected resolve(v: string): any
	protected parseTokens(data: string): List<Token>
	protected parseBlock(tokens: List<Token>): TemplateExpr
	protected parse(tokens: List<Token>): TemplateExpr
	protected parseExpr(data: string): (() => any)
	protected makeConst(v: string): (() => any)
	protected makePath(e: (() => any), l: List<ExprToken>): (() => any)
	protected makeExpr(l: List<ExprToken>): (() => any)
	protected skipSpaces(l: List<ExprToken>): void
	protected makeExpr2(l: List<ExprToken>): (() => any)
	protected run(e: TemplateExpr): void
	protected static splitter: EReg
	protected static expr_splitter: EReg
	protected static expr_trim: EReg
	protected static expr_int: EReg
	protected static expr_float: EReg
	
	/**
	Global replacements which are used across all `Template` instances. This
	has lower priority than the context argument of `execute()`.
	*/
	static globals: any
	protected static hxKeepArrayIterator: ArrayIterator<any>
}

//# sourceMappingURL=Template.d.ts.map