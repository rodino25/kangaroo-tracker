const modalId = "kangaroo-modal";
let datagrid = null;
let selectedKangaroo = null;
let modal = null;

// on document ready
$(() => {
    bindDataGrid();
    bindFormSubmit();
    modal = new bootstrap.Modal(document.getElementById(modalId));
});


function bindDataGrid() {
    datagrid = $('#gridContainer').dxDataGrid({
        dataSource: DevExpress.data.AspNet.createStore({
            key: 'id',
            loadUrl: `/api/kangaroos`,
            loadMethod: "GET",
            onBeforeSend(method, ajaxOptions) {
                ajaxOptions.headers = {
                    Authorization: `Bearer ${localStorage.getItem("token")}`
                }
            },
            onAjaxError (err) {
                if (err.xhr.status == 401) {
                    doLogout();
                }
            }
        }),
        paging: {
            pageSize: 10,
        },
        pager: {
            showPageSizeSelector: true,
            allowedPageSizes: [10, 25, 50, 100],
        },
        remoteOperations: true,
        searchPanel: {
            visible: false,
            highlightCaseSensitive: true,
        },
        groupPanel: { visible: false },
        grouping: { autoExpandAll: false },
        allowColumnReordering: false,
        rowAlternationEnabled: false,
        filterRow: { visible: true },
        headerFilter: { visible: true },
        showBorders: true,
        width: '100%',
        columns: [
            {
                dataField: 'name',
                caption: 'Name',
                dataType: 'string',
                alignment: 'left',
            },
            {
                dataField: 'nickname',
                caption: 'Nickname',
                dataType: 'string',
                alignment: 'left',
            },
            {
                dataField: 'weight',
                caption: 'Weight',
                dataType: 'number',
                alignment: 'center',
            },
            {
                dataField: 'height',
                caption: 'Height',
                dataType: 'number',
                alignment: 'center',
            },
            {
                dataField: 'gender',
                caption: 'Gender',
                alignment: 'center',
                dataType: 'string',
                lookup: {
                    dataSource: DevExpress.data.AspNet.createStore({
                        key: 'Value',
                        loadUrl: `/api/kangaroos/options?type=gender`,
                        onBeforeSend(method, ajaxOptions) {
                            ajaxOptions.headers = {
                                Authorization: `Bearer ${localStorage.getItem("token")}`
                            }
                        },
                    }),
                    valueExpr: 'Value',
                    displayExpr: 'Text',
                },
            },
            {
                dataField: 'color',
                caption: 'Color',
                dataType: 'string',
                alignment: 'center',
            },
            {
                dataField: 'friendliness',
                caption: 'Friendliness',
                dataType: 'string',
                alignment: 'center',
                lookup: {
                    dataSource: DevExpress.data.AspNet.createStore({
                        key: 'Value',
                        loadUrl: `/api/kangaroos/options?type=friendliness`,
                        onBeforeSend(method, ajaxOptions) {
                            ajaxOptions.headers = {
                                Authorization: `Bearer ${localStorage.getItem("token")}`
                            }
                        },
                    }),
                    valueExpr: 'Value',
                    displayExpr: 'Text',
                },
            },
            {
                dataField: 'birthday',
                caption: 'Birthday',
                dataType: 'date',
                alignment: 'center',
            },
            {
                type: 'buttons',
                width: 100,
                buttons: [
                    {
                        hint: 'Edit',
                        icon: 'edit',
                        visible(e) {
                            return true;
                        },
                        disabled(e) {
                            return false;
                        },
                        onClick(e) {
                            selectedKangaroo = e.row.data;
                            showKangarooModal();
                        },
                    },
                    {
                        hint: 'Remove',
                        icon: 'trash',
                        visible(e) {
                            return true;
                        },
                        disabled(e) {
                            return false;
                        },
                        onClick(e) {
                            removeItem(e.row.data);
                        },
                    }
                ],
              },
        ]
      }).dxDataGrid('instance');
}

function removeItem(row) {
    Swal.fire({
        title: `Delete Item`,
        text: `Delete kangaroo "${row.name}" from list?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/kangaroos/${row.id}`)
                .then(r => {
                    datagrid.refresh();
                })
                .catch (err => {
                    const errMsg = err.response ? err.response.data.message : err.message;
                    Swal.fire('Failed to delete!', errMsg, 'error')
                });
        }
    })
}

function showKangarooModal() {
    if (selectedKangaroo) {
        $(`#${modalId} .modal-title`).text("Update Form");
        
        Object.keys(selectedKangaroo).forEach(key => {
            $(`#${modalId} [name=${key}]`).val(selectedKangaroo[key]);
        });

    } else {
        $(`#${modalId} .modal-title`).text("New Kangaroo");
        $(`#${modalId} .form-control`).val("");
    }
    modal.show();
}

function bindFormSubmit() {
    $("#form-kangaroo").submit(function(e) {
        e.preventDefault();
        const form = $(this).serializeArray();
        let payload = {
            id: selectedKangaroo ? selectedKangaroo.id : null
        }

        form.forEach(row => {
            payload[row.name] = row.value;
        })
        
        const request = selectedKangaroo == null ? 
            axios.post("/api/kangaroos", payload) : axios.patch(`/api/kangaroos/${selectedKangaroo.id}`, payload);
        
        request
            .then(r => {
                Swal.fire('Success!', r.data.message, 'success');
                modal.hide();
                datagrid.refresh();
            })
            .catch(err => {
                const errMsg = err.response ? err.response.data.message : err.message;
                Swal.fire("Oops!", errMsg, 'error')
            });
    });
}