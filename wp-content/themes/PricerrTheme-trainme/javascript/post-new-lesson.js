/**
 * Created by yuezhang on 11/11/14.
 *
 * Javascript for post post-new.php page
 */

/***************************************************
 *  Image Upload Section
 ***************************************************/

jQuery(function() {

  var idCount = 0;

  var createPriview = function (attachmentID, url) {
    var preview = "<div id='img-preview-" + idCount + "' class='preview-frame'>"
      + "<div class='delete'>"
      + "<span class='delete-mask'>&#10005;</span>"
      + "</div>"
      + "<img attachment-id='" + attachmentID + "' src='" + url + "'></img>"
      + "</div>";

    jQuery(preview).appendTo("#img-preview-list");
  };

  var createInput = function () {
    var fileInput = "<input id='img-input-" + idCount
      + "' type='file' class='do_input img-input post-new-upload' name='picfile["
      + idCount + "]'/>";

    jQuery(fileInput).insertAfter("#img-upload-btn");
  };

  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        var url = e.target.result;

        jQuery("#img-input-" + idCount).css("display", "none");

        createPriview(-1, url);

        idCount++;

        createInput();
      };
      reader.readAsDataURL(input.files[0]);
    }
  };

  var createPriviewList = function () {
    
    jQuery("#img-preview-list").html("");
    
    var imgUploadedList = [];
    jQuery.each(jQuery("#img-uploaded-list").find(".img-uploaded-data"), function () {
      var img = [];
      img.id = jQuery(this).attr("img-id");
      img.url = jQuery(this).attr("img-url");
      imgUploadedList.push(img);
    });

    for (; idCount < imgUploadedList.length; idCount++) {
      createPriview(imgUploadedList[idCount].id, imgUploadedList[idCount].url);
    }
  };

  createPriviewList();

  createInput();

  jQuery("#img-input-list").on("change", ".img-input", function () {
    readURL(this);
  });

  jQuery("#img-input-list").on("hover", ".img-input", function () {
    jQuery("#img-upload-btn").toggleClass("post-new-hover");
  });

  jQuery("#img-preview-list").on("click", ".delete-mask", function () {

    var previewFrame = jQuery(this).closest(".preview-frame");

    var idStr = previewFrame.attr("id").split("-");
    // var imgURL = previewFrame.find("img").attr("src");
    var attachmentID = previewFrame.find("img").attr("attachment-id");

    var success = true;

    if (attachmentID > 0) {
      jQuery.ajax({
        url: wp_links.ajax_url,
        data: {
          'action': 'delete_post_image',
          'id': attachmentID
        },
        success: function (data) {
          // This outputs the result of the ajax request
          if (data.length > 0) {
            alert("Deletion Failed. Please try again.");
            jQuery("#img-preview-list").innerHTML = data;
            createPriviewList();
            success = false;
          }
        },
        error: function (errorThrown) {
          console.log(errorThrown);
          alert("Deletion Failed. Please try again.");
          success = false;
        }
      });
    }

    if (success) {
      jQuery("#img-input-" + idStr[idStr.length - 1]).remove();
      jQuery("#img-uploaded-" + attachmentID).remove();

      previewFrame.fadeOut("fast", function () {
        jQuery(this).remove();
      });
    }
    
    event.preventDefault();
  });

});

/***************************************************
 *  Video Upload Section
 ***************************************************/

jQuery(function() {

  var idCount = 0;

  var createPriview = function(id, videoID, newVideo) {

    var videoPreview = "<div id='video-preview-" + id + "'"
      + " class='preview-frame'"
      + " uploaded='"+ newVideo +"'>"
      + "<div class='delete'>"
      + "<a class='delete-mask' href='#video-upload-url'>&#10005;</a>"
      + "</div>"
      + "<iframe width='121' height='76' "
      + "src='//www.youtube.com/embed/" + videoID + "?controls=0&showinfo=0&rel=0' "
      + "frameborder='0' allowfullscreen style='margin-right: 5px;'></iframe>"
      + "</div>";

    jQuery(videoPreview).appendTo("#video-preview-list");
  };

  var createInput = function(id, videoURL) {
    var fileInput = "<input id='video-input-" + id + "' "
      + "name='youtube_link[" + id + "]' "
      + "value='" + videoURL + "' "
      + "style='display: none'/>";

    jQuery(fileInput).insertAfter("#video-upload-url");
  };

  var createPriviewList = function() {
    
    jQuery("#video-preview-list").html("");
        
    var videoUploadedList = [];
    jQuery.each(jQuery("#video-uploaded-list").find(".video-uploaded-data"), function () {
      var video = [];
      video.id = jQuery(this).attr("video-id");
      video.url = jQuery(this).attr("video-url");
      videoUploadedList.push(video);
    });

    var maxId = -1;
    for(var id in videoUploadedList) {
      var video = videoUploadedList[id];
      createPriview(video.id, getID(video.url), true);
      
      if(Number(video.id) > maxId) {
        maxId = Number(video.id);
      }
    }

    idCount = ++maxId; // idCount continue increase from the largest id

    jQuery("#video-upload-url").attr("name", "youtube_link[" + idCount + "]");
  };

  var getID = function(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length === 11) {
      return match[2];
    } else {
      return false;
    }
  };

  createPriviewList();

  jQuery("#video-upload-btn").click(function() {

    var videoUploadUrlDOM = jQuery("#video-upload-url");
    var videoUrl = videoUploadUrlDOM.val();
    videoUploadUrlDOM.val("");

    var videoID = getID(videoUrl);

    if (videoID) {

      createPriview(idCount, videoID, false);
      createInput(idCount, videoUrl);

      idCount++;

      videoUploadUrlDOM.attr("name", "youtube_link[" + idCount + "]");
    } else {
      alert("Invalid URL...");
    }
  });

  jQuery("#video-preview-list").on("click", ".delete-mask", function(event) {

    var previewFrame = jQuery(this).closest(".preview-frame");

    var idStr = previewFrame.attr("id").split("-");
    // var imgURL = previewFrame.find("img").attr("src");
    // var attachmentID = previewFrame.find("img").attr("attachment-id");
    var id = idStr[idStr.length - 1];

    var uploaded = previewFrame.attr("uploaded");

    var currURL = jQuery("#post-new-form").attr("action").split("=");
    
    var pid = currURL[currURL.length - 1];

    var success = true;

    if (uploaded == "true") {
      jQuery.ajax({
        url: wp_links.ajax_url,
        data: {
          'action': 'delete_post_video',
          'id': id,
          'pid': pid
        },
        success: function (data) {
          // This outputs the result of the ajax request
          if (data.length > 0) {
            alert("Deletion Failed. Please try again.");
            jQuery("#img-preview-list").innerHTML = data;
            createPriviewList();
            success = false;
          }
        },
        error: function (errorThrown) {
          console.log(errorThrown);
          alert("Deletion Failed. Please try again.");
          success = false;
        }
      });
    }

    if (success) {
      jQuery("#video-input-" + id).remove();
      jQuery("#video-uploaded-" + id).remove();

      previewFrame.fadeOut("fast", function () {
        jQuery(this).remove();
      });
    }
    
    event.preventDefault();
  });

}); //video upload section end

