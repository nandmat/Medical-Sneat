@extends('layouts.base')

@section('title', 'Configurações da conta')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Configurações da conta /</span> Conta</h4>

      <div class="row">
          <div class="card mb-4">
            <h5 class="card-header">Detalhes da conta</h5>
            <!-- Account -->
            <div class="card-body">
              {{-- <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img
                  src="../assets/img/avatars/1.png"
                  alt="user-avatar"
                  class="d-block rounded"
                  height="100"
                  width="100"
                  id="uploadedAvatar"
                />
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                      type="file"
                      id="upload"
                      class="account-file-input"
                      hidden
                      accept="image/png, image/jpeg"
                    />
                  </label>
                  <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                    <i class="bx bx-reset d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                  </button>

                  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
              </div>
            </div> --}}
            <hr class="my-0" />
            <div class="card-body">
              <form id="formAccountSettings" method="POST"  action="{{ route('users.page.account.seetings.update', ['id' => $user->id]) }}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Nome Completo</label>
                    <input
                      class="form-control"
                      type="text"
                      id="firstName"
                      name="name"
                      value="{{ $user->name }}"
                      autofocus
                      placeholder="Nome completo"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">CPF</label>
                    <input class="form-control"
                    type="text"
                    name="cpf"
                    id="cpf"
                    value="{{ $user->cpf }}"
                    placeholder="000.000.000-00"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{ $user->email }}"
                      placeholder="test@example.com"
                    />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Telefone</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        class="form-control"
                        value="{{ $user->telefone }}"
                        placeholder="(99) 9 9999-9999"
                      />
                    </div>
                  <div class="mb-3 col-md-6">
                    <label for="organization" class="form-label">Estado</label>
                    <input
                      type="text"
                      class="form-control"
                      id="estado"
                      name="estado"
                      value="{{ $user->estado }}"
                    />
                    <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Cidade</label>
                        <input
                          type="text"
                          class="form-control"
                          id="cidade"
                          name="cidade"
                          value="{{ $user->cidade }}"
                        />
                  </div>
                  <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="password">Senha</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        value="{{ $user->password }}"
                      />
                  </div>
                  </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                  <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
          <div class="card">
            <h5 class="card-header">Deletar Conta</h5>
            <div class="card-body">
              <div class="mb-3 col-12 mb-0">
                <div class="alert alert-warning">
                  <h6 class="alert-heading fw-bold mb-1">Tem certeza que deseja deletar sua conta?</h6>
                  <p class="mb-0">Essa ação não pode ser revertida</p>
                </div>
              </div>
              <form id="formAccountDeactivation" method="POST" action="{{ route('users.page.account.seetings.destroy', ['id' => $user->id]) }}">
                @csrf
                @method('delete')
                <div class="form-check mb-3">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="destroyConfirm"
                    id="accountActivation"
                    value="true"
                  />
                  <label class="form-check-label" for="accountActivation"
                    >I Quero deletar minha conta</label
                  >
                </div>
                <button type="submit" class="btn btn-danger deactivate-account">Deletar conta</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-backdrop fade"></div>
  </div>
@endsection
