<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'profile';
        $this->id = 'id_profile';
    }
    public function getData()
    {
        $db = $this->db;
        $db->select('*');
        $db->from('user');
        $db->join('profile', 'user.id_user = profile.id_user', 'left');
        $db->where('user.id_user', $this->session->userdata('id'));
        return $this->db->get()->row();
    }
}
