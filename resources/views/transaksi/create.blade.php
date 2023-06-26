
<!-- @extends('layouts.user_type.auth') -->


@section('title', 'Aplikasi Laravel')

@section('content')
<br>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- <script>
  $(document).ready(function() {
    $('#hitung-button').click(function() {
      var kolom1 = $('#harga').val();
      var kolom2 = $('#jumlah').val();

      $.ajax({
        url: '{{ route("hitung") }}',
        method: 'POST',
        data: {
          kolom1: kolom1,
          kolom2: kolom2,
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          $('#result').text('Total: ' + response.total);
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText);
        }
      });
    });
  });
</script> -->
<script>
 
  function hitung() {
    var kolom1 = parseFloat(document.getElementById("harga").value) || 0;
    var kolom2 = parseFloat(document.getElementById("jumlah").value) || 0;
    var total = kolom1 * kolom2;
    
     document.getElementById("total").value = total;
  }
</script>


<div class="container">
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <h4>Transaksi</h4>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        <form action="{{route('transaksi.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Stand <span class="text-danger">*</span></label>
                <select class="form-select" type="text" name="stand" id="stand">
						@foreach($dataStand as $ds)
                          <option value="{{ $ds->nama_stand }}">{{ $ds->nama_stand }}</option>
						  @endforeach
						</select>	
            </div>
            <div class="form-group form-animate-text" style="margin-top:15px !important; margin-right:10px">		
                <label>Tanggal <span class="text-danger">*</span></label>
				<br>
                <input type="date" name="tanggal" readonly value="{{ now()->format('Y-m-d') }}" id="tanggal" />
            <br>
			</div>
            <div class="form-group">
                <label>Kasir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" id="nama" readonly value="{{auth()->user()->name}}">
           
            </div>
            <div class="form-group">
                <label>Menu</label>
						<select class="form-select" type="text" name="menu" id="menu">
						@foreach($dataMenu as $ds)
                          <option value="{{ $ds->nama_menu }}">{{ $ds->nama_menu }}</option>
						  @endforeach
						</select>	
            </div>
            <div class="form-group">
                <label>Harga <span class="text-danger">*</span></label>
                <input class="form-control" type="number" onkeyup="hitung()" name="harga" id="harga">
            </div>
            
            <div class="form-group">
                <label>Jumlah <span class="text-danger">*</span></label>
                <input class="form-control" type="number" onkeyup="hitung()" name="jumlah" id="jumlah">
            </div>
            
            <div class="form-group">
                <label>Total <span class="text-danger">*</span></label>
                <input class="form-control" type="text"  name="total" onkeyup="hitung()" readOnly id="total">
                
                <!-- <div id="total"></div> -->
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/tampil-transaksi" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>
</div>

</div>
<!-- @push('scripts')
<script>
    
    function sum(){
        var txtFirstNumberValue = document.getElementById('harga').value;
        var txtSecondNumberValue = document.getElementById('jumlah').value;
        val result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if(!isNan(result)){
            document.getElementById('total').value=result;
        } 
    }
</script>
@endpush -->
@endsection