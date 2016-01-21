function art_select() {
    //var link_temp = alert(document.getElementById('btn_edit').href);
    var radio = document.getElementsByName('radio_id');

    console.log(radio);

    for( var i = 0; i < radio.length; i++) {
        if( radio[i].type == "radio" && radio[i].checked ) {
            var form = document.getElementById('art_form');
            form.action = '/index.php?ctrl=AdminNews&act=Del';
            form.submit();
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

    parent.submit();
    return true;
}