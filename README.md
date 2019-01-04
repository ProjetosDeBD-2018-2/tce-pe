# transparencia
Projeto que trata de dados abertos disponibilizados pelo Tribunal de Contas do Estado de Pernambuco.

# Requisitos para rodar
1. Arquivos disponibilizados nesse repositório;
2. XAMPP Control Panel v.3.2.2 ou superior;
3. SQLyog 13.1.2 ou superior;
4. Navegador web de sua preferência.

# Passo a passo para rodar
1. Crie uma pasta intitulada tce-pe no diretório C:\xampp\htdocs.
2. Baixe e extraia os arquivos desse repositório na pasta tce-pe.
3. Inicialize os módulos Apache e MySQL do XAMPP.
4. Rode o script criarBanco.sql utilizando o SQLyog para criar o esquema tce-razoavel e suas tabelas.
5. Rode os scripts populaContrato.sql, populaTermoAditivo.sql e populaUnidadeGestora.sql para popular as tabelas do esquema tce-razoavel.
6. Abra o navegador web de sua preferência e acesse localhost/tce-pe.
