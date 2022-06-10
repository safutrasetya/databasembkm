@extends ('template.layouttemp')

<script type="text/javascript">
function gotopage(selfval){
var value = selfval.options[selfval.selectedIndex].value;

window.location.href="/khs/"+value;
}
</script>

@section('title')
<title>Kartu Hasil Studi</title>
@endsection
@section('sidebar')
<nav id="mySidebar" class=" d-lg-block sidebar bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3">
      <div class="d-flex justify-content-end align-items-center">
        <i href="javascript:void(0)" class="bi bi-x-square closebtn btn btn-sm " onclick="closeNav()"></i>
      </div>
      <a href="dashboard" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-square-half me-3"></i>
        <span>Dashboard</span>
      </a>
      <a href="khs" class="list-group-item list-group-item-action my-2 py-2 ripple active">
        <i class="bi bi-card-checklist me-3 "></i>
        <span>Kartu Hasil Studi</span>
      </a>
      <a href="krs" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-postcard-fill me-3"></i>
        <span>Kartu Rencana Studi</span>
      </a>
      <a href="merdekabelajar" class="list-group-item list-group-item-action my-2 py-2 ripple">
        <i class="bi bi-award-fill me-3"></i>
        <span>Merdeka Belajar</span>
      </a>
    </div>
  </div>
</nav>
@endsection
@section('navbar')
<nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
  <div class="container-fluid">
    <i id="navbtn" onclick="openNav()" class="openbtn bi bi-list"></i>
    <a class="navbar-brand ms-3" href="#">
      <img src="img/hehe.jfif" alt="" width="30" height="30">
      <span><strong>Portal MBKM</strong></span>
      <span><small>Mahasiswa</small></span>
    </a>
    <a class="nav-link tombolnavbar" href="#">Tentang Aplikasi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav navbar-nav-scroll ms-auto d-flex flex-row">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu notifscroll  dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            @foreach ($notifcatch as $notifcatch)
            <li>
              <a class="dropdown-item" href="#">
                <div class="card small">
                  <div class="card-body">
                    <span class="tekskecil">{{$notifcatch->isi_notif}}</span>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-primary" href="#">Tampilkan semua notifikasi</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown d-flex flex-row justify-content-end">
          <a class="nav-link dropdown-toggle" href="#"id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" src="img/hehe.jfif" alt="" width="30" height="30">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarSCrollingDropdown">
            <li>
              <a class="dropdown-item" href="profil">
                <i class="bi bi-person-badge me-2"></i>Profil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="/logout">
                <i class="bi bi-box-arrow-left me-2"></i>Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection
@section('maincontent')
<div class="container-fluid">
  <!-- Title -->
  <div class="">
    <span class="h1">Kartu Hasil Studi Semester</span>
  </div>

  <div class="container-fluid bg-info py-5 mt-3">
    <form>
      <div class="mb-3">
        <label for="semselect" class="form-label h5">Pilih semester : </label>
        <select id="semesters" class="" onchange="gotopage(this)">
          <option value="">Select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
        </select>
      </div>
    </form>
  </div>

  <div class="container-fluid bg-info py-5 mt-3">
    <div class="row">
      <div class="col">
        <div class="card mb-2">
          <div class="card-body">
            <p><span class="fw-bold">NIM</span> : {{$nim}}</p>
            <p><span class="fw-bold">NAMA</span> : {{$nama}} </p>
         </div>
        </div>
      </div>
      <div class="col" id="khs">
        <table class="table table-striped table-bordered">
          <tr>
            <th>No.</th>
            <th style="width: 75px;">KODE MATAKULIAH</th>
            <th>MATA KULIAH</th>
            <th>SKS</th>
            <th>Nilai</th>
          </tr>
           <?php $i = 0;?>
           @php ($totalSKS = 0)
           @php ($totalIP = 0)
           @php ($totalNilai = 0)
           @foreach($khsmhs as $baris)
          <tr>
            <td><?php echo ++$i;?></td>
            <td>{{$baris->kode_matakuliah}}</td>
            <td>{{$baris->nama_matakuliah}}</td>
            <td>{{$baris->sks}}</td>
            <td>{{$baris->nilai}}</td>
          </tr>
          @php ($totalSKS = $totalSKS + $baris->sks)
          @php ($totalNilai = $totalNilai + $baris->nilai)
          @endforeach
          @php ($totalIP = ($baris->nilai * $baris->sks)  / $totalSKS))
          <tr>
            <td colspan="3">Total</td>
            <td  colspan="2">{{$totalSKS}}</td>
          </tr>
          <tr>
            <td colspan="3">IP Semester</td>
            <td  colspan="2">{{$totalIP}}</td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col d-flex justify-content-end">
      <button class="btn btn-secondary me-2"><i class="bi bi-printer me-2"></i>Print</button>
    </div>
  </div>
</div>



  <!-- Title -->
  <!--konten-->
  <!--konten-->
@endsection
