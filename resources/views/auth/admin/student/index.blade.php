<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users student</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/admin/user/student/index.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="librem">
                <h2>Librem</h2>
            </div>
            <div class="profile">
                <!-- <div class="avatar"><img src="../asset/img/Avatar.png" alt=""></div> -->
                <div class="halo">
                    <p>Halo, Selamat Siang<br>Pak doniiiii</p>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <div class="container">
        <!-- sidebar -->
        <div class="sidebar">
            <div class="link-sidebar">
                <ul>
                    <li><a href="{{route('student')}}"><span class="las la-users"></span>Student</a></li>
                    <li><a href="{{route('teacher')}}"><span class="las la-users"></span>Teacher</a></li>
                    <li><a href="{{route('book')}}"><span class="las la-book-reader"></span>Books</a></li>
                    <li><a href="{{route('transaction')}}"><span class="las la-address-book"></span>Transactions</a>
                    </li>
                    <li><a href="{{route('rule')}}"><span class="las la-pencil-ruler"></span>Rules</a></li>
                    <li><a href="{{route('logout')}}"><span class="las la-sign-out-alt"></span>Log out</a></li>
                </ul>
            </div>
        </div>
        <!-- End sidebar -->
        <!-- content -->
        <div class="content">
            <div class="ad-mem">
                <div class="member-admin">
                    <a href="{{route('student')}}">Students</a>
                    <a href="{{route('teacher')}}">Teachers</a>
                </div>
            </div>
            <div class="mem-new">
                <p><i class="fas fa-user-friends"></i>Students</p>
                <form action="{{route('student_search') }}" method="POST">
                    @csrf
                    <input name="search" type="search" id="form1" class="form-control"
                        placeholder="Search for Students..." aria-label="Search" />
                    <button type="submit" class="btn btn-primary">Search</button>
                    <br><br>
                </form>
            </div>
            <!-- tabel -->
            <div class="tabel-mem">
                <table class="styled-table2">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NIS</th>
                            <th>NAME</th>
                            <th>TAHUN MASUK</th>
                            <th>KELAS</th>
                            <th>STATUS</th>
                            <th colspan="2" class="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)

                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->start_year }}</td>
                            <td>{{ $student->grade->level.' '.$student->major->name.' '. $student->major->level}}</td>
                            <td>{{ $student->graduated ? 'Lulus' : 'Aktif' }}</td>
                            <td><a href="{{route('student_edit', $student->nis)}}">Edit</a></td>
                        </tr>
                        @empty
                        Tidak ada data
                        @endforelse
                    </tbody>
                </table>
                <!-- end tabel -->
                <!-- Pagination  -->
                <div class="foot">
                    <div class="button">
                        <a href="{{route('student_register')}}">Tambah</a>
                    </div>
                    <div class="page">
                        <a href="" class="page-link">&laquo;</a>
                        <a href="" class="page-link">1</a>
                        <a href="" class="page-link">&raquo;</a>
                    </div>
                </div>
                <!-- End Pagination  -->
            </div>
        </div>
        <!-- End Content -->
    </div>

</body>

</html>