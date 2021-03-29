<?php
namespace App\Controllers;

use App\Models\Repasse;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
	public function index()
	{		
		echo view('home');
	}	
}
