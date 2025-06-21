@include('layout.header')

@section('content')
<div class="container">
    <h1 class="mb-4">Tambah User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Gmail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select name="role_id" class="form-control" required>
                <option value="">Pilih Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option> <!-- Diperbaiki -->
                @endforeach
            </select>

        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" checked>
            <label class="form-check-label" for="is_active">
                Aktifkan User
            </label>
        </div>

        <button type="submit" class="btn btn-success">Tambahkan</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batalkan</a>
    </form>
</div>
@include('layout.footer')