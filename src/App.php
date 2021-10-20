<?php

namespace App;

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
     * Uruchamia apke.
     */
    public function run(): void{
        //$this->processRouting();
        $request = Request::initialize();
        $router = new Router($this->getRoutes());
        $page = $router->match($request);
        $layout = new Layout($page);
        $layout->render();
    }
    /**
     * @return string
     */
    public function getPage(): string
{
    return $this->page;
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

    /**
     * @return array[]
     */
    private function getRoutes(): array
    {
        return [
            '/' => 'home',
            '/article'  => 'article',
            '/article/(\d+)'  => 'article',
            '/body' => 'body'
        ];
    }

}