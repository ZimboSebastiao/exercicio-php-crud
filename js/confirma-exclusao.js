// Selecionando os links apagar através da classe ".excluir" (colocada em cada link no HTML)
const links = document.querySelectorAll(".excluir");

// Precorrendo cada link selecionada anteriormente (conteúdo da constante "links")
for (const link of links) {
    // Adicionando um evento de clique para cada link
    link.addEventListener("click", function(event){

        // Anulando o compportamento padrão do link que é redirecionar para algum lugar.
        event.preventDefault();


        // Usando im confirm() pata capturar a resposta do usuário , que pode ser OK/Sim (true) ou Cancelar/Não (false)
        let resposta = confirm("Deseja excluir este registro?");
        console.log(resposta);

        // Se a resposta for true, então redirecionamos para o destino original de cada link, ou seja, para a página PHP de exclusão
        if(resposta) {
            location.href = this.href;
        }
    })
}