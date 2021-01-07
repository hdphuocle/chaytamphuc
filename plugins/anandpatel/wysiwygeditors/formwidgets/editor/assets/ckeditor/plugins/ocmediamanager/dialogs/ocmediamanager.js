(function () {
    CKEDITOR.plugins.add("ocmediamanager", {
        icons: "ocmediamanager",
        requires: "dialog",
        init: function (e) {
            var pluginName = 'ocmediamanager';
            e.ui.addButton && e.ui.addButton('ocmediamanager', {
                label: 'Media Manager',
                command: pluginName,
                toolbar: 'insert,10'
            });


            e.addCommand("ocmediamanager", {
                exec: function (e) {
                }
            })
            e.on("afterCommandExec", function (a) {
                "ocmediamanager" == a.data.name && new $.oc.mediaManager.popup({
                    alias: "ocmediamanager",
                    cropAndInsertButton: !0,
                    onInsert: function (a) {
                        if (a.length) {
                            for (var n = 0, t = a.length; n < t; n++) "image" === a[n].documentType ? e.insertHtml('<img src="' + a[n].publicUrl + '" />', "unfiltered_html") : alert('The file "' + a[n].title + '" is not an image.');
                            this.hide()
                        } else alert("Please select image(s) to insert.")
                    }
                });
            });
        }
    });
})();
