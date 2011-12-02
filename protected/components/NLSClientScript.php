<?php
/**
 * NLSClientScript v3.3
 * 
 * CClientScript extension for preventing multiple loading of javascript files.
 * Important! This extension does not prevent to load the same script content from different paths. 
 * So eg. if you published the same js file into different asset directories, this extension won't prevent to load both.
 * 
 * 
 * 
 * Usage: simply set the class for the clientScript component in /protected/config/main.php, like
 *  ...
 *   'components'=>array(
 *     ...
 *     'clientScript' => array('class'=>'your.path.to.NLSClientScript')
 *     ...
 *   )
 *  ...
 * 
 * The extension is based on the great idea of Eirik Hoem, see
 * http://www.eirikhoem.net/blog/2011/08/29/yii-framework-preventing-duplicate-jscss-includes-for-ajax-requests/
 * 
 */
class NLSClientScript extends CClientScript {

/**
 * Applying global ajax post-filtering
 * original source: http://www.eirikhoem.net/blog/2011/08/29/yii-framework-preventing-duplicate-jscss-includes-for-ajax-requests/
*/
	public function init() {

		parent::init();
		
		if (Yii::app()->request->isAjaxRequest)
			return;
		
		//we need jquery
		$this->registerCoreScript('jquery');
		
		//Minified code
		$this->registerScript('fixDuplicateResources', '$.ajaxSetup({global:true,dataFilter:function(g,e){if(e&&e!="html"&&e!="text")return g;var s="script[src],link[rel=\"stylesheet\"]",h=/(\?+)|(_=\d+)/g,a,c,d,b,f=document.getElementsByTagName("head")[0];if(!$._resMap){$._resMap={};$._holder=$(document.createElement("div"));for(c=0,d=$(document).find(s);c<d.length;c++)a=d[c],b=a.src?a.src:a.href,b=b.replace(h,""),a.href&&a.parentNode!=f&&f.appendChild(a),$._resMap[b]=1}$._holder[0].innerHTML=g;for(c=0,d=$._holder.find(s);c<d.length;c++)a=d[c],b=a.src?a.src:a.href,b=b.replace(h,""),$._resMap[b]?$(a).remove():(a.href&&f.appendChild(a),$._resMap[b]=1);return $._holder[0].innerHTML}});',CClientScript::POS_HEAD);

/*
//Source code:
		$this->registerScript('fixDuplicateResources', '

		$.ajaxSetup({
			global: true,
			dataFilter: function(data,type) {

				//shortcut: only "text" and "html" dataType should be filtered
				if (type && type != "html" && type != "text")
					return data;

				var selector = "script[src],link[rel=\"stylesheet\"]",rg=/(\?+)|(_=\d+)/g,tmp,i,res,ind,head=document.getElementsByTagName("head")[0];
				//var selector = "script[src]",tmp,i,res;

				//things to do only first time
				if (!$._resMap) {
					$._resMap = {};
					$._holder = $(document.createElement("div"));

					//fetching scripts from the DOM
					for(i=0,res=$(document).find(selector); i<res.length; i++) {
						tmp = res[i];
						ind = tmp.src ? tmp.src : tmp.href;
						ind = ind.replace(rg,"");
						if (tmp.href && tmp.parentNode!=head)
							head.appendChild(tmp);
						$._resMap[ind] = 1;
					}
				}

				$._holder[0].innerHTML = data;

				// iterate over new scripts and remove if source is already in DOM:
				for(i=0,res=$._holder.find(selector); i<res.length; i++) {
					tmp = res[i];
					ind = tmp.src ? tmp.src : tmp.href;
					ind = ind.replace(rg,"");
					if ($._resMap[ind])
						$(tmp).remove();
					else {
						if (tmp.href)
							head.appendChild(tmp);
						$._resMap[ind] = 1;
					}
				}

				return $._holder[0].innerHTML;
			}
		});

	',	CClientScript::POS_HEAD);
 */
		}

}
