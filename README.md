==============================================================
Projeto zf1-loja - Loja de exemplo feita em Zend Framework 1
==============================================================

Orientações gerais para rodar e evoluir o projeto:

1) Instalar um webserver Apache 2 + PHP 5.3 ou superior + MySQL 5

2) Baixar o projeto para uma pasta qualquer

3) Criar uma base de dados no MySQL e rodar o dump (que está em "database/dump_db.sql") nesta base.
A pasta "database" também contém diagrama MER da base de dados (gerados com o MySQL Workbench 
usando engenharia reversa).

4) Configurar apontamentos de Virtual Host para a pasta public da aplicação.
A aplicação foi testada sob a seguinte configuração de Virtual Host:

<VirtualHost *:SUA_PORTA>
    
	ServerName localhost:SUA_PORTA
    DocumentRoot "D:\PROJETOS\zf1-loja\public"
 
    SetEnv APPLICATION_ENV "development"
 
    <Directory "D:\PROJETOS\zf1-loja\public">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
	
</VirtualHost>

5) Alterar os parametros de acesso a banco de dados no arquivo "application/config/store.ini"
conforme exemplo abaixo

resources.db.params.dbname = "lojamobly"
resources.db.params.username = "root"
resources.db.params.password = ""
resources.db.params.host = "localhost"

6) Assegurar que a aplicação terá permissçao de leitura e de escrita na pasta "data" 
(a pasta será usada para escrever índices e arquivos usando componente Zend_Lucene)

Observação: A aplicação traz um script ant (contido em /build/build.xml e parametros contidos em /build/ant.properties) 
para fornecer apoio e automação em atividades de build. Esse script futuramente será modificado para incluir
a execução de uma bateria de testes unitários em PHPUnit, de modo que o build só rode se tudo estiver ok nos testes.

Créditos: Arquitetura baseada em fork realizado em projeto de exemplo 
criado inicialmente por Keith Pope (http://www.thepopeisdead.com) 
autor do livro 

=================================================================
Evoluções e futuras melhorias previstas para o projeto
==================================================================

- finalizar a implementação da área administrativa da loja
- refatoração para aplicação de namespaces
- implementar exemplo com código de integração real com gateways de pagamento PagSeguro, PayPal
- implementar um layout e UX mais elaborandos, usando uma estrutura melhor de templates / temas / skins
- remover os componentes do Zend que não estão sendo utilizados
- disponibilização de opção para baixar a aplicação via composer
- implementação da camada de persistência usando Doctrine
- inclusao de cobertura de testes unitarios
- o script ant será modificado de modo a gerar builds para ambiente development / production 
separadamente, atualizando o arquivo store.ini conforme o ambiente target definido no build
- criar um novo projeto visando o desenvolvimento de uma aplicação sample similar usando Zend Framework 2
