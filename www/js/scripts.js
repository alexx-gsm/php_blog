function art_select(radio) {
    //var link_temp = alert(document.getElementById('btn_edit').href);
    alert(radio.value);

    var radio = document.getElementsByName('art_id');
    return false;
    for( var i = 0; i < radio.length; i++) {
        if( radio[i].type == "radio" && radio[i].checked ) {
            //document.getElementById('btn_edit').href += "?id="+radio[i].value;
            //document.getElementById('art_form').submit();
            return true;
        }
    }

}

function art_edit(id) {

    var parent = document.getElementById('art_form');
    if( parent ){
        var id_n = document.createElement('input');
        id_n.type = 'hidden';
        id_n.name = 'id_news';
        id_n.value = id;

        parent.appendChild(id_n);
    } else return false;

    document.getElementById('art_form').submit();
    return true;
}