<?php
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
class Twig {
    private $CI;

    private $_config = array();
    private $_twig;
    private $_twig_loader;

    public function __construct(){
        log_message('debug', 'Twig: library initialized');

        $this->CI =& get_instance();

        $this->_config = $this->CI->config->item('twig');

        try {
            $this->_twig_loader = new FilesystemLoader($this->_config['template_dir']);
        } catch (Exception $e) {
            show_error(htmlspecialchars_decode($e->getMessage()), 500, 'Twig Exception');
        }

        if($this->_config['environment']['cache'] === true){
            $this->_config['environment']['cache'] = APPPATH.'views/cache';
        }

        $this->_twig = new Environment($this->_twig_loader, $this->_config['environment']);
    }

    public function render($template, $data = array()){
        $template_ext = $this->addExtension($template);
        return $this->_twig->render($template_ext, $data);
    }

    public function display($template, $data = array()){
        $template_ext = $this->addExtension($template);
        $this->_twig->display($template_ext, $data);
    }

    private function addExtension($template){
        $ext = '.'.$this->_config['template_ext'];

        if(substr($template, -strlen($ext)) !== $ext){
            return $template .= $ext;
        }

        return $template;
    }
}