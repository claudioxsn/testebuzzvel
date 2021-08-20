Busca de Hotéis. 

O sistema efetua a busca do local informado pelo usuário na API MapQuest. 
Com o retorno da API, é utilizado a latitude e longitude para efetuar o calculo da distância entre o ponto informado e os hotéis. 
Na pesquisa é possível informar a ordenação. 

para executar o projeto é necessário adicionar as linhas abaixo ao arquivo .env: 


MAP_REQUEST_DIRECTION=http://open.mapquestapi.com/geocoding/v1/address?key=
MAP_REQUEST_API_KEY=CbqVWWFAC9gPKIWqAA3PACvboEEIKTNO


