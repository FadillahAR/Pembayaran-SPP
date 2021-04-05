<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Id_petugas</th>
            <th>NISN</th>
            <th>Tgl_bayar</th>
            <th>bulan_dibayar</th>
            <th>tahun_dibayar</th>
            <th>jumlah_bayar</th>
    
        </tr>
    </thead>
    <tbody>
    @foreach ($views as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->id_petugas}}</td>
            <td>{{ $p->nisn}}</td>
            <td>{{ $p->tgl_bayar }}</td>
            <td>{{ $p->bulan_dibayar}}</td>
            <td>{{ $p->tahun_dibayar}}</td>
            <td>{{ $p->jumlah_bayar }}</td>
        </tr>
    @endforeach
    </tbody>        
</table>
