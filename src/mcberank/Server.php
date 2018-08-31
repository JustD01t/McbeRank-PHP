<?php
namespace mcberank;

class Server {
	public const STATS_ONLINE = 0;
	public const STATS_OFFLINE = 1;
	private $address;
	private $port;
	private $player;
	private $ip;
	private $stats;
	private $lastQuery;
	private $recentQueries = [];
	public function __construct(string $address, int $port = 19132) {
		$this->address = $address;
		$this->port = $port;
	}
	public function getAddress() : string {
		return $this->address;
	}
	public function getIp() : ?string {
		if(empty($this->ip)) {
			$this->ip = gethostbyname($this->getAddress());
		} else {
			return $this->ip;
		}
		if($this->getIp() == $this->getAddress()) {
			$this->ip = null;
		} else {
			return $this->getIp();
		}
	}
	public function getPort() : int {
		return $this->port;
	}
	public function query() : void{
		$sock = @fsockopen( "udp://" . $this->getIp(), $this->getPort() );
    if ( !$sock ) $this->stats = self::STATS_OFFLINE;
    socket_set_timeout( $sock, 0, 500000 );
    if ( !@fwrite( $sock, "\xFE\xFD\x09\x10\x20\x30\x40\xFF\xFF\xFF\x01" ) )
        $this->stats = self::STATS_OFFLINE;
    $challenge = fread( $sock, 1400 );
    if ( !$challenge )
        $this->stats = self::STATS_OFFLINE;
    $challenge = substr( preg_replace( "/[^0-9\-]/si", "", $challenge ), 1 );
    $query = sprintf(
        "\xFE\xFD\x00\x10\x20\x30\x40%c%c%c%c\xFF\xFF\xFF\x01",
        ( $challenge >> 24 ),
        ( $challenge >> 16 ),
        ( $challenge >> 8 ),
        ( $challenge >> 0 )
        );
    if ( !@fwrite( $sock, $query ) )
        $this->stats = self::STATS_OFFLINE;
    $response = array();
    for ($x = 0; $x < 2; $x++)
    {
        $response[] = @fread($sock,2048);
    }
    $response = implode($response);
    $response = substr($response,16);
    $response = explode("\0",$response);
    array_pop($response);
    array_pop($response);
    array_pop($response);
    array_pop($response);
    $return = array();
    foreach ($response as $key)
    {
        if ($type == 0) $val = $key;
        if ($type == 1) $return[$val] = $key;

        $type == 0 ? $type = 1 : $type = 0;
    }
	if(count($this->getRecentQueries() >= 60 * 24 * 3) { //3 days
		foreach($this->getRecentQueries() as $query){
			
		}
	}
    foreach($this->getRecentQueries() as $query) {
    	
    }
    
	}
	public function isOnline() : bool {
		if($this->getStats() === self::STATS_ONLINE) {
			return true;
		} else {
			return false;
		}
	}
	public function getStats() : int {
		return $this->stats;
	}
	public function getPlayers() : array {
		
	}
	public function getMaxPlayers() : int {
		
	}
	public function getPlugins() : array{
		
	}
	public function getLastQuery() : array{
		
	}
}
