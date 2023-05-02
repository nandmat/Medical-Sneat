@extends('layouts.base')

@section('title', 'Assinaturas')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produtos /</span> Assinatura</h4>
        <div class="col-md-6 col-lg-4 mb-3">
            @foreach ($plans as $plan )
          <div class="card h-100">

            <div class="card-body">
                <h5 class="card-title">{{ $plan->name }}</h5>
                <h6 class="card-subtitle text-muted">R$ {{ $plan->price }}</h6>
                <img
                  class="img-fluid d-flex mx-auto my-4"
                  src="../assets/img/elements/4.jpg"
                  alt="Card image cap"
                />
                <p class="card-text">A assinatura básica que cabe no seu bolso!</p>
                <a href="{{ route('dashboard.cards.show', ['plan' => $plan->slug]) }}" class="card-link">Assinar agora!</a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="content-backdrop fade"></div>
  </div>
@endsection
