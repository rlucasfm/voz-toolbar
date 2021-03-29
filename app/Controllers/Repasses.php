<?php
namespace App\Controllers;

use App\Models\Repasse;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Repasses extends BaseController
{
	public function index()
	{				
        $dataBusca = $this->request->getGet('dataBusca');
        $dataBusca = new \DateTime($dataBusca);
        $dataBusca = $dataBusca->format('d.m.Y');
	
		if(null !== $this->request->getGet('dataFinal') && !empty($this->request->getGet('dataFinal')))
		{
			$dataFinal = $this->request->getGet('dataFinal');
			$dataFinal = new \DateTime($dataFinal);
        	$dataFinal = $dataFinal->format('d.m.Y');

			$this->exportarRepasses($dataBusca, $dataFinal);
		} else {
			$this->exportarRepasses($dataBusca);
		}        
    }

	private function exportarRepasses($data, $dataF = false)
	{
		$repasse = new Repasse();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$registros = $repasse->repasses_entre($data, $dataF);		

		$sheet->setCellValue('A1', 'Credor');
		$sheet->setCellValue('B1', 'Empresa');
		$sheet->setCellValue('C1', 'Cliente');
		$sheet->setCellValue('D1', 'Documento');
		$sheet->setCellValue('E1', 'Referência');
		$sheet->setCellValue('F1', 'Num Documento');
		$sheet->setCellValue('G1', 'Contrato');		
		$sheet->setCellValue('H1', 'Origem');
		$sheet->setCellValue('I1', 'Vencimento');
		$sheet->setCellValue('J1', 'Pagamento');		
		$sheet->setCellValue('K1', 'Parcela');		
		$sheet->setCellValue('L1', 'Principal');		
		$sheet->setCellValue('M1', 'Juros');		
		$sheet->setCellValue('N1', 'Multa');		
		$sheet->setCellValue('O1', 'Correção');		
		$sheet->setCellValue('P1', 'Descontos');		
		$sheet->setCellValue('Q1', 'Honorários');		
		$sheet->setCellValue('R1', 'Realizado');		
		$sheet->setCellValue('S1', 'Remuneração');
		$sheet->setCellValue('T1', 'Repasse');		
		$sheet->setCellValue('U1', 'Forma');		
		$sheet->setCellValue('V1', 'Banco');
        $sheet->setCellValue('X1', 'Acréscimo');		
		$sheet->setCellValue('Y1', 'Desconto');	            

		$i = 2;	
		// echo gettype($registros);	
		if(gettype($registros) != 'object')
		{
			foreach($registros as $reg)
			{
				$datavenc = new \DateTime($reg->DATA_VENCIMENTO);
				$datavenc = $datavenc->format('d/m/Y');
	
				$datapag = new \DateTime($reg->DATA_PAGAMENTO);
				$datapag = $datapag->format('d/m/Y');
	
				$sheet->setCellValue("A$i", $reg->COD_CREDOR);
				$sheet->setCellValue("B$i", utf8_encode($reg->DESC_EMPRESA));
				$sheet->setCellValue("C$i", $reg->DESC_CLIENTE);
				$sheet->setCellValue("D$i", $reg->CPFCNPJ);
				$sheet->setCellValue("E$i", $reg->REFERENCIA);
				$sheet->setCellValue("F$i", $reg->NUM_DOCUMENTO);
				$sheet->setCellValue("G$i", "$reg->NUM_OPERACOES - $reg->DESC_CONTRATO");		
				$sheet->setCellValue("H$i", $reg->DESC_ORIGEM);
				$sheet->setCellValue("I$i", $datavenc);
				$sheet->setCellValue("J$i", $datapag);		
				$sheet->setCellValue("K$i", $reg->DESC_PARCELA);		
				$sheet->setCellValue("L$i", $reg->VALOR_PRINCIPAL);		
				$sheet->setCellValue("M$i", $reg->VALOR_JUROS);		
				$sheet->setCellValue("N$i", $reg->VALOR_MULTA);		
				$sheet->setCellValue("O$i", $reg->VALOR_CORRECAO);		
				$sheet->setCellValue("P$i", $reg->VALOR_DESCONTOS);		
				$sheet->setCellValue("Q$i", $reg->VALOR_HONORARIOS);		
				$sheet->setCellValue("R$i", $reg->VALOR_REALIZADO);		
				$sheet->setCellValue("S$i", $reg->VALOR_REMUNERACAO);
				$sheet->setCellValue("T$i", $reg->VALOR_REPASSE);		
				$sheet->setCellValue("U$i", $reg->FORMA_PGTO);		
				$sheet->setCellValue("V$i", $reg->MEIO_PTGO);
	
				$sheet->setCellValue("X$i", $reg->DESC_ACRESCIMOS ?? '0');		
				$sheet->setCellValue("Y$i", $reg->DESC_DESCONTO ?? '0');	 
				
				$i++;				
			}
		} else {
			$datavenc = new \DateTime($registros->DATA_VENCIMENTO);
			$datavenc = $datavenc->format('d/m/Y');

			$datapag = new \DateTime($registros->DATA_PAGAMENTO);
			$datapag = $datapag->format('d/m/Y');

			$sheet->setCellValue("A2", $registros->COD_CREDOR);
			$sheet->setCellValue("B2", utf8_encode($registros->DESC_EMPRESA));
			$sheet->setCellValue("C2", $registros->DESC_CLIENTE);
			$sheet->setCellValue("D2", $registros->CPFCNPJ);
			$sheet->setCellValue("E2", $registros->REFERENCIA);
			$sheet->setCellValue("F2", $registros->NUM_DOCUMENTO);
			$sheet->setCellValue("G2", "$registros->NUM_OPERACOES - $registros->DESC_CONTRATO");		
			$sheet->setCellValue("H2", $registros->DESC_ORIGEM);
			$sheet->setCellValue("I2", $datavenc);
			$sheet->setCellValue("J2", $datapag);		
			$sheet->setCellValue("K2", $registros->DESC_PARCELA);		
			$sheet->setCellValue("L2", $registros->VALOR_PRINCIPAL);		
			$sheet->setCellValue("M2", $registros->VALOR_JUROS);		
			$sheet->setCellValue("N2", $registros->VALOR_MULTA);		
			$sheet->setCellValue("O2", $registros->VALOR_CORRECAO);		
			$sheet->setCellValue("P2", $registros->VALOR_DESCONTOS);		
			$sheet->setCellValue("Q2", $registros->VALOR_HONORARIOS);		
			$sheet->setCellValue("R2", $registros->VALOR_REALIZADO);		
			$sheet->setCellValue("S2", $registros->VALOR_REMUNERACAO);
			$sheet->setCellValue("T2", $registros->VALOR_REPASSE);		
			$sheet->setCellValue("U2", $registros->FORMA_PGTO);		
			$sheet->setCellValue("V2", $registros->MEIO_PTGO);

			$sheet->setCellValue("X2", $registros->DESC_ACRESCIMOS ?? '0');		
			$sheet->setCellValue("Y2", $registros->DESC_DESCONTO ?? '0');
		}
		

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
            ]
        ];

        $i--;
        $spreadsheet->getActiveSheet()->getStyle("A1:V$i")->applyFromArray($styleArray);        
        $spreadsheet->getActiveSheet()->getStyle("X1:Y$i")->applyFromArray($styleArray); 

		$writer = new Xlsx($spreadsheet);		
		$dataPrint = str_replace('.', '-', $data);
		$dataFPrint = str_replace('.', '-', $dataF);
		($dataF) ? $filename = "EXPORTACAO_REPASSES_$dataPrint-$dataFPrint" : $filename = "EXPORTACAO_REPASSES_$dataPrint";		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output'); // download file 
		die;
	}
}
