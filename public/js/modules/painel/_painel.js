document.addEventListener("DOMContentLoaded", ()=>{
    (function(){
        /**
         * @funcion Inserir ID referente ao registro no btn do link
         * 
         * @$list   Lista de elementos html referentes aos inputs[radio]
         * @value   Variável responsável por guardar a posição do elemento.
         * @link    Localização da tag "a", que sofrerá as mudanças no atributo "href"
         */
        
        let $list = document.querySelectorAll('[name="registros"]');
        for(let $input of $list){
            $input.onclick = function(){
                let value = $input.value
                let link = document.querySelector(".js-ocorrencia")
                if(link.href.indexOf("id=") >= 0){
                    link.href = link.href.split("?id=")[0]+"?id="+value; 
                }else{
                    link.href = link.href+"?id="+value; 
                }
            }
        }
    }())
})

