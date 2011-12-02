<?php
class SiteController extends CController
{
	public function actionIndex($view="index")
	{
		// we can do it in custom controller so it will be transparent for
		// apps
		if(Yii::app()->request->isAjaxRequest)
		{
			$this->renderPartial($view, null, false, true);
		}
		else
		{
			$this->render($view);
		}
	}
}