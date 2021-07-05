<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PriceTicketController extends Controller
{
    //

    public function index()
    {
        $data = PriceTicket::all();

        return view('admin.PriceTicket.index', compact('data'));
    }

    public function create()
    {
        return view('admin.PriceTicket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|min:3',
            'price' => 'required',
        ], [
            'name.required'  => trans('validation.required'),
            'name.min'       => trans('validation.min'),
            'price.required' => trans('validation.required'),
        ]);
        PriceTicket::create([
            'name'  => $request->name,
            'price' => str_replace(',','',$request->price),
        ]);
        Alert::success('Create successfully!');

        return redirect()->route('price_ticket.index');
    }

    public function edit($id)
    {
        $price = PriceTicket::find($id);

        return view('admin.PriceTicket.update', compact('price'));
    }

    public function update(Request $request)
    {
        $validated    = $request->validate([
            'name'  => 'required|min:3',
            'price' => 'required',
        ], [
            'name.required'  => trans('validation.required'),
            'name.min'       => trans('validation.min'),
            'price.required' => trans('validation.required'),
        ]);
        $price_ticket = PriceTicket::all()->find($request->id);
        $price_ticket->update([
            'name'  => $request->name,
            'price' => str_replace(',','',$request->price),
        ]);
        Alert::success('Update successfully!');

        return redirect()->route('price_ticket.index');
    }

    public function delete($id)
    {
        $data = PriceTicket::all()->find($id)->delete();
    }
}
