$( document ).ready(function() {

});

// console.log( "ready!" );
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
    $('#modal-FF1').modal('hide');
    $('#modal-FF2').modal('hide');
    $('#modal-FF3').modal('hide');
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
               // let packAs = res.pack;
               // let listPack = ['SP50KH', 'SP120KH', 'SP200KH', 'MF50KH', 'MF120KH', 'MF200KH', 'SP50', 'SP120', 'SP200'];
               // listPack.forEach((pack) => {
               //     if(packAs.indexOf(pack) === -1) {
               //         $('.FF1-' + pack).remove();
               //     }
               // })
               // $('#modal-FF1').modal('toggle');
               let textt = "Thuê bao " + msisdn + " thuộc tập thuê bao FF1, được mua máy Samsung A01 core 02 Gb với giá 1.290.000đ (giá gốc 2.290.000đ) nếu cam kết sử dụng gói cước của Mobifone."
               let textt2 = "Thuê bao " + msisdn + " cần cam kết sử dụng 12 tháng một trong các gói cước sau: <br>"
               + "+ Với thuê bao trả sau (SP50KH, SP120KH, SP200KH) <br>"
               + "+ Với thuê bao trả sau MobiF (MF50KH, MF120KH, MF200KH)";
               $('#content-ff').text(textt);
               $('#content-fff').html(textt2);

           } else if (res.data.type === 'FF2') {
               // let packAs = res.pack;
               // let listPack = ['SP50', 'SP120', 'SP200'];
               // listPack.forEach((pack) => {
               //     if(packAs.indexOf(pack) === -1) {
               //         $('.FF2-' + pack).remove();
               //     }
               // })
               // $('#modal-FF2').modal('toggle');
               let textt = "Thuê bao " + msisdn + " thuộc tập thuê bao FF2, được mua máy Samsung A01 core 02 Gb với giá 1.790.000đ (giá gốc 2.290.000đ)."
               let textt2 = "Thuê bao " + msisdn + " cần đăng ký 01 trong các gói cước sau: TNSP, SP50, SP120 hoặc SP200"
               $('#content-ff').text(textt);
               $('#content-fff').html(textt2);
           } else {
               $('#content-ff').text("");
               $('#content-fff').html("");
           }
            $('#modal-FF').modal('toggle');
            // $('#modal-FF').modal('toggle');
        } else {
            // $('#modal-FF3').modal('toggle');
            // let textt = "Thuê bao " + msisdn + "thuộc tập thuê bao FF1, được mua máy Samsung A01 core 02 Gb với giá 1.290.000đ (giá gốc 2.290.000đ) nếu cam kết sử dụng gói cước của Mobifone"
            // $('#content-ff').text(textt);

        }
    })
})