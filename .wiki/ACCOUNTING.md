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

### get Account Information
```php
$response = $client->accounting()->getData();
print_r($response);
```

### get Invoices
```php
$response = $client->accounting()->getInvoices();
print_r($response);
```

### get Invoice by ID
```php
$id = 1;
$response = $client->accounting()->getInvoice($id);
print_r($response);
```

### get Current Credit Usage
```php
$response = $client->accounting()->getUsage();
print_r($response);
```