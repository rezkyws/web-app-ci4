<?php namespace App\Models;

use CodeIgniter\Model;

class mMahasiswa extends Model
{
//    function getData() {
//        $db = \Config\Database::connect();
//        $mahasiswa = $db->query("SELECT * FROM mahasiswa");
//        foreach ($mahasiswa->getResultArray() as $row) {
//            d($row);
//        }
//        return $mahasiswa;
//    }

    protected $table = 'mahasiswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'nim', 'kelas', 'alamat'];

    public function getData(){
        $db = \Config\Database::connect();
        $sql = 'SELECT * FROM '.$this->table;
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }

    public function insertData($data){
        $nim = $data['nim'];
        $nama = $data['nama'];
        $kelas = $data['kelas'];
        $alamat = $data['alamat'];

        $this->db->query("INSERT INTO mahasiswa(nama, nim, kelas, alamat) VALUES ('$nama', '$nim', '$kelas', '$alamat')");


//        $db = \Config\Database::connect();
//        $sql = 'INSERT INTO $table '.$this->table;
//        $db->query($sql);
//        $query = $db->query($sql);
//        $results = $query->getResult();
//        return $results;
    }
}