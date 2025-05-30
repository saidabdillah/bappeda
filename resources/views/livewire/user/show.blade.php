<div>
    <flux:modal name="add-user" class="w-full">
        <form wire:submit="register">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Tambah Pengguna</flux:heading>
                    <flux:text class="mt-2">Make Add to your personal details.</flux:text>
                </div>

                <flux:input wire:model="name" :label="__('Nama Lengkap')" type="text" autofocus autocomplete="name"
                    :placeholder="__('Nama Lengkap')" />

                <flux:input wire:model="email" :label="__('Email')" type="email" autocomplete="email"
                    placeholder="email@example.com" />

                <flux:input wire:model="password" :label="__('Kata Sandi')" type="password" autocomplete="new-password"
                    :placeholder="__('Kata Sandi')" />

                <flux:input wire:model="password_confirmation" :label="__('Konfirmasi Kata Sandi')" type="password"
                    autocomplete="new-password" :placeholder="__('Konfirmasi Kata Sandi')" />

                <flux:select wire:model="id_skpd" label="SKPD">
                    <flux:select.option value="">Pilih SKPD</flux:select.option>
                    @foreach (App\Models\Skpd::all() as $item)
                    <flux:select.option value="{{ $item->id }}">{{ $item->skpd }}</flux:select.option>
                    @endforeach
                </flux:select>

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Daftar</flux:button>
                </div>
        </form>
</div>
</flux:modal>
</div>