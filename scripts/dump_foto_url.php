<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

$u = User::find(27);
if (! $u) { echo "NO_USER_27\n"; exit; }
echo 'id: '.$u->id."\n";
echo 'foto raw: '.$u->foto."\n";
echo 'foto_url accessor: '.$u->foto_url."\n";
echo 'asset(storage): '.asset('storage/'.$u->foto)."\n";
