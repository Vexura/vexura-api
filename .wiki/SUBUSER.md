Initiate the client:

```php
<?php
// Require the autoloader
require_once 'vendor/autoload.php';
// Use the library namespace
use Vexura\VexuraAPI;
// Then simply pass your API-Token when creating the API client object.
// api = LiveSystem, sandbox = sandbox
$client = new VexuraAPI('API-Token', 'api');
```

### get SubUsers
```php
$response = $client->subUsers()->getSubUsers();
print_r($response);
```

### get SubUser by ID
```php
$id = 1;
$response = $client->subUsers()->getSubUser($id);
print_r($response);
```

### Create SubUser
```php
$username = "john_doe";
$email = "john.doe@example.com";
$firstname = "John";
$lastname = "Doe";
$street = "123 Main Street";
$number = 42;
$city = "New York";
$zip = 10001;
$country = "USA";
$credit_limit = 5000.00;
$discount_percent = 10; // (optional default 0)
$password = "secure_password"; // (optional if null random password will be created)

$response = $client->subUsers()->createSubUser($username, $email, $firstname, $lastname, $street, $number, $city, $zip, $country, $credit_limit, $discount_percent, $password);
print_r($response);
```

### Update SubUser
```php
$id = 1;
$username = "john_doe";
$email = "john.doe@example.com";
$firstname = "John";
$lastname = "Doe";
$street = "123 Main Street";
$number = 42;
$city = "New York";
$zip = 10001;
$country = "USA";
$credit_limit = 5000.00;
$discount_percent = 10; // (optional default 0)
$password = "secure_password"; // (optional if null random password will be created)

$response = $client->subUsers()->updateSubUser($id, $username, $email, $firstname, $lastname, $street, $number, $city, $zip, $country, $credit_limit, $discount_percent, $password);
print_r($response);
```

### Delete SubUser (Account will be disabled)
```php
$id = 1;
$response = $client->subUsers()->deleteSubUser($id);
print_r($response);
```