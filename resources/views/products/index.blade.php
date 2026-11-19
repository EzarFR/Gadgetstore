
@extends('layouts.app')
@section('title', 'Data Produk')
@section('content')

<h3>Data Produk</h3>

@if(auth()->user()->role === 'admin')
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        Tambah Produk
    </a>
@endif

<form method="GET" class="row g-2 my-3">
    <input
        name="q"
        value="{{ request('q') }}"
        class="form-control"
        placeholder="Cari kode, nama, merek"
    >

    <select name="category_id" class="form-select">
        <option value="">Semua kategori</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                @selected(request('category_id') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-outline-primary">
        Cari / Filter
    </button>
</form>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Merek</th>
                <th>Harga</th>
                <th>Stok</th>

                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                width="70"
                                height="70"
                                style="object-fit: cover; border-radius: 8px;"
                            >
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>

                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>Rp {{ number_format((float)$product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>

                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('products.edit', $product) }}"
                                class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form method="POST"
                                action="{{ route('products.destroy', $product) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus produk?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ auth()->user()->role === 'admin' ? 8 : 7 }}"
                        class="text-center">
                        Belum ada produk.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $products->links() }}

@endsection
