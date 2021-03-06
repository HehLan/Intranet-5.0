<?php

require_once(dirname(dirname(__FILE__)).'/common/var.conf.php');
require_once(SMARTY_DIR.'Smarty.class.php');

//require_once($_SERVER['CONTEXT_DOCUMENT_ROOT'].'Intranet'.'/common/var.conf.php');

// Smarty_HEHLan class
class Smarty_HEHLan extends Smarty 
{    
    public function __construct()
    {
        parent::__construct();
      
        // It is not recommended to put these directories under the web server document root
        $this->setTemplateDir(DOCUMENT_ROOT.'/view/templates/');
        $this->setCompileDir(DOCUMENT_ROOT.'/view/templates_c/');
        $this->setCacheDir(DOCUMENT_ROOT.'/view/cache/');
        $this->setConfigDir(DOCUMENT_ROOT.'/view/configs/');
        
        $this->configLoad('paths.conf');
              
        
        $this->compile_check = false;    // put to false for maximal performance when it is into production
        $this->force_compile = false;    // should never be used in a production environment
        $this->debugging = false;
        //$this->debugging_ctrl = ($_SERVER['SERVER_NAME'] == 'localhost')
        $this->caching = 0;
        $this->cache_lifetime = 0;
        
        
        
        // Delimiters in HTML codes
        $this->left_delimiter = '{';
        $this->right_delimiter = '}';
        
        // Delimiters in JavaScript codes
        //$this->left_delimiter = '<!--{';
        //$this->right_delimiter = '}-->';
        
        $this->assign('app_name', 'HEHLan');
    }
}
