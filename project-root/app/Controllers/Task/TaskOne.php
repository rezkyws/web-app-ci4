<?php

//to change directory of a controller
namespace App\Controllers\Task;

//to make base controller can be used in this directory
use App\Controllers\BaseController;
//take model mahasiswa
use App\Models\MahasiswaModel;

class TaskOne extends BaseController
{
    //make this model can be used in all method here
    protected $mahasiswaModel;
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

	public function index()
	{
	    $data = [
	        'title' => 'Hello World'
        ];

		return view('task/task_one', $data);
	}

    public function taskTwo()
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


        return view('task/task_two', $data);
    }

    public function taskThree()
    {
        $mahasiswa = $this->mahasiswaModel->findAll();

        $data = [
            'title' => 'Tabel Mahasiswa',
            'mahasiswa' => $mahasiswa
        ];

//        $mahasiswaModel = new MahasiswaModel();
//        dd($mahasiswa);

        return view('task/task_three', $data);
    }

	//--------------------------------------------------------------------

}
