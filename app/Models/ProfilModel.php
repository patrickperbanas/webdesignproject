<?php namespace App\Models;
use CodeIgniter\Model;


class ProfilModel extends Model
{

    public function get_profil()
    {
        return $this->db->table('profil')->get()->getResultArray();
    }    
}