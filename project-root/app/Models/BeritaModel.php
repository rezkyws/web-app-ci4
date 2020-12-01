<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class BeritaModel extends Model
{
    // Defining the table name
    protected $table = 'berita';

    // Allowing to add datetime in database
    protected $useTimestamps = true;

    // Allowing to add these fields in database
    protected $allowedFields = ['judul', 'isi', 'author', 'gambar'];

    public function getData($mulai,$btsHalaman)
    {
        $sql = "SELECT * FROM ".$this->table." LIMIT $mulai, $btsHalaman";
        $query = $this->db->query($sql);
        $results = $query->getResult('array');
        return $results;
    }


    /**
     * Read/view all data of mahasiswa but also check the nim
     * if there is nim then show detail mahasiswa with that nim
     * @param false $id
     * @return array|array[]|object[]
     */
    public function getDetailData($id)
    {
//        //show all data
//        if ($nim == null) {
//            $db = Database::connect();
//            $sql = 'SELECT * FROM ' . $this->table;
//            $query = $db->query($sql);
//            $results = $query->getResult();
//            return $results;
//        }

//        if($nim == null) {
//            $sql = "SELECT * FROM ".$this->table." LIMIT $mulai, $btsHalaman";
//            $query = $this->db->query($sql);
//            $results = $query->getResult('array');
//            return $results;
//        }

        //show detail of a mahasiswa
        $db = Database::connect();
        $result = $db->query("SELECT * FROM " . $this->table . " WHERE id='$id'");

        return $result->getResult();
    }

    /**
     * Insert new mahasiswa data to the database
     * but also use to update data if primary key is duplicate
     * @param $data
     */
    public function insertData($data)
    {
        $judul = $data['judul'];
        $isi = $data['isi'];
        $author = $data['author'];
        $gambar = $data['gambar'];

        $this->db->query("INSERT INTO " . $this->table . "(judul, isi, author, gambar) VALUES ('$judul', '$isi', '$author', '$gambar') 
        ON DUPLICATE KEY UPDATE  judul='$judul', isi='$isi', author='$author', gambar='$gambar'");
    }

    /**
     * Search the data of a/some mahasiswa from mahasiswa table
     * @param $keywords
     * @return array|array[]|object[]
     */
    public function searchData($keywords)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE judul LIKE '%$keywords%'";
        $query = $this->db->query($sql);
        $result = $query->getResult('array');
        return $result;
    }

    /**
     * Delete data of a mahasiswa
     * @param $nim
     */
    public function deleteData($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE nim='$id'");
    }
}