/***************************************************
 *  Video Upload Section
 ***************************************************/

jQuery(function() {

  var idCount = 0;
  var maxId = -1;

  jQuery.each(jQuery("#iwill-list").find(".i-will-container"), function () {
    var idStr = jQuery(this).find(".post-new-textbox-extra-1").attr("id");
    idStr = idStr.split("-");

    var id = idStr[idStr.length - 1];

    if(Number(id) > maxId) {
      maxId = Number(id);
    }
  });

  idCount = ++maxId;

  jQuery("#iwill-list").on("click", "#iwill-more-btn", function () {
    var iwillContainer = jQuery(".i-will-container").first();
    var idStr = iwillContainer.attr("id");
    idStr = idStr.split("-");
    var id = idStr[idStr.length-1];

    iwillContainer.find("#iwill-more-btn").attr("id", "iwill-delete-btn").attr("value", jQuery('<div />').html('&#10005;').text());

    if (id == (idCount-1)) {
      iwillContainer.insertAfter(jQuery(".i-will-container").last());
    }

    //var price = extraPrice.val();
    //var content = extraContent.val();
    //
    //extraPrice.val("");
    //extraContent.val("");

    var newComponent = "<div id='iwill-" + idCount + "'"
      + " class='i-will-container'"
      + " uploaded='false'>"
      + "<div class='post-extendable-textbox-wrapper'>"
      + "<div class='do_input post-new-textbox url-textbox'>"
      + "<span class='currency-icon-extra'>$</span>"
      + "<input id='extraMoney' class='post-new-textbox-extra-1' "
      + "name='extra_price[" + idCount + "]' value='' />"
      + "<span class='i-will'>I will provide</span>"
      + "<input id='extraContent' class='post-new-textbox-extra-2' "
      + "name='extra_content[" + idCount + "]' value=''>"
      + "</div>"
      + "</div>"
      + "<div class='post-extendable-extrabtn-wrapper'>"
      + "<input id='iwill-more-btn' type='button' class='url-button' value='&#65291;'/>"
      + "</div>"
      + "</div>";

    jQuery(newComponent).insertBefore(jQuery(".i-will-container").first());

    idCount++;

    //extraPrice.attr("name", "extra_price[" + idCount + "]");
    //extraContent.attr("name", "extra_content[" + idCount + "]");
  });

  jQuery("#iwill-list").on("click", "#iwill-delete-btn", function () {

    var iwillContainer = jQuery(this).closest(".i-will-container");

    var idStr = iwillContainer.attr("id").split("-");
    // var imgURL = previewFrame.find("img").attr("src");
    // var attachmentID = previewFrame.find("img").attr("attachment-id");
    var id = idStr[idStr.length - 1];

    var uploaded = iwillContainer.attr("uploaded");

    var currURL = jQuery("#post-new-form").attr("action").split("=");

    var pid = currURL[currURL.length - 1];

    var success = true;

    if (uploaded != "false") {
      jQuery.ajax({
        url: wp_links.ajax_url,
        data: {
          'action': 'delete_post_extra',
          'id': id,
          'pid': pid
        },
        success: function (data) {
          // This outputs the result of the ajax request
          if (data.length > 0) {
            alert("Deletion Failed. Please try again.");
            success = false;
          }
        },
        error: function (errorThrown) {
          console.log(errorThrown);
          alert("Deletion Failed. Please try again.");
          success = false;
        }
      });
    }

    if (success) {
      iwillContainer.fadeOut("fast", function () {
        iwillContainer.remove();
      });
    }

    event.preventDefault();
  });

}); //I will section js end