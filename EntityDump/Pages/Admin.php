<?php

namespace IdnoPlugins\EntityDump\Pages {


    class Admin extends \Idno\Common\Page {

	function getContent() {
	    $this->adminGatekeeper(); // Admins only

	    $entities = \Idno\Common\Entity::getFromAll([],[], $this->getInput('limit', 50));
	    
	    $t = \Idno\Core\Idno::site()->template();
	    $body = $t->__(['entities' => $entities])->draw('admin/entitydump');
	    $t->__(['title' => 'Entity dump', 'body' => $body])->drawPage();
	}

	function postContent() {
	    $this->adminGatekeeper();
	    
	    $entity = \Idno\Common\Entity::getByID($this->getInput('uuid'));
            if (!$entity) $entity = \Idno\Common\Entity::getByUUID ($this->getInput('uuid'));
            if (!$entity) $entity = \Idno\Common\Entity::getByShortURL($this->getInput('uuid'));
            if (!$entity) throw new \RuntimeException("Error: Could not retrieve entity " . $this->getInput('uuid'));
	    
	    $t = \Idno\Core\Idno::site()->template();
	    $body = $t->__(['entities' => [$entity]])->draw('admin/entitydump');
	    $t->__(['title' => 'Entity dump', 'body' => $body])->drawPage();
	}

    }
}
    