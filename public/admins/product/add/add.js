$(function() {
    $(".tags_select_choose").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $(".danhmuc_selected2").select2({
        placeholder: "Chon danh muc",
        allowClear: true
    });
    $(".chooseImage").change(function () {
      if($(this).val() == 1)
      {
        $("#local").innerHTML = 1;
      }else {
        $("#local").append($(this).val());
      }
    });

    // let editor_config = {
    //     path_absolute : "/",
    //     selector: 'textarea.tinymce_editor_init',
    //     relative_urls: false,
    //     plugins: [
    //       "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    //       "searchreplace wordcount visualblocks visualchars code fullscreen",
    //       "insertdatetime media nonbreaking save table directionality",
    //       "emoticons template paste textpattern"
    //     ],
    //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    //     file_picker_callback : function(callback, value, meta) {
    //       let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    //       let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    
    //       let cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
    //       if (meta.filetype == 'image') {
    //         cmsURL = cmsURL + "&type=Images";
    //       } else {
    //         cmsURL = cmsURL + "&type=Files";
    //       }
    
    //       tinyMCE.activeEditor.windowManager.openUrl({
    //         url : cmsURL,
    //         title : 'Filemanager',
    //         width : x * 0.8,
    //         height : y * 0.8,
    //         resizable : "yes",
    //         close_previous : "no",
    //         onMessage: (api, message) => {
    //           callback(message.content);
    //         }
    //       });
    //     }
    //   };
    
    //   tinymce.init(editor_config);
    let editor_config = {
        path_absolute : "/",
        selector: 'textarea.tinymce_editor_init',
        relative_urls: false,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table directionality",
          "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
          let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    
          let cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
          if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
    
          tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
              callback(message.content);
            }
          });
        }
      };
    
      tinymce.init(editor_config);
})

// function chooseFile(fileInput)
// {
//   if(fileInput.files && fileInput.files[0])
//   {
//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $('#imageProduct').attr('src', e.target.result);
//     }

//     reader.readAsDataURL(fileInput.files[0]);
//   }
// }

function chooseFile()
{
  var fileSelected = document.getElementById('upLoadImg').files;
  if(fileSelected.length > 0)
  {
    var fileToLoad = fileSelected[0];
    var fileReader = new FileReader();
    fileReader.onload = function(fileLoaderEvent)
      {
        var srcData = fileLoaderEvent.target.result;
        var newImage = document.createElement('img');
        newImage.src = srcData;
        document.getElementById('displayImg').innerHTML = newImage.outerHTML;
      }
    fileReader.readAsDataURL(fileToLoad);
  }
}

function chooseLotsFiles()
{
  var fileSelected = document.getElementById('upLoadImgDetails').files;
  if(fileSelected.length > 0)
  {
    for (let i = 0; i < fileSelected.length; i++) {
      var fileToLoad = fileSelected[i];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoaderEvent)
      {
        var srcData = fileLoaderEvent.target.result;
        var newImage = document.createElement('img');
        newImage.src = srcData;
        document.getElementById('displayImgDetails').innerHTML += newImage.outerHTML;
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
}