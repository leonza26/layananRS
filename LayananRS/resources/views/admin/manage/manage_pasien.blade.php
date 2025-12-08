@extends('admin.layouts.layout')

@section('admin_page_title')
    Manajemen Pasien - Klinik Sehat
@endsection

@section('admin_content')
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-semibold text-gray-700">Manajemen Pasien</h3>
        <!-- Tombol Tambah Pasien mungkin tidak diperlukan jika pendaftaran hanya dari sisi user -->
    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-lg font-semibold text-gray-700">Daftar Pasien</h4>
            <input class="form-input rounded-md border-gray-300" type="text" placeholder="Cari pasien...">
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
                                <form id="delete-form-{{ $patient->id }}" action="{{ route('admin.delete.pasien', $patient->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:text-red-900 delete-btn" data-patient-name="{{ $patient->name }}" data-form-id="delete-form-{{ $patient->id }}">Hapus</button>
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

    <!-- Modal Detail Pasien -->
    <div id="patientDetailModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div id="modal-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
            </div>

            <!-- Modal panel -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Detail Pasien
                            </h3>
                            <div class="mt-4">
                                <table class="min-w-full">
                                    <tbody class="bg-white">
                                        <tr>
                                            <td class="px-2 py-2 text-sm font-semibold text-gray-700">User ID</td>
                                            <td id="modal-user-id" class="px-2 py-2 text-sm text-gray-900"></td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-sm font-semibold text-gray-700">Nama</td>
                                            <td id="modal-name" class="px-2 py-2 text-sm text-gray-900"></td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-sm font-semibold text-gray-700">Email</td>
                                            <td id="modal-email" class="px-2 py-2 text-sm text-gray-900"></td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-sm font-semibold text-gray-700">No. Telepon</td>
                                            <td id="modal-phone" class="px-2 py-2 text-sm text-gray-900"></td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-sm font-semibold text-gray-700">Tgl. Lahir</td>
                                            <td id="modal-dob" class="px-2 py-2 text-sm text-gray-900"></td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 text-sm font-semibold text-gray-700">Alamat</td>
                                            <td id="modal-address" class="px-2 py-2 text-sm text-gray-900"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="closeModal"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteConfirmationModal" class="fixed z-20 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div id="delete-modal-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Hapus Pasien
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="delete-confirmation-message">
                                    Apakah Anda yakin ingin menghapus pasien ini? Tindakan ini tidak dapat dibatalkan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirmDeleteBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus
                    </button>
                    <button type="button" id="cancelDeleteBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('patientDetailModal');
            const closeModalBtn = document.getElementById('closeModal');
            const modalOverlay = document.getElementById('modal-overlay');
            const detailButtons = document.querySelectorAll('.detail-btn');

            // Elemen untuk modal hapus
            const deleteModal = document.getElementById('deleteConfirmationModal');
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            const deleteModalOverlay = document.getElementById('delete-modal-overlay');

            const openModal = (data) => {
                document.getElementById('modal-user-id').textContent = data.userId;
                document.getElementById('modal-name').textContent = data.name;
                document.getElementById('modal-email').textContent = data.email;
                document.getElementById('modal-phone').textContent = data.phone;
                document.getElementById('modal-dob').textContent = data.dob;
                document.getElementById('modal-address').textContent = data.address;
                modal.classList.remove('hidden');
            };

            const closeModal = () => {
                modal.classList.add('hidden');
            };

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const patientData = {
                        userId: this.dataset.userId,
                        name: this.dataset.name,
                        email: this.dataset.email,
                        phone: this.dataset.phone,
                        dob: this.dataset.dob,
                        address: this.dataset.address,
                    };
                    openModal(patientData);
                });
            });

            closeModalBtn.addEventListener('click', closeModal);
            modalOverlay.addEventListener('click', closeModal);

            // Logika untuk modal hapus
            let formToSubmit = null;

            const openDeleteModal = (formId, patientName) => {
                formToSubmit = formId;
                const message = `Apakah Anda yakin ingin menghapus pasien bernama <strong>${patientName}</strong>? Tindakan ini tidak dapat dibatalkan.`;
                document.getElementById('delete-confirmation-message').innerHTML = message;
                deleteModal.classList.remove('hidden');
            };

            const closeDeleteModal = () => {
                deleteModal.classList.add('hidden');
                formToSubmit = null;
            };

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    openDeleteModal(this.dataset.formId, this.dataset.patientName);
                });
            });

            confirmDeleteBtn.addEventListener('click', () => {
                if (formToSubmit) {
                    document.getElementById(formToSubmit).submit();
                }
            });

            cancelDeleteBtn.addEventListener('click', closeDeleteModal);
            deleteModalOverlay.addEventListener('click', closeDeleteModal);
        });
    </script>
@endpush
