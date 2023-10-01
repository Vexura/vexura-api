<?php
namespace Vexura\SubUser;

use Vexura\VexuraAPI;

class SubUser
{
    private $VexuraAPI;
    public function __construct(VexuraAPI $VexuraAPI)
    {
        $this->VexuraAPI = $VexuraAPI;
    }
    public function getSubUsers(){
        return $this->VexuraAPI->get('accounting/subuser')->data;
    }

    public function getSubUser(int $id){
        return $this->VexuraAPI->get("accounting/subuser/${id}")->data;
    }


    /**
     * Create a subuser with the provided information.
     *
     * @param string $username The username of the subuser.
     * @param string $email The email address of the subuser.
     * @param string $firstname The first name of the subuser.
     * @param string $lastname The last name of the subuser.
     * @param string $street The street address of the subuser.
     * @param int $number The street number of the subuser.
     * @param string $city The city of the subuser.
     * @param int $zip The ZIP code of the subuser.
     * @param string $country The country of the subuser.
     * @param mixed $credit_limit The credit limit of the subuser.
     * @param int $discount_percent The discount percentage for the subuser (default is 0).
     * @param string|null $password The password for the subuser (optional).
     *
     * @return mixed The response from the VexuraAPI.
     */
    public function createSubUser(string $username, string $email, string $firstname, string $lastname, string $street, int $number, string $city, int $zip, string $country, $credit_limit, int $discount_percent = 0, string $password = null){
        return $this->VexuraAPI->post('accounting/subuser/create', [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'street' => $street,
            'number' => $number,
            'zip' => $zip,
            'city' => $city,
            'country' => $country,
            'discount_percent' => $discount_percent,
            'credit_limit' => $credit_limit,
        ])->data;
    }

    /**
     * Create a subuser with the provided information.
     * @param int $id The UserId of the subuser.
     * @param string $username The username of the subuser.
     * @param string $email The email address of the subuser.
     * @param string $firstname The first name of the subuser.
     * @param string $lastname The last name of the subuser.
     * @param string $street The street address of the subuser.
     * @param int $number The street number of the subuser.
     * @param string $city The city of the subuser.
     * @param int $zip The ZIP code of the subuser.
     * @param string $country The country of the subuser.
     * @param mixed $credit_limit The credit limit of the subuser.
     * @param int $discount_percent The discount percentage for the subuser (default is 0).
     * @param string|null $password The password for the subuser (optional).
     *
     * @return mixed The response from the VexuraAPI.
     */
    public function updateSubUser(int $id, string $username, string $email, string $firstname, string $lastname, string $street, int $number, string $city, int $zip, string $country, $credit_limit, int $discount_percent = 0, string $password = null){
        return $this->VexuraAPI->put("accounting/subuser/${id}", [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'street' => $street,
            'number' => $number,
            'zip' => $zip,
            'city' => $city,
            'country' => $country,
            'discount_percent' => $discount_percent,
            'credit_limit' => $credit_limit,
        ])->data;
    }

    public function deleteSubUser(int $id){
        return $this->VexuraAPI->delete("accounting/subuser/${id}")->data;
    }
}