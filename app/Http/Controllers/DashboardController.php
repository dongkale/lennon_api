<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\ListsExcelForList;

class DashboardController extends Controller {
    public function index() {
        $select_data = DB::table('member_table')
            ->select('mb_id', 'address', 'mb_tell')
            ->get();

        return view('dashboard', ['menu' => 'dashboard', 'lists' => $select_data]);
    }

    public function age() {
        $select_data = DB::table('member_table')
            ->select('mb_id', 'address', 'mb_tell')
            ->get();

        return view('dashboard', ['menu' => 'age', 'lists' => $select_data]);
    }

    public function gender() {
        $select_data = DB::table('member_table')
            ->select('mb_id', 'address', 'mb_tell')
            ->get();

        return view('dashboard', ['menu' => 'gender', 'lists' => $select_data]);
    }

    public function geo() {
        $select_data = DB::table('member_table')
            ->select('mb_id', 'address', 'mb_tell')
            ->get();

        return view('dashboard', ['menu' => 'geo', 'lists' => $select_data]);
    }

    public function listsExport(Request $request) {
        $created_at = date('Ymdhis');

        $headings = ['id', '주소', '번호'];

        return Excel::download(new ListsExcelForList($headings), 'lists_' . $created_at . '.xlsx');
    }
}
