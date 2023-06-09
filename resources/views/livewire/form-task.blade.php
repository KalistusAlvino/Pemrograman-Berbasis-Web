<div>
    <form wire:submit.prevent='tambah'>
        <div class="form-group">
            <label>Nama</label>
            <input wire:model="nama" name="nama" id="" class="form-control" placeholder="Masukan judul">
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input wire:model="judul_task" name="judul_task" id="" class="form-control" placeholder="Masukan judul">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea wire:model="deskripsi_task" rows="5" class="form-control" placeholder="Masukan Deskripsi"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</div>
