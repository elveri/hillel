<?php


class Output
{
    public $outputDataType;
    public $managersList;

    public function __construct(string $outputDataType, array $managersList)
    {
        $this->outputDataType = $outputDataType;
        $this->managersList = $managersList;

    }

    public function getHTML(): string
    {
        if($this->outputDataType == 'htm' || $this->outputDataType == 'html')
        {
            $str = '<!DOCTYPE html><html><head><title>HTML Output</title><style>table{border:1px solid #eaeaea;width:100%;}tr:nth-child(2n){background: #eaeaea}</style></head><body><h1>Managers Output</h1><table><tr><th>Name</th><th>Count</th><th>Salary</th></tr>';

            foreach($this->managersList as $key => $value)
            {
                $str .= '<tr><td>'.$value->getName().'</td>';
                $str .= '<td>'.$value->getCountEmployees().'</td>';
                $str .= '<td>'.$value->getSalary().'</td></tr>';
            }

            $str .= '</table></body></html>';
            return $str;
        }
        else return false;
    }

    public function getOutputArray()
    {
        $outputArray = array();
        foreach($this->managersList as $key => $value)
        {
            $outputArray[] = [
                "name" => $value->getName(),
                "count" =>$value->getCountEmployees(),
                "salary" => $value->getSalary()
            ];
        }

        return $outputArray;
    }

    private function arrayToXml($array, $rootElement = null, $xml = null) {
        $_xml = $xml;

        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }

        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $this->arrayToXml($v, $k, $_xml->addChild('manager'.$k));
            }
            else {
                $_xml->addChild($k, $v);
            }
        }

        return $_xml->asXML();
    }

    public function getXML()
    {
        if($this->outputDataType == 'xml')
        {
            $outputArray = $this->getOutputArray();
            $str = $this->arrayToXml($outputArray);
            return $str;

        }
        else return false;
    }

    public function getJSON(): string
    {
        if($this->outputDataType == 'json')
        {
            $outputArray = $this->getOutputArray();
            $str = json_encode($outputArray);

            return $str;
        }
        else return false;
    }
}