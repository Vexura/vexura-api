<?php
namespace Vexura\RootServer;

use Vexura\VexuraAPI;

class RootServer
{
    private VexuraAPI $VexuraAPI;
    private Backups $backupsHandler;

    public function __construct(VexuraAPI $VexuraAPI)
    {
        $this->VexuraAPI = $VexuraAPI;
    }
    public function getServers(){
        return $this->VexuraAPI->get('products/rootserver')->data;
    }

    public function getServer(int $id){
        return $this->VexuraAPI->get("products/rootserver/${id}")->data;
    }

    public function createServer(string $location, int $os_id, int $cores, int $ram, int $disk, int $ipv4, int $ipv6, int $backups, string $hostname = null, string $root_password = null) {
        return $this->VexuraAPI->post("products/rootserver/${location}/create", [
            "os" => $os_id,
            "cores" => $cores,
            "ram" => $ram,
            "disk" => $disk,
            "ipv4" => $ipv4,
            "ipv6" => $ipv6,
            "backups" => $backups,
            "hostname" => $hostname,
            "root_password" => $root_password
        ])->data;
    }

    public function startServer(int $id){
        return $this->VexuraAPI->post("products/rootserver/manage/${id}/start")->data;
    }

    public function stopServer(int $id){
        return $this->VexuraAPI->post("products/rootserver/manage/${id}/stop")->data;
    }

    public function restartServer(int $id){
        return $this->VexuraAPI->post("products/rootserver/manage/${id}/restart")->data;
    }

    public function killServer(int $id){
        return $this->VexuraAPI->post("products/rootserver/manage/${id}/kill")->data;
    }

    public function getServerStats(int $id){
        return $this->VexuraAPI->get("products/rootserver/manage/${id}/stats")->data;
    }

    public function getServerVnc(int $id){
        return $this->VexuraAPI->get("products/rootserver/manage/${id}/vnc")->data;
    }

    public function reinstallServer(int $id, int $os_id){
        return $this->VexuraAPI->post("products/rootserver/manage/${id}/reinstall", [
            "os_id" => $os_id
        ])->data;
    }

    public function deleteServer(int $id){
        return $this->VexuraAPI->delete("products/rootserver/manage/${id}/delete")->data;
    }

    public function renewServer(int $id, int $days){
        return $this->VexuraAPI->post("products/rootserver/manage/${id}/renew", [
            "duration" => $days
        ])->data;
    }

    /**
     * @return Backups
     */
    public function backups(): Backups
    {
        if (!$this->backupsHandler) $this->backupsHandler = new Backups($this->VexuraAPI);
        return $this->backupsHandler;
    }
}