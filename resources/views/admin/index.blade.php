@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0">User</h1> --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data user</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0 font-weight" style="font-size: 1.5rem;">Manage User</h3>
                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modal-tambah">
                  Tambah User <i class="fas fa-plus ml-2"></i>
                </button>
            </div>
            

              <div class="card-body">
                <table class="table table-bordered table-striped" id="example2">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Tanda Tangan</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $d->name }}</td>
                      <td>{{ $d->email }}</td>
                      <td>
                        @if($d->tanda_tangan)
                          <img src="{{ asset('tanda_tangan/' . $d->tanda_tangan) }}" alt="tanda_tangan" width="100">
                        @else
                          Tidak Ada Tanda Tangan
                        @endif
                      </td>
                      <td>{{ $d->role }}</td>
                      <td>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $d->id }}">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger-{{ $d->id }}">Delete</a>
                      </td>
                    </tr>

                   <!-- Modal Edit -->
                  <div class="modal fade" id="modal-edit-{{ $d->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data User</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.update', $d->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                              <label for="name">Nama</label>
                              <input type="text" name="name" class="form-control" value="{{ $d->name }}" required>
                            </div>

                            <div class="form-group">
                              <label for="email">Username</label>
                              <input type="text" name="email" class="form-control" value="{{ $d->email }}" required>
                            </div>

                            <div class="form-group">
                              <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                              <input type="password" name="password" class="form-control" placeholder="Enter New Password">
                            </div>

                            <!-- Role Selection -->
                      

                            <!-- Show Tanda Tangan Field Only If Not Admin -->
                            @if($d->role != 'admin')
                              <div class="form-group" id="tandaTanganField">
                                <label for="tanda_tangan">File Tanda Tangan</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="tandaTangan{{ $d->id }}" name="tanda_tangan" accept="image/*">
                                  <label class="custom-file-label" for="tandaTangan{{ $d->id }}">Choose file</label>
                                </div>
                              </div>
                            @else
                              <!-- Optionally, we can leave this part empty or add a message for admins -->
                            
                            @endif

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>


                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modal-danger-{{ $d->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data {{ $d->name }}?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                            <form action="{{ route('admin.destroy', $d->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-light">Hapus</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Modal Tambah User -->
  <div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah User Baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Masukan Username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
              <label for="passwordConfirmation">Konfirmasi Password</label>
              <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation" placeholder="Confirm Password" oninput="checkPasswordMatch()" required>
              <small id="passwordMessage" style="color: red; display: none;">Password tidak cocok</small>
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" id="role" name="role" required onchange="toggleTandaTangan()">
                  <option value="">Pilih Role</option>
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
              </select>
          </div>
          <div class="form-group" id="tandaTanganGroup">
              <label for="tanda_tangan">File Tanda Tangan</label>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="tandaTanganTambah" name="tanda_tangan" accept="image/*">
                  <label class="custom-file-label" for="tandaTanganTambah">Choose file</label>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="submitButton" disabled>Tambah User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection


<script>
  function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const passwordConfirmation = document.getElementById('passwordConfirmation').value;
    const passwordMessage = document.getElementById('passwordMessage');
    const submitButton = document.getElementById('submitButton');

    if (password !== passwordConfirmation) {
      passwordMessage.style.display = 'block';
      submitButton.disabled = true;
    } else {
      passwordMessage.style.display = 'none';
      submitButton.disabled = false;
    }
  }
</script>
<script>
  // Function to hide or show the "File Tanda Tangan" input based on selected role
  function toggleTandaTangan() {
      const role = document.getElementById('role').value;
      const tandaTanganGroup = document.getElementById('tandaTanganGroup');
      const tandaTanganInput = document.getElementById('tandaTanganTambah');

      if (role === 'admin') {
          // Hide the file input and set the value to null
          tandaTanganGroup.style.display = 'none';
          tandaTanganInput.value = null; // Reset the value
      } else {
          // Show the file input
          tandaTanganGroup.style.display = 'block';
      }
  }

  // Initialize the form on load
  window.onload = function() {
      toggleTandaTangan(); // Call the function to handle the initial state
  }
</script>
