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
    let htmlLoading = '<div class="spinner-border text-primary" role="status" style="margin-left: 5px">\n' +
        '                        <span class="sr-only">Loading...</span>\n' +
        '                    </div>';
    $('#loadinggg').html(htmlLoading);
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
        $('#loadinggg').html('');
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
               let ts = ['SP50KH', 'SP120KH', 'SP200KH'];

               let tsMBF = ['MF50KH', 'MF120KH', 'MF200KH'];
               let tsText = [];
               let tsMBFText = [];
               res.pack.forEach((item) => {
                   if (ts.indexOf(item) !== -1) {
                       tsText.push(item);
                   }
                   if (tsMBF.indexOf(item) !== -1) {
                       tsMBFText.push(item);
                   }
               });
               let textt = "Thuê bao " + msisdn + " thuộc tập thuê bao FF1, được mua máy Samsung A01 core 02 Gb với giá 1.290.000đ (giá gốc 2.290.000đ) nếu cam kết sử dụng gói cước của Mobifone."
               let textt2 = "Thuê bao " + msisdn + " cần cam kết sử dụng 12 tháng một trong các gói cước sau: <br>"
               + "+ Với thuê bao trả sau (" + tsText.toString() + ") <br>"
               + "+ Với thuê bao trả sau MobiF (" + tsMBFText.toString() + ")";
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
               let textt2 = "Thuê bao " + msisdn + " cần đăng ký 01 trong các gói cước sau: " + res.pack.toString();
               $('#content-ff').text(textt);
               $('#content-fff').html(textt2);
           } else {
               let textt =  "Thuê bao " + msisdn + " thuộc tập thuê bao (3), được mua máy Samsung A01 core 02 Gb với giá 1.990.000đ (giá gốc 2.290.000đ)."
               $('#content-ff').text(textt);
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
});

$('#inputMsisdn').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        let htmlLoading = '<div class="spinner-border text-primary" role="status" style="margin-left: 5px">\n' +
            '                        <span class="sr-only">Loading...</span>\n' +
            '                    </div>';
        $('#loadinggg').html(htmlLoading);
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
            $('#loadinggg').html('');
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
                    let ts = ['SP50KH', 'SP120KH', 'SP200KH'];

                    let tsMBF = ['MF50KH', 'MF120KH', 'MF200KH'];
                    let tsText = [];
                    let tsMBFText = [];
                    res.pack.forEach((item) => {
                        if (ts.indexOf(item) !== -1) {
                            tsText.push(item);
                        }
                        if (tsMBF.indexOf(item) !== -1) {
                            tsMBFText.push(item);
                        }
                    });
                    let textt = "Thuê bao " + msisdn + " thuộc tập thuê bao FF1, được mua máy Samsung A01 core 02 Gb với giá 1.290.000đ (giá gốc 2.290.000đ) nếu cam kết sử dụng gói cước của Mobifone."
                    let textt2 = "Thuê bao " + msisdn + " cần cam kết sử dụng 12 tháng một trong các gói cước sau: <br>"
                        + "+ Với thuê bao trả sau (" + tsText.toString() + ") <br>"
                        + "+ Với thuê bao trả sau MobiF (" + tsMBFText.toString() + ")";
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
                    let textt2 = "Thuê bao " + msisdn + " cần đăng ký 01 trong các gói cước sau: " + res.pack.toString();
                    $('#content-ff').text(textt);
                    $('#content-fff').html(textt2);
                } else {
                    let textt =  "Thuê bao " + msisdn + " thuộc tập thuê bao (3), được mua máy Samsung A01 core 02 Gb với giá 1.990.000đ (giá gốc 2.290.000đ)."
                    $('#content-ff').text(textt);
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
    }
});

var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
});