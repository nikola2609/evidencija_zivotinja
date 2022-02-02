$('#formaVrsta').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input','textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'requestHandler/vrstaZivotinje/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'requestHandler/vrstaZivotinje/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana vrsta");
            location.reload();
        }else{
            alert("Neuspešno sačuvana vrsta")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('input[name="vrstaCheck"]').click(function (){

    let id=$('input[name="vrstaCheck"]:checked').val();

    req=$.ajax({
        url: 'requestHandler/vrstaZivotinje/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let vrsta = $.parseJSON(res)[0];

        $('input[name="id"]').val(vrsta.id);
        $('input[name="naziv"]').val(vrsta.naziv);
        $('input[name="vrsta"]').val(vrsta.vrsta);
        $('textarea[name="opis"]').val(vrsta.opis);



    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#resetVrsta').click(function (){
    $('input[name="id"]').val("");
});

$('#obrisiVrstu').click(function(){
    let id = $('input[name="id"]').val();

    if(id==""){
        alert("Vrsta nije odabrana");
        return;
    }

    req=$.ajax({
        url: 'requestHandler/vrstaZivotinje/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana vrsta");
            location.reload();
        }else{
            alert("Neuspešno obrisana vrsta")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});