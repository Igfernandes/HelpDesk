const Notify = function(){
    
    this.balloon = ($info)=>{
        
        /**
         * @Action  O código abaixo irá adicionar tanto a mensagem referente aos status da edição do projeto
         * 
         * @url     Cria uma instância de url a partir dum string 
         * @notify  Irá guardar a localização da tag pai que servirá como parâmetro para mudar os elementos em cadeia após uma devida resposta.
         * @params  Guardará os parâmetros referente a url (Metodo GET)
         */
        
        const url = new URL(window.location.href); 

        if(window.location.href.indexOf(`status=${$info.status}`) >= 0){
            let notify = document.querySelector($info.content)
            notify.querySelector($info.element).innerText = $info.msg;
            notify.classList.add($info.status);
            
            setTimeout(()=>{
                notify.classList.remove($info.status);

                let params = url.searchParams;           //Obtém os parâmetros de consulta da url. 
                //Verifica se o parâmetro a existe...
                if (params.has('status')) params.delete('status'); //Se o parâmetro existir o remove.

                history.pushState({user: 1}, "", url)   //Imprime a url modificada
            }, 3000)
        }
    }

}

let cmd = new Notify();

document.addEventListener("DOMContentLoaded", ()=>{
    cmd.balloon({
        content: "notify",
        status: "sucess",
        element: ".text span",
        msg: "Atualizado com sucesso"
    })
    cmd.balloon({
        content: "notify",
        status: "failed",
        element: ".text span",
        msg: "Falha ao Atualizar"
    })
});