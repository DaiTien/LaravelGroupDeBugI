<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookTicket;
use Illuminate\Http\Request;

class BookTicketController extends Controller
{
    //
    public function index(){

//        $data['a'] = M
        $data = BookTicket::query()->with('user','movie')
            ->orderBy('status', 'ASC')->get();
        return view('admin.BookTicket.index', compact('data'));
    }
    public function detail($book_id){
        return view('admin.BookTicket.detail');
    }
    public function confirm($book_id){
       $book = BookTicket::where('id',$book_id)->update(['status' => '1']);
        if ($book) {
            return response()->json([
                'success' => true,
                'message' => "Success"
            ]);
        } else {
            return response()->json([
                'error'   => true,
                'message' => "Has error"
            ]);
        }

    }
}
