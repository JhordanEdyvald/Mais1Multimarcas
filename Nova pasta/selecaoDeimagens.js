var primeiraImagem = (document.querySelector('#icon-img-1') == null) ? '' : document.querySelector('#icon-img-1').getAttribute('id');
var segundaImagem = (document.querySelector('#icon-img-2') == null) ? '' : document.querySelector('#icon-img-2').getAttribute('id');
var terceiraImagem = (document.querySelector('#icon-img-3') == null) ? '' : document.querySelector('#icon-img-3').getAttribute('id');
var quartaImagem = (document.querySelector('#icon-img-4') == null) ? '' : document.querySelector('#icon-img-4').getAttribute('id');
var quintaImagem = (document.querySelector('#icon-img-5') == null) ? '' : document.querySelector('#icon-img-5').getAttribute('id');
var sextaImagem = (document.querySelector('#icon-img-6') == null) ? '' : document.querySelector('#icon-img-6').getAttribute('id');
const arrayImgs = [primeiraImagem, segundaImagem, terceiraImagem, quartaImagem, quintaImagem, sextaImagem];
const leftBtn = document.querySelector('.botao-esquerdo-exibir');
const rightBtn = document.querySelector('.botao-direito-exibir');
var contador = 0;

document.addEventListener('click', function(e){
    var elemento = e.target;
    arrayImgs.forEach((item)=>{
        if(item != ''){
            if(elemento.getAttribute('id') == item){
                imagemSelected(elemento);
                //console.log(elemento);
            }
        }
    });
    if(elemento == rightBtn) {
        cardEsqueda();
    }
    
    if(elemento == leftBtn) {
        var posicaoAtual = parseInt(document.querySelector('.cards-container').style.left);
        if(posicaoAtual < -50){
            document.querySelector('.cards-container').style.left = posicaoAtual + 1200 + 'px';    
        }
    }
});

setInterval(cardEsqueda, 5000);

function cardEsqueda() {
    var posicaoAtual = parseInt(document.querySelector('.cards-container').style.left);
        var quantidadeCarro = document.querySelectorAll('.veiculosExibirOrdem').length;
        
        if(contador < parseInt(quantidadeCarro / 3) && contador != parseInt(quantidadeCarro / 3)-1){
            document.querySelector('.cards-container').style.left = posicaoAtual - 1200 + 'px';
            contador++;
        }else{
            document.querySelector('.cards-container').style.left = '-50px';
            contador = 0;
        }
}

function imagemSelected(element) {
    var enderecoImg = element.getAttribute('src');
    document.querySelector('#square-show-img').setAttribute('src',enderecoImg);
    document.querySelector('.elemento-selecionado').classList.remove('elemento-selecionado');
    element.classList.add('elemento-selecionado');
}

//FORMATAR MOEDA DO TEXTO

const preco = document.querySelector('.preco-veiculo-exibir').innerHTML;
const valorConvertMoeda = parseInt(preco).toLocaleString();
const tratamentoValor = 'R$ '+valorConvertMoeda+',<span>00.</span>';
document.querySelector('.preco-veiculo-exibir').innerHTML = tratamentoValor;