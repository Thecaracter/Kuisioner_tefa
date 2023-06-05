<?php
namespace App\Http\Controllers;

use App\Models\Detail_Quisioner;
use App\Models\JenisQuisioner;
use App\Models\Quisioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailQuisionerController extends Controller
{
    public function index()
    {
        $quis = Quisioner::all();
        $jenis = JenisQuisioner::all();
        $quisioners = Detail_Quisioner::with('quisioner', 'jenisQuisioner')->get();
        return view('admin.detail_quisioner', compact('quisioners', 'quis', 'jenis'));

        // return response()->json($quisioners);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'pertanyaan' => 'required',
        ]);

        $quisioner = Quisioner::where('nama', $request->input('nama'))->first();

        if (!$quisioner) {
            return redirect()->back()->with('error', 'Invalid Quisioner');
        }

        $jenisQuisioner = JenisQuisioner::find($request->input('jenis'));
        if (!$jenisQuisioner) {
            return redirect()->back()->with('error', 'Invalid Jenis Quisioner');
        }

        $detailQuisioner = new Detail_Quisioner();
        $detailQuisioner->quisioner_id = $quisioner->id;
        $detailQuisioner->jenis_quisioner_id = $jenisQuisioner->id;
        $detailQuisioner->pertanyaan = $request->input('pertanyaan');
        $detailQuisioner->save();

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
        $jenisQuisioner = JenisQuisioner::find($request->input('jenis'));
        if (!$jenisQuisioner) {
            return redirect()->back()->with('error', 'Invalid Jenis Quisioner');
        }

        $detailQuisioner = Detail_Quisioner::findOrFail($id);
        $detailQuisioner->quisioner_id = $quisioner->id;
        $detailQuisioner->jenis_quisioner_id = $jenisQuisioner->id;
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