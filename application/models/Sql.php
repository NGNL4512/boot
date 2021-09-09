<?php
class Sql extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function add($add_title_text, $add_number, $editor)
    {
        //$num = $this->db->count_all_results('news') + 1;
        $data = array(
            'id' => null,
            'title' => $add_title_text,
            'slug' => $add_number,
            'text' => $editor,
        );

        $this->db->set($data);
        $this->db->insert('news');

    }
    public function delete_text($id)
    {
        $this->db->delete('news', array('id' => $id));
    }
    public function edit_text($id, $add_title_text, $add_number, $editor)
    {
        $data = array(
            'title' => $add_title_text,
            'slug' => $add_number,
            'text' => $editor,
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
}
