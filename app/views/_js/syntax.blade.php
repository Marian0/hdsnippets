<?php
/** Initalize the syntax highlight **/
?>
<script>
	
	var syntax = syntax || {};
	syntax.OPTIONS = {
		style: 'neon'
	};
	
	//clipboard: "{ URL::asset('assets/higlighter/ZeroClipboard.swf') }"
	
	$( document ).ready(function() {
		syntax.init();
	});
	
	syntax.init = function() {
		var codes = $('.syntaxCode');
		if (typeof(codes) === 'undefined' || codes.length === 0 ) {
			return false;
		}
		
		codes.each(function() {
			var element = $(this);
			syntax.buildCode(element);
		});
	};
	
	syntax.buildCode = function(element) {
		element = $(element);
		var language = element.data('language');
		var loaded = element.data('loaded') || false;
		
		if (language && loaded === false) {
			element.snippet(language, syntax.OPTIONS);
			element.data('loaded', true);
		}
		
	};
</script>