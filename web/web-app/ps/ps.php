<?php

class Process{

	private $head;
	private $processes;

	public function __construct(){
		$this->computing();
	}

	private function computing(){
		$output = $this->exec();
		$records = explode("COMMAND\n", $output);
		$this->head = preg_split("/\s+/", $records[0]." COMMAND");
		$this->processes = [];
		foreach(explode("\n", $records[1]) as $process){
			$line = preg_split("/\s+/", substr($process, 0,64));
			$command = substr($process, 65,-1);
			array_push($line, $command);
			$this->processes[] = $line;
		}
		array_pop($this->processes);
	}

	public function exec(){
		return `ps aux`;
	}

	public function getProcesses(){
		$result = [];
		$result["head"] = $this->head;
		$result["lines"] = $this->processes;
		return json_encode($result);
	}
}

$instance = new Process();
header("Content-type: application/json");
echo $instance->getProcesses();
