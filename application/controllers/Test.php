<?php
$slug = null;
defined('BASEPATH') or exit('No direct script access allowed');
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logicver');
        $this->load->model('News_model');
        $this->load->model('Sql');
        $this->load->library('session');

    }
    public function e404()
    {
        if ($this->session->userdata('slug') == null) {
            redirect(site_url() . 'home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/404');
            $this->load->view('home/footer');
        }
    }
    public function blank()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/blank');
            $this->load->view('home/footer');
        }
    }
    public function buttons()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/buttons');
            $this->load->view('home/footer');
        }
    }
    public function cards()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/cards');
            $this->load->view('home/footer');
        }
    }
    public function charts()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/charts');
            $this->load->view('home/footer');
        }
    }
    public function forgot_password()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/forgot-password');
            $this->load->view('home/footer');
        }
    }
    //主頁
    public function index()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/index');
            $this->load->view('home/footer');
        }
    }
//登入頁面，判斷帳戶
    public function login()
    {
        //$this->session->sess_destroy();
        //$GLOBALS['slug'] = null;
        //echo "???" . $GLOBALS['slug'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('account', '帳號', 'required');
        $this->form_validation->set_rules('password', '密碼', 'required');
        $this->form_validation->set_message('required', '%s不能為空值'); //%s是帶入上面所設定的label

        $account = $this->input->post('account');
        $password = $this->input->post('password');
        $value['slug'] = $this->Logicver->verify($account, $password);
        $this->session->set_userdata($value);
        if ($this->form_validation->run() == false) {
            $this->load->view('home/login');
        } else {
            if ($value['slug'] == null) {
                echo "登入失敗，請重新登入";
                $this->load->view('home/login');
            } else {

                $value['slug'] = $this->session->userdata('slug');
                $this->load->view('home/header', $value);
                $this->load->view('home/index');
                $this->load->view('home/footer');
            }
        }
    }
    public function manage()
    {

        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {

            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/index');
            $this->load->view('home/footer');
        }
    }
    public function register()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/register');
            $this->load->view('home/footer');
        }
    }
    //繪製表格
    public function tables()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $this->load->library('form_validation');
            //$this->form_validation->set_rules('id', '標題', 'required');
            $id = $this->uri->segment(3);
            if ($id != null) {
                $this->Sql->delete_text($id);
                //window . alert($id);
            }
            echo $id;
            $data['news'] = $this->News_model->get_news();

            $data['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $data);
            $this->load->view('home/tables', $data);
            $this->load->view('home/footer');
        }
    }
    //增加文章，改為ajax不使用
    public function add_text()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('add_title_text', '標題', 'required');
        $this->form_validation->set_rules('add_number', '編號', 'required|min_length[1]');
        $this->form_validation->set_rules('add_text', '文章', 'required');
        $this->form_validation->set_message('required', '%s不能為空值'); //%s是帶入上面所設定的label

        $add_title_text = $this->input->post('add_title_text');
        $add_number = $this->input->post('add_number');
        $editor = $this->input->post('add_text');

        //echo $add_title_text . $add_number . $editor;
        //echo $this->input->post();

        $this->Sql->add($add_title_text, $add_number, $editor);
        //返回頁面
        $this->load->helper('url');
        redirect(site_url("test/tables"));
    }
    //編輯文章，改為ajax不使用
    public function edit_text()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('form_id', '標題', 'required');
        $this->form_validation->set_rules('add_title_text', '標題', 'required');
        $this->form_validation->set_rules('add_number', '編號', 'required|min_length[1]');
        $this->form_validation->set_rules('add_text', '文章', 'required');
        $this->form_validation->set_message('required', '%s不能為空值'); //%s是帶入上面所設定的label

        $id = $this->input->post('form_id');
        $add_title_text = $this->input->post('add_title_text');
        $add_number = $this->input->post('add_number');
        $editor = $this->input->post('add_text');
        $this->Sql->edit_text($id, $add_title_text, $add_number, $editor);
        //返回頁面
        $this->load->helper('url');
        redirect(site_url("test/tables"));
    }
    //刪除文章，改為ajax不使用
    public function detext()
    {
        //echo "delsete";
        $id = $this->uri->segment(3);
        echo $id;
        $this->Sql->delete_text($id);
        //返回頁面
        $this->load->helper('url');
        redirect(site_url("test/tables"));
    }
    public function utilities_animation()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {

            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/utilities-animation');
            $this->load->view('home/footer');
        }
    }
    public function utilities_border()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/utilities-border');
            $this->load->view('home/footer');
        }
    }
    public function utilities_color()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/utilities-color');
            $this->load->view('home/footer');
        }
    }
    public function utilities_other()
    {
        if ($this->session->userdata('slug') == null) {
            $this->load->view('home/login');
        } else {
            $value['slug'] = $this->session->userdata('slug');
            $this->load->view('home/header', $value);
            $this->load->view('home/utilities-other');
            $this->load->view('home/footer');
        }
    }
}
/*function soga($slug = null)
{
static $v = 0;//固定變數直到下次存取，轉移新頁面，似乎控制器會重來所以沒用
static $x;
echo $v;
if ($v == 0) {
$v++;
$x = $slug;
return $x;
} else {
return $x;
}

}*/
