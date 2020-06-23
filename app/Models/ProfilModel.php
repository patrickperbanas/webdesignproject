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
}