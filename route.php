<?php

class Route{

    private $uri = array();
    // private $method = array();

    public function add($uri){
        $this->uri[] = '/'.trim($uri, '/') ;
        // if ($method != null ){
        //     $this->method[] = $method;
        // }
    }

    // public function submit(){ 
       
    //     echo $uriGetParam = isset($_GET['uri'])? '/'.$_GET['uri']:'/';
    //     foreach($this->uri as $key=> $value){
    //         if(preg_match("#^$value$#", $uriGetParam)){

    //             // $useMethod = $this->method[$key];
    //             // new $useMethod(); 
               

    //         }
    //     }
    // }
}

?>