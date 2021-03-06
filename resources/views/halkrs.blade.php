@extends ('template.layouttemp')
@section('title')
<title>Kartu Rencana Studi</title>
@endsection
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="/dashboard" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="/khs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Kartu Hasil Studi</span>
      </a>
      <a href="/krs" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Kartu Rencana Studi</span>
      </a>
      <a href="/merdekabelajar" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-award-fill me-3"></i>
        <span>Merdeka Belajar</span>
      </a>
    </div>
  </div>
</nav>
@endsection

@section('maincontent')
<div class="container-fluid">
  <!-- Title -->
  <div class="">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @elseif(session()->has('success2'))
    <div class="alert alert-success">
        {{ session()->get('success2') }}
    </div>
    @endif
    <span class="h1">Kartu Rencana Studi</span>
  </div>
  <div class="container-fluid bg-info py-5 mt-3">
    <div class="row">
      <div class="col">
        <div class="card mb-3">
          <div class="card-body">
            <p><span class="fw-bold">NAMA</span> : {{$profils->nama}} </p>
            <p><span class="fw-bold">NIM</span> :  {{$profils->nim}}</p>
            <p><span class="fw-bold">SEMESTER</span> :{{$profils->semester}}</p>
            <p><span class="fw-bold">SKS MAKSIMUM</span> :{{$profils->sks_maks}}</p>
            <p><span class="fw-bold">DOSEN PEMBIMBING AKADEMIK</span> :{{$profils->nama_dosen}}</p>
         </div>
        </div>
      </div>
      <div class="col">
        <table class="table table-striped table-bordered">
          <tr>
            <th>No.</th>
            <th style="width: 75px;">KODE MATAKULIAH</th>
            <th>MATA KULIAH</th>
            <th>SKS</th>
          </tr>
           <?php $i = 0;?>
           @foreach($krs as $krs)
          <tr>
            <td><?php echo ++$i;?></td>
            <td>{{$krs->kode_matakuliah}}</td>
            <td>{{$krs->nama_matakuliah}}</td>
            <td>{{$krs->sks}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3">Total</td>
            <td>{{$sks->total}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col d-flex justify-content-end">
      <a href="/krs/hapus" class="btn btn-danger me-2" onclick="return confirm('Yakin ingin hapus?');"><i class="bi bi-pencil-square me-2"></i>Hapus</a>
      <a href="/krs/ubah/{{$profils->nim}}" class="btn btn-success me-2"><i class="bi bi-pencil-square me-2"></i>Ubah</a>
      <button class="btn btn-secondary me-2"><i class="bi bi-printer me-2"></i>Print</button>
    </div>
  </div>

</div>
  <!-- Title -->
  <!--konten-->
  <!--konten-->
@endsection
