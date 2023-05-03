<h1>MedicalSneat</h1>
<img src="https://github.com/nandmat/Medical-Sneat/blob/main/public/assets/img/illustrations/man-with-laptop-light.png" style="width: 25px"/>

<p>Projeto prático de assinatura de planos de telemedicina via Stribe</p>

<h2>Stacks Utilizadas:</h2>
<h5>LARAVEL 9</5>
<h5>Template administrativo Bootstrap/Sneat</5>
<h5>Autenticação com objeto Auth()</5>
<h5>Lib Laravel Cashier(Stribe)</5>
<h5>SGBD: MySql</5>
<br>
<h5>Nessa pequena demonstração do projeto as funcionalidades estão reduzidas para o que foi pedido nas instruções do teste prático, mas podemos evoluir muito mais essa ideia de projeto</h5>

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
<h5>public function auth(Request $request)</h5>
<ul>
    <li>A função <b>auth()</b> recebe os dados de um usuário cadastrado no MedicalSneat</li>
    <li>Como estamos instanciando um objeto da classe <b>Request</b>, podemos nos beneficiar dos métodos da mesma</li>
    <li>Encadeando o uso do método <b>validade()</b> através do <b>$request</b> podemos exigir que os parâmetros de credenciais sejam informados</li>
    <li>Caso o úsuário informe um dado incorreto ou deixe de informar os mesmos, o método <b>validate()</b> faz o retorno de mensagens que podem ser preedefinidas dentro dele para cada informação enviada à função <b>auth()</b></li>
    <li>Após o sucesso da verificação, usamos o <b>if</b> para verificar se o retorno é true do <b>Auth::attempt</b> que recebe como parâmentro um array contendo as credenciais requeridas estão de acordo com as cadastradas na base dados</li>
    <li>O sucesso dessa verificação passa para a próxima linha de código, onde iniciamos uma sessão com as crendenciais do usuário em questão</li>
 </ul>

<h5>public function create()</h5>
<ul>
    <li>A função <b>create()</b> tem como objetivo apenas retornar a <b>view<b> que possuio formulário de cadastro de usuário</li>
</ul>
        
 <h5>public function pageAccountSettings($id)</h5>
<ul>
    <li>Recebe como parâmetro o id do usuário logado no sistema e retorna e preenche com os dados do mesmo a view responsável por conter o formulário de atualização dos dados cadastrais</li>
</ul>
        
<h5>public function logout(Request $request)</h5>
<ul>
    <li>Encerra a sessão criada no método <b>auth()<b/> e redireciona o usuário para a view de login</li>
</ul>
        
<h4>UserController</h4>
        
