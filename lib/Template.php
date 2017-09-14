<?php
ob_start();

/**
 * Template class
 */
class Template
{
    private $content = array();
    private $content2 = array();

    //Load view
    public function load($folder, $view, $data = array())
    {
        extract($data);
        ob_start();
        require_once ROOT . 'admin/view/' . $folder . '/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        $this->content[] = $content;
        return $content;
    }

    //Load template
    public function loadTemplate($view, $data = array())
    {
        extract($data);
        ob_start();
        require_once ROOT . 'admin/view/temp/' . $view . '.php';
        $content = ob_get_contents();
        ob_end_clean();

        $this->content2[] = $content;
        foreach ($this->content2 as $html) {
            echo $html;
        }
    }

    //Show view
    public function show()
    {
        foreach ($this->content as $html) {
            echo $html;
        }
    }
}

ob_flush();
