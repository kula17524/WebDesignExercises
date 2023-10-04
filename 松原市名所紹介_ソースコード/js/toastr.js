$(document).ready(function() {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    Command: toastr["info"]("①カテゴリ移動<br>　1+Altキー：トップ<br>　2+Altキー：神社<br>　3+Altキー：その他史跡<br>　4+Altキー：商業施設<br>②絞り込み機能<br>　J+Altキー：バーガーボタン", "ショートカットキーについて")
});