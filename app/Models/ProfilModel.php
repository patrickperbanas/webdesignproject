<?php namespace App\Models;
use CodeIgniter\Model;


class ProfilModel extends Model
{

    public function get_profil()
    {
        return $this->db->table('profile')->get()->getResultArray();
    }    

    public function insert_profile($data)
    {
        return $this->db->table('profile')->insert($data);
    }

    public function edit_profile($id_profile)
    {
        return $this->db->table('profile')->where('id_profile', $id_profile)->get()->getRowArray();
    }

    public function update_profile($data, $id_profile)
    {
        return $this->db->table('profile')->update($data,array('id_profile' => $id_profile));
    }

    public function delete_profile($id_profile)
    {
        return $this->db->table('profile')->delete(array('id_profile' => $id_profile));
    }

}