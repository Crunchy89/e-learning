<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function menu()
    {
        $db = $this->db;
        $db->select('*');
        $db->from('user_access');
        $db->join('user_role', 'user_role.id_role = user_access.id_role', 'inner');
        $db->join('user_menu', 'user_menu.id_menu = user_access.id_menu', 'inner');
        $db->where('user_access.id_role', $this->session->userdata('role'));
        $db->where('user_menu.is_active',1);
        $menu = $db->get()->result();
        foreach ($menu as $m) {
            $data[] = [
                'id_menu' => $m->id_menu,
                'title' => $m->title,
                'icon' => $m->icon,
                'is_active' => $m->is_active,
                'submenu' => $this->db->get_where('user_submenu', ['id_menu' => $m->id_menu, 'is_active' => 1])->result()
            ];
        }
        return $data;
    }
}
