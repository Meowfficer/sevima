<form action="{{ route('store-modal') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama Kelas</label>
        <input type="text" value="{{ old('nama') }}" id="nama_kelas" class="form-control" name="nama_kelas">
    </div>
    <div class="form-group">
        <label for="">Deskripsi Kelas</label>
        <input type="text" value="{{ old('nama') }}" id="deskripsi_kelas" class="form-control" name="deskripsi">
    </div>
</form>