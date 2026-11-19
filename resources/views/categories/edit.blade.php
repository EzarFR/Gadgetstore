
@extends('layouts.app')
@section('title','Edit Kategori')
@section('content')

<h3>Edit Kategori</h3>

<form method="POST" action="{{ route('categories.update',$category) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama kategori</label>
        <input name="name" class="form-control"
            value="{{ old('name',$category->name) }}">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description',$category->description) }}</textarea>
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Gambar Kategori -->
    <div class="mb-3">
        <label>Gambar Kategori</label>

        @if($category->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $category->image) }}"
                     alt="Gambar {{ $category->name }}"
                     width="120"
                     height="120"
                     style="object-fit: cover; border-radius: 8px;">
            </div>
        @else
            <p class="text-muted">Belum ada gambar kategori.</p>
        @endif

        <input
            type="file"
            name="image"
            class="form-control"
            accept=".jpg,.jpeg,.png"
        >

        <small class="text-muted">
            Kosongkan jika tidak ingin mengganti gambar. Format JPG, JPEG, PNG, maksimal 2 MB.
        </small>

        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label>Status Kategori</label>
        <select name="status" class="form-select">
            <option value="Aktif"
                {{ old('status', $category->status) == 'Aktif' ? 'selected' : '' }}>
                Aktif
            </option>

            <option value="Tidak Aktif"
                {{ old('status', $category->status) == 'Tidak Aktif' ? 'selected' : '' }}>
                Tidak Aktif
            </option>
        </select>

        @error('status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection
