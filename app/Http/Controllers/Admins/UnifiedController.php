<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToggleStatusRequest;
use App\Interfaces\Repositories\Admins\DBUnifiedInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class UnifiedController extends Controller
{
    private DBUnifiedInterface $unified;

    public function __construct(DBUnifiedInterface $unified)
    {
        $this->unified = $unified;
    }

    public function toggleStatus(ToggleStatusRequest $request, string $id): RedirectResponse
    {
        return $this->unified->toggleStatus($request, $id);
    }

    public function changeTheme(Request $request): RedirectResponse
    {
        return $this->unified->changeTheme($request);
    }
}
