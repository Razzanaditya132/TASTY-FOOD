@include('layout.header')

@section('content')
<style>
    .hero-section {
        position: relative;
        height: 300px;
        background: url('{{ asset('ASET/Group 70.png') }}') no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 40px;
    }

    .hero-section h1 {
        color: white;
        font-size: 48px;
        font-weight: bold;
        font-family: sans-serif;
        margin-right: 400px;
        margin-top: 100px;
    }

    .gallery-wrapper {
        position: relative;
        width: 100%;
        height: 50%;
        overflow: hidden;
        padding: 0 40px;
    }

    .gallery-topbar {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn-add-photo {
        background-color: #c65900;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s;
    }

    .btn-add-photo:hover {
        background-color: #d48300;
    }

    .gallery-slider {
        display: flex;
        transition: transform 0.5s ease;
    }

    .gallery-item {
        min-width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
        border-radius: 30px;
        background-color: #f4f4f4;
        gap: 10px;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.05);
    }

    .gallery-actions {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-actions {
        opacity: 1;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }

    .action-btn:hover {
        background-color: rgba(255, 0, 0, 0.8);
    }

    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background: #28a745;
        border: none;
        padding: 12px;
        border-radius: 50%;
        color: white;
        font-size: 22px;
        cursor: pointer;
    }

    .scroll-left {
        left: 20px;
    }

    .scroll-right {
        right: 20px;
    }

    .add-photo-empty {
        width: 100%;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 80px;
        color: #aaa;
    }

    .gallery-card {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.05);
    }

    .gallery-card img {
        transition: transform 0.3s ease;
    }

    .action-buttons {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        gap: 8px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-card:hover .action-buttons {
        opacity: 1;
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <h1>GALERI KAMI</h1>
</div>

<!-- Galeri -->
<div class="gallery-wrapper">
    <div class="gallery-topbar">
        <a href="{{ route('galeri.create') }}" class="btn-add-photo">➕ Tambahkan Foto</a>
    </div>

    @if ($galeris->count() > 0)
        <div class="gallery-slider" id="gallerySlider">
            @foreach ($galeris as $galeri)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Foto Galeri">
                    <div class="gallery-actions">
                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="action-btn" title="Edit">✏️</a>
                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST"
                            onsubmit="return confirm('Hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn" title="Hapus">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($galeris->count() > 1)
            <button class="scroll-btn scroll-left" onclick="slide(-1)">❮</button>
            <button class="scroll-btn scroll-right" onclick="slide(1)">❯</button>
        @endif
    @else
        <div class="add-photo-empty">
            <a href="{{ route('galeri.create') }}">+</a>
        </div>
    @endif
</div>

<!-- Grid Galeri (di luar gallery-wrapper) -->
<div class="gallery-grid-section" style="padding: 40px;">
    <!-- Tombol Tambahkan Gambar -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('grid_galeri.create') }}" class="btn-add-photo">➕ Tambahkan Gambar</a>
    </div>

    @if ($grid_galeris->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
            @foreach ($grid_galeris as $grid)
                <div class="gallery-card">
                    <img src="{{ asset('storage/' . $grid->gambar) }}" alt="Foto Grid Galeri"
                        style="width: 100%; height: 250px; object-fit: cover;">

                    <!-- Tombol Edit dan Delete -->
                    <div class="action-buttons">
                        <a href="{{ route('grid_galeri.edit', $grid->id) }}" title="Edit"
                            style="background: rgba(0, 0, 0, 0.6); color: white; padding: 8px; border-radius: 50%; text-decoration: none;">✏️</a>

                        <form action="{{ route('grid_galeri.destroy', $grid->id) }}" method="POST"
                            onsubmit="return confirm('Hapus gambar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background: rgba(255, 0, 0, 0.6); color: white; padding: 8px; border: none; border-radius: 50%; cursor: pointer;">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p style="text-align: center; color: #777; font-size: 18px;">Belum ada foto yang diunggah.</p>
    @endif
</div>
<script>
    let currentIndex = 0;
    const gallerySlider = document.getElementById('gallerySlider');
    const totalSlides = {{ $galeris->count() }};

    function slide(direction) {
        currentIndex += direction;
        if (currentIndex < 0) currentIndex = totalSlides - 1;
        if (currentIndex >= totalSlides) currentIndex = 0;
        gallerySlider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
</script>

@include('layout.footer')