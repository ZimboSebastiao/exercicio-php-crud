
const links = document.querySelectorAll(".excluir");

for (const link of links) {

    link.addEventListener("click", function(event){
        event.preventDefault();
        let resposta = confirm("Deseja excluir este registro?");
        console.log(resposta);

        if(resposta) {
            location.href = this.href;
        }
    })
}


