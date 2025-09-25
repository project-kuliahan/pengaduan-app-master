@section('title', 'My Profile')
<div>
    <div class="page-heading">
        <h3>My Profile</h3>
    </div>
<section class="section">
    <div class="row">
        <!-- Sidebar Avatar -->
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="avatar avatar-2xl">
                            @if($foto)
                                <img src="{{ asset('storage/users/'.$foto) }}" alt="Avatar" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="Avatar" class="rounded-circle" style="width:120px;height:120px;object-fit:cover;">
                            @endif
                        </div>

                        <h3 class="mt-3">{{ $name }}</h3>
                        <p class="text-small">{{ '@'.$username ?? 'Belum ada username' }}</p> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="updateProfile">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" wire:model="name" id="name" class="form-control">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" wire:model="username" id="username" class="form-control">
                            @error('username') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" wire:model="email" id="email" class="form-control">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="whatsapp" class="form-label">WhatsApp</label>
                            <input type="text" wire:model="whatsapp" id="whatsapp" class="form-control">
                            @error('whatsapp') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea wire:model="alamat" id="alamat" class="form-control"></textarea>
                            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="newFoto" class="form-label">Foto Profil</label>
                            <input type="file" wire:model="newFoto" id="newFoto" class="form-control">
                            @error('newFoto') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password (Opsional)</label>
                            <input type="password" wire:model="password" id="password" class="form-control">
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
