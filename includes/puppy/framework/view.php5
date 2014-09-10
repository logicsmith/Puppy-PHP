<?php

require('Smarty.class.php');

class view extends Smarty {

   function __construct(){
        $this->Smarty();

        $this->template_dir = puppy::getAppDir().'content/templates/';
        $this->cache_dir = puppy::getAppDir().'content/cache/';

        $this->caching = true;
   }

}
?>