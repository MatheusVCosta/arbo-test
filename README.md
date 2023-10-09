
# Minha Casa Nova

<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/59bb99f7-d0e7-487b-9d2c-d4679ea78655" width="200px">
</div>
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/1ed61faf-e26f-4e32-8e2a-053b186b0696" width="400px" style="width:200px;margin-left:10px">
</div>



## Objetivo
    Desenvolver uma aplicação em PHP que faça o gerenciamento de imóveis


### Back-end
#### Funcionalidade

- [x] Adicionar um novo imóvel 
- [x] Buscar e exibir todos os imóveis
- [x] Atualizar informações de um imóvel
- [x] remover imóvel

### Front-end
#### Design

- [x] Tela para adicionar imóveis
- [x] Listar todos os imóveis em uma lista
- [x] Tela para o cliente atualizar imóveis
- [x] Permitir que o usuário remova um imóvel

### Banco de dados [Mysql]
#### Tabelas
* User
* House
* Address
* Photo
* Photos

## Sobre o resultado
Para desenvolver o sistema, me preocupei bastante com a estrutura do projeto, então escolhi usar o padrão de projeto MVC(Model, View, Controller).
Eu decidi em usar esse partten pois acredito que a distribuição de tarefas do sistema fica mais fluida, deixando responsabilidade separadas com camadas.

<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/73f934df-094c-4e3b-91c6-b54121cce8a5" width="300px"/>
</div>

Ex: 
* Na **UserController()** por exemplo, deixei somente a tarefa de tratar os dados e rederizar no template
* Na model **User()** deixei para fazer a comunicação com o banco de dados, e para não fazer Query in Line direto da model ou do **Database()**, desenvolvi um "ORM" **BasicORM()** assim facilitando e poupando tempo escrevendo query direto no código, que as vezes só é usado uma vez.
  
```

    class UserController extends RenderView
    {
        public function index()
        {
            if (!isset($_SESSION['user_authenticated'])) {
                header('Location: /test-arbo/arbo-test');
            }
            $actual_user = $_SESSION['user_authenticated'];
            $config = $this->get_sentings();
            $this->user = new User();
    
            $userHouses = $this->user->fetchHousesUser($actual_user['userId']);
            $this->loadView('user_home', [
                'config'       => $config,
                'houses_user'  => $userHouses
            ]);
        }
    }
```
```
    class User extends BasicORM
    {
        public function fetchHousesUser($user_id)
        {
            $this->_select($this->table, [
                'house.id as house_id',
                'address.id as address_id',
                'user.id as user_id',
                'house.house_type as house_type',
                'house.contract_type as contract_type',
                'house.price as price',
                'house.status as status',
                'house.description as description',
                'house.amout_room as amout_room',
                'house.amount_vacancy as amount_vacancy',
                'house.amount_baths as amount_baths',
                'address.street as street',
                'address.postal_code as postal_code',
                'address.district as district',
                'address.state as state',
                'address.number as number',
                'address.country as country',
                'address.complement as complement',
                'address.city as city',
                'photo.path as path'
            ]);
            $this->_join("house", "user.id", "house.id_user");
            $this->_join("address", "house.id_address", "address.id");
            $this->_join("photos", "photos.id_house", "house.id");
            $this->_join("photo", "photo.id", "photos.id_photo");
            $this->_where("user.id", $user_id);
            $houseUser = $this->_fetch();
            return $houseUser;
        }
    }
```
Outra parte importante em usar o MVC são as Views, já que não preciso me preocupar e colocar regra de negócio misturado no html deixando o html somente para exibir texto


### Sobre o Sistema
Os sistema ficou dividido em 6 telas
Para desenvolver as telas usei somente CSS e um pouco de JS com AJAX para fazer requesições assíncrona.

**Home**

A home é um grande de exemplo do uso do JS com AJAX, ja que no corpo do html eu só renderizo um template com os imóveis, e isso sem a tela ficar carregando pra buscar dados após aplicar o filtro por exemplo
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/0b1f763e-0ef2-44e4-aa21-7211772a2b60" width="700px"/>
</div>

