<?php

//to change directory of a controller
namespace App\Controllers\Task;

//to make base controller can be used in this directory
use App\Controllers\BaseController;
//take model mahasiswa
use App\Models\mMahasiswa;

class cTaskOne extends BaseController
{
    //make this model can be used in all method here
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new mMahasiswa();
    }

	public function display_hello_world()
	{
	    $data = [
	        'title' => 'Hello World'
        ];

		return view('task/view_hello_world', $data);
	}

    public function display_empty_table()
    {
        $data = [
            'title' => 'Tabel Kosong'
        ];
//        $table = new \CodeIgniter\View\Table();
//        $data = [
//            ['Name', 'Color', 'Size'],
//            ['Fred', 'Blue',  'Small'],
//            ['Mary', 'Red',   'Large'],
//            ['John', 'Green', 'Medium'],
//        ];

//        $table = [
//            'nama' => 'Rezky',
//            'table' => $table->generate($data)
//        ];


        return view('task/view_empty_table', $data);
    }

    public function display_mahasiswa_table()
    {
        $mahasiswa = $this->mahasiswaModel->getData();

        $data = [
            'title' => 'Tabel Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];


//        $mahasiswaModel = new mMahasiswa();
//        dd($mahasiswa);

        return view('task/view_mahasiswa_table', $data);
    }

    public function create(){
        $data = [
            'title' => 'Form Add Data'
        ];

        return view('task/create_mahasiswa', $data);
    }

    public function save(){
//        dd($this->request->getVar());
//
//        $this->mahasiswaModel->save([
//            'nama' => $this->request->getVar('nama'),
//            'nim' => $this->request->getVar('nim'),
//            'kelas' => $this->request->getVar('kelas'),
//            'alamat' => $this->request->getVar('alamat'),
//        ]);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'alamat' => $this->request->getVar('alamat'),
        ];
        $this->mahasiswaModel->insertData($data);

        return redirect()->to('/taskthree');
    }

	//--------------------------------------------------------------------

}
