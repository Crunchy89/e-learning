<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'sekolah';
        $this->id = 'id_sekolah';
    }
    public function getProfile()
    {
        return $this->db->get_where($this->table, [$this->id => 1])->row();
    }
    public function getMedsos()
    {
        return $this->db->get('medsos')->result();
    }
}
