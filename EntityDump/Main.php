<?php

namespace IdnoPlugins\EntityDump {

    class Main extends \Idno\Common\Plugin {

	function registerEventHooks() {
	    
	}

	function registerPages() {
	    \Idno\Core\Idno::site()->addPageHandler('/admin/entitydump/?', 'IdnoPlugins\EntityDump\Pages\Admin');
	    
	    \Idno\Core\site()->template()->extendTemplate('admin/menu/items', 'admin/EntityDump/menu');
	}

    }

}