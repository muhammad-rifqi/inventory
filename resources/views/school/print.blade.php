                        <h2>List of Product</h2>
                        <h3>Nama Sekolah : {{$school->nama_sekolah}}</h3>
                        <table width="100%" border="1" cellpading="4" cellspacing="0">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode </th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Volume</th>
                            <th scope="col"> Satuan </th>
                            <th scope="col"> Harga </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           
                        @foreach($data as $no => $row)

     
                        <tr>
                            <th>{{$no+1}}</th>
                            <td align="center">{{$row->kode_rekening}}</td>
                            <td align="center">{{$row->nama_barang}}</td>
                            <td align="center">{{$row->volume}}</td>
                            <td align="center">{{$row->satuan}}</td>
                            <td align="center">{{$row->harga}}</td>
                        </tr>

                        @endforeach
                        </tbody>   
                        </table>

                        <script>window.print();</script>