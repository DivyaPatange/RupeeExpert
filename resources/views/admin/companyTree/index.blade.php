@extends('admin.adminLayout.mainlayout')
@section('title', 'Company Tree')
@section('customcss')
<link href="{{ asset('assets/assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
<link href="{{ asset('assets/assets/vendor/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('assets/assets/scss/argon.scss') }}" rel="stylesheet">
<link href="{{ asset('treeflex.css') }}" rel="stylesheet">
@endsection
@section('content')
@section('page_title', 'Company Tree')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">
                <div class="tf-tree example text-center">
                    <ul>
                        <li>
                            <span class="tf-nc">
                                <i class="ni ni-atom" style="font-size:25px;"></i>
                                <br>
                                Rupee Expert
                                <br>
                            </span>
                            <ul> 
                                @foreach($users as $user)
                                <li>
                                    <span class="tf-nc" style="font-size:15px;">
                                        <a href="" data-toggle="tooltip" data-html="true"  id="" title="">
                                            <i class="ni ni-atom" style="font-size:30px; color:red"></i>
                                        </a>
                                        <br>
                                        <!-- dd(); -->

                                        {{ $user->name }}
                                        <br>
                                        {{ $user->client_id }}
                                    </span>
                                    @if(count($user->childs))
                                        @include('admin.companyTree.manageChild',['childs' => $user->childs])
                                    @endif
                                </li>
                                @endforeach
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script src="{{ asset('treeview.js') }}"></script>
@endsection