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
    selectGoi.val(parseInt(maGoi))
    // $(document).scrollTo('#contact');
    $('#contact')[0].scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
}

function actionClickImg(idDiv) {
    $('#'+ idDiv)[0].scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
}
