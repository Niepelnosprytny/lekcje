<?php

namespace App;

use App\Controllers\ControllerInterface;

/**
 * Application entry point.
 */
class App
{
    /**
     * @var string
     */
    private $page;
    /**
     * @var Request
     */
    private $request;
    /**
     * Uruchamia apke.
     */

    public function run(): void{
        //$this->processRouting();
        $this->request = Request::initialize();
        $serviceContainer = ServiceContainer::getInstance();
        $router = $serviceContainer->getService('router');

        $matchedRoute = $router->match($this->request);
        if($matchedRoute instanceof ControllerInterface){
            $response = $matchedRoute($this->request);
            foreach ($response->getHeaders() as $header){
                header($header);
            }

            echo $response->getBody();

        }
        else{
        $layout = new Layout($this->request,$matchedRoute);
        $layout->render();
        }
    }

/**
 * Pobiera parametr i wyswietla strone zadana przez uzytkownika
 */
    private function processRouting(): void
    {
        $page = $_GET['page'] ?? 'home';

        if(!preg_match('/^[a-z0-9]+$/',$page)){
            $page = 'home';
        }

        $this->page=$page;
    }


}