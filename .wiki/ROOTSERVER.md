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

### get RootServers
```php
$response = $client->rootServer()->getServers();
print_r($response);
```

### get RootServer by ID
```php
$id = 1;
$response = $client->rootServer()->getServer($id);
print_r($response);
```

### Create RootServer
```php
$location = "skylink"
$os = 1;
$cores = 1;
$ram = 1;
$disk = 10;
$ipv4 = 1;
$ipv6 = 1;
$backups = 1;
$hostname = "test.hostname.de"; // (optional if null random hostname will be created)
$root_password = "secure_password"; // (optional if null random password will be created)

$response = $client->rootServer()->createServer($location, $os, $cores, $ram, $disk, $ipv4, $ipv6, $backups, $hostname, $root_password);
print_r($response);
```

### Reinstall RootServer
```php
$os = 1;

$response = $client->rootServer()->reinstallServer($os);
print_r($response);
```


### Delete RootServer (Only for Resellers)
```php
$id = 1;
$response = $client->rootServer()->deleteServer($id);
print_r($response);
```

### Renew RootServer (Only for non Resellers)
```php
$id = 1;
$days = 187;
$response = $client->rootServer()->renewServer($id, $days);
print_r($response);
```

### Start RootServer
```php
$id = 1;
$response = $client->rootServer()->startServer($id);
print_r($response);
```

### Stop RootServer
```php
$id = 1;
$response = $client->rootServer()->stopServer($id);
print_r($response);
```

### Restart RootServer
```php
$id = 1;
$response = $client->rootServer()->restartServer($id);
print_r($response);
```

### Kill RootServer
```php
$id = 1;
$response = $client->rootServer()->killServer($id);
print_r($response);
```

### Get RootServer Stats
```php
$id = 1;
$response = $client->rootServer()->getServerStats($id);
print_r($response);
```

### Get RootServer VNC
```php
$id = 1;
$response = $client->rootServer()->getServerVnc($id);
print_r($response);
```

### Get RootServer Backups
```php
$id = 1;
$response = $client->rootServer()->backups()->getBackups($id);
print_r($response);
```

### Create RootServer Backup
```php
$id = 1;
$note = "Random Description" //nullable
$response = $client->rootServer()->backups()->createBackup($id, $note);
print_r($response);
```

### Delete RootServer Backup
```php
$id = 1;
$backup_id = "dgfdsfgadgfagf"
$response = $client->rootServer()->backups()->deleteBackup($id, $backup_id);
print_r($response);
```

