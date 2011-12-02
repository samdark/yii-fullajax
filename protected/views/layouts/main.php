<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo CHtml::encode($this->pageTitle)?></title>
	<?php Yii::app()->clientScript->registerPackage('jquery')?>
</head>
<body>
	<h1><?php echo CHtml::encode(Yii::app()->name)?></h1>
	<script>
		jQuery(function($){
			var lastUrl = '#';
			function load(url){
				// if URL is a hashtag no need to reload it
				if(url.match(/^#/)){
					window.location.hash = url.replace(/^#/, '');
					return;
				}

				$('#container').load(url, function(response, status, xhr){
					if(status == 'success'){
						lastUrl = url;
						$("#url").html(url);
					}
					else {
						$("#url").html(status);
					}
				});
			}

			$("#reload-page").click(function(e){
				e.preventDefault();
				load(lastUrl);
			});

			// adds AJAX handler to all links
			$("#container").delegate("a", "click", function(e){
				if(e.isDefaultPrevented()){
					return false;
				}
				e.preventDefault();
				load(e.target.href);
			});
		});
	</script>

	<h2>URL=<span id="url">static page</span> <a href="#" id="reload-page">reload</a></h2>
	<div id="container">
		<?php echo $content?>
	</div>
</body>
</html>
