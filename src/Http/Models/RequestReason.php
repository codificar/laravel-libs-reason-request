<?php

namespace Codificar\ReasonsRequest\Models;

use Illuminate\Database\Eloquent\Model;

class RequestReason extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'request_reasons';

    /**
     * Save a reason
     * @param object $request
     * @return boolean
     */
    public static function saveReason($request)
    {
        try {
            $reason = new RequestReason;
            $reason->reason = $request->reason;
            $reason->save();

            return [
                'success' => true,
                'message' => trans('reasonsrequest::reasons.save_success')
            ];
        } catch (\Throwable $th) {
            \Log::error($th->getMessage());
            return [
                'success' => false,
                'message' => trans('reasonsrequest::reasons.save_error')
            ];
        }
    }

    /**
     * Save a reason
     * @param object $request
     * @return 
     */
    public static function filterReasons($request)
    {
        $query = self::select('request_reasons.*');

        if ($request->reason)
            $query->where('reason', 'like', '%' . $request->reason . '%');

        return $query->paginate(20);
    }
}