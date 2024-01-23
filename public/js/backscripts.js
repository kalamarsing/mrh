var backscripts = {

    currentUserHasRole: function(roleName) {
        var section = CURRENT_USER;

        if(!user) {
            return false;
        }

        var role = user.roles.filter(function(r){
            if(r.name == roleName) {
                return r;
            }
        });

        return role.length > 0 ? true : false;
    },

};

//------------------------------------------//
//      BACKSCRIPTS DIALOG
//     
//------------------------------------------//
backscripts.dialog = {
    confirm: function(msg, _callback) {
        
        bootbox.confirm({
            message: msg,
            buttons: {
                confirm: {
                    label: 'Si' ,
                    className: 'btn-primary'
                },
                cancel: {
                    label:  'No',
                    className: 'btn-default'
                }
            },
            callback: function (result) {
                _callback(result);
            }
        });
    }

};


//------------------------------------------//
//      BACKSCRIPTS USERS MANAGER
//     
//------------------------------------------//
backscripts.users = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
    	    pageLength: 20,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Usuari eliminat correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}


//------------------------------------------//
//      BACKSCRIPTS SECTIONS MANAGER
//     
//------------------------------------------//
backscripts.sections = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
    	    pageLength: 20,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Secció eliminada correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}


backscripts.images = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
            bFilter: false,
            pageLength: 50,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'position', name: 'position', orderable: false, searchable: false},
                {data: 'filename', name: 'filename', orderable: false, searchable: false},
                {data: 'description', name: 'description', orderable: false, searchable: false},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Imatge eliminada correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}

backscripts.decades = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
            bFilter: false,
            pageLength: 50,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'title', name: 'title'},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Imatge eliminada correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}

backscripts.years = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
            bFilter: false,
            pageLength: 50,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'title', name: 'title'},
                {data: 'picture', name: 'picture'},
                {data: 'author', name: 'author'},
                {data: 'description', name: 'description'},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Programa eliminat correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}

backscripts.videos = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
            bFilter: false,
            pageLength: 50,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'title', name: 'title'},
                {data: 'url', name: 'url'},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Video eliminat correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}

backscripts.activities = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
            bFilter: false,
            pageLength: 50,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'position', name: 'position', orderable: false, searchable: false},
                {data: 'main_picture', name: 'main_picture', orderable: false, searchable: false},
                {data: 'description', name: 'description', orderable: false, searchable: false},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Activitat eliminada correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}

backscripts.pages = {

    _settings: null,
    _defaults: {},

    init: function(options)
    {
        this._settings = $.extend({}, this._defaults, options);
        this.setDatatable();
    },

    setDatatable: function()
    {
        var _this = this;
        var table = _this._settings.table.DataTable({
    		processing: true,
            serverSide: true,
    	    pageLength: 20,
              language: {
                  url: "///cdn.datatables.net/plug-ins/1.10.16/i18n/Catalan.json"
              },
    	    ajax: _this._settings.table.data('url'),
    	    columns: [
                {data: 'name', name: 'name'},
                {data: 'value', name: 'value'},
    	        {data: 'action', name: 'action', orderable: false, searchable: false}
    	    ],
            initComplete: function(settings, json) {
                DataTableTools.init(this, {
                    onDelete: function(response) {
                        toastr.success(response.message, 'Texte eliminat correctament', {timeOut: 3000});
                        _this.refresh();
                    }
                });

                _this.initEvents();
    	    }
        });
    },

    refresh: function()
    {
        var _this = this;
        var table = this._settings.table;
        var datatable = table.DataTable();

        datatable.ajax.reload(function(){
            _this.initEvents();
        });
    },

    initEvents: function()
    {
        var _this = this;
        _this._settings.table.find('.toogle-edit')
            .off('click')
            .on('click', function(e) {
                e.preventDefault();

                if(_this._editModal !== undefined) {
                    _this._editModal.modalOpen($(this).data('id'));
                }
            });
    }
}


$(document).on('click','.submit-btn-form', function(e) {
    e.preventDefault();
    $('#backform').submit();
});

$(document).on('click','.btn-del-file', function(e) {
    e.preventDefault();
    $(this).closest('.image-preview-container').hide();
    $(this).closest('.input-filename').val('');
    $(this).closest('.input-file').show();
});