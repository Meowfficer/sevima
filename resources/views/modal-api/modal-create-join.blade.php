<form action="{{ route('store-modal-join') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="">Class Code</label>
        <input type="text" value="{{ old('nama') }}" id="class_code" class="form-control" name="class_code">
    </div>
</form>