$('#formaZivotinja').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input','textarea','select');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'requestHandler/zivotinja/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'requestHandler/zivotinja/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana životinja");
            location.reload();
        }else{
            alert("Neuspešno sačuvana životinja")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

function popuniFormu(idZ){
    let id=idZ;

    req=$.ajax({
        url: 'requestHandler/zivotinja/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let zivotinja = $.parseJSON(res)[0];

        $('input[name="id"]').val(zivotinja.id);
        $('input[name="korisnik_id"]').val(zivotinja.korisnik_id);
        $('input[name="ime"]').val(zivotinja.ime);
        $('select[name="vrsta_id"]').val(zivotinja.vrsta_id);
        $('select[name="otac_id"]').val(zivotinja.otac_id);
        $('select[name="majka_id"]').val(zivotinja.majka_id);
        $('input[name="datumRodjenja"]').val(zivotinja.datumRodjenja);
        $('input[name="status"]').val(zivotinja.status);
        $('textarea[name="napomena"]').val(zivotinja.napomena);
        if(zivotinja.pol=='Z'||zivotinja.pol=='z'){
            $('#radioZ').prop('checked',true);
        }else{
            $('#radioM').prop('checked',true);
        }


    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
}

$('input[name="zivotinjaCheck"]').click(function (){
    popuniFormu($('input[name="zivotinjaCheck"]:checked').val());
});

$('#resetZivotinja').click(function (){
    $('input[name="id"]').val("");
});

$('#prodajZivotinju').click(function (){
    event.preventDefault();
    $('input[name="status"]').val("prodata");
    const $form = $('#formaZivotinja');
    const $input = $form.find('input','textarea','select');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);

    req=$.ajax({
        url: 'requestHandler/zivotinja/update.php',
        type:'post',
        data: data
    });

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno prodata životinja");
            location.reload();
        }else{
            alert("Neuspešno prodata životinja")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});

$('#obrisiZivotinju').click(function(){
    let id = $('input[name="id"]').val();

    if(id==""){
        alert("Životinja nije odabrana");
        return;
    }

    req=$.ajax({
        url: 'requestHandler/zivotinja/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana životinja");
            location.reload();
        }else{
            alert("Neuspešno obrisana životinja")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});