<?php

//to change directory of a controller
namespace App\Controllers\Task;

//to make base controller can be used in this directory
use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use CodeIgniter\HTTP\RedirectResponse;

class MahasiswaController extends BaseController
{
    // Variable that's gonna be assigned as a model and used in almost of all function
    protected $mahasiswaModel;

    /**
     * An constructor to make mahasiswa model
     * mahasiswaController constructor.
     */
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    /**
     * Checking session, prevent users
     * access web without login first
     */
    public function index()
    {
        $session = session();
        echo "Welcome back, " . $session->get('username');
    }

    /**
     * Very first function that's gonna be executed
     * Showing the Dashboard
     * @return string
     */
    public function showDashboard()
    {
        // Title of this page
        $data = [
            'title' => 'Dashboard'
        ];

        return view('task/v_dashboard', $data);
    }

    /**
     * Used to displaying data of mahasiswa
     * @return string
     */
    public function showMahasiswa()
    {
        // Fetch mahasiswa data from database
//        $keywords = $this->request->getVar('keywords');
//        $pager = \Config\Services::pager();

//        if ($keywords) {
//            $mahasiswa = $this->mahasiswaModel->searchData($keywords);
//
//            $data = [
//                'title' => 'Search Result',
//                'mahasiswa' => $mahasiswa
//            ];
//
//            return view('task/v_search_result', $data);
//        } else {
////            $mahasiswa = $this->mahasiswaModel->getData();
//
//            $data = [
//                'title' => 'Data Mahasiswa',
//                'mahasiswa' => $this->mahasiswaModel->paginate(3, 'bootstrap'),
//                'pager' => $this->mahasiswaModel->pager
//            ];
//
//            return view('task/v_all_mahasiswa', $data);
//        }

        // Fetch mahasiswa data from database
        $keywords = $this->request->getVar('keywords');
        $page = $this->create_paging();
        $total = count($this->mahasiswaModel->searchData($keywords));


        if ($keywords) {
            $mahasiswa = $this->mahasiswaModel->searchData($keywords);

            $data = [
                'title' => 'Search Result',
                'mahasiswa' => $mahasiswa,
                'pager' => ceil($total/$page['jlhTampil'])
            ];

        } else {
            $data = [
                'title' => 'Data Mahasiswa',
                'mahasiswa' => $this->mahasiswaModel->getData($page['mulai'],$page['jlhTampil']),
                'mulai' => $page['mulai'],
                'pager' => ceil($total/$page['jlhTampil'])
            ];
        }
        return view('task/v_all_mahasiswa', $data);
    }

    public function create_paging(){
        $getPage = $this->request->getVar('halaman');
        $jlhTampil = 3;
        $page = isset($getPage) ? (int)$getPage:1;
        $mulai = ($page>1) ? ($page * $jlhTampil) - $jlhTampil : 0;
//        $kunci ="";
        return [
            'mulai' => $mulai,
            'jlhTampil' => $jlhTampil
        ];
    }

    /**
     * Will be open up form to add mahasiswa data
     * @return string
     */
    public function showFormCreateMahasiswa()
    {
        $data = [
            'title' => 'Form Add Mahasiswa'
        ];

        return view('task/v_form_create_mahasiswa', $data);
    }

    /**
     * Will submit and save the data that user inputted to the form
     * Will be activated when submit button clicked
     * The submit button is in form add mahasiswa data
     * @return RedirectResponse
     */
    public function createMahasiswa()
    {
        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move('img');
        $namaFoto = $fileFoto->getName();
        // Get all data that user inputted in form add mahasiswa data
        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto
        ];

        $this->mahasiswaModel->insertData($data);

        // Will redirect to display mahasiswa data page
        return redirect()->to('/mahasiswa');
    }

    /**
     * View the detail of a mahasiswa data
     * @param $id
     * @return string
     */
    public function showDetailMahasiswa($nim)
    {
        $page = $this->create_paging();
        $mahasiswa = $this->mahasiswaModel->getDetailData($nim);

        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        return view('task/v_detail_mahasiswa', $data);
    }

    /**
     * Delete data of a mahasiswa
     * @param $nim
     * @return RedirectResponse
     */
    public function deleteMahasiswa($nim)
    {
        $this->mahasiswaModel->deleteData($nim);

        return redirect()->to('/mahasiswa');
    }

    /**
     * Update data with the nim
     * fetch all data mahasiswa with that nim
     * nim will be false because that nim wouldn't be able to updated
     * show the form of edit data
     * @param false $nim
     * @return string
     */
    public function updateMahasiswa($nim = false)
    {
        $mahasiswa = $this->mahasiswaModel->getDetailData($nim);

        $data = [
            'title' => 'Form Edit Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        return view('task/v_form_update_mahasiswa', $data);
    }

    //--------------------------------------------------------------------

}
