<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    
    public function index()
    {      
        $data['main_view'] = 'home_view';
        $data['index_img'] = base_url(). "assets/images/index/";
        $data['home_img'] = base_url(). "assets/images/home/";
        $data['home_gall'] = base_url(). "assets/gallery/home/";
        $data['slide_gall'] = base_url(). "assets/gallery/home/slideshow/";
        $data['box_gall'] = base_url(). "assets/gallery/home/box/";
        $data['fave_gall'] = base_url(). "assets/gallery/home/fave/";
        $data['page_title'] = 'home';
        $data['webpage'] = 'home';
        
        $url1 = ($this->uri->segment(1) != '' ? $this->uri->segment(1) : '');
        $data['existurl'] = base_url().$url1;
        $this->session->set_flashdata('existurl', $data['existurl']);
        $data['news_action'] = $data['existurl'].'#newsletter';
        
        $data['banner'] = $this->Home_model->get_banner()->result();
        
        $data['boxes'] = $this->Home_model->get_boxes()->result(); 
        /*$data['box_1'] = $this->Home_model->get_boxes(1)->row();        
        $data['box_2'] = $this->Home_model->get_boxes(2)->row();  
        $data['box_3'] = $this->Home_model->get_boxes(3)->row();*/
        
        $this->load->view('template_view', $data);
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
?>