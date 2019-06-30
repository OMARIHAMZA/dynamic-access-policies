<?php

namespace App\Http\Controllers\API;

use App\AccessRequestsHistory;
use App\Policy;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessPermissionRequest extends Controller
{
    function accessRequest(Request $request)
    {
        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => false,
                    "cause" => "Token is required",
                    "view" => view('access_denied', [
                        "error" => "Token is required"
                    ])->render()
                ]);
        }

        $user = User::where('token', $request['token'])->first();

        if (!$user) {
            return response()
                ->json([
                    "status" => false,
                    "cause" => "Invalid user token.",
                    "view" => view('access_denied', [
                        "error" => "Invalid user token."
                    ])->render()
                ]);
        }

        if ($user->roleTitle() != "user") { // user role must be 'User'
            return response()
                ->json([
                    "status" => false,
                    "cause" => "You aren't allowed to use this system function.",
                    "view" => view('access_denied', [
                        "error" => "You aren't allowed to use this system function."
                    ])->render()
                ]);
        }

        $request->validate([
            'external_tables' => 'json|required',
            'keys' => 'json|required'
        ]);

        $externalTables = json_decode($request["external_tables"]);

        $keys = json_decode($request['keys'], true);

        $data = [];

        if (!$this->allRulesSatisfied($externalTables, $keys, 'rules')) {
            if ($this->allRulesSatisfied($externalTables, $keys, 'emergency_rules')) {
                $data = [
                    "status" => true,
                    "permission_granted" => true,
                    "emergency_access" => true
                ];

                $request_data = [
                    "emergency" => true,
                    "result" => true
                ];
            } else {
                $data = [
                    "status" => true,
                    "permission_granted" => false,
                    "emergency_access" => false,
                ];

                $request_data = [
                    "emergency" => false,
                    "requested" => false,
                    "result" => false
                ];
            }
        } else {
            $data = [
                "status" => true,
                "permission_granted" => true,
                "emergency_access" => false,
            ];

            $request_data = [
                "emergency" => false,
                "requested" => true,
                "result" => true
            ];
        }

        $request_data["requester_id"] = $user->id;
        $request_data["external_tables"] = $request['external_tables'];
        //$request_data["access_date"] = new Date();

        $id = AccessRequestsHistory::create($request_data)->id;

        if ($data['emergency_access'] || !$data['permission_granted']) {
            $html = \view('access_denied', [
                'emergency_access' => $data['emergency_access'],
                'record_id' => $id
            ])->render();

            $data['view'] = $html;
            $data["record_id"] = $id;
        }

        return response()->json($data);
    }

    function allRulesSatisfied($externalTables, $keys, $rulesColumn)
    {
        foreach ($externalTables as $tableId) {

            $queryResult = json_decode(Policy::select($rulesColumn)->where("data_element", "=", $tableId)->get(), true);

            if (count($queryResult) == 0) return false;

            //External Table Rules
            foreach ($queryResult as $rules) {

                $currentRules = json_decode($rules[$rulesColumn], true);

                foreach ($currentRules as $rule => $value) {

                    if (!isset($keys[$rule])) {

                        return false;
                    }

                    if (!in_array($keys[$rule], $value)) {

                        return false;
                    }
                }
            }
        }
        return true;
    }

    public function permissionDenied(Request $request)
    {
        $request->validate([
            "external_tables" => "json|required",
            "keys" => "json|required"
        ]);

        $externalTables = json_decode($request["external_tables"], true);

        $keys = json_decode($request["keys"], true);

        return view('access_denied', [
            'emergency_access' => $this->allRulesSatisfied($externalTables, $keys, "emergency_rules")
        ]);

    }

    public function okay(Request $request)
    {
        $history = AccessRequestsHistory::find($request['id']);
        $history->requested = true;
        $history->save();

        return response()->json([
            'status' => 'done'
        ]);
    }

    public function history(Request $request)
    {
        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => false,
                    "cause" => "Token is required"
                ]);
        }

        $user = User::where('token', $request['token'])->first();

        if (!$user) {
            return response()
                ->json([
                    "status" => false,
                    "cause" => "Invalid user token."
                ]);
        }

        if ($user->roleTitle() != "user") { // user role must be 'User'
            return response()
                ->json([
                    "status" => false,
                    "cause" => "You aren't allowed to use this system function."
                ]);
        }

        $requests = $user->requestsHistory();

        return response()->json([
            "status" => "Done",
            "data" => $requests
        ]);
    }
}
