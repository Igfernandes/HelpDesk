const Form = function(){
    this.mask = function($info){

        /**
         * @Action  O código abaixo irá criar máscara para números com o formato BR
         * 
         * @fields  Armazena a lista de inputs com name "telefone";
         * @function settings   Serve para tratar os dados recebidos e formatar os valores.
         */

        let $fields = document.querySelectorAll($info.coord)
     
        let settings = function(v){
            let r = v.replace(/\D/g, "");
            r = r.replace(/^0/, "");
          
            if (r.length > 10) {
              r = r.replace(/^(\d\d)(\d{1})(\d{4})(\d{4}).*/, "($1) 9 $3-$4");
            } else if (r.length > 7) {
              r = r.replace(/^(\d\d)(\d{1})(\d{4})(\d{0,4}).*/, "($1) 9 $3-$4");
            } else if (r.length > 2) {
              r = r.replace(/^(\d\d)(\d{0,1})(\d{0,4})/, "($1) 9 $3");
            } else if (v.trim() !== "") {
              r = r.replace(/^(\d*)/, "($1");
            }
            return r;
              
        }
    
        for(let $field of $fields){
            $field.onkeypress = function(){
                var v = settings(this.value);
                if (v != this.value) {
                    this.value = v;
                }
            }
            $field.onblur = function(){
                var v = settings(this.value);
                if (v != this.value) {
                    this.value = v;
                }
            }
        }
    }
}

let cmd = new Form();

cmd.mask({
    coord: "[name='telefone']"
})