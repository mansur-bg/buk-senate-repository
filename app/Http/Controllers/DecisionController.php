<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;
class DecisionController extends Controller
{
    public function indexOld(Request $request){
//        if (request()->ajax()) {
            ini_set('max_execution_time', 60000);
            $columns = [
                0 => 'id',
                1 => 'registration_number',
                2 => 'full_name',
                3 => 'narration',
                4 => 'decision',
                5 => 'academic_session',
                6 => 'semester',
                7 => 'senate_meeting_number',
                8 => 'note',
                9 => 'case',
                10 => 'duration',
            ];

            $totalData = Decision::count();
            $totalFiltered = $totalData;
            dd($request);
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[1];//$columns[$request->input('order.0.column')];
            $dir = 'desc';//$request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
                $decisions = Decision::offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                $decisions = Decision::where('id', 'LIKE', "%{$search}%")
                    ->orWhere('registration_number', 'LIKE', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $totalFiltered = Decision::where('id', 'LIKE', "%{$search}%")
                    ->orWhere('registration_number', 'LIKE', "%{$search}%")
                    ->count();
            }


            $data = array();
            if (!empty($decisions)) {
                foreach ($decisions as $decision) {
                    $show = '#'; //route('posts.show',$decision->id);
                    $edit = '#'; //route('posts.edit',$decision->id);

                    $nestedData['id'] = $decision->id;
                    $nestedData['registration_number'] = $decision->title;
                    $nestedData['narration'] = substr(strip_tags($decision->body), 0, 50) . "...";
                    $nestedData['created_at'] = date('j M Y h:i a', strtotime($decision->created_at));
                    $nestedData['options'] = "&emsp;<a href='{$show}' title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                          &emsp;<a href='{$edit}' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                    $data[] = $nestedData;

                }
            }

            $json_data = array(
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );

            echo json_encode($json_data);

            return view('content.pages.decisions.index');

//        }

    }
    public function index(){
        ini_set('max_execution_time', 60000);
//        $decisions = DB::table('decisions')->get();
//        $decisions = DB::table('decisions')->select('id', 'registration_number', 'full_name', 'narration', 'decision', 'academic_session', 'semester', 'senate_meeting_number', 'note', 'case', 'duration');
        $decisions = DB::table('decisions')->select('*');
//dd($decisions);
        if (request()->ajax()){
          return Datatables::of($decisions)
              ->addColumn('details', function($row){
                 return '';
              })
              ->addColumn('check', function($row){
                  return '';
              })
              ->addIndexColumn()
              ->addColumn('action', function($row){
                  $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                  return $btn;
              })
              ->rawColumns(['action', 'check', 'details'])
              ->make(true);
      }

//      $decisions = Decision::limit(100)->get();
      return view('content.pages.decisions.index');
    }
}
