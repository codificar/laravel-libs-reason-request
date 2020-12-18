<?php

namespace Codificar\ReasonsRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Codificar\ReasonsRequest\Http\Requests\SaveReasonFormRequest;
use Codificar\ReasonsRequest\Models\RequestReason;

class ReasonsCOntroller extends Controller
{

    /**
     * Render a view for add reason
     * @return view
     */
    public function renderAdd()
    {
        return view('reasons::add');
    }

    /**
     * Render a view for list reasons
     * @return view
     */
    public function renderList()
    {
        return view('reasons::list');
    }

    /**
     * Save a reason
     */
    public function saveReason(SaveReasonFormRequest $request)
    {
        return response()->json(RequestReason::saveReason($request));
    }
}