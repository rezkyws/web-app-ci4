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
    protected $allowedFields = ['nama', 'nim', 'kelas', 'alamat', 'foto'];

    /**
     * Read/view all data of mahasiswa but also check the nim
     * if there is nim then show detail mahasiswa with that nim
     * @param false $id
     * @return array|array[]|object[]
     */
    public function getData($nim = null)
    {
        //show all data
        if ($nim == null) {
            $db = Database::connect();
            $sql = 'SELECT * FROM ' . $this->table;
            $query = $db->query($sql);
            $results = $query->getResult();
            return $results;
        }

        //show detail of a mahasiswa
        $db = Database::connect();
        $result = $db->query("SELECT * FROM " . $this->table . " WHERE nim='$nim'");

        return $result->getResult();
    }

    /**
     * Insert new mahasiswa data to the database
     * but also use to update data if primary key is duplicate
     * @param $data
     */
    public function insertData($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $kelas = $data['kelas'];
        $alamat = $data['alamat'];
        $foto = $data['foto'];

        $this->db->query("INSERT INTO " . $this->table . "(nama, nim, kelas, alamat, foto) VALUES ('$nama', '$nim', '$kelas', '$alamat', '$foto') 
        ON DUPLICATE KEY UPDATE  nama='$nama', kelas='$kelas', alamat='$alamat', foto='$foto'");
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

    /**
     * Delete data of a mahasiswa
     * @param $nim
     */
    public function deleteData($nim)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE nim='$nim'");
    }
}
