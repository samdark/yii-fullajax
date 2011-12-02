<?php $this->renderPartial('_menu')?>

<p>This is a page w/o any ajaxified stuff.</p>
<p>Just static elements.</p>

<p>Here is a <a href="#hashed">hashed link</a></p>

<p>For example, we can link to <?php echo CHtml::link('grid page', array('site/index', 'view' => 'grid'))?>.</p>