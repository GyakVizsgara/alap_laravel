$(function () {
    const myAjax = new MyAjax();
    const bejegyzesTomb = [];
    let apivegpont = "/api/";

    myAjax.adatBetolt(apivegpont + "bejegyzesek",bejegyzesTomb,bejegyzesMegjelen);

    function bejegyzesMegjelen(megjelenit) {
        console.log(megjelenit);
        const szuloelem = $(".bejegyzes_tabla");
        const sablonelem = $("#sablonhoz .bejegyzes");
        szuloelem.empty();
        sablonelem.show();

        megjelenit.forEach(function (elem) {
            let node = sablonelem.clone().appendTo(szuloelem);
            const obj = new Bejegyzes(node, elem);
        });
        sablonelem.hide();
    }

    let keresomezo = $("#kereso");
    keresomezo.on("keyup", function () {
        const szuloelem = $(".bejegyzes_tabla");
        const sablonelem = $("#sablonhoz .bejegyzes");
        apivegpont = "/api/bejegyzesekSzures/";
        apivegpont += "?q=" + keresomezo.val();
        szuloelem.children().remove();
        bejegyzesTomb.splice();
        console.log(apivegpont);

        myAjax.adatBetolt(apivegpont, bejegyzesTomb, bejegyzesMegjelen);
    });

    $("#rendezesiszempont").on("change", function () {
        const szuloelem = $(".bejegyzes_tabla");
        const sablonelem = $("#sablonhoz .bejegyzes");
        let ujvegpont = "/api/bejegyzesekSzures/";
        szuloelem.children().remove();
        bejegyzesTomb.splice();
        let szempont = $(this).val();
        console.log(szempont);

        switch (szempont) {
            case "RendezNo":
                ujvegpont += "?desc=RendezNo";
                break;
            case "RendezCsokken":
                ujvegpont += "?desc=RendezCsokken";
                break;
            default:
                break;
        }

        console.log(ujvegpont);
        myAjax.adatBetolt(ujvegpont, bejegyzesTomb, bejegyzesMegjelen);
    });

    

    $(".kuld").on("click", () => {
        apivegpont="/api/bejegyzes"
        szoveg={
            osztaly_id:1,
            tevekenyseg_id: 1,
        }
        myAjax.adatPost(apivegpont, szoveg);
    })
});
