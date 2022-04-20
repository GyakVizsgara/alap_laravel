class Bejegyzes{
    constructor(node, adat){
        this.node = node;
        this.adat=adat;
        this.bejOszt = this.node.children(".osztaly_id");
        this.bejTev = this.node.children(".tevekenyseg_id");
        this.tevNev = this.node.children(".tevekenyseg_nev");
        this.bejpont = this.node.children(".pontszam");
        this.bejStat = this.node.children(".allapot");
        this.setAdat(adat);

    }

    setAdat(adat){
        //this.adat = adat;
        this.bejOszt.text(adat.osztaly_id);
        //this.bejTev.text(adat.tevekenyseg_id);
        this.tevNev.text(adat.tevekenyseg_nev);
        this.bejpont.text(adat.pontszam)
        this.bejStat.text(adat.allapot);
    }
}