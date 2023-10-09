<?php
namespace Vexura\RootServer;

use Vexura\VexuraAPI;

class Backups
{
    private $VexuraAPI;
    public function __construct(VexuraAPI $VexuraAPI)
    {
        $this->VexuraAPI = $VexuraAPI;
    }

    public function getBackups(){
        return $this->VexuraAPI->get('products/rootserver/backups/')->data;
    }

    public function createBackup(int $id, string $notes = null){
        return $this->VexuraAPI->post("products/rootserver/backups/${id}/create", [
            "backup_notes" => $notes
        ])->data;
    }

    public function deleteBackup(int $id, string $backup_id){
        return $this->VexuraAPI->delete("products/rrootserver/backups/${id}/delete", [
            "backup_id" => $backup_id
        ])->data;
    }

}