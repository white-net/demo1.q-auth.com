$(function() {

    var ajTask;

    function getQRImage() {
        
        // *************************************************************************
        // * javascriptで強制的にAjaxを止める場合、下記のコメントを削除
        // * （タイムアウトのギリギリスキャンした場合、処理する為3秒を伸ばしてAjaxを強制終了）
        // ****************************** Start ************************************
        //
        // if (ajTask) {
        //     setTimeout(
        //         function(ajaxTask){
        //             ajaxTask.abort();
        //         },
        //     3000, ajTask);
        // }
        // ******************************* End *************************************


        // *************************************************************************
        // * QRコード生成をPHPでする
        // ****************************** Start ************************************
        //$("#QrImg").attr('src',"./ajax/genQrCode.php");
        // ******************************* End *************************************

        // *************************************************************************
        // * QRコード生成をJavascriptでする
        // ****************************** Start ************************************
        $('#qrcode').empty();

        // QRコード生成用ID取得
        genQR = $.ajax({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') },
            type: "POST",
            url: "/genSsid",
            data: {
                "m": "00"
            },
            async: false,
            cache: true
        }).responseText;

        // QR生成し、表示
        $('#qrcode').qrcode({
            width: 90,
            height: 90,
            typeNumber: -1,
            correctLevel: 1,
            background: "#F2F2F2",
            foreground: "#000000",
            text: genQR
        });

        // スマートフォンの場合、QR表示にリンクをはる。（カスタムスキーマ）
        $("#mobileLink").attr("href", "qauthapp://qauth?q=" + genQR);

        // ******************************* End *************************************

        var ajTask_n = $.ajax({
            headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') },
            type: "POST",
            url: "/chkAuth",
            data: {
                rData: genQR
            },
            async: true,
            cache: false,
            success: function(rdata) {
                if (rdata) {
                    stopTimer();

                    var sJson = JSON.parse(rdata)

                    if (sJson["status"] == "OK") {
                        loginForm.submit();
                        // location.replace(sJson["msg"]);
                    } else {
                        $("#result").html("<font size ='4' color='red'>" + sJson["msg"] + "</font>");
                    }
                }
            },
            error: function() {
                console.log('ajTask ajax error');
            },
        });

        ajTask = ajTask_n;
    };

    var tryCnt = 0;
    var maxTry = 12;

    getQRImage();

    var chkTimer = setInterval(function() {
        tryCnt++;
        getQRImage();

        // $("#result").html("<font size ='4' color='blue'> 認証チェック中<font size='3'>(" + tryCnt + ")</font>.....</font>");

        if (tryCnt >= maxTry) {
            // $("#result").html("<div><font size ='4' color='red'>タイムアウト</font></div><div><font size ='2' color='red'>(一定期間内に認証が出来ませんでした。ページを再読み込みしてください。)</font></div>");
            stopTimer();
            $('#qrcode').append('<img src="/img/timeOut.png" width="90px">');
            $('#mobileLink').unwrap();
        }

    }, 10000);

    function stopTimer() {
        clearInterval(chkTimer);

        $('#qrcode').empty();

        // *************************************************************************
        // * javascriptで強制的にAjaxを止める場合、下記のコメントを削除
        // ****************************** Start ************************************
        // if (ajTask) {
        //     ajTask.abort();
        // }
        // ******************************* End *************************************
    }

    /* beforeunload */
    $(window).on("beforeunload", function () {
        clearInterval(chkTimer);
    });

    /* error */
    $(window).on("error", function () {
        clearInterval(chkTimer);
    });
})