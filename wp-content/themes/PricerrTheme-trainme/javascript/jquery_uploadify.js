/*
 Uploadify v2.1.4
 Release Date: November 8, 2010

 Copyright (c) 2010 Ronnie Garcia, Travis Nickels

 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:

 The above copyright notice and this permission notice shall be included in
 all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 THE SOFTWARE.
 */

if (jQuery) {
    (function (a) {
        a.extend(a.fn, {uploadify: function (b) {
            a(this).each(function () {
                var f = a.extend({id: a(this).attr("id"), uploader: "uploadify.swf", script: "uploadify.php", expressInstall: null, folder: "", height: 30, width: 120, cancelImg: "cancel.png", wmode: "opaque", scriptAccess: "sameDomain", fileDataName: "Filedata", method: "POST", queueSizeLimit: 999, simUploadLimit: 1, queueID: false, displayData: "percentage", removeCompleted: true, onInit: function () {
                }, onSelect: function () {
                }, onSelectOnce: function () {
                }, onQueueFull: function () {
                }, onCheck: function () {
                }, onCancel: function () {
                }, onClearQueue: function () {
                }, onError: function () {
                }, onProgress: function () {
                }, onComplete: function () {
                }, onAllComplete: function () {
                }}, b);
                a(this).data("settings", f);
                var e = location.pathname;
                e = e.split("/");
                e.pop();
                e = e.join("/") + "/";
                var g = {};
                g.uploadifyID = f.id;
                g.pagepath = e;
                if (f.buttonImg) {
                    g.buttonImg = escape(f.buttonImg)
                }
                if (f.buttonText) {
                    g.buttonText = escape(f.buttonText)
                }
                if (f.rollover) {
                    g.rollover = true
                }
                g.script = f.script;
                g.folder = escape(f.folder);
                if (f.scriptData) {
                    var h = "";
                    for (var d in f.scriptData) {
                        h += "&" + d + "=" + f.scriptData[d]
                    }
                    g.scriptData = escape(h.substr(1))
                }
                g.width = f.width;
                g.height = f.height;
                g.wmode = f.wmode;
                g.method = f.method;
                g.queueSizeLimit = f.queueSizeLimit;
                g.simUploadLimit = f.simUploadLimit;
                if (f.hideButton) {
                    g.hideButton = true
                }
                if (f.fileDesc) {
                    g.fileDesc = f.fileDesc
                }
                if (f.fileExt) {
                    g.fileExt = f.fileExt
                }
                if (f.multi) {
                    g.multi = true
                }
                if (f.auto) {
                    g.auto = true
                }
                if (f.sizeLimit) {
                    g.sizeLimit = f.sizeLimit
                }
                if (f.checkScript) {
                    g.checkScript = f.checkScript
                }
                if (f.fileDataName) {
                    g.fileDataName = f.fileDataName
                }
                if (f.queueID) {
                    g.queueID = f.queueID
                }
                if (f.onInit() !== false) {
                    a(this).css("display", "none");
                    a(this).after('<div id="' + a(this).attr("id") + 'Uploader"></div>');
                    swfobject.embedSWF(f.uploader, f.id + "Uploader", f.width, f.height, "9.0.24", f.expressInstall, g, {quality: "high", wmode: f.wmode, allowScriptAccess: f.scriptAccess}, {}, function (i) {
                        if (typeof(f.onSWFReady) == "function" && i.success) {
                            f.onSWFReady()
                        }
                    });
                    if (f.queueID == false) {
                        a("#" + a(this).attr("id") + "Uploader").after('<div id="' + a(this).attr("id") + 'Queue" class="uploadifyQueue"></div>')
                    } else {
                        a("#" + f.queueID).addClass("uploadifyQueue")
                    }
                }
                if (typeof(f.onOpen) == "function") {
                    a(this).bind("uploadifyOpen", f.onOpen)
                }
                a(this).bind("uploadifySelect", {action: f.onSelect, queueID: f.queueID}, function (k, i, j) {
                    if (k.data.action(k, i, j) !== false) {
                        var l = Math.round(j.size / 1024 * 100) * 0.01;
                        var m = "KB";
                        if (l > 1000) {
                            l = Math.round(l * 0.001 * 100) * 0.01;
                            m = "MB"
                        }
                        var n = l.toString().split(".");
                        if (n.length > 1) {
                            l = n[0] + "." + n[1].substr(0, 2)
                        } else {
                            l = n[0]
                        }
                        if (j.name.length > 20) {
                            fileName = j.name.substr(0, 20) + "..."
                        } else {
                            fileName = j.name
                        }
                        queue = "#" + a(this).attr("id") + "Queue";
                        if (k.data.queueID) {
                            queue = "#" + k.data.queueID
                        }
                        a(queue).append('<div id="' + a(this).attr("id") + i + '" class="uploadifyQueueItem"><div class="cancel"><a href="javascript:jQuery(\'#' + a(this).attr("id") + "').uploadifyCancel('" + i + '\')"><img src="' + f.cancelImg + '" border="0" /></a></div><span class="fileName">' + fileName + " (" + l + m + ')</span><span class="percentage"></span><div class="uploadifyProgress"><div id="' + a(this).attr("id") + i + 'ProgressBar" class="uploadifyProgressBar"><!--Progress Bar--></div></div></div>')
                    }
                });
                a(this).bind("uploadifySelectOnce", {action: f.onSelectOnce}, function (i, j) {
                    i.data.action(i, j);
                    if (f.auto) {
                        if (f.checkScript) {
                            a(this).uploadifyUpload(null, false)
                        } else {
                            a(this).uploadifyUpload(null, true)
                        }
                    }
                });
                a(this).bind("uploadifyQueueFull", {action: f.onQueueFull}, function (i, j) {
                    if (i.data.action(i, j) !== false) {
                        alert("The queue is full.  The max size is " + j + ".")
                    }
                });
                a(this).bind("uploadifyCheckExist", {action: f.onCheck}, function (n, m, l, k, p) {
                    var j = new Object();
                    j = l;
                    j.folder = (k.substr(0, 1) == "/") ? k : e + k;
                    if (p) {
                        for (var i in l) {
                            var o = i
                        }
                    }
                    a.post(m, j, function (s) {
                        for (var q in s) {
                            if (n.data.action(n, s, q) !== false) {
                                var r = confirm("Do you want to replace the file " + s[q] + "?");
                                if (!r) {
                                    document.getElementById(a(n.target).attr("id") + "Uploader").cancelFileUpload(q, true, true)
                                }
                            }
                        }
                        if (p) {
                            document.getElementById(a(n.target).attr("id") + "Uploader").startFileUpload(o, true)
                        } else {
                            document.getElementById(a(n.target).attr("id") + "Uploader").startFileUpload(null, true)
                        }
                    }, "json")
                });
                a(this).bind("uploadifyCancel", {action: f.onCancel}, function (n, j, m, o, i, l) {
                    if (n.data.action(n, j, m, o, l) !== false) {
                        if (i) {
                            var k = (l == true) ? 0 : 250;
                            a("#" + a(this).attr("id") + j).fadeOut(k, function () {
                                a(this).remove()
                            })
                        }
                    }
                });
                a(this).bind("uploadifyClearQueue", {action: f.onClearQueue}, function (k, j) {
                    var i = (f.queueID) ? f.queueID : a(this).attr("id") + "Queue";
                    if (j) {
                        a("#" + i).find(".uploadifyQueueItem").remove()
                    }
                    if (k.data.action(k, j) !== false) {
                        a("#" + i).find(".uploadifyQueueItem").each(function () {
                            var l = a(".uploadifyQueueItem").index(this);
                            a(this).delay(l * 100).fadeOut(250, function () {
                                a(this).remove()
                            })
                        })
                    }
                });
                var c = [];
                a(this).bind("uploadifyError", {action: f.onError}, function (m, i, l, k) {
                    if (m.data.action(m, i, l, k) !== false) {
                        var j = new Array(i, l, k);
                        c.push(j);
                        a("#" + a(this).attr("id") + i).find(".percentage").text(" - " + k.type + " Error");
                        a("#" + a(this).attr("id") + i).find(".uploadifyProgress").hide();
                        a("#" + a(this).attr("id") + i).addClass("uploadifyError")
                    }
                });
                if (typeof(f.onUpload) == "function") {
                    a(this).bind("uploadifyUpload", f.onUpload)
                }
                a(this).bind("uploadifyProgress", {action: f.onProgress, toDisplay: f.displayData}, function (k, i, j, l) {
                    if (k.data.action(k, i, j, l) !== false) {
                        a("#" + a(this).attr("id") + i + "ProgressBar").animate({width: l.percentage + "%"}, 250, function () {
                            if (l.percentage == 100) {
                                a(this).closest(".uploadifyProgress").fadeOut(250, function () {
                                    a(this).remove()
                                })
                            }
                        });
                        if (k.data.toDisplay == "percentage") {
                            displayData = " - " + l.percentage + "%"
                        }
                        if (k.data.toDisplay == "speed") {
                            displayData = " - " + l.speed + "KB/s"
                        }
                        if (k.data.toDisplay == null) {
                            displayData = " "
                        }
                        a("#" + a(this).attr("id") + i).find(".percentage").text(displayData)
                    }
                });
                a(this).bind("uploadifyComplete", {action: f.onComplete}, function (l, i, k, j, m) {
                    if (l.data.action(l, i, k, unescape(j), m) !== false) {
                        a("#" + a(this).attr("id") + i).find(".percentage").text(" - Completed");
                        if (f.removeCompleted) {
                            a("#" + a(l.target).attr("id") + i).fadeOut(250, function () {
                                a(this).remove()
                            })
                        }
                        a("#" + a(l.target).attr("id") + i).addClass("completed")
                    }
                });
                if (typeof(f.onAllComplete) == "function") {
                    a(this).bind("uploadifyAllComplete", {action: f.onAllComplete}, function (i, j) {
                        if (i.data.action(i, j) !== false) {
                            c = []
                        }
                    })
                }
            })
        }, uploadifySettings: function (f, j, c) {
            var g = false;
            a(this).each(function () {
                if (f == "scriptData" && j != null) {
                    if (c) {
                        var i = j
                    } else {
                        var i = a.extend(a(this).data("settings").scriptData, j)
                    }
                    var l = "";
                    for (var k in i) {
                        l += "&" + k + "=" + i[k]
                    }
                    j = escape(l.substr(1))
                }
                g = document.getElementById(a(this).attr("id") + "Uploader").updateSettings(f, j)
            });
            if (j == null) {
                if (f == "scriptData") {
                    var b = unescape(g).split("&");
                    var e = new Object();
                    for (var d = 0; d < b.length; d++) {
                        var h = b[d].split("=");
                        e[h[0]] = h[1]
                    }
                    g = e
                }
            }
            return g
        }, uploadifyUpload: function (b, c) {
            a(this).each(function () {
                if (!c) {
                    c = false
                }
                document.getElementById(a(this).attr("id") + "Uploader").startFileUpload(b, c)
            })
        }, uploadifyCancel: function (b) {
            a(this).each(function () {
                document.getElementById(a(this).attr("id") + "Uploader").cancelFileUpload(b, true, true, false)
            })
        }, uploadifyClearQueue: function () {
            a(this).each(function () {
                document.getElementById(a(this).attr("id") + "Uploader").clearFileUploadQueue(false)
            })
        }})
    })(jQuery)
}
;