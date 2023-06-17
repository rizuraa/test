@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-6 mt-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h1 class="text-center">Form Pendaftaran Beasiswa</h1>
            <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
              @csrf              
              <!-- nama -->
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                  value="{{ old('nama') }}" required>
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <!-- email -->
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                  value="{{ old('email') }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <!-- <div class="form-group">
                <label for="email">Email</label>
                <select class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                  <option value="">Pilih Email</option>
                  <option value="mfmaulana@gmail.com" {{ old('email') == 'mfmaulana@gmail.com' ? 'selected' : '' }}>mfmaulana@gmail.com</option>
                  <option value="test@gmail.com" {{ old('email') == 'test@gmail.com' ? 'selected' : '' }}>test@gmail.com</option>
                  <option value="farizmaulana@gmail.com" {{ old('email') == 'farizmaulana@gmail.com' ? 'selected' : '' }}>farizmaulana@gmail.com</option>
                  <option value="19104035@ittelkom-pwt.ac.id" {{ old('email') == '19104035@ittelkom-pwt.ac.id' ? 'selected' : '' }}>19104035@ittelkom-pwt.ac.id</option>
                </select>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div> -->
              <!-- nomor hp -->
              <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="tel" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp"
                  name="nomor_hp" value="{{ old('nomor_hp') }}" required>
                @error('nomor_hp')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <!-- semester -->
              <div class="form-group">
                <label for="semester">Semester Saat Ini</label>
                <select class="form-control" id="semester" name="semester">
                  <option value="">Pilih Semester</option>
                  <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>1</option>
                  <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>2</option>
                  <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>3</option>
                  <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>4</option>
                  <option value="5" {{ old('semester') == '5' ? 'selected' : '' }}>5</option>
                  <option value="6" {{ old('semester') == '6' ? 'selected' : '' }}>6</option>
                  <option value="7" {{ old('semester') == '7' ? 'selected' : '' }}>7</option>
                  <option value="8" {{ old('semester') == '8' ? 'selected' : '' }}>8</option>
                </select>
              </div>
              <!-- ipk -->
              <div class="form-group">
                <label for="ipk">IPK Terakhir</label>
                <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="{{ old('ipk') }}"
                  required readonly>
              </div>
              <!-- beasiswa -->
              <div class="form-group">
                <label for="beasiswa">Pilihan Beasiswa</label>
                <select class="form-control" id="beasiswa" name="beasiswa">
                  <option value="">Pilih Beasiswa</option>
                  <option value="Akademik" {{ old('beasiswa') == 'Akademik' ? 'selected' : '' }}>Beasiswa Akademik
                  </option>
                  <option value="Non Akademik" {{ old('beasiswa') == 'Non Akademik' ? 'selected' : '' }}>Beasiswa Non
                    Akademik</option>
                </select>
              </div>
              <!-- berkas -->
              <div class="form-group">
                <label for="berkas">Upload Berkas (PDF)</label>
                <input type="file" class="form-control-file @error('berkas') is-invalid @enderror" id="berkas"
                  name="berkas" required>
                @error('berkas')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="submit" class="btn btn-danger">Batal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>    
    document.addEventListener('DOMContentLoaded', function() {
    var emailSelect = document.getElementById('email');  //binding data email dengan id
    var ipkInput = document.getElementById('ipk'); //binding data ipk dengan id
    var beasiswaSelect = document.getElementById('beasiswa'); //binding data beasiswa dengan id
    var berkasInput = document.getElementById('berkas'); ////binding data berkas dengan id

    // array data email
    var emailMap = {
      "mfmaulana@gmail.com" : 2.7,
      'test@gmail.com': 2.9,
      'farizmaulana@gmail.com': 3.0,
      '19104035@ittelkom-pwt.ac.id': 3.5,      
    };

    // kondisi cek ipk
    emailSelect.addEventListener('change', function() {
      var selectedEmail = emailSelect.value;
      ipkInput.value = emailMap[selectedEmail] || '';
      checkIpkValue();
    });

    // kondisi cek ipk
    ipkInput.addEventListener('input', function() {
      checkIpkValue();
    });

    // fungsi untuk checkipk dan kondisi
    function checkIpkValue() {
      var ipk = parseFloat(ipkInput.value);
      if (ipk < 3) {
        beasiswaSelect.disabled = true;
        beasiswaSelect.value = '';     
        berkasInput.disabled = true; 
      } else {
        beasiswaSelect.disabled = false;
        berkasInput.disabled = false; 
      }
    }
  });
</script>

@endsection