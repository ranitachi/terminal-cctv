$(document).ready(function () {
    $('#menu').tree({
        onClick: function (node) {

            if (node.text == "Upload Jadwal Terminal Giwangan") {
                upload_jadwal_terminal_giwangan();
            }

            if (node.text == "Upload Jadwal Terminal Tirtonadi") {
                upload_jadwal_terminal_tirtonadi();
            }

            if (node.text == "Upload Jadwal Terminal Ir. Soekarno") {
                upload_jadwal_terminal_klaten();
            }

            if (node.text == "Upload Jadwal Terminal Purabaya") {
                upload_jadwal_terminal_purabaya();
            }

            if (node.text == "Logout") {
                window.location = "../login";
            }
        }
    });

    function upload_jadwal_terminal_giwangan(){

        $('#upload-jadwal-giwangan').dialog({
            title: 'Upload Jadwal Terminal Giwangan',
            closed: false,
            cache: false,
            modal: true,
            toolbar:[{
                text:'Simpan',
                iconCls:'icon-save',
                handler:upload_jadwal_giwangan_save
            }]
        });

        $('#upload-giwangan').filebox({});


    }

    function upload_jadwal_giwangan_save(){

        $('#form-upload-jadwal-giwangan').form({
            success:function(data){
                $("#form-upload-jadwal-giwangan").form('clear');
                $('#upload-jadwal-giwangan').dialog('close');
                $.messager.show({
                    title: 'Informasi',
                    msg: 'Data Berhasil Ditambah'});
            }
        }).submit();
    }

    function upload_jadwal_terminal_tirtonadi(){

        $('#upload-jadwal-tirtonadi').dialog({
            title: 'Upload Jadwal Terminal Tirtonadi',
            closed: false,
            cache: false,
            modal: true,
            toolbar:[{
                text:'Simpan',
                iconCls:'icon-save',
                handler:upload_jadwal_tirtonadi_save
            }]
        });

        $('#upload-tirtonadi').filebox({});


    }

    function upload_jadwal_tirtonadi_save(){

        $('#form-upload-jadwal-tirtonadi').form({
            success:function(data){
                $("#form-upload-jadwal-tirtonadi").form('clear');
                $('#upload-jadwal-tirtonadi').dialog('close');
                $.messager.show({
                    title: 'Informasi',
                    msg: 'Data Berhasil Ditambah'});
            }
        }).submit();
    }

    function upload_jadwal_terminal_klaten(){

        $('#upload-jadwal-klaten').dialog({
            title: 'Upload Jadwal Terminal Klaten',
            closed: false,
            cache: false,
            modal: true,
            toolbar:[{
                text:'Simpan',
                iconCls:'icon-save',
                handler:upload_jadwal_klaten_save
            }]
        });

        $('#upload-klaten').filebox({});


    }

    function upload_jadwal_klaten_save(){

        $('#form-upload-jadwal-klaten').form({
            success:function(data){
                $("#form-upload-jadwal-klaten").form('clear');
                $('#upload-jadwal-klaten').dialog('close');
                $.messager.show({
                    title: 'Informasi',
                    msg: 'Data Berhasil Ditambah'});
            }
        }).submit();
    }


    function upload_jadwal_terminal_purabaya(){

        $('#upload-jadwal-surabaya').dialog({
            title: 'Upload Jadwal Terminal Purabaya',
            closed: false,
            cache: false,
            modal: true,
            toolbar:[{
                text:'Simpan',
                iconCls:'icon-save',
                handler:upload_jadwal_surabaya_save
            }]
        });

        $('#upload-surabaya').filebox({});


    }

    function upload_jadwal_surabaya_save(){

        $('#form-upload-jadwal-surabaya').form({
            success:function(data){
                $("#form-upload-jadwal-surabaya").form('clear');
                $('#upload-jadwal-surabaya').dialog('close');
                $.messager.show({
                    title: 'Informasi',
                    msg: 'Data Berhasil Ditambah'});
            }
        }).submit();
    }
});