<?php $this->renderPartial('_menu')?>

<?php echo CHtml::link('Default Yii confirm.', array('site/index'), array('confirm' => 'Are you sure?'))?> |
<a href="#new-page" id="confirm">Confirm</a>

<script>
	jQuery(function($){
		$('#new-page').click(function(e){
			if(confirm('Cancel?')){
				e.preventDefault();
			}
		});
	});
</script>