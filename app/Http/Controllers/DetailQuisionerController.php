<?php
namespace App\Http\Controllers;

use App\Models\Detail_Quisioner;
use App\Models\Quisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailQuisionerController extends Controller
{
    public function index()
    {
        $quis = Quisioner::all();
        $quisioners = Detail_Quisioner::join('quisioner', 'detail_quisioner.quisioner_id', '=', 'quisioner.id')
            ->select('detail_quisioner.*', 'quisioner.nama')
            ->get();

        return view('admin.detail_quisioner', compact('quisioners', 'quis'));
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'pertanyaan' => 'required',
        ]);

        $quisioner = Quisioner::where('nama', $request->input('nama'))->first();

        if (!$quisioner) {
            return redirect()->back()->with('error', 'Invalid Quisioner');
        }

        Detail_Quisioner::create([
            'quisioner_id' => $quisioner->id,
            'pertanyaan' => $request->input('pertanyaan'),
        ]);

        return redirect()->route('detailq.index')->with('success', 'Detail Quisioner created successfully');
    }



    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'pertanyaan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $quisioner = Quisioner::where('id', $request->input('nama'))->first();

        if (!$quisioner) {
            return redirect()->back()->withErrors(['error' => 'Invalid Quisioner'])->withInput();
        }

        $detailQuisioner = Detail_Quisioner::findOrFail($id);
        $detailQuisioner->quisioner_id = $quisioner->id;
        $detailQuisioner->pertanyaan = $request->input('pertanyaan');
        $detailQuisioner->save();

        return redirect()->route('detailq.index')->with('success', 'Detail Quisioner updated successfully');
    }


    public function destroy($id)
    {
        $quisioner = Detail_Quisioner::findOrFail($id);
        $quisioner->delete();

        return redirect()->route('detailq.index')->with('success', 'Detail Quisioner deleted successfully');
    }
}