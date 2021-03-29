<?php namespace App\Models;

use CodeIgniter\FirebirdModel;

/**
 * Modelo para aquisição dos eventos na 
 * base de dados Firebird
 * 
 * @var FirebirdModel
 */
class Repasse extends FirebirdModel
{
    protected $table = "TAB_RECEBER_REPASSE";
    protected $primaryKey = "DATA_PAGAMENTO";

    public function repasses_entre($dataIn, $dataF = false)
    {
        if($dataF)
        {
            return $this->where('DATA_PAGAMENTO BETWEEN', "$dataIn' AND '$dataF")                        
                        ->findAll();        
        } else {
            return $this->where('DATA_PAGAMENTO =', $dataIn)                        
                        ->findAll();        
        }        
    }
}