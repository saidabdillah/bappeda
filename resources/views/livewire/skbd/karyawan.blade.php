<div>
    <flux:heading>Karyawan</flux:heading>
    <flux:text class="mt-2">Lorem ipsum dolor sit amet consectetur..</flux:text>

    <div class="w-full">
        <table class="mt-5 w-1/3 border-2">
            <thead class="text-left bg-black text-white">
                <tr>
                    <th class="py-2 px-5">No.</th>
                    <th class="py-2 px-5">Nama</th>
                    <th class="py-2 px-5">Jabatan</th>
                    <th class="py-2 px-5">Aksi</th>
                </tr>
            </thead>
            <tbody class="border-t-2">
                @foreach ($users as $index => $user)
                <tr class="">
                    {{-- <td class="py-2 px-5 border">{{ $index + 1 }}.</td> --}}
                    <td class="py-2 px-5 border">{{ $user->name }}</td>
                    {{-- <td class="py-2 px-5 border">{{ $user->roles[0]->name }}</td> --}}
                    <td class="py-2 px-5 border">
                        <flux:button variant="primary" href="{{ route('karyawan.index', $user->id) }}">Edit
                        </flux:button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>