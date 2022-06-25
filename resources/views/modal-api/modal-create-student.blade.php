<form action="{{ route('store-modal') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Nama Student</label>
        <input type="text" value="{{ old('nama') }}" id="nama_student" class="form-control" name="nama_student">
    </div>
</form>