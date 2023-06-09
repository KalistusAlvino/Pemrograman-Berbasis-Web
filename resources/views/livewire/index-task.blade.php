<div>
    <div class="card">
        <div class="card-header bg-info">
            <strong class="text-light">Data Terbaru</strong>
        </div>
        <div class="card-body">
           <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($task as $idx => $t)
                    <tr>
                        <th scope="row">
                            {{ $task->firstItem() + $idx }}
                        </th>
                        <td>{{ $t->nama }}</td>
                        <td>{{ $t->judul_task }}</td>
                        <td>{{ $t->deskripsi_task }}</td>
                    </tr>
                    @endforeach
                </tbody>
           </table>
        </div>
    </div>
</div>
