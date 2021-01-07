/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 *
 * Version: 5.6.2 (2020-12-08)
 */
(function () {
        'use strict';

        var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

        var register = function (editor, url) {
            editor.ui.registry.addButton('ocmediamanager', {
                text: '',
                icon: 'image',
                onAction: function() {

                    new $.oc.mediaManager.popup({
                        alias: 'ocmediamanager',
                        cropAndInsertButton: true,
                        onInsert: function(items) {
                            if (!items.length)
                            {
                                alert('Please select image(s) to insert.')
                                return;
                            }

                            for (var i=0, len=items.length; i<len; i++) {
                                if (items[i].documentType !== 'image') {
                                    alert('The file "'+items[i].title+'" is not an image.')
                                    continue
                                }

                                editor.insertContent('<img src="' + items[i].publicUrl + '" />');
                            }

                            this.hide();
                        }
                    });

                }
            });

        };

        function Plugin() {
            global.add('ocmediamanager', function (editor, url) {
                // setup(editor);
                register(editor, url);
            });
        }

        Plugin();

    }()
);
