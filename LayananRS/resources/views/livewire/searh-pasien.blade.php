<div>
    <div class="flex justify-between items-center mb-4">
        <h4 class="text-lg font-semibold text-gray-700">Daftar Pasien</h4>
        <input wire:model.live.debounce.300ms="searchTerm" class="form-input rounded-md border-gray-300" type="text"
            placeholder="Cari pasien...">
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        Pasien</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
                        Telepon</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        Bergabung</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($patients as $patient)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $patient->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $patient->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $patient->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $patient->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <button type="button" class="text-indigo-600 hover:text-indigo-900 detail-btn"
                                data-name="{{ $patient->name }}" data-email="{{ $patient->email }}"
                                data-phone="{{ $patient->phone_number ?? $patient->phone }}"
                                data-dob="{{ $patient->date_of_birth ? \Carbon\Carbon::parse($patient->date_of_birth)->format('d M Y') : 'Tidak tersedia' }}"
                                data-address="{{ $patient->address ?? 'Tidak tersedia' }}"
                                data-user-id="{{ $patient->user_id }}">
                                Detail
                            </button>
                            <form id="delete-form-{{ $patient->id }}"
                                action="{{ route('admin.delete.pasien', $patient->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-600 hover:text-red-900 delete-btn"
                                    data-patient-name="{{ $patient->name }}"
                                    data-form-id="delete-form-{{ $patient->id }}">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                            Tidak ada data pasien tersedia.
                        </td>
                    </tr>
                @endforelse


                <!-- Data lainnya bisa ditambahkan di sini -->

            </tbody>
        </table>
    </div>
</div>
