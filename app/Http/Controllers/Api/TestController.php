<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller {
    public function test(Request $request) {
        $arg1 = $request->arg1;
        $arg2 = $request->arg2;

        $arg1__ = request('arg1');
        $arg2__ = request('arg2');

        $select_data = DB::table('member_table')
            ->select('*')
            ->get()
            ->toArray();

        foreach ($select_data as $k => $v) {
            // echo $k;

            $seq = $v->seq;
            $mb_id = $v->mb_id;

            $mb_pw = $v->mb_pw;
            $address = $v->address;
            $mb_tell = $v->mb_tell;

            $response_data[] = [
                'seq' => $v->seq,
                'mb_id' => $v->mb_id,

                'mb_pw' => $v->mb_pw,
                'address' => $v->address,
                'mb_tell' => $v->mb_tell,
            ];
        }

        // $seq = $select_data->seq;
        // $mb_id = $select_data->mb_id;
        // $mb_pw = $select_data->mb_pw;
        // $address = $select_data->address;
        // $mb_tell = $select_data->mb_tell;

        // return response()->json([
        //     'arg1' => $arg1,
        //     'arg2' => $arg2,
        // ]);

        return response()->json([$response_data]);
    }

    public function list(Request $request) {
        $select_data = DB::table('member_table')
            ->select('*')
            ->get()
            ->toArray();

        return response()->json($select_data);
    }
}