**Casatro de usuário**

Na tela de cadastro de usuário só tem um formulário simples para ser preenchido, só para o usuário conseguir entrar no sistema e cadastrar um imóvel
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/70a436ee-aacd-4a7c-a2e5-bf0811fd290a" width="700px"/>
</div>


**Login**

Na tela de Login também não tem nada de especial, com um sistema simples de autenticação onde é criado uma $_SESSION para garantir o estado de logado dentro da aréa de usuário
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/9ce9ebcc-1838-468e-9148-eea5046b6c8a" width="700px"/>
</div>
**Home do usuário**

A home do usuário é bem parecida com a home do site, só que aqui é listado o imóveis cadastro pelo o usuário e quando ele clica no card da casa abre a tela de edição
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/7823136a-495b-48e1-abea-5403aff65d62" width="700px"/>
</div>
**Cadastrar imóvel**

Em cadastrar imóvel, possui um formuçário simples para ser preenchido com alguns campos obrigatórios inclusive uma foto

*"Futuramente penso em adicionar uma API de CEP para buscar o endereço e já carregar nos inputs"*
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/fc68d5dc-ef81-417a-986e-860a5fc48007" width="700px"/>
</div>
**Editar e remover imóvel**

E por fim, mas não menos importante, a tela de edição e remoção do anúncio 
<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/4d501ef3-895a-4f77-989b-3affd4ee8d58" width="700px"/>
</div>
Em todas as telas eu desenvolvi pensando em manter um padrão de design, tentando seguir uma paleta de cores que fosse agradável e nada extravagante
* "Usei como reférencia outros sites do ramo de imóveis para me basear no meu design" *
![image](https://github.com/MatheusVCosta/arbo-test/assets/38003078/6dda2beb-a23d-4c3f-83e6-b21a3a63046d)

### Banco de dados 

Sobre o banco de dados não tenho muito o que falar, usei somente 5 tabelas para armazenar as informações e não tem nada de especial
Mas basicamente o Core do sistema é o imóvel, sendo o centro de todos os relacionamentos

<div align="center">
    <img src="https://github.com/MatheusVCosta/arbo-test/assets/38003078/38ec7bb8-be97-4723-8f58-fc8ba124be3f" width="700px"/>
</div>


### Sobre o Desafio

Me diverti bastante desenvolvendo esse sisteminha, para mim não foi só um teste e sim uma oportunidade para aperfeiçoar meus conhecimentos nas tecnologias ultilizadas. Tive a liberdade de me desafiar desenvolvendo o sistema em MVC e a parte mais legal disso tudo foi o BasicORM, me inspirei bastante no Eloquent ORM do laravel, acredito que facilita muito nossa vida e super adianta o trabalho já que a gente não precisa escrever Query In Line e consequentemente deixando o código bagunçado, fora que tudo isso  facilita muita na manutenção.

Ainda irei continuar melhorando o sistema, acredido que precisa de uma refatoração em algumas partes do código, já que implementei o BasicORM e isso tirou a responsabilidade do Database fazer as Querys.
E como mencionei antes, quero integar com uma api de CEP e melhorar o UX da sistema.

**Features Future (trava lingua rs)**
[] Refatorar o código para usar 100% o **BasicORM()**
[] Aperfeiçoar o **BasicORM()** para que faça Query mais elaboradas
[] Integrar com api de busca de CEP

### Considerações finais

Bom, agradeço a **Arbo** e a **Super lógica** pela oportunidade de mostrar um pouco do meu trabalho e fico disposto para mais esclarecimento se necessário.
Muito obrigado, e até mais :D

### Como iniciar o projeto
Hoje eu ainda irei tentar colocar no ar para testarem, mas caso queiram clonar o repositório
Eu usei o servido Apache no Linux, para abrir no localhost basta colocar em /var/www/html/
E acessar http://localhost/test-arbo/arbo-test/


