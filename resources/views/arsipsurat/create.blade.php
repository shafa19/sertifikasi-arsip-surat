<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Arsipkan Surat</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ url('select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#!">Sistem Pengarsipan</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="{{route('arsipsurat')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Arsip
                            </a>
                            <a class="nav-link" href="{{route('about')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-info"></i></div>
                                About
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="content">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Arsip Surat >> Unggah</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item">Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
                                                            Catatan:<br>
                                                            Gunakan file berformat PDF
                                </li>
                            </ol>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-primary card-outline">
                                        <form role="form" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="no_surat"><strong>Nomor Surat<strong></label><br>
                                                    <input type="text" class="form-control @error('no_surat') is-invalid @enderror" name="no_surat" value="{{ old('no_surat') }}" required autocomplete="no_surat" autofocus name="no_surat" id="no_surat" placeholder="Masukkan nomor surat ...">
                                                    @error('no_surat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="kategorisurat"><strong>Kategori</strong></label>
                                                    <select class="form-control select2bs4" name="kategorisurat" id="kategorisurat" style="width: 100%;" required><br>
                                                        @foreach ($kategorisurat as $item)
                                                            <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="judul"><strong>Judul<strong></label><br>
                                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul surat ...">
                                                </div><br>
                                                <div class="form-group">
                                                    <label for="file_surat">File Surat (PDF)</label>                 
                                                    <input type="file" class="form-control" required="required" name="file_surat" value="{{ old('file_surat') }}"> </br> 
                                                    @error('file_surat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <a href="{{route('arsipsurat')}}" class="btn btn-secondary"><< Kembali</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Shafa Ilona</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Select2 -->
        <script src="{{ url('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>