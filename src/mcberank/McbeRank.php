<?php

namespace mcberank{
	echo '왕고스무도치의 McbeRank-REWRITE 시작중...' . PHP_EOL . '웹서버 시작중...' . PHP_EOL;
}
use php\http\{HttpServer, HttpServerRequest, HttpServerResponse};
class McbeRank {
	private $servers = [];
	public function __construct(array $servers) {
		
	}
	public function getServers() : array {
		return $this->servers;
	}
	public function getServer(string $address, int $port = 19132) : ?Server {
		foreach($this->getServers as $server) {
			if($server->getAddress() === $address and $server->getPort() === $port) return $server;
		}
	}
	public function onRequest(HttpServerRequest $request, HttpServerResponse $response) : void {
		
	}
	public function init() : void {
		
	}
}
