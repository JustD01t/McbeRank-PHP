<?php
namespace mcberank;

class Server {
	private $address;
	private $port;
	private $player;
	public function __construct(string $address, int $port = 19132) {
		$this->address = $address;
		$this->port = $port;
	}
	public function getAddress() : string {
		return $this->address;
	}
	public function getPort() : int {
		return $this->port;
	}
	public function query() : void {
		
	}
	public function isOnline() : bool {
		
	}
	public function getPlayers() : array {
		
	}
	public function getMaxPlayers() : int {
		
	}
	public function getPlugins() : array{
		
	}
	public function getData() : array{
		
	}
}