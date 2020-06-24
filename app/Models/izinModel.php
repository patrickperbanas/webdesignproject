<?php namespace App\Models;
use CodeIgniter\Model;


class izinModel extends Model
{

    protected $izinTypes = [
        1, 2
    ];

    public function get_cuti()
    {
        return $this->db->table('izin')->get()->getResultArray();
    }    
}