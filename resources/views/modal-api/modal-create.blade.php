<form action="{{  }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama Kelas</label>
        <input type="text" value="{{ old('nama') }}" id="material_incoming" class="form-control" name="nama_kelas">
    </div>
</form>