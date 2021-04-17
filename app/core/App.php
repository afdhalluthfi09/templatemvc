<?php 

class App{
     /* 🧪 mencoba testing part 3 */
     protected $controller ='Home';
     protected $method ='index';
     protected $param = [];

    public function __construct()
    {
        /* 🧪 mencoba testing part 1 */
        //echo 'Heloo broo';
        //var_dump($_GET); //nangkap url

        /* 🧪 mencoba testing part 2 */
            $url =$this->parseUrl();
        //echo '<pre>';
        //var_dump($url);
        //echo '</pre>';

        /* 🧪 mencoba testing part 3.1 controller */
        if(file_exists('../app/controllers/'.$url[0].'.php'))
        {
            $this->controller =$url[0];
            unset($url[0]);
            //  echo '<pre>';
            //     var_dump($url);
            // echo '</pre>';
        }
        // 3.1 :melakukan inisialisasi jika url yang di panggil belum ada
        require_once '../app/controllers/'. $this->controller.'.php'; 
        $this->controller = new $this->controller;

         /* 🧪 mencoba testing part 3.2 method */
        if(isset($url[1]))
        {
            if(method_exists($this->controller,$url[1]))
            {
                $this->method =$url[1];
                unset($url[1]);
                //  echo '<pre>';
                //     var_dump($url);
                // echo '</pre>';
            }
        }

         /* 🧪 mencoba testing part 3.3 param */
         if(!empty($url))
         {
             $this->param = array_values($url); //array_values(): berguna untuk mengisi value pada sebuah array[] kosong
         }

        /* 🧪 mencoba testing part 4 menjalankan controller dan method yang sudah dibuat*/
        call_user_func_array([$this->controller,$this->method],$this->param); 
    }

    /* 🐱‍👤 jutsu pembersihan url agar tidak mudah diretas */
    public function parseUrl()
    {
        if(isset($_GET['b']))
        {
            $url= rtrim($_GET['b'],'/'); //mebersihkan akhir dari karakter
            $url= filter_var($url,FILTER_SANITIZE_URL); //mebersihkan seluruh character jahat menjadi string
            $url =explode('/',$url); // memsihakan atau memecah suatu string menjadi beberapa array
            return $url;
        }    
    }
}