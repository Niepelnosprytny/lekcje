<?php

namespace App;

class Request
{
    private $path;
    private $queryParameters;
        private function __construct(string $path, array $queryParameters)
        {
            $this->path = $path;
            $this->queryParameters = $queryParameters;
        }
        public static function initialize(){
            $uri = $_SERVER['REQUEST_URI'];
            $index = strpos($uri,'?');
            if($index === false){
                $path = $uri;
            }
            else{
                $path = substr($uri, 0, $index);
            }

            return new self($path, $_GET);

        }


        public function setPath(string $path): void{
            $this->path =$path;
        }
        public function setQueryParameters(array $queryParameters): void
        {
            $this->queryParameters = $queryParameters;
        }
        public function hasQueryParam(string $name)
        {
            return isset($this->queryParameters[$name]);
        }

        public function getQueryParameters(): array
        {
            return $this->queryParameters;
        }
        public function  getQueryParam(string $name, $default = 'null'): array
        {
            return $this->queryParameters[$name]?? $default;
        }
         public function getPath(): string
        {
            return $this->path;
        }

        public function addParam($parameter)
        {
            $this->queryParameters[]=$parameter;
        }


}