# Desafio-Plugins-WP
Desafio de criação de dois plugins wordpress

Case: João quer mapear a utilização de um botão no seu site WordPress. A cada clique no botão ele quer adicionar um registro no banco de dados e verificar posteriormente o volume de cliques realizados.

# Desafio: Para esse teste você irá criar 2 plugins WordPress separados.
&nbsp;
&nbsp;

## 1- Crie um plugin que adicione um shortcode ou widget customizado ao site. Esse shortcode/widget deverá mostrar um botão na página que, quando clicado, adicionará um registro de data e hora no banco de dados wordpress. A tabela utilizada para guardar esse registro fica à sua escolha.

### Instruções  de uso - Plugin 1  
  #### 1 - Baixe a pasta "desafio_wp" como zip, adicione ela ao sua pasta de instalação do WordPress "/nomesite/wp-content/plugins".
  #### 2 - Descompacte a pasta e ative o plugin no seu painel de administrador.
  #### 3 - Vá ao editor em uma pagina para testar, adicione um shortcode e escreva [btn] inclua os colchetes. 
  #### 4 - Você pode verificar o funcionamento através do console do navegador ou acessando o banco de dados, o botão salvará um id, uma data e o horario de cada clique.
  &nbsp;
  &nbsp;

## B) Crie um plugin que adicione um comando ao WP-CLI que imprima um relatório de histórico de registros. Esse relatório pode ser apenas a listagem das últimas entradas com seus respectivos.

### Instruções  de uso -  Plugin 2 
  #### 1 - Baixe a pasta "desafio2_wp" como zip, adicione ela ao sua pasta de instalação do WordPress /pasta/wp-content/plugins 
  #### 2 - Descompacte a pasta e ative o plugin no seu painel de administrador.
  #### 3 - Acesse a pasta da sua instalação WordPress pelo terminal.
  #### 4 - Execute o comando 'wp exp_relatorio', ele vai retornar as informações que estão dentro da tabela criada no primeiro plugim.
  5 - Lembre-se que é necessário ter o WP-CLI configurado na maquina. 	[Configurar WP-CLI](https://forma.hastedesign.com.br/wordpress/wp-cli-ganhe-tempo-com-linha-de-comando-do-wordpress/)
