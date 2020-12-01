<?php

//to change directory of a controller
namespace App\Controllers\Task;

//to make base controller can be used in this directory
use App\Controllers\BaseController;
use App\Models\BeritaModel;
use CodeIgniter\HTTP\RedirectResponse;

class BeritaController extends BaseController
{
    // Variable that's gonna be assigned as a model and used in almost of all function
    protected $beritaModel;

    /**
     * An constructor to make mahasiswa model
     * mahasiswaController constructor.
     */
    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
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
    public function showBerita()
    {
        // Fetch mahasiswa data from database
        $keywords = $this->request->getVar('keywords');
        $page = $this->create_paging();
        $total = count($this->beritaModel->searchData($keywords));


        if ($keywords) {
            $berita = $this->beritaModel->searchData($keywords);

            $data = [
                'title' => 'Search Result',
                'berita' => $berita,
                'pager' => ceil($total/$page['jlhTampil'])
            ];

        } else {
            $data = [
                'title' => 'Data Berita',
                'berita' => $this->beritaModel->getData($page['mulai'],$page['jlhTampil']),
                'mulai' => $page['mulai'],
                'pager' => ceil($total/$page['jlhTampil'])
            ];
        }
        return view('task/v_all_mahasiswa', $data);
    }

    public function showBeritaMember()
    {
        // Fetch mahasiswa data from database
        $keywords = $this->request->getVar('keywords');
        $page = $this->create_paging();
        $total = count($this->beritaModel->searchData($keywords));


        if ($keywords) {
            $berita = $this->beritaModel->searchData($keywords);

            $data = [
                'title' => 'Search Result',
                'berita' => $berita,
                'pager' => ceil($total/$page['jlhTampil'])
            ];

        } else {
            $data = [
                'title' => 'Data Berita',
                'berita' => $this->beritaModel->getData($page['mulai'],$page['jlhTampil']),
                'mulai' => $page['mulai'],
                'pager' => ceil($total/$page['jlhTampil'])
            ];
        }
        return view('task/v_all_mahasiswa_member', $data);
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
    public function showFormCreateBerita()
    {
        $data = [
            'title' => 'Form Add Berita'
        ];

        return view('task/v_form_create_mahasiswa', $data);
    }

    /**
     * Will submit and save the data that user inputted to the form
     * Will be activated when submit button clicked
     * The submit button is in form add mahasiswa data
     * @return RedirectResponse
     */
    public function createBerita()
    {
        $fileGambar = $this->request->getFile('gambar');
        $fileGambar->move('img');
        $namaGambar = $fileGambar->getName();
        // Get all data that user inputted in form add mahasiswa data
        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'author' => $this->request->getVar('author'),
            'gambar' => $namaGambar
        ];

        $this->beritaModel->insertData($data);

        // Will redirect to display mahasiswa data page
        return redirect()->to('/berita');
    }

    /**
     * View the detail of a mahasiswa data
     * @param $id
     * @return string
     */
    public function showDetailBerita($id)
    {
        $page = $this->create_paging();
        $berita = $this->beritaModel->getDetailData($id);

        $data = [
            'title' => 'Detail Berita',
            'berita' => $berita
        ];

        return view('task/v_detail_mahasiswa', $data);
    }

    /**
     * View the detail of a mahasiswa data
     * @param $id
     * @return string
     */
    public function showDetailBeritaMember($id)
    {
        $page = $this->create_paging();
        $berita = $this->beritaModel->getDetailData($id);

        $data = [
            'title' => 'Detail Berita',
            'berita' => $berita
        ];

        return view('task/v_detail_mahasiswa_member', $data);
    }

    /**
     * Delete data of a mahasiswa
     * @param $nim
     * @return RedirectResponse
     */
    public function deleteBerita($id)
    {
        $this->beritaModel->deleteData($id);

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
    public function updateBerita($id = false)
    {
        $berita = $this->beritaModel->getDetailData($id);

        $data = [
            'title' => 'Form Edit Mahasiswa',
            'berita' => $berita
        ];

        return view('task/v_form_update_mahasiswa', $data);
    }

    //--------------------------------------------------------------------

}
