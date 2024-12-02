Apresentação do Conteúdo Pedido:

---Tela inicial:
Descrição da Empresa e do sistema. Possui um slide que varia periódicamente (Também pode ser avançado manualmente).
Apresenta uma logo e uma barra superior inicial, com o botão inicio que retorna INDEX.PHP e com o Botão Contato, que leva a um formulário de Envio de e-mail. Este ainda não possui configuração nenhuma para envio de e-mail. A mesma página pode ser acessada através do botão "Fale Conosco" na aba INDEX.PHP.
Para acessar o TMS, basta apertar em "Login" no canto superior direito.

---Login:
A tela de Login exige um usuário e senha. Caso não possua nenhum, basta clicar em "Fazer Cadastro". Caso já possua um cadastro, apenas coloque suas credenciais e aperte em Logar.
A tela de Login está integrada a uma tabela de usuários armazenada no Banco de Dados.

---Cadastro:
A tela de cadastro possui um CREATE para criação de um novo usuário e inserção de suas credenciais em PHP.
Todos os CRUDs deste trabalho foram refeitos a partir de diversas informações encontradas na internet com intuito de simplificar e, principalmente, evitar falhas e Injeções SQL. Desta forma, os códigos fazem preparações e checks antes de avançarem para o SQL.

---Notas Fiscais:
A aba de Notas Fiscais se trata de um READ integrado ao SQL. O PHP faz um SELECT no Banco de Dados, busca as informações da tabela de Notas Fiscais e retorna como linhas da Table.
Caso não haja notas fiscais no banco de dados, uma mensagem é exibida.
Para adicionar novas notas fiscais basta apertar em "ADICIONAR NOTA FISCAL" que levará a uma nova aba para o CREATE.
Ao adicionar uma nova nota, as opções EDITAR (Update) e EXCLUIR (Delete) se mostrarão visíveis para cada uma das notas cadastradas.

---Adicionar Nota Fiscal
Se trata de uma aba para CREATE e inserção das informações digitadas pelo usuário para o Banco de Dados.
Destaca-se que, além das verificações para evitar INJEÇÕES SQL, o menu também é um READ.
Notas fiscais de Transporte OBRIGATORIAMENTE estão atreladas a um embarcador e a um transportador. Dessa forma, o menu faz um SELECT no banco de dados, retornando apenas os transportadores e embarcadores já cadastrados nas TABLE
O menu é feito para impedir que uma informação diferente desta seja inserida.

---Excluir Nota Fiscal
Botão simples, basta apertar e confirmar e um DELETE será enviado ao banco de dados para exclusão da informação.

---Editar Nota Fiscal
Menu semelhante ao menu de Criação.
Embora o transportador de uma nota fiscal possa ser alterado durante as etapas do transporte, NÃO É POSSÍVEL alterar um embarcador de Nota Fiscal visto que esse é o emissor da nota.
Desta forma, o UPDATE deste menu permite apenas que o transportador seja alterado, ainda seguindo a regra de buscar apenas os transportadores já cadastrados em TMS.

---Embarcadores:
Assim como as notas fiscais, a listagem de embarcdores realiza o READ de todos os embarcadores cadastrados no banco de dados para exibição em forma de linhas de tabela.
Embora possua mais colunas do que as notas, a listagem de embarcadores segue exatamente o mesmo padrão e lógica, possuindo as mesmas ações (CRIAR, EDITAR E EXCLUIR)

---Adicionar Embarcador:
Igual ao menu de notas fiscais.
um Check é feito em cima do CNPJ do embarcador para evitar que caracteres de letra sejam inseridos e formata seguindo a lógica de CNPJ (xx.xxx.xxx/xxxx-xx).
Um SELECTION entre status ativo e inativo existe, visto que a inclusão de um Embarcador em TMS não significa necessariamente que este já estará em atividade, podendo ainda estar período de testes.
O CREATE ocorre normalmente, apesar do SELECTION, ele ainda é feito para evitar INJEÇÕES SQL.

---Editar Embarcador:
Lógica simples para realizar o UPDATE.
CNPJ NÃO deve ser modificado para evitar conflitos e ilogicidades logísticas.

---Excluir Embarcador:
Menu simples, lógica simples. Apertar em excluir e confirmar a mensagem.

---Transportadores:
Menu semelhante ao de embarcador. Mesmo padrao, CRUD semelhante.

---Editar Transportadores:
Menu semelhante ao de embarcador. Mesmo padrao, CRUD semelhante.

---Excluir Transportadores:
Menu semelhante ao de embarcador. Mesmo padrao, CRUD semelhante.

---DESEMPENHO (Programação Orientada a Objeto)
A página de Desempenho fora feita utilizando POO em PHP.

A página de Desempenho nada mais é do que um gráfico que apresenta a significância dos transportadores de acordo com a quantidade de Notas Fiscais emitidas para estes.
Serve como base para que saiba qual transportador é o mais usado nos transportes e permite uma grande melhoria para outras informações importantes.
O Código é feito buscando no banco de dados a quantidade de NFs

O POO exige criação de classes para classificação das informações.
Desta forma, as classes criadas foram: DATABASE e TRANSPORTADOR

A classe database é destinada a fazer as conexões devidas com o banco de dados e buscar as informações

A classe TRANSPORTADOR visa obter as informações dos transportador e contar quantas notas foram emitidas para cada um destes.

---ADICIONAIS.

Adicionalmente, o site também conta com um menu de busca na barra lateral, animações no que se refere ao gráfico, ícones personalizados e paletas de cores bem definidas.

Os arquivos são modularizados e separados em pastas de acordo com a função.
