const primeiroInput = document.querySelector('#arquivodeimg1');
const segundoInput = document.querySelector('#arquivodeimg2');
const terceiroInput = document.querySelector('#arquivodeimg3');
const quartoInput = document.querySelector('#arquivodeimg4');
const quintoInput = document.querySelector('#arquivodeimg5');
const sextoInput = document.querySelector('#arquivodeimg6');
const PrimeiraImg = document.querySelector('#FirstImg');
var valorBoleano = true;

if (primeiroInput.value == '') {
    //SE O INPUT ESTIVER VAZIO
    $('#primeiraFoto').removeClass('desativados');

}

//PRIMEIRO INPUT CONFGS
primeiroInput.addEventListener('change', function(){
    //SE O INPUT ESTIVER OCUPADO PELO ARQUIVO DE IMAGEM
    //$('#primeiraFoto').get(0).style.backgroundColor = '#FFC107';
    if(primeiroInput.value != ''){
        $('#segundaFoto').removeClass('desativados');
    }
    if(primeiroInput.value == ''){
        $('#primeiraFoto').get(0).style.backgroundColor = 'none';

        $('#segundaFoto').addClass('desativados');
        segundoInput.value = '';

        $('#terceiraFoto').addClass('desativados');
        terceiroInput.value = '';

        $('#quartaFoto').addClass('desativados');
        quartoInput.value = '';

        $('#quintaFoto').addClass('desativados');
        quintoInput.value = '';

        $('#sextaFoto').addClass('desativados');
        sextoInput.value = '';

        $('#segundaFoto').css('backgroundColor','');
        $('#terceiraFoto').css('backgroundColor','');
        $('#quartaFoto').css('backgroundColor','');
        $('#quintaFoto').css('backgroundColor','');
        $('#sextaFoto').css('backgroundColor','');
    }
});
//SEGUNDO INPUT CONFGS
segundoInput.addEventListener('change', function(){
     //SE O INPUT ESTIVER OCUPADO PELO ARQUIVO DE IMAGEM
     $('#segundaFoto').get(0).style.backgroundColor = '#FFC107';
     if(segundoInput.value !== ''){
         $('#terceiraFoto').removeClass('desativados');
     }
     if(segundoInput.value == ''){
         $('#segundaFoto').get(0).style.backgroundColor = '#fff';
 
         $('#terceiraFoto').addClass('desativados');
         terceiroInput.value = '';
 
         $('#quartaFoto').addClass('desativados');
         quartoInput.value = '';
 
         $('#quintaFoto').addClass('desativados');
         quintoInput.value = '';
 
         $('#sextaFoto').addClass('desativados');
         sextoInput.value = '';
 
 
         $('#terceiraFoto').css('backgroundColor','');
         $('#quartaFoto').css('backgroundColor','');
         $('#quintaFoto').css('backgroundColor','');
         $('#sextaFoto').css('backgroundColor','');
     }
});
//TERCEIRO INPUT CONFGS
terceiroInput.addEventListener('change', function(){
     //SE O INPUT ESTIVER OCUPADO PELO ARQUIVO DE IMAGEM
     $('#terceiraFoto').get(0).style.backgroundColor = '#FFC107';
     if(terceiroInput.value !== ''){
         $('#quartaFoto').removeClass('desativados');
     }
     if(terceiroInput.value == ''){
         $('#terceiraFoto').get(0).style.backgroundColor = '#fff';
 
         $('#quartaFoto').addClass('desativados');
         quartoInput.value = '';
 
         $('#quintaFoto').addClass('desativados');
         quintoInput.value = '';
 
         $('#sextaFoto').addClass('desativados');
         sextoInput.value = '';
 
 
         $('#quartaFoto').css('backgroundColor','');
         $('#quintaFoto').css('backgroundColor','');
         $('#sextaFoto').css('backgroundColor','');
     }
});
//QUARTO INPUT CONFGS
quartoInput.addEventListener('change', function(){
     //SE O INPUT ESTIVER OCUPADO PELO ARQUIVO DE IMAGEM
     $('#quartaFoto').get(0).style.backgroundColor = '#FFC107';
     if(quartoInput.value !== ''){
         $('#quintaFoto').removeClass('desativados');
     }
     if(quartoInput.value == ''){
         $('#quartaFoto').get(0).style.backgroundColor = '#fff';
 
         $('#quintaFoto').addClass('desativados');
         quintoInput.value = '';
 
         $('#sextaFoto').addClass('desativados');
         sextoInput.value = '';
 
         $('#quintaFoto').css('backgroundColor','');
         $('#sextaFoto').css('backgroundColor','');
     }
});
//QUINTO INPUT CONFGS
quintoInput.addEventListener('change', function(){
     //SE O INPUT ESTIVER OCUPADO PELO ARQUIVO DE IMAGEM
     $('#quintaFoto').get(0).style.backgroundColor = '#FFC107';
     if(quintoInput.value !== ''){
         $('#sextaFoto').removeClass('desativados');
     }
     if(quintoInput.value == ''){
         $('#quintaFoto').get(0).style.backgroundColor = '#fff';
 
         $('#sextaFoto').addClass('desativados');
         sextoInput.value = '';

         $('#sextaFoto').css('backgroundColor','');
     }
});
//SEXTO INPUT CONFGS
sextoInput.addEventListener('change', function(){
     //SE O INPUT ESTIVER OCUPADO PELO ARQUIVO DE IMAGEM
     $('#sextaFoto').get(0).style.backgroundColor = '#FFC107';
     
     if(sextoInput.value == ''){
         $('#sextaFoto').get(0).style.backgroundColor = '#fff';
     }
});


PrimeiraImg.addEventListener('click',()=>{
    if(primeiroInput.value == ''){
        if(valorBoleano){
            document.querySelector('#primeiraFoto').classList.add('desativados');
            document.querySelector('#segundaFoto').classList.remove('desativados');
            document.querySelector('#segundaFoto').style.boxShadow = 'rgb(231 213 10) 0px 0px 6px 1px';
            document.querySelector('#primeiraFoto').style.boxShadow = 'none';
            valorBoleano = false;
        }else {
            document.querySelector('#primeiraFoto').classList.remove('desativados');
            document.querySelector('#segundaFoto').classList.add('desativados');
            document.querySelector('#segundaFoto').style.boxShadow = 'none';
            document.querySelector('#primeiraFoto').style.boxShadow = 'rgb(231 213 10) 0px 0px 6px 1px';
            valorBoleano = true;
        }
    }
});