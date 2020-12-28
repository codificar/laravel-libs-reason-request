<?php

namespace Codificar\ReasonsRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Codificar\ReasonsRequest\Http\Requests\ListReasonFormRequest;
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
        return view('reasons::add', [
            'reason' => null
        ]);
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
     * Render a view for edit reasons
     * @return view
     */
    public function edit($id)
    {
        $reason = RequestReason::find($id);
        
        if (!$reason)
            return abort(404);

        return view('reasons::add', [
            'reason' => json_encode($reason)
        ]);
    }

    /**
     * Save a reason
     * @param SaveReasonFormRequest $request
     * @return json
     */
    public function saveReason(SaveReasonFormRequest $request)
    {
        return response()->json(RequestReason::saveReason($request));
    }

    public function listReasons(ListReasonFormRequest $request)
    {
        return response()->json(RequestReason::filterReasons($request));
    }
}