<h5>public function store(Request $request)</h5>
<ul>
    <li>Através do objeto instanciado da classe <b>Request</b>, usamos o método <b>validate()</b> para requerir, limitar o tamanhando de strings recebidas via parâmentros da função e atribuírmos esse valor a um array denominado de <b>$user</b></li>
    <li>Caso a validação seja positiva, atribui-se ao <b>$user['password']</b> o valor de retorno da função <b>bycript()</b> que recebe <b>$user['password']</b> como parâmentro</li>
    <li>Após a encriptação da senha, uma condicional <b>if(User::create($user)</b> para verificar se é verdadeiro a criação destes dado no banco de dados, caso seja verdadeiro, encaminhamos o usuário através do <b>redirect()</b> para a rota de login</li>
    <li>Caso seja falso, redirecionamos o usuário para a rota anterior com a mensagem de erro</li>
</ul>
        
<h5>public function update(Request $request, $id)</h5>
<ul>
    <li>Essa função recupera o ID do usuário logado e atribui como valor a variável <b>$id</b> passado como parâmetro da rota</li>
    <li>Após isso, é verificado através <b>User::find($id)</b> com uma condicional para ver se é verdadeiro que existam dados referentes à esse id no banco de dados        atribuímos o retorno dos dados a variável <b>$user</b></li>
    <li>Se verdadeiro, atualizamos os dados recebidos no objeto istanciado <b>$request</b> e é usado o <b>redirect()</b> para redirecionar o usuário para a rota de dashboard</li> 
</ul>
        
<h5>public function destroy($id)</h5>
<ul>
    <li>Essa função recupera o ID do usuário logado e atribui como valor a variável <b>$id</b> passado como parâmetro da rota</li>
    <li>Após isso, é verificado através <b>User::find($id)</b> com uma condicional para ver se é verdadeiro que o uso do método <b>destroy()</b> deletou todos os dados referentes a esse ID na tabela <b>users</b></li>
    <li>Se verdadeiro, é usado o <b>redirect()</b> para redirecionar o usuário para a rota de login</li> 
    <li>Caso seja falso, redirecionamos o usuário para a rota anterior com a mensagem de erro</li>
</ul>
        
<h4>DashboardController</h4>
<h5>public function index()</h5>
<ul>
    <li>redireciona o usuário para a rota de <b>dashboard</b></li>
    <li>Depende da inicialização da sessão através do <b>Auth</b> pro conta do middleware <b>auth</b></li>
 </ul>
        
 <h4>PlanController</h4>
<h5>public function index()</h5>
<ul>
    <li>redireciona o usuário para a rota de <b>assinaturas</b> passando como parâmetro os planos de assinaturas previamente cadastrados no banco de dados</li>
    <li>Depende da inicialização da sessão através do <b>Auth</b> pro conta do middleware <b>auth</b></li>
 </ul>
        
 <h5>public function show(Plan $plan, Request $request)</h5>
<ul>
    <li>recupera os dados do usuário autenticado através do encadeamento de métodos <b>auth()->user()->id</b> através do <b>id</b> e atribui como valor a variável <b>$user</b></li>
  <li>Redireciona o usuário para a rota de preenchimento dos dados do cartão para assinatura, passando como parâmentro a váriável <b>$plan</b> com os dados do plano que deseja assinar, uma varíavel com a nomenclatura <b>$intent</b> com o valor atríbuido do resultado do método <b>$user->createSetupIntent()</li> que cria uma nova intenção de configuração de pagamento via Stripe e os dados do usuário atribuídos ateriormente a variável <b>$user</b></li>
    <li>Depende da inicialização da sessão através do <b>Auth</b> pro conta do middleware <b>auth</b></li>
 </ul>
        
 <h5>public function subscription(Request $request)</h5>
<ul>
    <li>Inicialmente é feita uma consulta ao banco de dados atribuindo o resultado à variável <b>$plan</b>: <b>$plan = Plan::find($request->id);</b></li>
    <li>Com o encademanento proveniente do objeto <$request->user()</b> conseguimos adicionar mais um encadeamento de métodos usando o método <b>$request->user()->newSubscription()</b>, passando como parâmetro o valor de $request->plan e  o valor de $plan->stripe_plan, e encadeamos mais um método: <b>$request->user()->newSubscription($request-plan, $plan->stripe_plan)->create()</b>, passando como parâmetro para o método create o valor de $request->token</li>
    <li>Para fins didáticos, o retorno dessa função é um redirecionamento para a rota que leva até o dashboard</li>
 </ul>
        

<h1>Tela de Login e Cadastro</h1>
<div style="display:flex">
     <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-login.png" style="width: 400px; height: 400px"/>
     <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-register.png" style="width: 400px; height: 400px"/>
</div>

<h3>Dashboard</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-dashboard.png" style="width: 400px; height: 400px"/>
</div>
 
<h3>Configurações da Conta</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-conta.png" style="width: 400px; height: 400px"/>
</div>

<h3>Produtos - Assinaturas</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-assinatura.png" style="width: 400px; height: 400px"/>
</div>

<h3>Área de pagamento</h3>
<div style="display:flex">
        <img src="https://github.com/nandmat/Medical-Sneat/blob/main/Portif%C3%B3lio/medical-sneat-assinatura-card.png" style="width: 400px; height: 400px"/>
</div>



