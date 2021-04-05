<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\PembayaranView;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\HistoriExport;
use Maatwebsite\Excel\Facades\Excel;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $views = PembayaranView::all();
        $pembayarans = Pembayaran::all();
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $spp = Spp::all();
        return view('pembayaran.index', compact('views','pembayarans','siswa','petugas','spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $spp = Spp::all();
        return view('pembayaran.create', compact('siswa','petugas','spp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = Siswa::where('nisn', $request->nisn)->first();
        $spp = Spp::where('id', $siswa->id_spp)->first();
        $bln = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $transaksi = Pembayaran::where('nisn', $request->nisn)->get();

        if(sizeof($transaksi) == 0) :
            $bulan = 6;
            $tahun = substr($spp->tahun,0,4);
        else :
            $a = array_key_last(end($transaksi));
            
            $akhir = $transaksi[$a];
            
            $a = array_search($akhir->bulan_dibayar, $bln);
            
            if ($a == 11) :
                $bulan = 0;
                $tahun = $akhir->tahun_dibayar + 1;
            else :
                $bulan = $a + 1;
                $tahun = $akhir->tahun_dibayar;
            endif;
        endif;

        if ($request->jumlah_bayar < $spp->nominal) :
             return back()->with('success','Uang yg anda masukan kurang');
        endif;
        
        Pembayaran::create([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => Carbon::now(),
            'bulan_dibayar' => $bln[$bulan],
            'tahun_dibayar' => $tahun,
            'id_spp' => $spp->id,
            'nominal' => $spp->nominal,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);     

        return redirect()->route('pembayaran.index')->with('success','Pembayaran berhasil ditambahkan');
    }

    /**
     * 
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranView $pembayaran)
    {
        return view('pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        $siswa = Siswa::all();
        return view('pembayaran.edit', compact('pembayaran','siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success','Pembayaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success','Pembayaran berhasil dihapus');
    }

    public function histori()
    {

        if(auth()->user()->level=='ADMIN' OR auth()->user()->level=='PETUGAS')
        {
            $views = PembayaranView::all();
        }
        else
        {
            $user = auth()->user()->username;
            $siswa = Siswa::where('username', $user)->pluck('nisn');
            $views = PembayaranView::where('nisn', $siswa)->get();
                
        }
        return view('pembayaran.histori', compact('views'));

    }

    public function export()
  	{
		return Excel::download(new HistoriExport, 'histori.xlsx');
	}

    public function getData($id)
    {
        $siswa = Siswa::where('nisn', $id)->first();
        $spp = Spp::find($siswa->id_spp);
        $pembayaran = Pembayaran::where('nisn', $id)->latest()->first();
        
        if($pembayaran == null)
        {
            $data = 
            [
                'harga' => $spp->nominal,
                'bulan'  => 'belum bayar',
                'tahun' => 'belum bayar',
            ];
        }
        else
        {
            $data = 
            [
                'harga' => $spp->nominal,
                'bulan'  => $pembayaran->bulan_dibayar,
                'tahun' => $pembayaran->tahun_dibayar,
            ];
        }

        
        return response()->json($data); 
    }
}
 