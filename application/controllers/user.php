<?php
class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('user_type_model');
    }
 
    public function index()
    {
        $users = $this->user_model->getUser();
        $data = array(
                'users' => $users
            );
        $this->load->view('layout/header');
        $this->load->view('user/user', $data);
        $this->load->view('layout/footer');
    }
    
    public function adduser()
    {
        $user_type=$this->user_type_model->getUserType();
        $data=[
            'user_type' =>$user_type
        ];
        $this->load->view('layout/header');
        $this->load->view('user/adduser',$data);
        $this->load->view('layout/footer');
    }
 
    public function show($userID='')
    {
        $user = $this->user_model->getUserByID($userID);
        $data = [
            'user' => $user->row()
        ];
        $this->load->view('layout/header');
        $this->load->view('user/show', $data);
        $this->load->view('layout/footer');
    }
    public function profile()
    {
        echo "you are now login";
    }
    public function edit($userID='')
    {
        $user = $this->user_model->getUserByID($userID);
        $data = [
            'user' => $user->row()
        ];
        $this->load->view('layout/header');
        $this->load->view('user/edit', $data);
        $this->load->view('layout/footer');
    }
    public function update($userID='')
    {
        $user = $this->input->post();
        $result = $this->user_model->update($userID, $user);
        if ($result) {
            redirect('/user');
        } else {
            echo "Has error";
        }
    }
    public function delete($userID)
    {
        $result = $this->user_model->delete($userID);
        if ($result) {
            redirect('/user');
        } else {
            echo "Has error";
        }
    }
    public function create()
    {
        $data = $this->input->post();
        $this->load->model('user_model');
        $result = $this->user_model->insertUser($data);
        if ($result) {
            redirect('/user');
        } else {
            echo "Has error";
        }
    }
}
  //  public function sayMyname($name="NaHee", $surname="eiei")
   // {
        // $name = "NaHee eiei";
     //   echo "Your name is:".$name;
     //   echo "Your surname is :".$surname;
  //  }
//}
