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
		var fullAJAX = {
			/**
			 * Stores latest valid URL we've opened.
			 */
			lastUrl: '#',
			/**
			 * For demo purpose. Shows URL in H2.
			 * @param url
			 * @param status
			 */
			updateUrl: function(url, status){
				if(status == 'success'){
					fullAJAX.lastUrl = url;
					$("#url").html(url);
				}
				else {
					$("#url").html(status);
				}
			},
			/**
			 * Loads URL.
			 * @param url
			 */
			loadUrl: function(url){
				$("#container").load(url, function (response, status, xhr)
				{
					fullAJAX.updateUrl(url, status);
				});
			},
			/**
			 * Allows to refresh AJAX part.
			 */
			refresh: function(){
				fullAJAX.loadUrl(fullAJAX.lastUrl);
			},
			init: function(){
				// Adds AJAX handler to all links.
				// HTML is used since Yii delegates to body by default and we need
				// to let Yii handler to execute.
				$('html').delegate("a","click", function(e){
					if(e.isDefaultPrevented()){
						return;
					}
					// if link doesn't have .noajax then we should not handle it
					if(!$(this).attr("noajax")){
						var url = $(this).attr("href");

						// if URL is a hashtag no need to reload it
						if(url.match(/^#/)){
							window.location.hash = url.replace(/^#/, '');
						}
						else {
							fullAJAX.loadUrl(url);
						}
						return false;
					}
				});

				// Adds refresh button handler
				$("#reload-page").click(function(e){
					e.preventDefault();
					fullAJAX.refresh();
				});
			}
		}
		jQuery(function($){
			fullAJAX.init();
		});
	</script>

	<h2>URL=<span id="url">static page</span> <a href="#" id="reload-page">reload</a></h2>
	<div id="container">
		<?php echo $content?>
	</div>
</body>
</html>
