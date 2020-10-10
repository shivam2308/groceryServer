<?php

namespace App\BaseCode\BaseCsvCode;

use Keboola\Csv\CsvReader;
use Keboola\Csv\CsvWriter;

class BaseCsv extends CsvReader{

    private $m_reader;
    private $m_writer;
    private $m_file;
    private $m_fileName;
    private $m_service;
    private $m_defaultPb;
    private $m_creator;
    
    public function __construct($path,$fileName,$service,$defaultPb,$crateor){
        $this->m_service = $service;
        $this->m_defaultPb = $defaultPb;
        $this->m_creator = $creator;
        $this->m_fileName = $fileName;
        $this->m_reader  = new CsvReader($path);
        
    }

    public function createUiPb(){
        $i =0;
        foreach($this->m_reader as $row) {
            if($i=0){
                $i++;
                continue;
            }else{
            $this->m_service->create($this->m_creator->getUipb($row));
            $i++;
            }
            echo strval($i);
        }
    }

    public function writeFile($row){
        $this->createFile();
        $this->m_writer  = new CsvWriter(__DIR__ . $m_fileName);
        $this->m_writer->writeRow($row);
    }

    public function getFile(){
        return $this->m_file;
    }

    public function createFile(){
        $this->m_file = tempnam('/tmp'.'/'.$this->m_fileName, 'csv');
    }

}

?>