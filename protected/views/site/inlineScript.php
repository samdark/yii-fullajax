<?php $this->renderPartial('_menu')?>
<p>A page with inline script.</p>
<?php Yii::app()->clientScript->registerScript('non_unique_id', 'alert("executed.");');?>