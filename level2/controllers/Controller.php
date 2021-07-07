<?php

namespace app\controllers;

use app\interfaces\IRenderer;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;

abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    private $render;

    public function __construct(IRenderer $render)
    {
        $this->render = $render;
    }

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

    protected function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}",
                [
                    'header' => $this->renderTemplate(
                        'header',
                        [
                            'isAuth' => (new UserRepository())->isAuth(),
                            'userName' => (new UserRepository())->getName(),
                        ]
                    ),
                    'menu' => $this->renderTemplate(
                        'menu',
                        [
                            'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
                            //можно добавить сессию и имя п-ля для использования в контенте
                        ]
                    ),
                    'content' => $this->renderTemplate($template, $params),
                    'footer' => $this->renderTemplate('footer', $params)
                ]
            );
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    protected function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
