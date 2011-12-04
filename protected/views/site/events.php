<?php $this->renderPartial('_menu')?>

<p>jQuery events</p>

<div>
	<p>Simple.</p>
	<a href="#" id="simple">Test</a>
	<script>
		jQuery(function($){
			$('#simple').click(function(e){
				e.preventDefault();
				alert("simple click");
			});
		});
	</script>
</div>

<div id="delegate-container">
	<p>Delegate to container.</p>
	<a href="#" id="delegate-to-container">Test</a>
	<script>
		jQuery(function($){
			$('#delegate-container').delegate("#delegate-to-container", 'click', function(e){
				e.preventDefault();
				alert("click caught via delegation to container");
			});
		});
	</script>
</div>

<div>
	<p>Delegate to body. This one will bind additional handler to body every ajax reload.</p>
	<a href="#" id="delegate-to-body">Test</a>
	<script>
		jQuery(function($){
			$('body').delegate("#delegate-to-body", 'click', function(e){
				e.preventDefault();
				alert("click caught via delegation to body");
			});
		});
	</script>
</div>

<div>
	<p>Live doesn't work for some reason.</p>
	<a href="#" id="live">Test</a>
	<script>
		jQuery(function($){
			$("#live").live('click', function(e){
				e.preventDefault();
				alert("click caught via live");
			});
		});
	</script>
</div>

<div id="on-container">
	<p>New on syntax. Works fine.</p>
	<a href="#" id="on-no-selector">Test w/o selector</a>
	<a href="#" id="on-selector">Test w/ selector</a>
	<script>
		jQuery(function($){
			$("#on-no-selector").on('click', function(e){
				e.preventDefault();
				alert("click caught via on without delegation");
			});

			$("#on-container").on('click', "#on-selector", function(e){
				e.preventDefault();
				alert("click caught via on with delegation");
			});
		});
	</script>
</div>