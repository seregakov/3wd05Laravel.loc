@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->

        <div class="container-fluid">
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <a href="{{route('articles.create')}}" class="btn btn-success">Create new</a>
                            <table class="table v-middle">
                                <thead>
                                <tr class="bg-light">
                                    <th class="border-top-0">id</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Image</th>
                                    <th class="border-top-0">content</th>
                                    <th class="border-top-0">active</t h>
                                    {{--                                <th class="border-top-0">Technology</th>--}}
                                    {{--                                <th class="border-top-0">Tickets</th>--}}
                                    {{--                                <th class="border-top-0">Sales</th>--}}
                                    {{--                                <th class="border-top-0">Earnings</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $atricle)
                                    <tr>
                                        <td>{{$atricle->id}}</td>
                                        <td>{{$atricle->Name}}</td>
                                        <td>
                                            <a href="{{route('$articles.edit', compact('$atricle'))}}"
                                               class="btn btn-info"> EDIT</a>
                                            <form action="{{route('$articles.destroy', compact('$atricle'))}}"
                                                  method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->

        </div>
        <a class="btn btn-primary" role="button" href="{{route('articles.create')}}">Create article</a>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

