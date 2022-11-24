function maiuscula(escrita){
    var res = escrita.value.toUpperCase()

    escrita.value = res
}

function buscaCEP() {
    const cepDigitado = document.getElementById('cep').value
    const url = "https://viacep.com.br/ws/"+cepDigitado+"/json/"

    const req = new XMLHttpRequest()
    req.open('GET', url, true)
    req.onload = () => {
      const respostaAPI = JSON.parse(req.response)

      if("erro" in respostaAPI){
        alert('CEP inválido!')
        return
      }
    console.log(respostaAPI)

    document.getElementById('logradouro').value = respostaAPI.logradouro
    document.getElementById('municipio').value = respostaAPI.localidade
    document.getElementById('bairro').value = respostaAPI.bairro
    document.getElementById('uf').value = respostaAPI.uf
  }
  req.send()
} 

function criar(){
  var n = document.getElementById('cad-nome').value;
  var e = document.getElementById('cad-email').value;
  var c = document.getElementById('cad-cpf').value;
  var s = document.getElementById('cad-senha').value;

  var url = './back/criar-conta.php';

  var objetoJson = {
      "nome": n,
      "email": e,
      "cpf": c,
      "senha": s
  }

  var xhttp = new XMLHttpRequest();
    xhttp.open("POST", url, false);
    xhttp.setRequestHeader('Content-type', 'application/json');
    xhttp.send(JSON.stringify(objetoJson));
    console.log(xhttp.responseText);
}