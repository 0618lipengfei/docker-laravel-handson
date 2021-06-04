<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function index() {

        return view('datatable');

    }

    public function ajax(Request $request) {

        $query = \App\Product::query();

        // 検索
        if($request->filled('search.value')) {

            $search_value = trim(
                mb_convert_kana($request->input('search.value'), 's')
            );
            $keywords = explode(' ', $search_value);

            foreach($keywords as $keyword) {

                $query->where('name', 'LIKE', '%'. $keyword .'%');

            }

        }

        // ソート
        if($request->filled('order.0.column')) {

            $order_column_index = $request->input('order.0.column');
            $order_column = $request->input('columns.'. $order_column_index .'.data');
            $order_direction = $request->input('order.0.dir');
            $query->orderBy($order_column, $order_direction);

        }

        $start = intval($request->start);
        $per_page = intval($request->length);
        $columns = [
            'code',
            'name',
            'created_at'
        ];
        $current_page = ($per_page === 0) ? 1 : $start / $per_page + 1;
        return $query->paginate($per_page, $columns, '', $current_page);

    }
}