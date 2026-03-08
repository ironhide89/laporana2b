@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Tambah User</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Masukan Username" required>
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Nama</label>
                                    <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Masukan Nama" required>
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                                    @error('password')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="passwordConfirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="passwordConfirmation" name="password_confirmation" placeholder="Confirm Password" oninput="checkPasswordMatch()" required>
                                    <small id="passwordMessage" style="color: red; display: none;">Password tidak cocok</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File Tanda Tangan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="tanda_tangan" accept="image/*" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="">Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    @error('role')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    function checkPasswordMatch() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("passwordConfirmation").value;
        const message = document.getElementById("passwordMessage");
        const submitButton = document.getElementById("submitButton");
    
        if (confirmPassword) {
            if (password !== confirmPassword) {
                message.style.display = "inline"; // Tampilkan pesan jika password tidak cocok
                submitButton.disabled = true; // Nonaktifkan tombol submit
            } else {
                message.style.display = "none"; // Sembunyikan pesan jika password cocok
                submitButton.disabled = false; // Aktifkan tombol submit
            }
        } else {
            message.style.display = "none"; // Sembunyikan pesan jika kolom konfirmasi kosong
            submitButton.disabled = true; // Nonaktifkan tombol submit jika konfirmasi kosong
        }
    }
    
    function validateForm() {
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("passwordConfirmation").value;
        return password === confirmPassword; // Mengembalikan true jika cocok, false jika tidak cocok
    }
    </script>
@endsection
