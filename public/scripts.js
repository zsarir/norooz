$(document).ready(function () {
  $(".btn-plan-select").on("click", () => {
    $("#newListing-page-1").slideUp();
    $("#newListing-page-2").slideDown();
  });
  $("#addListing-p1").on("click", () => {
    $("#newListing-page-1").slideDown();
    $("#newListing-page-2").slideUp();
  });
  $("#addListing-p2").on("click", () => {
    $("#newListing-page-2").slideDown();
    $("#newListing-page-3").slideUp();
  });
  $("#addListing-p3").on("click", () => {
    $("#newListing-page-3").slideDown();
    $("#newListing-page-2").slideUp();
  });
  $("#addListing-p3-4").on("click", () => {
    $("#newListing-page-3").slideDown();
    $("#newListing-page-4").slideUp();
  });

  $("#addListing-p4").on("click", () => {
    $("#newListing-page-4").slideDown();
    $("#newListing-page-3").slideUp();
  });

  // upload multiple images to the listing
  let dropArea = $("#drop-area");

  dropArea.on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass("hover");
  });

  dropArea.on("dragleave", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass("hover");
  });

  dropArea.on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass("hover");

    let files = e.originalEvent.dataTransfer.files;
    let currentFiles = $("#images").prop("files");
    let newFiles = mergeFileLists(currentFiles, files);
    $("#images").prop("files", newFiles);
    previewImages(newFiles);
  });

  $("#drop-area").on("click", function () {
    $("#images").click();
  });

  $("#images").on("change", function () {
    let files = this.files;
    let currentFiles = $("#images").prop("files");
    let newFiles = mergeFileLists(currentFiles, files);
    $("#images").prop("files", newFiles);
    previewImages(newFiles);
  });

  function mergeFileLists(list1, list2) {
    let result = new DataTransfer();
    for (let i = 0; i < list1.length; i++) {
      result.items.add(list1[i]);
    }
    for (let i = 0; i < list2.length; i++) {
      result.items.add(list2[i]);
    }
    return result.files;
  }

  function previewImages(files) {
    $("#image-preview").html("");
    for (let i = 0; i < files.length; i++) {
      let reader = new FileReader();
      reader.onload = function (e) {
        $("#image-preview").append(
          '<img src="' + e.target.result + '" width="100" height="100">'
        );
      };
      reader.readAsDataURL(files[i]);
    }
  }

  $("#upload-form").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: "upload.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        alert("Images uploaded successfully.");
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert("An error occurred while uploading the images.");
      },
    });
  });
});
