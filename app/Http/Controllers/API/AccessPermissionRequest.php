<?php

namespace App\Http\Controllers\API;

use App\ExternalRole;
use App\ExternalTable;
use App\Policy;
use App\Rule;
use EmergencyAccessHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Helper\Table;
use test\Mockery\AllowsExpectsSyntaxTest;

class AccessPermissionRequest extends Controller
{

    public function rekt(Request $request)
    {
        dd($request);
    }

    public function check(Request $request)
    {
        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "Token is required"
                ]);
        }

        $user = \App\User::where('token', $request['token'])->first();

        if (!$user) {
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "Invalid user token."
                ]);
        }

        if ($user->roleTitle() != "user") { // user role must be 'User'
            return response()
                ->json([
                    "status" => "ERROR",
                    "cause" => "You are n't allowed to use this system function."
                ]);
        }

        $data = json_decode($request['data']);

        $role_name = $data->role;
        if (ExternalRole::where('name', $role_name) == null) {
            return response()
                ->json([
                    "status" => "OK",
                    "permission" => "ACCESS DENIED"
                ]);
        }

        $ts = array_unique($data->tables);
        $tables = ExternalTable::whereIn('name', $ts)->get();
        if (count($tables) != count($ts)) {
            return response()
                ->json([
                    "status" => "OK",
                    "permission" => "ACCESS DENIED"
                ]);
        }

        return response()
            ->json(["status" => "OK",
                "permission" => "GRANTED"]);
    }

    function accessRequest(Request $request)
    {

        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => false,
                    "cause" => "Token is required"
                ]);
        }

        $user = \App\User::where('token', $request['token'])->first();

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

        $request->validate([

            'external_tables' => 'json|required',
            'keys' => 'json|required'

        ]);

        $externalTables = json_decode($request["external_tables"]);

        $keys = json_decode($request['keys'], true);

        if (!$this->allRulesSatisfied($externalTables, $keys, 'rules')) {

            if ($this->allRulesSatisfied($externalTables, $keys, 'emergency_rules')) {

                return response()->json([
                    "status" => true,
                    "permission_granted" => true,
                    "emergency_access" => true
                ]);

            } else {

                return response()->json([
                    "status" => true,
                    "permission_granted" => false,
                    "emergency_access" => false
                ]);

            }


        } else {

            return response()->json([
                "status" => true,
                "permission_granted" => true,
                "emergency_access" => false
            ]);

        }

    }


    function allRulesSatisfied($externalTables, $keys, $rulesColumn)
    {


        foreach ($externalTables as $tableId) {

            $queryResult = json_decode(Policy::select($rulesColumn)->where("data_element", "=", $tableId)->get(), true);

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

    public function emergencyAccessLog(Request $request)
    {

        if (!isset($request['token'])) {
            return response()
                ->json([
                    "status" => false,
                    "cause" => "Token is required"
                ]);
        }

        $user = \App\User::where('token', $request['token'])->first();

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

        $request->validate([

            'external_tables' => 'json|required'

        ]);

        $log = new \App\EmergencyAccessHistory();

        $log->requester_id = $user->id;
        $log->external_tables = $request['external_tables'];
        $log->save();

        return response()->json([
            "success" => true,
            "message" => "Log inserted successfully"
        ]);
    }

    public function showHistory()
    {

        $logs = \App\EmergencyAccessHistory::all();

        return view('log.history', [
            "logs" => $logs
        ]);
    }
}
