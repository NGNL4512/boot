<?php
class Logicver extends CI_Model
{

    public function __construct()
    {
        //到config database寫入使用者帳密
        $this->load->database();
    }

    public function verify($username = null, $password = null)
    {
        $query = $this->db->get('account');

        $password = md5($password);
        //$query2 = $this->db->get('password');
        foreach ($query->result() as $row) {
            if ($row->account == $username && $row->password == $password) {
                return $row->slug;
            }
        }
        //echo "null";
        return null;
    }
}
