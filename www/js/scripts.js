function art_select() {
    //var link_temp = alert(document.getElementById('btn_edit').href);

    var radio = document.getElementsByName('art_id');
    for( var i = 0; i < radio.length; i++) {
        if( radio[i].type == "radio" && radio[i].checked ) {
            //document.getElementById('btn_edit').href += "?id="+radio[i].value;
            //document.getElementById('art_form').submit();
            return true;
        }
    }
    return false;
}
function art_edit(id) {
    var radio = document.getElementsByName('art_id');
    var r_length = radio.length;
    if( r_length == undefined ) {
        radio.checked = ( radio.value == id.toString() );
        return;
    }
    for( var i = 0; i < r_length; i++ ) {
        radio[i].checked = false;
        if( radio[i].value == id.toString() ) {
            radio[i].checked = true;
            document.getElementById('art_form').submit();
            break
        }
    }
}