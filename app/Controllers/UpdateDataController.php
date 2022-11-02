<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

/* tudo nivel http , modelo dpi*/

class UpdateDataController extends AbstractControllers {

    public function exec() {
        $userId; /* declarando e null*/
        $missingAttribute; 
        $response = [
            'success' => true 
            /*cria um arrey que se chama sucess que aponta pra true*/
        ];

        try {
            /* controlar erros para variavel*/
            $requestsVariables = $this->processServerElements->getVariables();/* do url */

        /*getVariables() metodo que pega da URL quebra eles e transforma em um array */
        /* objeto que vem da classe abstrata ---> $this->processServerElements---- que vem da AbstractControllers*/
        /* se não passar url quero que passe uma mensagem de erro*/

            if ((!$requestsVariables) || (sizeof($requestsVariables) === 0)) {/* se for*/
                /* faz uma validação*/
                $missingAttribute = 'variableIsEmpty';

                /* se não existir exibe uma variable para o fronte*/

                throw new \Exception("You need to insert variables in url");

                /* pra a execução ou estoura a execução , e manda pra cath
                que retorna constroi o array mandadndo a mensagem de erro 
                $missingAttribute = 'variableIsEmpty';para fronte 
                para saber o uqe fazer com erro*/
            }

            /* se for tudo  ok  em validar a url continua no foreach*/
            foreach ($requestsVariables as $requestVariable) {
                /* se ele encontrar o userid ele estoura e exception*/
               /*name=jonatham&&idade=29&userId=1*/
               /* conferir userID se existe, senão cria usuario*/

                if ($requestVariable['name']  === 'userId') {
                    /*
                    name => "name"
                    value => "jonatham"

                    name => "idade"
                    value => "29"*/

                    $userId = $requestVariable['value'];

                    /*
                    "name" => "userId"
                    value =>1*/

                    


                }
            }

            if (!$userId) {
                /* se nao exitrir se ele encontrar o userid ele estoura e exception*/

                $missingAttr90-ception("You need to inform userId variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")
            /* pdo chama o met query e um select no banco de dados vai retonar todos*/
                ->fetchAll();
            /* pdo é herdado e depois envocando fetChALL é um array
             que traz todas a linhas da tabela retornante, populando o users*/
            if (sizeof($users) === 0) {
                /* testa o tamanho do array
                /* se retorna zero ele retorna uma mensagem de erro
                , estourando uma exption não tem nada para laterar ou fazer update*/
                $missingAttribute = 'thisUserNoExist';
                throw new \Exception("There is not record of this user in db");
            }

            $params = $this->processServerElements->getInputJSONData();
            /* objeto criado na classe abstrata e getInputJSONData();
            ele retorna o array do do put no json,
            verificando o que esta passando no corpo da request
            e depois que executar a request ele retorna o que foi alterado no json*/

            dd($params);

            if ((!$params)|| sizeof($params) === 0) {/* */
                /* se não existir ou for igual a zero retorna uma exception*/
                $missingAttribute = 'paramsNotExist';
                throw new \Exception("You have to inform thr params attr to update");
            }
            $updateStructureQuery = ''; /* concatenar*/
            /* criando uma varialvel,recebe uma string vazia pq?
             pq é uma estrutura da query que vai fazer update*/

            foreach($params as $key => $value){
                
                /* tem que retornar pelo menos um, podendo alterar de todas formas, tanto um quanto 2 ou 3
                key ---> da valor por atribuição , consegue difinir indices artificias*/
                
                if(!in_array($key,['name','last_name','age'])){
                    /* se não tiver a key constatndo no array retorna uma exception*/
                    /*e aplicando foreach($times as $time) seguindo por ciclo ,
                    cada ciclo do foreach retorna indice do key que é artificial */
                    $missingAttribute = "keyNotAcceptable";
                    throw new \Exception ($key);
                
                
            }

            if($key === 'name'){
                /*concatenando as variaveis, string vazia , 1 ciclo*/ 
                $updateStructureQuery.="name =:name,";
            }

            if($key === 'last_name'){
                /*concatenando as variaveis, string vazia ,
                 2 ciclo juntando com a name do primeiro ciclo*/
                $updateStructureQuery.="last_name =:last_name,";
                /* campo igual a valor prciso da virgula*/
            }
            
            if($key === 'age'){
                $updateStructureQuery.="age =:age,";
            }
        }

        $updateStringInArray = str_split($updateStructureQuery);
        /* pegando minha  $updateStringInArray transformo uma array de string , tratando como um fila
        para tirar a virgula do array*/ 

        array_pop($updateStringInArray);

        $newStringElementsSQL = implode($updateStringInArray);
        /* transfromando em string*/

        $sql = "UPDATE
                        user
                SET
                {$newStrutureElementsSQL}
                    where
                        id_user =:id_user";
    dd($sql);
    $statement = $this->pdo->prepare($sql);
    /* quando monto uma estrutura SQL fg*/
            
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }

        view($response);
    }
}