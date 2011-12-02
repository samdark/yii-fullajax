<?php $this->renderPartial('_menu')?>

<div>
	<a href="#default" id="default">preventDefault</a> |
	<a href="#bubble" id="bubble">cancelBubble</a> |
	<a href="#false" id="false">return false</a>
</div>

<script>
	jQuery(function($){
		$('#default').click(function(e){
			e.preventDefault();
		});

		$('#bubble').click(function(e){
			e.stopPropagation();
		});

		$('#false').click(function(e){
			return false;
		});
	});
</script>