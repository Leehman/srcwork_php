<?php
/**
 * Apache Log Parser
 * Parses an Apache log file and runs the strings through filters to find what you're looking for.
 * @author Eric Lamb
 *
 */
class apache_log_parser
{
	/**
	 * The path to the log file
	 * @var string
	 */
	private $file = FALSE;
 
	/**
	 * What filters to apply. Should be in the format of array('KEY_TO_SEARCH' => array('regex' => 'YOUR_REGEX'))
	 * @var array
	 */
	public $filters = FALSE;
 
	/**
	 * Duh.
	 * @param string $file
	 * @return void
	 */
	public function __construct($file)
	{
		if(!is_readable($file))
		{
			return 	FALSE;
		}
 
		$this->file = $file;
	}
 
	/**
	 * Executes the supplied filter to the string
	 * @param $filer
	 * @param $status
	 * @return string
	 */
	private function applyFilters($str)
	{
		if(!$this->filters || !is_array($this->filters))
		{
			return $str;
		}
 
		foreach($this->filters AS $area => $filter)
		{
			if(preg_match($filter, $str, $matches, PREG_OFFSET_CAPTURE))
			{
				return $str;
			}
		}
	}
 
	/**
	 * Returns an array of all the filtered lines
	 * @param $limit
	 * @return array
	 */
	public function getData($limit = FALSE)
	{
		$handle = fopen($this->file, 'rb');
		if ($handle) {
			$count = 1;
			$lines = array();
		    while (!feof($handle)) {
		        $buffer = fgets($handle);
		        $data = $this->applyFilters($this->format_line($buffer));
		        if($data)
		        {
		        	$lines+):(\d+:\d+:\d+) (]+)\] \"(\S+) (.*?) (\S+)\" (\S+) (\S+) (\".*?\") (\".*?\")$/", $line, $matches); // pattern to format the line
		return $matches;
				
			}
	}
 
	/**
	 * Takes the format_log_line array and makes it usable to us stupid humans
	 * @param $line
	 * @return array
	 */
	function format_line($line)
	{
		$logs = $this->format_log_line($line); // format the line
 
		if (isset($logs)) // check that it formated OK
		{
			$formated_log = array(); // make an array to store the lin info in
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			$formated_log = $logs;
			return $formated_log; // return the array of info
		}
		else
		{
			$this->badRows++; // if the row is not in the right format add it to the bad rows
			return false;
		}
	}
}
?>