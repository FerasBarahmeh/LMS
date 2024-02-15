<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToggleStatusRequest;
use App\Interfaces\Repositories\Admins\DBUnifiedInterface;


class UnifiedController extends Controller
{
    private DBUnifiedInterface $unified;
    public function __construct(DBUnifiedInterface $unified)
    {
        $this->unified = $unified;
    }

    public function toggleStatus(ToggleStatusRequest $request, string $id)
    {
        return $this->unified->toggleStatus($request, $id);
    }
}
