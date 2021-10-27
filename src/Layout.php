<?php

namespace App;

class Layout
{
    /**
     * @var string
     */
        private  $name;
    /**
     * @var string
     */
        private $page;
    /**
     * @var string
     */
        private $title;
    /**
     * @var Request
     */
        private $request;

    /**
     * @param $page
     * @param string $name
     * @param string $title
     */
        public function __construct(
            Request $request,
            string $page,
            string $name ='default',
            string $title = 'APSL Website'
        ){
            $this->page = $page;
            $this->name = $name;
            $this->title = $title;
            $this->request=$request;

        }

    /**
     * process layout
     */
        public  function  render()
        {
            extract([
                'title'=>$this->title,
                'content'=> $this->renderTemplate()
            ]);
            include __DIR__."/../layouts/{$this->name}.php";

        }

    /**
     * process template/page
     */
        private function  renderTemplate(): string
        {
            ob_start();
            extract([
                'request'=>$this->request
            ]);
            include "../templates/{$this->page}.php";
            return ob_get_clean();
        }
}