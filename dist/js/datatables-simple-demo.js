window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki


    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {

        /*new simpleDatatables.DataTable(datatablesSimple, {
            exportable: {

                type: "csv",
                filename: "my-txt-file",
                download: true
            }
        });
    };*/
        new simpleDatatables.DataTable(datatablesSimple)
    };

});

