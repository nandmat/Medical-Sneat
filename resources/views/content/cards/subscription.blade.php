@extends('layouts.base')

@section('title', 'Configurações da conta')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produtos /</span> Assinaturas: R$ {{ number_format($plan->price, 2) }} - {{ $plan->name }}</h4>

      <div class="row">
          <div class="card mb-4">
            <h5 class="card-header">Assinatura</h5>
            <!-- Account -->
            <div class="card-body">
            <hr class="my-0" />
            <div class="card-body">

              <form id="payment-form" method="POST"  action="{{ route('dashboard.cards.subscription') }}">
                @csrf
                <input type="hidden" name="plan" value="{{ $plan->id }}">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="card-holder-name" class="form-control" value="">
                </div>
                <div class="mb-3 col-md-6">
                    <div class="form-group" id="card-element"></div>
                </div>

                <div class="col-x1-12 col-lg-12">
                  <hr>
                  <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}" type="submit">Continuar</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
    </div>
    <div class="content-backdrop fade"></div>
  </div>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: { name: cardHolderName.value }
            }
        }
    );

    if (error) {
        // Display "error.message" to the user...
    } else {
        // The card has been verified successfully...
    }
});
</script>
@endsection
