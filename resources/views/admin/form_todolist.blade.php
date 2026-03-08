@extends('layout.main') {{-- Sesuaikan dengan nama layout utama Anda --}}

@section('style')
{{-- CSS Assets --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> {{-- Gunakan versi Bootstrap yang sesuai --}}
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>
{{-- FullCalendar CSS --}}
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    body { font-family: "Montserrat", sans-serif; background-color: #f8f9fa; }
    .card { box-shadow: 0 2px 10px rgba(0, 0, 0, 0.075); border-radius: 8px; border: none; margin-bottom: 2rem;}
    .card-header { background-color: #fff; border-bottom: 1px solid #eee; padding: 1rem 1.25rem; font-weight: 600;}
    .card-title { margin-bottom: 0; font-size: 1.1rem; }
    .form-group { margin-bottom: 1.25rem; }
    .form-group > label { margin-bottom: .5rem; font-weight: 500; color: #495057; }

    /* Style untuk Nama Dinas Terpilih di Modal */
    #selectedNamesDisplay span, #edit_selectedNamesDisplay span {
        cursor: pointer; margin: 2px; display: inline-block; border: 1px solid #ddd;
        padding: 4px 10px; border-radius: 15px; background-color: #e9ecef;
        font-size: 0.9em; transition: all 0.2s ease;
    }
    #selectedNamesDisplay span:hover, #edit_selectedNamesDisplay span:hover {
        background-color: #dc3545; color: white; border-color: #c82333; transform: scale(1.05);
    }
    .modal-body .form-group:last-child { margin-bottom: 0; }

    /* Style FullCalendar */
    #calendar-container { position: relative; }
    #calendar { max-width: 1100px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 10px; }
    .fc-event { border: none !important; padding: 3px 6px; font-size: 0.85em; cursor: pointer;}
    .fc-event-main { color: #fff !important; }
    .fc-daygrid-day.fc-day-today { background-color: rgba(0, 123, 255, 0.08); }
    .modal-header { border-bottom: none; padding-bottom: 0; }
    .modal-footer { border-top: 1px solid #eee; padding-top: 1rem; }
    .modal-title { font-weight: 600; }

    /* Container Tugas Checkbox */
    #tugasContainer { max-height: 180px; overflow-y: auto; border: 1px solid #ced4da; padding: 10px; border-radius: 5px; background-color: #fff; margin-top: 5px; }
    .task-item { padding: 2px 0; }
    .task-item label { font-size: 0.95em; font-weight: normal; }
    .no-tasks-available-message, .dynamic-not-found-message {
        text-align: center;
        font-style: italic;
        color: #6c757d;
        padding: 10px 0;
    }

    /* Style Select2 dalam modal */
    .select2-container--bootstrap-5 .select2-dropdown { z-index: 1060; }
    .select2-container--bootstrap-5 .select2-selection--single { height: calc(1.5em + 0.75rem + 2px); padding: 0.375rem 0.75rem; }
    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered { padding-left: 0; padding-right: 0; line-height: 1.5; }
    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow { height: calc(1.5em + 0.75rem); }
    .select2-container .select2-selection--single .select2-selection__rendered { font-size: 0.875rem; }
    .select2-results__option { font-size: 0.875rem; }
    .select2-results__option[aria-disabled=true] { color: #aaa; background-color: #f8f9fa; }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            {{-- Pesan Feedback --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error Validasi!</strong>
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Kalender Jadwal Dinas</h3>
                    <div>
                        {{-- TOMBOL CETAK EXCEL (SEMUA DATA TERKINI CLIENT-SIDE) --}}
                        <button type="button" id="btnCetakExcelClient" class="btn btn-info btn-sm">
                            <i class="fas fa-file-excel me-1"></i> Cetak Seluruh Jadwal Preventive
                        </button>
                        {{-- TOMBOL CETAK EXCEL (VIEW KALENDER SAAT INI CLIENT-SIDE) --}}
                        <button type="button" id="btnCetakExcelCurrentView" class="btn btn-warning btn-sm ms-2">
                            <i class="fas fa-calendar-week me-1"></i> Cetak Perbulan Jadwal Preventive
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="calendar-container">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal: Tambah Jadwal --}}
<div class="modal fade" id="todolistModal" tabindex="-1" aria-labelledby="todolistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addTodolistForm" method="POST" action="{{ route('admin.store_ver_todolist') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="todolistModalLabel">Tambah Jadwal Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_add">Tanggal:</label>
                                <input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal_add" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_dinas_select_add">Pilih Nama Dinas (On Duty):</label>
                                <select class="form-control form-control-sm nama-dinas-selector" id="nama_dinas_select_add" style="width: 100%;">
                                    <option value="">-- Tambah Nama --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="nama_dinas_selected" id="nama_dinas_selected_add" required>
                                <label class="mt-2 small text-muted">Nama Dinas Terpilih: (Klik untuk hapus)</label>
                                <div id="selectedNamesDisplay" class="mt-1" style="border: 1px solid #eee; padding: 8px; min-height: 38px; border-radius: 5px; background-color: #f8f9fa;"></div>
                                @error('nama_dinas_selected') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                <div class="invalid-feedback" id="nama_dinas_client_error" style="display: none; font-size: .875em;">Pilih setidaknya satu nama dinas.</div>
                            </div>
                            <div class="form-group">
                                <label for="name_add">Nama PIC:</label>
                                <select class="form-control form-control-sm pic-selector" name="name" id="name_add" required style="width: 100%;">
                                    <option value="">-- Pilih PIC --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                <div class="invalid-feedback" id="pic_client_error" style="display: none; font-size: .875em;">PIC harus dipilih.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tugas_add">Tugas (Kendaraan):</label>
                                <input type="text" id="search_add" class="form-control form-control-sm mb-2" placeholder="Cari kendaraan...">
                                <div id="tugasContainer">
                                    @forelse($vehicles as $vehicle)
                                    <div class="form-check task-item">
                                        <input class="form-check-input" type="checkbox" name="tugas[]" id="add_tugas{{ $loop->index }}" value="{{ $vehicle->vehicle_name }}">
                                        <label class="form-check-label" for="add_tugas{{ $loop->index }}"> {{ $vehicle->vehicle_name }}</label>
                                    </div>
                                    @empty
                                        <p class="text-muted small no-tasks-available-message">Tidak ada data kendaraan.</p>
                                    @endforelse
                                </div>
                                <small class="text-danger d-none" id="tugas_error_message">Pilih minimal satu tugas.</small>
                                @error('tugas') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save me-1"></i> Simpan Tugas</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal: Edit/Hapus Jadwal --}}
<div class="modal fade" id="editTodolistModal" tabindex="-1" aria-labelledby="editTodolistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editTodolistForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editTodolistModalLabel">Edit Jadwal Dinas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_task_id" name="task_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit_tanggal">Tanggal:</label>
                                <input type="date" class="form-control form-control-sm" name="edit_tanggal" id="edit_tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_nama_dinas_select">Nama Dinas (On Duty):</label>
                                <select class="form-control form-control-sm nama-dinas-selector" id="edit_nama_dinas_select" style="width: 100%;">
                                    <option value="">-- Tambah Nama --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="edit_nama_dinas_selected" id="edit_nama_dinas_selected" required>
                                <label class="mt-2 small text-muted">Nama Dinas Terpilih: (Klik untuk hapus)</label>
                                <div id="edit_selectedNamesDisplay" class="mt-1" style="border: 1px solid #eee; padding: 8px; min-height: 38px; border-radius: 5px; background-color: #f8f9fa;"></div>
                                <div class="invalid-feedback" id="edit_nama_dinas_client_error" style="display: none; font-size: .875em;">Pilih setidaknya satu nama dinas.</div>
                            </div>
                            <div class="form-group">
                                <label for="edit_name">Nama PIC:</label>
                                <select class="form-control form-control-sm pic-selector" name="edit_name" id="edit_name" required style="width: 100%;">
                                    <option value="">-- Pilih PIC --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback" id="edit_pic_client_error" style="display: none; font-size: .875em;">PIC harus dipilih.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tugas:</label>
                                <p id="edit_tugas_display" class="form-control-plaintext bg-light p-2 border rounded small"><i>(Nama Tugas Akan Tampil Disini)</i></p>
                            </div>
                            <div class="form-group">
                                <label for="edit_is_completed">Status:</label>
                                <select class="form-select form-select-sm" name="edit_is_completed" id="edit_is_completed">
                                    <option value="0">Proses</option>
                                    <option value="1">Selesai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="modal-footer justify-content-between">
                <form id="deleteTodolistForm"
                            method="POST"
                            action=""
                            class="d-inline"
                            data-base-action="{{ url('admin/delete-todolist') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt me-1"></i> Hapus
                    </button>
                </form>
                <div>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" form="editTodolistForm" class="btn btn-primary btn-sm">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- JS Assets --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/id.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.js'></script>
{{-- Tambahkan CDN untuk SheetJS (js-xlsx) --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


<script>
    // --- Helper Function for Nama Dinas Selection ---
    function setupNamaDinasSelection(selectId, displayId, inputId, errorMsgId) {
        const $dropdown = $(`#${selectId}`);
        const display = document.getElementById(displayId);
        const hiddenInput = document.getElementById(inputId);
        const errorMsgElement = document.getElementById(errorMsgId);
        let selectedNames = [];

        function loadNamesFromInput() {
            const currentVal = hiddenInput ? hiddenInput.value : '';
            selectedNames = currentVal ? currentVal.split(',').map(n => n.trim()).filter(n => n !== '') : [];
            renderDisplay();
        }
        function renderDisplay() {
            if (!display || !hiddenInput) return;
            display.innerHTML = '';
            selectedNames.forEach((name, index) => {
                const span = document.createElement('span');
                span.textContent = name;
                span.dataset.index = index;
                span.title = 'Klik untuk menghapus';
                span.classList.add('nama-dinas-tag');
                span.addEventListener('click', () => {
                    selectedNames.splice(index, 1);
                    renderDisplay();
                });
                display.appendChild(span);
            });
            hiddenInput.value = selectedNames.join(',');
            validateInput();
            updateDropdownOptions();
        }
        function updateDropdownOptions() {
            if (!$dropdown.length) return;
            $dropdown.find('option').each(function() {
                const optionValue = $(this).val();
                if (optionValue) {
                    $(this).prop('disabled', selectedNames.includes(optionValue));
                }
            });
            if ($dropdown.data('select2')) {
                $dropdown.trigger('change.select2');
            }
        }
        function validateInput() {
            if (!hiddenInput || !errorMsgElement) return true;
            const isValid = selectedNames.length > 0;
            if (!isValid) {
                hiddenInput.setCustomValidity('Pilih setidaknya satu nama dinas.');
                $(errorMsgElement).show();
            } else {
                hiddenInput.setCustomValidity('');
                $(errorMsgElement).hide();
            }
            return isValid;
        }
        function resetSelection() {
            selectedNames = [];
            if (hiddenInput) hiddenInput.value = '';
            if (display) display.innerHTML = '';
            if (errorMsgElement) $(errorMsgElement).hide();
            if ($dropdown.length) { $dropdown.val(null).trigger('change.select2'); }
            updateDropdownOptions();
        }

        if ($dropdown.length && $.fn.select2) {
            $dropdown.on('select2:select', function (e) {
                var selectedName = e.params.data.id;
                if (selectedName && !selectedNames.includes(selectedName)) {
                    selectedNames.push(selectedName);
                    renderDisplay();
                }
                $(this).val(null).trigger('change.select2');
            });
        } else {
             console.warn(`Select2 not initialized or dropdown #${selectId} not found when setting up event listener.`);
        }

        return { setNames: (namesString) => {
                    if (hiddenInput) {
                        hiddenInput.value = namesString || '';
                        loadNamesFromInput();
                    } else { console.warn(`Hidden input #${inputId} not found for setNames.`); }
                }, validate: validateInput, reset: resetSelection
        };
    }
    // -----------------------------------------------

    // --- Filter Tugas Kendaraan ---
    function filterTasks(inputId, containerSelector) {
        const searchInput = document.getElementById(inputId)?.value.toLowerCase().trim() ?? '';
        const tasksContainer = document.querySelector(containerSelector);
        if (!tasksContainer) {
            console.warn(`Task container "${containerSelector}" not found.`);
            return;
        }
        const taskItems = tasksContainer.querySelectorAll('.task-item');
        const initialNoTasksMessage = tasksContainer.querySelector('.no-tasks-available-message');
        tasksContainer.querySelectorAll('.dynamic-not-found-message').forEach(msg => msg.remove());

        if (taskItems.length === 0) {
            if (initialNoTasksMessage) { initialNoTasksMessage.style.display = '';}
            return;
        }
        if (initialNoTasksMessage) { initialNoTasksMessage.style.display = 'none';}

        let visibleCount = 0;
        taskItems.forEach(task => {
            const label = task.querySelector('label');
            if (label) {
                const vehicleName = label.textContent.toLowerCase();
                const isMatch = vehicleName.includes(searchInput);
                task.style.display = isMatch ? '' : 'none';
                if (isMatch) visibleCount++;
            }
        });
        if (visibleCount === 0 && searchInput.length > 0) {
            const p = document.createElement('p');
            p.className = 'text-muted small dynamic-not-found-message';
            p.textContent = 'Kendaraan tidak ditemukan.';
            tasksContainer.appendChild(p);
        }
    }
    // -----------------------------------------------

    // --- Document Ready ---
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM Ready. Initializing scripts...');
        moment.locale('id');

        let addNamaDinasHandler = null;
        let editNamaDinasHandler = null;
        const allUserNames = @json($users->pluck('name')->toArray());
        var calendar = null;

        try {
            if ($.fn.select2) {
                console.log('Initializing Select2...');
                try {
                    $('#name_add').select2({ theme: 'bootstrap-5', placeholder: '-- Pilih PIC --', allowClear: true, dropdownParent: $('#todolistModal') });
                    $('#nama_dinas_select_add').select2({ theme: 'bootstrap-5', placeholder: '-- Tambah Nama --', allowClear: false, dropdownParent: $('#todolistModal') });
                } catch (e) { console.error("Error initializing Select2 for Add Modal:", e); }
                try {
                    $('#edit_name').select2({ theme: 'bootstrap-5', placeholder: '-- Pilih PIC --', allowClear: true, dropdownParent: $('#editTodolistModal') });
                    $('#edit_nama_dinas_select').select2({ theme: 'bootstrap-5', placeholder: '-- Tambah Nama --', allowClear: false, dropdownParent: $('#editTodolistModal') });
                } catch (e) { console.error("Error initializing Select2 for Edit Modal:", e); }

                if(document.getElementById('nama_dinas_select_add')) {
                    addNamaDinasHandler = setupNamaDinasSelection('nama_dinas_select_add', 'selectedNamesDisplay', 'nama_dinas_selected_add', 'nama_dinas_client_error');
                }
                if(document.getElementById('edit_nama_dinas_select')) {
                    editNamaDinasHandler = setupNamaDinasSelection('edit_nama_dinas_select', 'edit_selectedNamesDisplay', 'edit_nama_dinas_selected', 'edit_nama_dinas_client_error');
                }
            } else {
                console.warn("Select2 library is not loaded!");
            }

            var calendarEl = document.getElementById('calendar');
            if (!calendarEl) { console.error("Calendar element #calendar not found!"); return; }
            console.log('Initializing FullCalendar...');

            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: { left: 'prev,next today', center: 'title', right: 'dayGridMonth,timeGridWeek,listWeek' },
                locale: 'id',
                events: {!! json_encode($events, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!},
                selectable: true, selectMirror: true, editable: false,
                eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
                eventDisplay: 'block',

                select: function(info) {
                    console.log('Select date:', info.startStr);
                    try {
                        const addForm = document.getElementById('addTodolistForm');
                        if (!addForm) { console.error("Add form not found"); return; }
                        addForm.reset();
                        $('#addTodolistForm').find('.is-invalid').removeClass('is-invalid');
                        $('#addTodolistForm').find('.invalid-feedback, .text-danger.small').hide();
                        $('#tanggal_add').val(info.startStr);
                        $('#name_add').val(null).trigger('change');

                        if (addNamaDinasHandler) {
                            addNamaDinasHandler.reset();
                            addNamaDinasHandler.setNames(allUserNames.join(','));
                        }

                        $('#tugasContainer input[type="checkbox"]').prop('checked', false);
                        $('#search_add').val('');
                        filterTasks('search_add', '#tugasContainer');
                        $('#tugas_error_message').addClass('d-none').hide();
                        var addModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('todolistModal'));
                        addModal.show();
                    } catch(e) { console.error("Error in select callback:", e); alert("Error membuka form tambah."); }
                },

                eventClick: function(info) {
                    console.log('Event click:', info.event.id);
                    try {
                        var eventData = info.event.extendedProps;
                        var eventId = info.event.id;
                        $('#editTodolistModal').data('current-event-id', eventId);
                        if (!eventData || !eventId) { console.error("Missing event data or ID:", info.event); alert('Data event tidak lengkap.'); return; }
                        const editForm = document.getElementById('editTodolistForm');
                        if (!editForm) { console.error("Edit form not found"); return; }
                        editForm.reset();
                        $('#editTodolistForm').find('.is-invalid').removeClass('is-invalid');
                        $('#editTodolistForm').find('.invalid-feedback, .text-danger.small').hide();
                        $('#edit_task_id').val(eventId);
                        $('#edit_tanggal').val(moment(eventData.tanggal).isValid() ? moment(eventData.tanggal).format('YYYY-MM-DD') : '');

                        let tugasText = 'N/A';
                        if (eventData.tugas && Array.isArray(eventData.tugas)) {
                            tugasText = eventData.tugas.map(t =>  t).join(', ');
                        } else if (eventData.tugas) {
                             tugasText =  eventData.tugas;
                        }
                        $('#edit_tugas_display').text(tugasText || 'N/A');

                        $('#edit_is_completed').val(eventData.is_completed ? '1' : '0');
                        $('#edit_name').val(eventData.name || null).trigger('change');
                        if (editNamaDinasHandler) {
                            const namaDinasString = Array.isArray(eventData.nama_dinas) ? eventData.nama_dinas.join(',') : (eventData.nama_dinas || '');
                            editNamaDinasHandler.setNames(namaDinasString);
                        }
                        var updateBaseUrl = "{{ url('admin/update-edit-todolist') }}";
                        if (editForm) {
                            editForm.action = `${updateBaseUrl}/${eventId}`;
                        }
                        var editModalInstance = bootstrap.Modal.getOrCreateInstance(document.getElementById('editTodolistModal'));
                        editModalInstance.show();
                    } catch (e) { console.error("Error in eventClick callback:", e); alert("Error membuka form edit."); }
                },
                eventSourceFailure: function(error) { console.error("Error fetching events:", error); },
                loading: function(isLoading) { /* Handle loading UI */ }
            });
            calendar.render();
            console.log("Calendar render() called.");

        } catch (e) { console.error("Error during initialization: ", e); }

        const searchInputAdd = document.getElementById('search_add');
        if (searchInputAdd) {
            searchInputAdd.addEventListener('input', function() {
                filterTasks('search_add', '#tugasContainer');
            });
            filterTasks('search_add', '#tugasContainer');
        }

        const addForm = document.getElementById('addTodolistForm');
        if (addForm) {
            addForm.addEventListener('submit', function(event) {
                let isValid = true;
                if (addNamaDinasHandler && !addNamaDinasHandler.validate()) isValid = false;
                if ($('#name_add').val() === "" || $('#name_add').val() === null) {
                    $('#pic_client_error').show(); isValid = false;
                } else { $('#pic_client_error').hide(); }
                if ($('#tugasContainer input[type="checkbox"]:checked').length === 0) {
                    $('#tugas_error_message').removeClass('d-none').show(); isValid = false;
                } else { $('#tugas_error_message').addClass('d-none').hide(); }
                if (!isValid) { event.preventDefault(); event.stopPropagation(); }
            });
        }

        const editForm = document.getElementById('editTodolistForm');
        if (editForm) {
             editForm.addEventListener('submit', function(event) {
                let isValid = true;
                if (editNamaDinasHandler && !editNamaDinasHandler.validate()) isValid = false;
                if ($('#edit_name').val() === "" || $('#edit_name').val() === null) {
                    $('#edit_pic_client_error').show(); isValid = false;
                } else { $('#edit_pic_client_error').hide(); }
                if (!isValid) { event.preventDefault(); event.stopPropagation(); }
            });
        }

        const todolistModalEl = document.getElementById('todolistModal');
        if (todolistModalEl) {
            todolistModalEl.addEventListener('hidden.bs.modal', function () {
                const addFormNode = document.getElementById('addTodolistForm');
                if(addFormNode) addFormNode.reset();
                $('#addTodolistForm').find('.is-invalid').removeClass('is-invalid');
                $('#addTodolistForm').find('.invalid-feedback, .text-danger.small, #tugas_error_message').hide().addClass('d-none');
                $('#name_add').val(null).trigger('change');
                if (addNamaDinasHandler) { addNamaDinasHandler.reset(); }
                $('#tugasContainer input[type="checkbox"]').prop('checked', false);
                $('#search_add').val('');
                filterTasks('search_add', '#tugasContainer');
            });
        }
        const editTodolistModalEl = document.getElementById('editTodolistModal');
        if (editTodolistModalEl) {
             editTodolistModalEl.addEventListener('hidden.bs.modal', function () {
                const editFormNode = document.getElementById('editTodolistForm');
                if(editFormNode) editFormNode.reset();
                $('#editTodolistForm').find('.is-invalid').removeClass('is-invalid');
                $('#editTodolistForm').find('.invalid-feedback, .text-danger.small').hide();
                $('#edit_name').val(null).trigger('change');
                if(editNamaDinasHandler) editNamaDinasHandler.reset();
                $('#edit_tugas_display').text('N/A');
                $('#deleteTodolistForm').attr('action', '');
                $('#editTodolistForm').attr('action', '');
                $('#editTodolistModal').removeData('current-event-id');
             });
        }

        $(document).on('submit', '#deleteTodolistForm', function(e) {
            e.preventDefault();
            const eventId = $('#editTodolistModal').data('current-event-id');
            const baseAction = $(this).data('base-action');
            if (!eventId || !baseAction) {
                alert("Terjadi kesalahan saat mencoba menghapus data. Event ID atau Base Action tidak ditemukan.");
                return;
            }
            if (confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
                const finalAction = `${baseAction}/${eventId}`;
                $(this).attr('action', finalAction);
                this.submit();
            }
        });

    // --- Fungsi Helper untuk Export Excel Client-Side ---
function exportEventsToExcel(eventList, fileNamePrefix) {
    if (!eventList.length) {
        alert('Tidak ada data jadwal untuk diekspor.');
        return;
    }

    // Baris 0: Judul Utama
    // Baris 1: Header Kolom
    const sheetData = [
        ['Jadwal Preventive Bandara Internasional Juanda Surabaya'], // Baris ke-1 di Excel (index 0)
        ['No', 'Tanggal', 'Teknisi On Duty', 'Nama PIC', 'Tugas Preventive', 'Status'] // Baris ke-2 di Excel (index 1)
    ];

    let nomorUrut = 1;

    eventList.forEach(eventObj => {
        const props = eventObj.extendedProps || {};
        const tanggal = eventObj.start ? moment(eventObj.start).format('DD-MM-YYYY') : (props.tanggal ? moment(props.tanggal).format('DD-MM-YYYY') : 'N/A');
        let namaDinas = 'N/A';
        if (props.nama_dinas && Array.isArray(props.nama_dinas)) {
            namaDinas = props.nama_dinas.join(', ');
        } else if (props.nama_dinas) {
            namaDinas = props.nama_dinas;
        }
        const pic = props.name || 'N/A';
        let tugasDisplay = 'N/A';
        if (props.tugas && Array.isArray(props.tugas)) {
            tugasDisplay = props.tugas.map(t => String(t)).join(', ');
        } else if (props.tugas) {
            tugasDisplay = String(props.tugas);
        }
        const status = props.is_completed ? 'Selesai' : 'Proses';
        sheetData.push([nomorUrut, tanggal, namaDinas, pic, tugasDisplay, status]);
        nomorUrut++;
    });

    try {
        const ws = XLSX.utils.aoa_to_sheet(sheetData);

        // --- STYLING BARIS 1 (Judul Utama - index 0) ---
        // Pastikan ada data header untuk menentukan jumlah kolom merge
        if (sheetData.length > 1 && sheetData[0] && sheetData[0].length === 1 && sheetData[1] && sheetData[1].length > 0) {
            const numColumns = sheetData[1].length; // Jumlah kolom berdasarkan baris header
            
            // 1. Merge sel untuk judul utama (Baris 1, index 0)
            ws['!merges'] = [
                { s: { r: 0, c: 0 }, e: { r: 0, c: numColumns - 1 } } // Merge dari A1 sampai X1 (sesuai jumlah kolom header)
            ];

            // 2. Center teks untuk judul utama (sel A1 setelah merge)
            const titleCellAddress = XLSX.utils.encode_cell({ r: 0, c: 0 }); // Alamat sel A1
            if (ws[titleCellAddress]) {
                if (!ws[titleCellAddress].s) ws[titleCellAddress].s = {}; // Buat objek style jika belum ada
                ws[titleCellAddress].s.alignment = { horizontal: "center", vertical: "center" };
                // Optional: Tambahkan style font untuk judul
                ws[titleCellAddress].s.font = { bold: true, sz: 14 };
            }
        }


        // --- STYLING BARIS 2 (Header Kolom - index 1) ---
        // Pastikan baris header ada di sheetData
        if (sheetData.length > 1 && sheetData[1]) {
            const headerRowIndex = 1; // Baris ke-2 di Excel adalah index 1 di array sheetData
            const numHeaderCols = sheetData[headerRowIndex].length;

            for (let c = 0; c < numHeaderCols; c++) {
                const cellAddress = XLSX.utils.encode_cell({ r: headerRowIndex, c: c });
                if (ws[cellAddress]) {
                    if (!ws[cellAddress].s) ws[cellAddress].s = {}; // Buat objek style jika belum ada
                    // Center teks untuk setiap sel header
                    ws[cellAddress].s.alignment = { horizontal: "center", vertical: "center" };
                    // Optional: Tambahkan style font untuk header (misalnya bold)
                    if (!ws[cellAddress].s.font) ws[cellAddress].s.font = {};
                    ws[cellAddress].s.font.bold = true;
                }
            }
        }

        // Optional: Mengatur lebar kolom agar lebih rapi
        const columnWidths = [
            { wch: 8 },  // No
            { wch: 12 }, // Tanggal
            { wch: 30 }, // Nama Dinas
            { wch: 25 }, // Nama PIC
            { wch: 35 }, // Tugas
            { wch: 10 }  // Status
        ];
        ws['!cols'] = columnWidths;

        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Jadwal Dinas');
        XLSX.writeFile(wb, fileNamePrefix + moment().format('YYYYMMDD_HHmmss') + '.xlsx');
        console.log('Export Excel: ' + fileNamePrefix + ' berhasil.');
    } catch (error) {
        console.error('Gagal membuat file Excel:', error);
        alert('Gagal membuat file Excel. Lihat konsol untuk detail.');
    }
}

// --- Tombol Cetak Excel Client-Side (Semua Data Terkini) ---
// Kode ini tetap sama
const btnCetakExcelClient = document.getElementById('btnCetakExcelClient');
if (btnCetakExcelClient) {
    btnCetakExcelClient.addEventListener('click', function() {
        if (!calendar) {
            alert('Kalender belum siap.'); return;
        }
        const fcEvents = calendar.getEvents();
        exportEventsToExcel(fcEvents, 'Jadwal_Dinas_Semua_');
    });
} else {
    console.warn('Tombol #btnCetakExcelClient tidak ditemukan.');
}

// --- Tombol Cetak Excel Client-Side (View Saat Ini) ---
// Kode ini tetap sama
const btnCetakExcelCurrentView = document.getElementById('btnCetakExcelCurrentView');
if (btnCetakExcelCurrentView) {
    btnCetakExcelCurrentView.addEventListener('click', function() {
        if (!calendar) {
            alert('Kalender belum siap.'); return;
        }
        const currentView = calendar.view;
        const viewStart = moment(currentView.currentStart);
        const viewEnd = moment(currentView.currentEnd); 

        const allEvents = calendar.getEvents();
        const filteredEvents = allEvents.filter(eventObj => {
            const eventStart = moment(eventObj.start);
            return eventStart.isSameOrAfter(viewStart, 'day') && eventStart.isBefore(viewEnd, 'day');
        });
        
        let viewName = 'View_';
        if (currentView.type === 'dayGridMonth') {
            viewName = viewStart.format('MMMM_YYYY').replace(/\s+/g, '_') + '_';
        } else if (currentView.type === 'timeGridWeek') {
            viewName = 'Minggu_' + viewStart.format('YYYY_WW') + '_';
        } else if (currentView.type === 'listWeek') {
            viewName = 'List_Minggu_' + viewStart.format('YYYY_WW') + '_';
        } else {
            viewName = 'CustomView_' + viewStart.format('YYYYMMDD') + '_';
        }

        exportEventsToExcel(filteredEvents, 'Jadwal_Dinas_' + viewName);
    });
} else {
    console.warn('Tombol #btnCetakExcelCurrentView tidak ditemukan.');
}

// Pastikan kode ini ada di dalam event listener DOMContentLoaded jika 'calendar'
// atau elemen tombol didefinisikan setelah script ini dieksekusi.
// Contoh:
// document.addEventListener('DOMContentLoaded', function() {
// // ... kode Anda yang mendefinisikan 'calendar' dan event listener tombol
});
        </script>
@endsection