Middle-End Boilerplate
(c) Kyle Simpson
MIT License


This is boilerplate code of where to start with Middle-End web architecture. It includes
two sub-modules: BikechainJS (server-side JavaScript) and HandlebarJS (templating engine).

What you need to get started:

1. A working v8 compile (for BikechainJS)
2. Compiled BikechainJS (`engine`)
3. Apache with:
	- mod_rewrite
	- perl 5.x
	- mod_xsendfile
4. Make sure that both `uri.routing` and `engine` have executable permissions