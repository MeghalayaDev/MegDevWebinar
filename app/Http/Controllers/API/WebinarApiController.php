<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Webinar;

class WebinarApiController extends Controller
{

    public function index()
    {
        $webinars = Webinar::orderBy('date', 'desc')->get();

        return $this->sendResponse($webinars, 'Webinars retrieved successfully.');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required',
            'date' => 'required',
            'time' => 'required',
            'presenter' => 'required',
            'mode' => 'required',
            'youtube_embed_code' => 'required',
            'source_code' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        Webinar::create($request->all());

        return $this->sendResponse([], 'Webinars created successfully.');
    }


    public function show($id)
    {
        $data = Webinar::find($id);

        return $this->sendResponse($data, 'Webinar retrieved successfully.');
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required',
            'date' => 'required',
            'time' => 'required',
            'presenter' => 'required',
            'mode' => 'required',
            'youtube_embed_code' => 'required',
            'source_code' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $webinar = Webinar::find($id);

        $webinar->update($request->all());

        return $this->sendResponse([], 'Webinar updated successfully.');
    }


    public function destroy($id)
    {
        $webinar = Webinar::find($id);
        $webinar->delete();

        return $this->sendResponse([], 'Webinar deleted successfully.');
    }


    public static function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }


    public static function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
