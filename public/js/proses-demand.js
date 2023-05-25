$('.btn-proses').click(function (e) { 
    e.preventDefault();
    $('.hidden').addClass('show');
    $('.hidden').removeClass('hidden');
    $('.data').addClass('hidden');
    $('.btn-simpan').removeClass('hidden');
    $('.btn-proses').addClass('hidden');
});


$('.btn-simpan').click(function(){
    $('#form-proses').submit();
});

$('.btn-batal').click(function(){
    $('.hidden').removeClass('hidden');
    $('.show').addClass('hidden')
    $('.show').removeClass('show');
   
    $('.btn-proses').removeClass('hidden');
   
});