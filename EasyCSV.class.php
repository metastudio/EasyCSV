<?php

class EasyCSV
{
	protected $filename;
	protected $withHeader;
	
	public function __construct($filename, $withHeader = true)
	{
		$this->filename = $filename;
		$this->withHeader = $withHeader;
	}
	
	public function toArray()
	{
    $length = 1000;
		$result = array();
		if (($handle = fopen($this->filename, "r")) !== FALSE)
		{
			if ($this->withHeader) { fgetcsv($handle); } // skip one line (header)
			while(($data = fgetcsv($handle, $length, ",")) !== FALSE)
			{
				$result[] = $data;
			}
			fclose($handle);
		}
		return $result;
	}
}