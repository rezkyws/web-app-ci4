<?php

//to change directory of a controller
namespace App\Controllers\Task;

//to make base controller can be used in this directory
use App\Controllers\BaseController;
use App\Models\MahasiswaModel;

//take model mahasiswa

class mahasiswaController extends BaseController
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
     * Very first function that's gonna be executed
     * Showing the Dashboard
     * @return string
     */
    public function display_dashboard()
    {
        // Title of this page
        $data = [
            'title' => 'Hello World'
        ];

        return view('task/v_dashboard', $data);
    }

    /**
     * Used to displaying data of mahasiswa
     * @return string
     */
    public function display_mahasiswa()
    {
        // Fetch mahasiswa data from database
//        $mahasiswa = $this->mahasiswaModel->getData();
        $keywords = $this->request->getVar('keywords');

        if ($keywords) {
            $mahasiswa = $this->mahasiswaModel->searchData($keywords);

            $data = [
                'title' => 'Tabel Mahasiswa',
                'mahasiswa' => $mahasiswa
            ];

            return view('task/v_search_result', $data);
        } else {
            $mahasiswa = $this->mahasiswaModel->getData();

            $data = [
                'title' => 'Tabel Mahasiswa',
                'mahasiswa' => $mahasiswa
            ];

            return view('task/v_mahasiswa', $data);
        }
    }

    /**
     * Will be open up form to add mahasiswa data
     * @return string
     */
    public function add()
    {
        $data = [
            'title' => 'Form Add Data Mahasiswa'
        ];

        return view('task/v_add_mahasiswa', $data);
    }

    /**
     * Will submit and save the data that user inputted to the form
     * Will be activated when submit button clicked
     * The submit button is in form add mahasiswa data
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function save()
    {
        // Get all data that user inputted in form add mahasiswa data
        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat'),
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
    public function detail($id)
    {
        // Looking a mahasiswa with the id
        $mahasiswa = $this->mahasiswaModel->getData($id);

        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

        return view('task/v_detail_mahasiswa', $data);
    }

    //--------------------------------------------------------------------

}
