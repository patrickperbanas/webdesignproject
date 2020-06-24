<?php namespace App\Models;
use CodeIgniter\Model;


class LoginModel extends Model
{

    protected $table = "user";

    public function cek_login($username, $password)
    {
        return $this->db->table('user')
        ->where(array('username' => $username, 'password'=>$password))
        ->get()->getRowArray();
    }    

    public function get_user()
    {
        return $this->db->table('profile')->get()->getResultArray();
    }    

    public function insert_user($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

   
}