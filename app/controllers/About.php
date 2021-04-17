<?php 

class About extends Controller {
    public function index()
    {
        $data['header']='About';
        $data['status']=['Bujang','programmer','umur'];
        $this->view('componen/body',$data);
        $this->view('about/index',$data);
        $this->view('componen/footer');
    }
    public function page(){
        echo "about/page";
    }
}