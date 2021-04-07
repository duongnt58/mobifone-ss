$( document ).ready(function() {
    
});

console.log( "ready!" );
var listGoi = [
    'GÓI CƯỚC ĐÃ CHỌN',
    'TN50',
    'FF50',
    'FF120',
    'FF200'
]
var selectGoi = $('#selectGoiCuoc');
function actionMuaNgay(maGoi) {
    selectGoi.val(maGoi)
    // $(document).scrollTo('#contact');
    $('#contact')[0].scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
}

function actionClickImg(idDiv) {
    $('#'+ idDiv)[0].scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
}

/**
 * Tra cứu
 */
$('#btn-tra-cuu').on('click', '', (e) => {
    let msisdn = $('#inputMsisdn').val();
    console.log(msisdn);
    if (msisdn === '' || msisdn === undefined || msisdn === null) {
        alert('Số điện thoại không được để trống');
        return;
    }
    $.ajax({
        url: '/ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {
            msisdn: msisdn
        }
    }).done((res) => {
        if (res.success) {
           if (res.data.type === 'FF1') {
               $('#modal-FF1').modal('toggle');
           } else if (res.data.type === 'FF2') {
               $('#modal-FF2').modal('toggle');
           } else {
               $('#modal-FF3').modal('toggle');
           }
        } else {
            $('#modal-FF3').modal('toggle');
        }
    })
})