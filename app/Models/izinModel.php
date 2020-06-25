<?php namespace App\Models;
use CodeIgniter\Model;


class izinModel extends Model
{

    protected $izinTypes = [
        1, 2
    ];

    public function get_cuti()
    {
        return $this->db->table('izin')->where('izin_type', 1)->get()->getResultArray();
    }    
    public function get_perjalanan_bisnis()
    {
        return $this->db->table('izin')->where('izin_type', 2)->get()->getResultArray();
    }    
    public function get_all_izin()
    {
        return $this->db->table('izin')->get()->getResultArray();
    }
    public function get_all_izin_by_nik($nik)
    {
        return $this->db->table('izin')->where('nik', $nik)->get()->getResultArray();
    }
    public function get_all_izin_by_type_and_nik($type, $nik)
    {
        return $this->db->table('izin')->where('nik', $nik)->where('izin_type', $type)->get()->getResultArray();
    }     
    public function insert_izin($data)
    {
        $this->db->table('izin')->insert($data);
        $id = $this->db->insertID();
        return $this->db->table('izin')->where('id_izin', $id)->get()->getRowArray();
    }
    public function get_izin_by_id($id){
        return $this->db->table('izin')->where('id_izin', $id)->get()->getRowArray();
    }
    public function update_izin($data, $id_izin){
        $this->db->table('izin')->update($data,array('id_izin' => $id_izin));
        return $this->db->table('izin')->where('id_izin', $id_izin)->get()->getRowArray();
    }
    public function get_all_izin_to_approve($nik){
        return $this->db->table('izin')->where('nik !=', $nik)->get()->getResultArray();
    }
}