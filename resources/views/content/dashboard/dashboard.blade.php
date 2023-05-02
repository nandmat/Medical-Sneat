@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Bem vindo, {{ auth()->user()->name }}</h5>
                    <p class="mb-4">
                    Você está no caminho <span class="fw-bold">para cuidar da sua saúde</span> aproveite nosso plano!
                    </p>

                    <a href="{{ route('dashboard.cards') }}" class="btn btn-sm btn-outline-primary">Ver planos</a>
                </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img
                    src="../assets/img/illustrations/man-with-laptop-light.png"
                    height="140"
                    alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
