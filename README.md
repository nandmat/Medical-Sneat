<h1>MedicalSneat</h1>
<img src="https://github.com/nandmat/Medical-Sneat/blob/main/public/assets/img/illustrations/man-with-laptop-light.png" style="width: 25px"/>

<p>Projeto prático de assinatura de planos de telemedicina via Stribe</p>

<h2>Stacks Utilizadas:</h2>
<h5>LARAVEL 9</5>
<h5>Template administrativo Bootstrap/Sneat</5>
<h5>Autenticação com objeto Auth()</5>
<h5>Lib Laravel Cashier(Stribe)</5>
<h5>SGBD: MySql</5>

<b>Nessa pequena demonstração do projeto as funcionalidades estão reduzidas para o que foi pedido nas instruções do teste prático, mas podemos evoluir muito mais essa ideia de projeto</b>

<h3>Procedimentos para o uso do MedicalSneat:</h3>
<ul>
    <li>Clone o reposítorio em sua máquina local</li>
    <li>Abra o terminal e execute o comando: <b>composer require</b></li>
    <li>Ainda no terminal execute: <b>mv .env.example .env</b></li>
    <li>Execute o comando: <b>php artisan key:generate</b></li>
    <li>Configure o aquivo <b>.env</b> com as credenciais do seu banco de dados</li>
    <li>Com o banco de dados criado, execute no terminal o comando: <b>php artisan migrate</b></li>
    <li>Execute comando <b>php artisan db:seed --class=PlanSeeder</b> para adicionar os cards de assinaturas</b>
    <li>Execute o comando <b>php artisan serve</b> para rodar a aplicação e clique no link para ter acesso a porta que está servindo a aplicação</li>
    
</ul>

<h3>Documentação de métodos e procedimentos:</h3>

<h4>AuthController</h4>
<ul>
    <li>A função <b>auth()</b> recebe os dados de um usuário cadastrado no MedicalSneat</li>
    <li>Como estamos instanciando um objeto da classe <b>Request</b>, podemos nos beneficiar dos métodos da mesma</li>
    <li>Encadeando o uso do método <b>validade()</b> através do <b>$request</b> podemos exigir que os parâmetros de credenciais sejam informados</li>
    <li>Caso o úsuário informe um dado incorreto ou deixe de informar os mesmos, o método <b>validate()</b> faz o retorno de mensagens que podem ser preedefinidas dentro dele para cada informação enviada à função <b>auth()</b></li>
    <li>Após o sucesso da verificação, usamos o <b>if</b> para verificar se o retorno é true do <b>Auth::attempt</b> que recebe como parâmentro um array contendo as credenciais requeridas estão de acordo com as cadastradas na base dados</li>
    <li>O sucesso dessa verificação passa para a próxima linha de código, onde iniciamos uma sessão com as crendenciais do usuário em questão</li>
 </ul>
<img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/AuthController-auth.png" style="margin :20px; width: 450px; height:450px"\>




<h1>Tela de Login</h1>
<div style="display:flex">
     <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-login.png" style="width: 700px; height: 450px"/>
</div>
<h1>Tela de Cadastro</h1>
<div style="display:flex">
    <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-register.png" style="width: 700px; height: 450px"/>
</div>

<h3>Dashboard</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-dashboard.png" style="width: 700px; height: 450px"/>
</div>

<h3>Configurações da Conta</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-conta.png" style="width: 700px; height: 450px"/>
</div>

<h3>Produtos - Assinaturas</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-assinatura.png" style="width: 700px; height: 450px"/>
</div>

<h3>Área de pagamento</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-assinatura-card.png" style="width: 700px; height: 450px"/>
</div>




