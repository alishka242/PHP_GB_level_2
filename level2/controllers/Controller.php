<?php

namespace app\controllers;

class Controller
{
    private $layout = 'main';
    private $useLayout = true;
    private $action;
    private $defaultAction = 'index';


    public function runAction($action)
    {
        $this->action = $action ?? $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            die('action is not exists');
        }
    }

    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'header' => $this->renderTemplate('header', $params),
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params),
                'footer' => $this->renderTemplate('footer', $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    protected function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = VIEWS_DIR . $template . '.php';
        if (file_exists($templatePath)) {
            include $templatePath;
            return ob_get_clean();
        } else {
            die('view is not exists');
        }
    }
}
