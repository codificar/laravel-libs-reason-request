<?php

namespace Codificar\ReasonsRequest\Http\Controllers;

use App\Http\Controllers\Controller;
use Codificar\ReasonsRequest\Http\Requests\ListReasonFormRequest;
use Codificar\ReasonsRequest\Http\Requests\SaveReasonFormRequest;
use Codificar\ReasonsRequest\Models\RequestReason;
use Illuminate\Http\Request;
use Settings;
class ReasonsController extends Controller
{

    /**
     * Render a view for setting
     * @return view
     */
    public function renderSetting()
    {
        return view('reasons::setting', [
            'setting' => Settings::where('key', 'is_reason_request_active')->first()
        ]);
    }

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
     * Save setting for reason
     * @param Request $request
     * @return json
     */
    public function saveSetting(Request $request)
    {
        try {
            Settings::updateOrCreate([
                'key' => 'is_reason_request_active'
            ], [
                'key' => 'is_reason_request_active',
                'value' => $request->setting
            ]);
    
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return response()->json([
                'success' => false
            ]);
        }
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

    public function getReasons()
    {
        return response()->json(RequestReason::all());
    }
}