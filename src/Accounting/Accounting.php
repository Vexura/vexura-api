<?php
namespace Vexura\Accounting;

use Vexura\VexuraAPI;

class Accounting
{
    private $VexuraAPI;
    public function __construct(VexuraAPI $VexuraAPI)
    {
        $this->VexuraAPI = $VexuraAPI;
    }

    public function getData(){
        return $this->VexuraAPI->get('accounting/data')->data;
    }

    public function getInvoices(){
        return $this->VexuraAPI->get('accounting/invoices')->data;
    }

    public function getInvoice(int $id){
        return $this->VexuraAPI->get("accounting/invoices/${id}")->data;
    }

    public function getUsage(){
        return $this->VexuraAPI->get('accounting/usage')->data;
    }
}