<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$users = User::whereNotNull('foto')->get();
if ($users->isEmpty()) {
    echo "NO_USERS_WITH_FOTO\n";
    exit;
}
foreach ($users as $u) {
    echo $u->id . '|' . $u->name . '|' . $u->foto . "\n";
}
