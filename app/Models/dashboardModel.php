<?php namespace App\Models;
use CodeIgniter\Model;
  
class dashboardModel extends Model
{
    protected $table = 'profile';
    
 
    // hitung total data pada profil
    public function getCountProfile()
    {
        return $this->db->table("profile")->countAll();
    }
 
    //hitung total data izin
    public function getCountCuti()
    {
        return $this->db->table('izin')->where('izin_type', 1)->countAll();
    }

    // hitung total data perjalanan bisnis
    public function getCountPerjalanan()
    {
        return $this->db->table('izin')->where('izin_type' == 2)->countAll();
    }  
    
 
    // hitung total data pada user
    public function getCountUser()
    {
        return $this->db->table("user")->countAll();
    }
 
    public function getGrafik()
    {
        $query = $this->db->query("SELECT nik, MONTHNAME(start_date) as month, COUNT(id_izin) as total FROM izin GROUP BY MONTHNAME(end_date) ORDER BY MONTH(end_date)");
        if(!empty($query)){
            foreach($query->getResultArray() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
    public function getLatestIzin()
    {
        return $this->db->table('izin')
            ->select('izin.*')
            ->orderBy('izin.id_izin', 'desc')
            ->limit(5)
            ->get()
            ->getResultArray();
    }
}