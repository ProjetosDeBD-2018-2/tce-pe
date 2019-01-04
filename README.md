# transparencia
Projeto que trata de dados abertos disponibilizados pelo Tribunal de Contas do Estado de Pernambuco.

# Requisitos para rodar
1. Arquivos disponibilizados nesse repositório;
2. XAMPP Control Panel v.3.2.2 ou superior;
3. SQLyog 13.1.2 ou superior;
4. Versão recente de um navegador web de sua preferência.

# Passo a passo para rodar
1. Crie uma pasta intitulada tce-pe no diretório C:\xampp\htdocs. Baixe e extraia os arquivos desse repositório nessa pasta.
2. Inicialize os módulos Apache e MySQL do XAMPP.
3. Abra o SQLyog. Clique na ferramenta que permite procurar por um script .sql no computador para rodá-lo. Utilizando a janela de busca que é exibida, vá até o diretório recém-criado tce-pe/scripts. Selecione e rode o script criarBase.sql para criar o esquema tce-razoavel e suas tabelas. Selecione e rode os scripts popularUnidadeGestora.sql, popularContrato.sql e popularTermoAditivo.sql, nessa ordem, para popular as tabelas do esquema tce-razoavel recém-criado.
4. Abra um navegador web de sua preferência e acesse localhost/tce-pe.
