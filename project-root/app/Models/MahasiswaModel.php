<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class mahasiswaModel extends Model
{
    // Defining the table name
    protected $table = 'mahasiswa';

    // Allowing to add datetime in database
    protected $useTimestamps = true;

    // Allowing to add these fields in database
    protected $allowedFields = ['nama', 'nim', 'kelas', 'alamat'];

    /**
     * Read/view all data of mahasiswa
     * @param false $id
     * @return array|array[]|object[]
     */
    public function getData($id = null)
    {
        if ($id == null) {
            $db = Database::connect();
            $sql = 'SELECT * FROM ' . $this->table;
            $query = $db->query($sql);
            $results = $query->getResult();
            return $results;
        }

        return $this->where(['id' => $id])->first();
    }

    /**
     * Insert new mahasiswa data to the database
     * @param $data
     */
    public function insertData($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $kelas = $data['kelas'];
        $alamat = $data['alamat'];

        $this->db->query("INSERT INTO mahasiswa(nama, nim, kelas, alamat) VALUES ('$nama', '$nim', '$kelas', '$alamat')");
    }

    /**
     * Search the data of a/some mahasiswa from mahasiswa table
     * @param $keywords
     * @return array|array[]|object[]
     */
    public function searchData($keywords)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE nama LIKE '%$keywords%'";
        $query = $this->db->query($sql);
        $result = $query->getResult();
        return $result;
    }
}