
# Teste de aptidões
## Introdução
Para avaliar um pouco do seu conhecimento técnico e da sua forma de resolver problemas, propomos um breve desafio.
Ele consiste em programar o backend de uma landing page simples, atendendo a algumas regras de negócio definidas abaixo.

Fique a vontade para utilizar a linguagem e framework que mais te agradam, porém não esqueça de deixar no readme instruções para que seu projeto possa ser executado.

A solução deve ser desenvolvida usando o Git como controle de versão, podendo ser via fork nesse repositório ou entregue por email (vagas-ti@actualsales.com.br). 
**Atenção: ZIPs não serão aceitos como entrega. Mande a URL pública do seu repo** 

Para que possamos avaliar a sua evolução no projeto, pedimos que faça os commits progressivamente ao invés de um único e grande commit no final.

Inclua também todas as informações que achar relevantes para avaliarmos a sua possível contratação (github, linkedin, portfolio, blog pessoal etc).

A partir do momento de início, o desafio deverá ser entregue em no máximo 2 dias. 

## Landing Page
Uma landing page é uma página simples voltada a convencer o visitante a efetuar uma conversão, que pode ser a aquisição de um determinado produto ou, neste caso, o preenchimento de um formulário contendo seus dados de contato (Lead).

Nossa equipe de negócios solicitou o desenvolvimento de uma landing page com um formulário subdividido em dois steps (descritos abaixo), com a devida **validação** e **captura** de dados.

Os dados devem:
- Receber uma pontuação de acordo com regras estipuladas abaixo.
- Ser gravados em banco de dados. 
- Posteriormente, enviados para uma API externa.

Recebemos dos designers um esboço do HTML que será estilizado por eles.

Portanto, o foco do projeto não deve ser o design da página em si, apenas o comportamento do formulário.

Entretanto, caso precise fazer alguma adaptação na estrutura do HTML, fique à vontade ;)

## Step 1
- **Nome Completo** (No mínimo duas palavras contendo apenas caracteres de A a Z e suas possíveis acentuações.)
- **Data de Nascimento** (No formato DD/MM/YYYY)
- **Email**
- **Telefone**

## Step 2
#### Região
Norte, Nordeste, Sul, Sudeste ou Centro-Oeste
#### Unidade
Cada região possui um set diferente de unidades e isso deve ficar claro para o usuário no formulário:

- Sul - Porto Alegre, Curitiba
- Sudeste - São Paulo, Rio de Janeiro, Belo Horizonte
- Centro-Oeste - Brasília
- Nordeste - Salvador, Recife
- Norte - Não possui disponibilidade

## Pontuação
Cada lead terá uma pontuação (score) de 0 a 10 de acordo com os dados informados.
Partindo da pontuação inicial 10, as seguintes condições modificam a pontuação:

### Região
- Sul: -2 pontos
- Sudeste: -1 ponto, exceto quando unidade = São Paulo (que não modifica)
- Centro-Oeste: -3 pontos
- Nordeste: -4 pontos
- Norte: -5 pontos

### Idade
**ATENÇÃO: Para o cálculo da idade, considerar a data atual fixa em 01/11/2019**

- A partir de 100 ou menor que 18: -5 pontos
- Entre 40 e 99: -3 pontos
- Entre 18 e 39: não modifica

## Banco de dados
A modelagem e a tecnologia escolhida ficam a seu critério, mas queremos ver no código a implementação para inserir os dados no banco ;)

## Envio de leads:
Os dados de cada lead deverão ser enviados via POST para o endpoint http://api.actualsales.com.br/join-asbr/ti/lead

Parâmetros esperados:

- nome (String)
- email (String)
- telefone (String)
- regiao (Elemento do conjunto ["Norte", "Nordeste", "Sul", "Sudeste", "Centro-Oeste"])
- unidade (Elemento do conjunto ["Porto Alegre", "Curitiba", "São Paulo", "Rio de Janeiro", "Belo Horizonte", "Brasília", "Salvador", "Recife", "INDISPONÍVEL"])
- data_nascimento (data no formato YYYY-mm-dd)
- score (int de 0 a 10)
- token (String)

Para obter o token basta acessar o link a seguir substituindo o email do parâmetro pelo seu. Ex: http://api.actualsales.com.br/join-asbr/ti/token?email=vagas-ti@actualsales.com.br

Uma vez obtido, o token não sofrerá alteração (mas poderá ser consultado novamente, caso necessário).

## Dúvidas?
É só mandar um e-mail para <vagas-ti@actualsales.com.br>.

Obrigado e boa sorte!
