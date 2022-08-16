<?php 

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        //     admin/dashboard 
        //     [admin, testing]
            //    0        1
        $url = $this->parseURL();
        // controller
        $controller = $url[0] ?? $this->controller;
        if( file_exists('../app/controllers/' . $controller. '.php') ) {
            $this->controller = $controller;
            unset($controller);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if( isset($url[1]) ) {
            if( method_exists($this->controller, $url[1]) ) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        if( !empty($url) ) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, serta kirimkan params jika ada
        try {
            call_user_func_array([$this->controller, $this->method], $this->params);
        }
        catch(TypeError $error){
            //var_dump($error->getTrace());
            return redirect('', ['fail' => 'Bad Requests!']);
        }
    }

    public function parseURL()
    {
        if( isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            //   public/user/login/
            // [user, login]
        
            return $url;
        }
    }
}





